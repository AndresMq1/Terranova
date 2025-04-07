<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Terreno;
use App\Models\TerrenoImage;
use Illuminate\Http\Request;

class TerrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terrenos = Terreno::whereHas('producto', function ($query) {
            $query->where('cod_vendedor_fk', auth()->id());
        })->with(['producto', 'imagenes'])->get();
    
        return view('home', compact('terreno'));
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
        'cod_tipop_fk' => "T",
        'cod_vendedor_fk' => auth()->id(),
    ]);

    $terreno = Terreno::create([
        'tamanoTerreno' => $request->tamanoTerreno,
        'ubicacionTerreno' => $request->ubicacionTerreno,
        'tipoSuelo' => $request->tipoSuelo,
        'tipografiaTerreno' => $request->tipografiaTerreno,
        'fuentesAgua' => $request->fuentesAgua,
        'producto_id_fk' => $producto->id,
    ]);

    if($request->hasFile('imagenes')){
        foreach ($request->file('imagenes') as $imagen){
            $path = $imagen->store('terreno','public');
            TerrenoImage::create([
                'path' => $path,
                'terreno_id_fk' => $terreno->id
            ]);
        }
    }

    return redirect()->route('home')->with('success', 'Terreno creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terreno $terreno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terreno $terreno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terreno $terreno)
    {
        $producto = $terreno->producto;
    
        $producto->update([
            'nombreProducto' => $request->nombreProducto,
            'descripcion' => $request->descripcion,
            'precioProducto' => $request->precioProducto,
        ]);
    
        $terreno->update([
            'tamanoTerreno' => $request->tamanoTerreno,
            'ubicacionTerreno' => $request->ubicacionTerreno,
            'tipoSuelo' => $request->tipoSuelo,
            'tipografiaTerreno' => $request->tipografiaTerreno,
            'fuentesAgua' => $request->fuentesAgua,
        ]);
    
        return redirect()->route('home')->with('success', 'Terreno actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terreno $terreno)
    {
        $terreno->producto->delete();
    
        // Finalmente, eliminar la finca
        $terreno->delete();
    
        return redirect()->route('home')->with('success', 'Ganado eliminado correctamente.');
    }
}
