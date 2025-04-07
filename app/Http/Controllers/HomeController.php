<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Ganado;
use App\Models\Terreno;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->rol === 'vendedor'){
            $fincas = Finca::whereHas('producto',function($query){
                $query->where('cod_vendedor_fk', auth()->id());
            })->with(['producto','imagenes'])->get();
    
            $ganados = Ganado::whereHas('producto',function($query){
                $query->where('cod_vendedor_fk', auth()->id());
            })->with(['producto','imagenes'])->get();
    
            $terrenos = Terreno::whereHas('producto',function($query){
                $query->where('cod_vendedor_fk', auth()->id());
            })->with(['producto','imagenes'])->get();
        }else{
            $fincas = Finca::with(['producto','imagenes'])->get();
            $ganados = Ganado::with(['producto','imagenes'])->get();
            $terrenos = Terreno::with(['producto','imagenes'])->get();
        }

        return view('home', compact('fincas','ganados','terrenos'));
    }
}
