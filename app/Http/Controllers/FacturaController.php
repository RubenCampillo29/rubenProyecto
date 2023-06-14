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
use App\Models\emisor;
use SoapClient;
use SoapFault;
use Exception;
use Carbon\Carbon;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emisores = emisor::all();
        $facturas  =  Factura::all();
        $clientes = Cliente::all();
        return view('factura\mostrarFactura', compact('facturas', 'clientes', 'emisores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $fechaActual = Carbon::now();
        $anioActual = $fechaActual->year;
        $fechaActual = $fechaActual->toDateString();

        $clientes = Cliente::all();
        $emisores = emisor::all();

        return view('factura\crearFactura', compact('clientes', 'emisores', 'fechaActual', 'anioActual'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura = new Factura();


        $numero  =  $request->input('numero');
        $factura->ejercicio = $request->input('ejercicio');
        $factura->serie = $request->input('serie');
        $factura->numero = $request->input('numero');
        $factura->fecha_emision = $request->input('fecha_emision');;
        $factura->IVA = $request->input('IVA');
        $factura->REQ = $request->input('REQ');
        $factura->observaciones = $request->input('observaciones');
        $factura->enviada = $request->input('enviada');
        $factura->user_id = $request->input('user_id');
        $factura->cliente_id = $request->input('cliente_id');
        $factura->emisor_id = $request->input('emisor_id');
        $factura->save();

        $id = $factura->id;

        return view("factura\mensageFactura", ['msg' => "Factura: $factura->numero guardada"], compact('id'));
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
    public function edit($id)
    {
        $emisores = emisor::all();
        $clientes = Cliente::all();
        $factura = Factura::find($id);

        return view('factura.editf', compact('clientes', 'factura', 'emisores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $factura = Factura::find($id);

        $factura->numero  =  $request->input('numero');
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
        $factura->emisor_id = $request->input('emisor_id');
        $factura->save();


        return view("factura\mensageFactura", ['msg' => "Factura: Actualidada con Exito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        $factura = Factura::find($id);
        $factura->delete();
        return redirect('facturas');
    }

    public function clientes($id)
    {
        $facturas = Factura::where('cliente_id', $id)->get();
        $cliente = Cliente::find($id);
        return view('factura\mostrarFacturaCliente', compact('facturas', 'cliente'));
    }

    public function factura($id)
    {
        $productos = Producto::all();
        $detalles = Detalle_Factura::where('factura_id', $id)->get();
        $factura = Factura::find($id);

        return view('Factura\detalleFactura', compact('factura', 'detalles', 'productos'));
    }

    public function vistaEnviar()
    {
        $emisores = emisor::all();
        return view('factura\enviarFactura', compact('emisores'));
    }

    public static function sqldatos($desde, $hasta, $estado, $emisor)
    {

        $resultados = Factura::select('*')
            ->where('fecha_emision', '>', $desde)
            ->where('fecha_emision', '<', $hasta)
            ->where('enviada', $estado)
            ->where('emisor_id', $emisor)
            ->get();

        return $resultados;
    }


    public static function sqldatosTodas($desde, $hasta, $emisor)
    {

        $resultados = Factura::select('*')
            ->where('fecha_emision', '>', $desde)
            ->where('fecha_emision', '<', $hasta)
            ->where('emisor_id', $emisor)
            ->get();

        return $resultados;
    }

    public function datosEnviar(Request $request)
    {
        $desde = $request->get('fecha_desde');
        $hasta = $request->get('fecha_hasta');
        $estado = $request->get('estado');
        $emisor = $request->get('emisor');



        if ($estado != 2) {

            $facturas = $this::sqldatos($desde, $hasta, $estado, $emisor);
        } else {

            $facturas = $this::sqldatosTodas($desde, $hasta, $emisor);
        }

        $clientes = Cliente::All();
        $emisores = Emisor::All();

        return view('Factura\enviarFactura', compact('facturas', 'clientes', 'emisores'));
    }


    public function seleccionadas(Request $request)
    {

        $facturas = $request->get('facturas_check');

        $factura = Factura::find($facturas[0]);

        $numero = $factura->emisor_id;


        //$id_emisor = Factura::select('emisor_id')->where('emisor_id', $numero)->get();

        $emisor = Emisor::find($numero);



        //dd($emisor);

        $xml = $this->transformarXML($facturas, $emisor);


        return view("factura\mensageFactura", ['msg' => "Facturas enviadas con exito"]);
    }


    public function transformarXML($facturas, $emisor)
    {
        $iterador = count($facturas);

        $prefix = 'siiLR';
        $namespace = 'https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroLR.xsd';




        // Crear el elemento raíz del XML
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:psiiLRp="https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroLR.xsd" xmlns:psiip="https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroInformacion.xsd"></soapenv:Envelope>');

        // Añadir los namespaces necesarios
        $xml->registerXPathNamespace('soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');
        $xml->registerXPathNamespace('psiiLRp', 'https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroLR.xsd');
        $xml->registerXPathNamespace('psiip', 'https://www2.agenciatributaria.gob.es/static_files/common/internet/dep/aplicaciones/es/aeat/ssii/fact/ws/SuministroInformacion.xsd');

        // Crear los elementos del XML
        $body = $xml->addChild('soapenv:Body');
        $suministroLRFacturasEmitidas = $body->addChild('siiLR:SuministroLRFacturasEmitidas', null, 'siiLR');

        $cabecera = $suministroLRFacturasEmitidas->addChild('sii:Cabecera', null, 'sii');
        $cabecera->addChild('sii:IDVersionSii', '1.1');


        $titular = $cabecera->addChild('sii:Titular');
        $titular->addChild('sii:NombreRazon', $emisor->nombre);
        $titular->addChild('sii:NIF', $emisor->CIF);

        $cabecera->addChild('sii:TipoComunicacion', 'A0');



        for ($i = 0; $i < $iterador; $i++) {

            $factura = Factura::find($facturas[$i]);

            //Cliente correspondiente a la factura
            $cliente = Cliente::find($factura->cliente_id);

            //Delle de la factura
            $baseImponible = $this::obtenerTotal($factura->id);

            if ($factura->IVA) {

                $cuotaIva = $baseImponible * ($factura->IVA / 100);
                $total =  $baseImponible + $cuotaIva;
            }

            $registroLRFacturasEmitidas = $suministroLRFacturasEmitidas->addChild('siiLR:RegistroLRFacturasEmitidas');

            $periodoLiquidacion = $registroLRFacturasEmitidas->addChild('sii:PeriodoLiquidacion', null, 'sii');
            $periodoLiquidacion->addChild('sii:Ejercicio', $factura->ejercicio);
            $periodoLiquidacion->addChild('sii:Periodo', $factura->serie);

            $idFactura = $registroLRFacturasEmitidas->addChild('siiLR:IDFactura');
            $idEmisorFactura = $idFactura->addChild('sii:IDEmisorFactura', null, 'sii');
            $idEmisorFactura->addChild('sii:NIF', $emisor->CIF, 'sii');
            $idFactura->addChild('sii:NumSerieFacturaEmisor', $factura->numero, 'sii');

            $fechaInput = $factura->fecha_emision;
            $fechaFormateada = date('d/m/Y', strtotime($fechaInput));

            $idFactura->addChild('sii:FechaExpedicionFacturaEmisor', $fechaFormateada, 'sii');

            $facturaExpedida = $registroLRFacturasEmitidas->addChild('siiLR:FacturaExpedida');

            if (!isset($cliente->nombre)) {
                $facturaExpedida->addChild('sii:TipoFactura', 'F2', 'sii');
            } else {
                $facturaExpedida->addChild('sii:TipoFactura', 'F1', 'sii');
            }

            $facturaExpedida->addChild('sii:ClaveRegimenEspecialOTrascendencia', '01', 'sii');

            if (!isset($cliente->REQ)) {

                $cuotaReq = $baseImponible * ($factura->REQ / 100);

                $total = $total + $cuotaReq;
            }

            $facturaExpedida->addChild('sii:ImporteTotal', $total, 'sii');


            $facturaExpedida->addChild('sii:DescripcionOperacion', $factura->Observaciones, 'sii');

            if (isset($cliente->nombre)) {
                $contraparte =  $facturaExpedida->addChild('sii:Contraparte', null, 'sii');
                $contraparte->addChild('sii:NombreRazon', $cliente->nombre, 'sii');
                $contraparte->addChild('sii:NIF', $cliente->CIF, 'sii');
            }

            $TipoDesglose = $facturaExpedida->addChild('sii:TipoDesglose', null, 'sii');
            $DesgloseFactura = $TipoDesglose->addChild('sii:DesgloseFactura');
            $Sujeta = $DesgloseFactura->addChild('sii:Sujeta');
            $NoExenta = $Sujeta->addChild('sii:NoExenta');
            $TipoNoExenta = $NoExenta->addChild('sii:TipoNoExenta', 'S1');
            $DesgloseIVA = $NoExenta->addChild('sii:DesgloseIVA');
            $DetalleIVA = $DesgloseIVA->addChild('sii:DetalleIVA');


            $DetalleIVA->addChild('sii:TipoImpositivo', $factura->IVA);
            $DetalleIVA->addChild('sii:BaseImponible', $baseImponible);
            $DetalleIVA->addChild('sii:CuotaRepercutida', $cuotaIva);

            if (isset($cliente->REQ)) {

                $cuotaReq = $baseImponible * ($factura->REQ / 100);

                $DetalleIVA->addChild('sii:TipoRecargoEquivalencia', $factura->REQ);
                $DetalleIVA->addChild('sii:CuotaRecargoEquivalencia', $cuotaReq);
            }
        }


        $xmlString = $xml->asXML();



          $xmlString = preg_replace('/xmlns:sii[a-zA-Z0-9]*=\"[^\"]+\"/', '', $xmlString);
          $xmlString = preg_replace('/xmlns:siiLR/', '', $xmlString);
          $xmlString = preg_replace('/xmlns:psiip/', 'xmlns:sii', $xmlString);
          $xmlString = preg_replace('/xmlns:psiiLRp/', 'xmlns:siiLR', $xmlString);


        file_put_contents(public_path('datos/archivo2.xml'), $xmlString);

        return $xmlString;
    }


    public static function obtenerTotal($id)
    {

        $total = 0;

        $resultados = Detalle_Factura::where('factura_id', $id)->get();

        foreach ($resultados as $resultado) {

            $total += $resultado->cantidad * $resultado->precio;
        }
        return  $total;
    }
}
