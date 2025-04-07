<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendarios = Calendario::whereDoesntHave('citas', function($query) {
            $query->where('estado', 'confirmado');
        })->get();

        return view('Citas.CitasCliente', compact('calendarios'));

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
    // Crear cita confirmada
    $cita = Cita::create([
        'id_Calendario' => $request->id_Calendario,
        'estado' => 'confirmado',
    ]);

    // Eliminar otras citas pendientes del mismo calendario
    Cita::where('id_Calendario', $request->id_Calendario)
        ->where('id_Cita', '!=', $cita->id_Cita)
        ->where('estado', 'pendiente')
        ->delete();

    return redirect()->route('citas.index')->with('success', 'Cita confirmada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita = Cita::findOrFail($cita);
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita cancelada.');
    }
    
}
