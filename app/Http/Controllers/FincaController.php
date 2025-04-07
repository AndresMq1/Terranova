<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\FincaImage;
use App\Models\Ganado;
use App\Models\Producto;
use App\Models\Terreno;
use App\Models\Tipop;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$tipoProducto = Tipop::where('cod_tipop','F')->first();

        $producto = Producto::create([
            'nombreProducto' => $request->nombreProducto,
            'descripcion' => $request->descripcion,
            'precioProducto' => $request->precioProducto,
            'cod_tipop_fk' => "F",
            'cod_vendedor_fk' => auth()->id(),
        ]);

        $finca = Finca::create([
            'espacioTotal' => $request->espacioTotal,
            'espacioConstruido' => $request->espacioConstruido,
            'estratoFinca' => $request->estratoFinca,
            'numHabitaciones' => $request->numHabitaciones,
            'numBanos' => $request->numBanos,
            'ubicacionFinca' => $request->ubicacionFinca,
            'producto_id_fk' => $producto->id,
        ]);

        if($request->hasFile('imagenes')){
            foreach ($request->file('imagenes') as $imagen){
                $path = $imagen->store('fincas','public');
                FincaImage::create([
                    'path' => $path,
                    'finca_id_fk' => $finca->id
                ]);
            }
        }

        return redirect()->route('home')->with('success','Finca creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Finca $finca)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finca $finca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finca $finca, $id)
    {
        $finca = Finca::findOrFail($id);
        $producto = $finca->producto;
    
        $producto->update([
            'nombreProducto' => $request->nombreProducto,
            'descripcion' => $request->descripcion,
            'precioProducto' => $request->precioProducto,
        ]);
    
        $finca->update([
            'ubicacionFinca' => $request->ubicacionFinca,
            'espacioTotal' => $request->espacioTotal,
            'numHabitaciones' => $request->numHabitaciones,
            'numBanos' => $request->numBanos,
        ]);
    
        return redirect()->route('home')->with('success', 'Finca actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finca $finca, $id)
    {
        $finca = Finca::findOrFail($id);

    
        // Eliminar producto relacionado
        $finca->producto->delete();
    
        // Finalmente, eliminar la finca
        $finca->delete();
    
        return redirect()->route('home')->with('success', 'Finca eliminada correctamente.');
    }
}
