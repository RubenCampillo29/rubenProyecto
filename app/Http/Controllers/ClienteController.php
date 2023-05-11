<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente  =  Cliente::all();
        return view('cliente\mostrarClientes')->with('clientes',$cliente);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cliente\crearCliente');
        
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       /*$request->validate([

        'cif' => 'required|unique:clientes|max:10',
        'nombre' => 'required|max:225',
        'provincia' => 'nullable',
        'telefono' => 'required|max:12',
        'direccion' => 'nullable',
        'req' => 'nullable'

       ]);
*/

       $cliente = new Cliente();
      

       $cliente->cif = $request->input('cif');
       $cliente->nombre = $request->input('nombre');
       $cliente->provincia = $request->input('provincia');
       $cliente->telefono = $request->input('telefono');
       $cliente->direccion = $request->input('direccion');
       $cliente->req = $request->input('req');
       $cliente->save();

       return view("cliente\mensageCliente", ['msg' => "Cliente $cliente->nombre guardado"]);
              
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $cliente = Cliente::find($id);
        
        $cliente->cif = $request->input('cif');
        $cliente->nombre = $request->input('nombre');
        $cliente->provincia = $request->input('provincia');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->req = $request->input('req');
        $cliente->save();
 
        return view("cliente\mensageCliente", ['msg' => "Cliente $cliente->nombre Actualizado con exito"]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
