<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle_Factura;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\Cliente;

class DetalleFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $detalles = Detalle_Factura::all();
        $productos = Producto::all();
        return view('detalleFactura.mostrarDetalle', compact('detalles','peodutos'));

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
        
        $detalle = new Detalle_Factura();
           
        $detalle->cantidad = $request->input('cantidad');
        $detalle->precio = $request->input('precio');
        $detalle->producto_id = $request->input('product_id');
        $detalle->factura_id = $request->input('id');
      
        $detalle->save();


        return redirect()->route('factura.detalle', $detalle['factura_id']);
        
        
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
    public function destroy($id)
    {
    
     $detalle = Detalle_Factura::find($id);
     $detalle->delete();
     return redirect('facturas');


    }
}
