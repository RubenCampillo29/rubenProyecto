<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\emisor;

class EmisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emisor = emisor::all();
        return view('emisor\mostrarEmisor')->with('emisores',$emisor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emisor\crearEmisor'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $emisor = new Emisor();
      
       $emisor->cif = $request->input('cif');
       $emisor->nombre = $request->input('nombre');
       $emisor->provincia = $request->input('provincia');
       $emisor->telefono = $request->input('telefono');
       $emisor->direccion = $request->input('direccion');
       
       $emisor->save();

       return view("cliente\mensageCliente", ['msg' => "Emisor $emisor->nombre Guardado con exito"]);
        
       
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
        $emisor = Emisor::find($id);
        return view('emisor.editarEmisor')->with('emisor',$emisor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $emisor = Emisor::find($id);
        
        $emisor->cif = $request->input('cif');
        $emisor->nombre = $request->input('nombre');
        $emisor->provincia = $request->input('provincia');
        $emisor->telefono = $request->input('telefono');
        $emisor->direccion = $request->input('direccion');
   
        $emisor->save();
 
        return view("cliente\mensageCliente", ['msg' => "Emisor $emisor->nombre Actualizado con exito"]);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $emisor = Emisor::find($id);
        $emisor->delete();
        return redirect('emisors');
   



    }
}
