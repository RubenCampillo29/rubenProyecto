<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Detalle_Factura;
use App\Models\Producto;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factura  =  Factura::all();
        return view('factura\mostrarFactura')->with('facturas', $factura);
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
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function clientes($id)
    {
      $factura = Factura::where('cliente_id', $id)->get();
      return view('factura\mostrarFacturaCliente')->with('facturas', $factura);
      
    }


    public function factura($id)
    {
      $productos = Producto::all();
      $detalles = Detalle_Factura::where('numero_fact', $id)->get(); 
      $facturas = Factura::where('numero', $id)->get();
      
      return view('Factura\detalleFactura', compact('facturas', 'detalles','productos'));
      
    }





}
