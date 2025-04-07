<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\GanadoImage;
use App\Models\Producto;
use App\Models\Tipop;
use Illuminate\Http\Request;

class GanadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ganados = Ganado::whereHas('producto', function ($query) {
            $query->where('cod_vendedor_fk', auth()->id());
        })->with(['producto', 'imagenes'])->get();
    
        return view('home', compact('ganados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$tipoProducto = Tipop::where('cod_tipop', 'G')->first();

    $producto = Producto::create([
        'nombreProducto' => $request->nombreProducto,
        'descripcion' => $request->descripcion,
        'precioProducto' => $request->precioProducto,
        'cod_tipop_fk' => "G",
        'cod_vendedor_fk' => auth()->id(),
    ]);

    $ganado = Ganado::create([
        'razaGanado' => $request->razaGanado,
        'edadGanado' => $request->edadGanado,
        'pesoGanado' => $request->pesoGanado,
        'generoGanado' => $request->generoGanado,
        'tipoGanado' => $request->tipoGanado,
        'ubicacionGanado' => $request->ubicacionGanado,
        'vacunasGanado' => $request->vacunasGanado,
        'cantidadGanado' => $request->cantidadGanado,
        'producto_id_fk' => $producto->id,
    ]);

    if($request->hasFile('imagenes')){
        foreach ($request->file('imagenes') as $imagen){
            $path = $imagen->store('ganado','public');
            GanadoImage::create([
                'path' => $path,
                'ganado_id_fk' => $ganado->id
            ]);
        }
    }

    return redirect()->route('home')->with('success', 'Ganado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ganado $ganado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ganado $ganado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ganado $ganado)
    {
        $producto = $ganado->producto;
    
        $producto->update([
            'nombreProducto' => $request->nombreProducto,
            'descripcion' => $request->descripcion,
            'precioProducto' => $request->precioProducto,
        ]);
    
        $ganado->update([
            'razaGanado' => $request->razaGanado,
            'edadGanado' => $request->edadGanado,
            'pesoGanado' => $request->pesoGanado,
            'generoGanado' => $request->generoGanado,
            'tipoGanado' => $request->tipoGanado,
            'ubicacionGanado' => $request->ubicacionGanado,
            'vacunasGanado' => $request->vacunasGanado,
            'cantidadGanado' => $request->cantidadGanado,
        ]);
    
        return redirect()->route('home')->with('success', 'Ganado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ganado $ganado)
    {

    
        // Eliminar producto relacionado
        $ganado->producto->delete();
    
        // Finalmente, eliminar la finca
        $ganado->delete();
    
        return redirect()->route('home')->with('success', 'Ganado eliminado correctamente.');
    }
}
