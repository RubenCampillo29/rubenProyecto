<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto  =  Producto::all();
        return view('productos\mostrarProductos')->with('productos',$producto);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('productos\crearProducto'); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      
        $producto = new Producto();
      

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->save();
 
        return view("productos\mensageProducto", ['msg' => "Producto $producto->nombre Creado"]);



    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $producto = Producto::find($id);
        return view('productos\editProducto',compact('producto')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        

        $producto = Producto::find($id);
      

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->save();
 
        return view("productos\mensageProducto", ['msg' => "Producto $producto->nombre Editado"]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $producto = Producto::find($id);
        $producto->delete();
        return view("productos\mensageProducto", ['msg' => "Producto $producto->nombre eliminado"]);



    }
}
