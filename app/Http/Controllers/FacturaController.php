<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Detalle_Factura;
use App\Models\Producto;
use App\Models\Cliente;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas  =  Factura::all();
        $clientes = Cliente::all();
        return view('factura\mostrarFactura', compact('facturas', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $clientes = Cliente::all();
        return view('factura\crearFactura', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura = new Factura();


        $factura->ejercicio = $request->input('ejercicio');
        $factura->serie = $request->input('serie');
        $factura->numero = $request->input('numero');
        $factura->fecha_emision = $request->input('fecha_emision');
        $factura->IVA = $request->input('IVA');
        $factura->REQ = $request->input('REQ');
        $factura->observaciones = $request->input('observaciones');
        $factura->enviada = $request->input('enviada');
        $factura->user_id = $request->input('user_id');
        $factura->cliente_id = $request->input('cliente_id');

        $factura->save();

        return view("factura\mensageFactura", ['msg' => "Factura: $factura->numero guardada"]);
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
    public function edit($numero)
    {
        $clientes = Cliente::all();
        $factura = Factura::where('numero', $numero)->get();



        return view('factura.editf', compact('clientes', 'factura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $factura = Factura::where('ejercicio', $request->get('ejercicio'))
            ->where('numero', $request->get('numero'))
            ->where('serie', $request->get('serie'))
            ->get();


            Factura::where('ejercicio', $request->input('ejercicio'))
            ->where('serie', $request->input('serie'))
            ->where('numero', $request->input('numero'))
            ->update([
                'ejercicio' => $request->input('ejercicio'),
                'serie' => $request->input('serie'),
                'numero' => $request->input('numero'),
                'fecha_emision' =>$request->input('fecha_emision'),
                'IVA' => $request->input('IVA'),
                'REQ' => $request->input('REQ'),
                'observaciones'=> $request->input('observaciones'),
                'enviada' => $request->input('enviada'),
                'user_id' => $request->input('user_id'),
                'cliente_id' => $request->input('cliente_id')
            ]);


    
            return view("factura\mensageFactura", ['msg' => "Factura: Actualidada con Exito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $factura = Factura::where('numero', $id)->delete();
        return redirect('facturas');
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

        return view('Factura\detalleFactura', compact('facturas', 'detalles', 'productos'));
    }

    public function vistaEnviar()
    {

        return view('factura\enviarFactura');
    }


    public static function sqldatos($desde, $hasta, $estado)
    {

        $resultados = Factura::select('*')
            ->where('fecha_emision', '>', $desde)
            ->where('fecha_emision', '<', $hasta)
            ->where('enviada', $estado)
            ->get();

        return $resultados;
    }


    public function datosEnviar(Request $request)
    {
        $desde = $request->get('fecha_desde');
        $hasta = $request->get('fecha_hasta');
        $estado = $request->get('estado');

        $facturas = $this::sqldatos($desde, $hasta, $estado);
        $clientes = Cliente::All();
        return view('Factura\enviarFactura', compact('facturas','clientes'));
    }



   public function seleccionadas(Request $request)
   {

      $facturas = $request->get('facturas_check');
      dd($facturas[0]);




   }








}
