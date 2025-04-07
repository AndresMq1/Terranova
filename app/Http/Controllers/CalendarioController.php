<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendario = Calendario :: All();

        return view('Citas.CalendarioVendedor', ['calendario' => $calendario]);
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

        // Validar los datos
        $request->validate([
            'fechaDisponible' => 'required|date',
            'horaInicio' => 'required|date_format:H:i',
            'horaFin' => 'required|date_format:H:i|after:horaInicio',
            'Ubicacion' => 'required|string|max:255',
        ]);

        // Guardar el calendario
        Calendario::create([
            'fechaDisponible' => $request->fechaDisponible,
            'horaInicio' => $request->horaInicio,
            'horaFin' => $request->horaFin,
            'Ubicacion' => $request->Ubicacion,
        ]);

        return redirect()->route('calendario.vendedor')->with('success', 'Calendario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendario $calendario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendario $calendario)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
    try {
        $request->merge([
            'horaInicio' => date('H:i', strtotime($request->horaInicio)),
            'horaFin' => date('H:i', strtotime($request->horaFin)),
        ]);
        
        $request->validate([
            'fechaDisponible' => 'required|date',
            'horaInicio' => 'required|date_format:H:i',
            'horaFin' => 'required|date_format:H:i|after:horaInicio',
            'Ubicacion' => 'required',
        ]);
        $calendario = Calendario::findOrFail($id);

        $calendario->update([
            'fechaDisponible' => $request->fechaDisponible,
            'horaInicio' => $request->horaInicio,
            'horaFin' => $request->horaFin,
            'Ubicacion' => $request->Ubicacion,
        ]);

        return redirect()->route('calendario.vendedor')->with('success', 'Calendario actualizado correctamente.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calendario = Calendario::findOrFail($id);
        $calendario->delete();

        return redirect()->route('calendario.vendedor')->with('success', 'Calendario eliminado correctamente.');
    }

}
