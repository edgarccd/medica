<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    
    public function index()
    {
        $medicos=Medico::get();

        return view('medicos.index', ['medicos' => $medicos]);
    }

    public function create()
    {
        return view('medicos.create', ['medico' => new Medico]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'apellido_pat' => ['required', 'min:2'],
            'apellido_mat' => ['required', 'min:2'],
        ]);

       Medico::create([
            'nombre' => $request->input('nombre'),
            'apellido_pat' => $request->input('apellido_pat'),
            'apellido_mat' => $request->input('apellido_mat'),          
        ]);

        session()->flash('status', 'Medico Registrado con exito');

        return to_route('medicos.index');
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(Medico $medico)
    {
        return view('medicos.edit', ['medico' => $medico]);
    }

    
    public function update(Request $request, $medico)
    {
        $request->validate([
            'nombre' => ['required', 'min:2'],
            'apellido_pat' => ['required'],
            'apellido_mat' => ['required'],
        ]);

        $medico = Medico::find($medico);
        $medico->nombre = $request->input('nombre');
        $medico->apellido_pat = $request->input('apellido_pat');
        $medico->apellido_mat = $request->input('apellido_mat');
        $medico->updated_at = now();
        $medico->save();

        return to_route('medicos.index');
    }

   
    public function destroy(Medico $medico)
    {
        $medico->delete();
        return to_route('medicos.index');
    }

    public function search(Request $request)
    {
        $medicos=[];

        if ($request->input('busqueda') == "nombre") {
            $medicos = DB::table('medicos')                
                ->where('medicos.nombre', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.nombre', 'asc')
                ->get();
        }
        if ($request->input('busqueda') == "paterno") {
            $medicos = DB::table('medicos')                
                ->where('medicos.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->get();
        }

        if ($request->input('busqueda') == "materno") {
            $medicos = DB::table('medicos')                
                ->where('medicos.apellido_pat', 'like', '%' . $request->input('nombre') . '%')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->orderBy('medicos.apellido_mat', 'asc')
                ->orderBy('medicos.apellido_pat', 'asc')
                ->get();
        }

        return view('medicos.search', ['medicos' => $medicos]);
        
    }
}
