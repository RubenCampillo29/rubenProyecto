<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Detalle_Factura;
use App\Models\Producto;
use App\Models\Cliente;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Facades\Storage;


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
      $numero =  $facturas[0];

      $factura = Factura::where('numero', $numero)->get();
      $this::transformarXML($factura);

      return view("factura\mensageFactura", ['msg' => "Facturas enviadas con exitos"]);

      
   }



   public static function transformarXML($factura){

    
    $cliente = Cliente::find($factura[0]->cliente_id);

    // Crear el elemento raíz del XML
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:siiLR="https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroLR.xsd" xmlns:sii="https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroInformacion.xsd"></soapenv:Envelope>');
    
    // Añadir los namespaces necesarios
    $xml->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');
    $xml->registerXPathNamespace('siiLR', 'https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroLR.xsd');
    $xml->registerXPathNamespace('sii', 'https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroInformacion.xsd');
    
    // Crear los elementos del XML
    $body = $xml->addChild('soapenv:Body');
    $suministroLRFacturasEmitidas = $body->addChild('siiLR:SuministroLRFacturasEmitidas');
    
    $cabecera = $suministroLRFacturasEmitidas->addChild('sii:Cabecera');
    $cabecera->addChild('sii:IDVersionSii', '1.1');
    
    $titular = $cabecera->addChild('sii:Titular');
    $titular->addChild('sii:NombreRazon', $cliente->nombre);
    $titular->addChild('sii:NIF', $cliente->nif);
    
    $cabecera->addChild('sii:TipoComunicacion', 'A0');
    
    $registroLRFacturasEmitidas = $suministroLRFacturasEmitidas->addChild('siiLR:RegistroLRFacturasEmitidas');
    
    $periodoLiquidacion = $registroLRFacturasEmitidas->addChild('sii:PeriodoLiquidacion');
    $periodoLiquidacion->addChild('sii:Ejercicio', $factura[0]->ejercicio);
    $periodoLiquidacion->addChild('sii:Periodo', '02');
    
    $idFactura = $registroLRFacturasEmitidas->addChild('siiLR:IDFactura');
    $idEmisorFactura = $idFactura->addChild('sii:IDEmisorFactura');
    $idEmisorFactura->addChild('sii:NIF', $cliente->nif );
    $idFactura->addChild('sii:NumSerieFacturaEmisor', $factura[0]->numero);
    $idFactura->addChild('sii:FechaExpedicionFacturaEmisor', $factura[0]->fecha_emision);
    
    $facturaExpedida = $registroLRFacturasEmitidas->addChild('siiLR:FacturaExpedida');
    $facturaExpedida->addChild('sii:TipoFactura', 'F2');
    $facturaExpedida->addChild('sii:ClaveRegimenEspecialOTrascendencia', '01');
    $facturaExpedida->addChild('sii:ImporteTotal', '2000,00');

    $xmlString = $xml->asXML();

    //dd($xmlString);

    //Storage::put('public\datos\archivo.xml', $xmlString);

    //Storage::disk('public')->put('datos/archivo.xml', $xmlString);

    file_put_contents(public_path('datos/archivo.xml'), $xmlString);

     

   }








}
