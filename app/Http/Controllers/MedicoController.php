<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
