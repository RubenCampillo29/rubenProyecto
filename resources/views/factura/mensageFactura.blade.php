@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Factura</h1>
        <h2>{{$msg}}</h2>
        @if(isset($id))

        <a class="btn btn-success" href="{{ route('factura.detalle', $id)}}" >Añadir detalles</a>
        <a class="btn btn-primary" href="{{url('facturas')}}" >Finalizar</a>
        @else
        <a class="btn btn-primary" href="{{url('facturas')}}" >Volver a Facturas</a>
      
        @endif

        @if(isset($respuesta))
            
            <h3><u>Respuesta de hacienda</u></h3>
        @php
        $xml= new SimpleXMLElement($respuesta);
        $ns= $xml->getNamespaces(true);
        
        //var_dump($ns);
        
        $doc = new DOMDocument();
        $doc->loadXML($respuesta);
        
        
          foreach ($doc->getElementsByTagNameNS($ns['siiR'], 'RespuestaLinea') as $lineas) {
                echo 'NUMERO FACTURA: ', $lineas->getElementsByTagName('IDFactura')->item(0)->getElementsByTagNameNS($ns['sii'],'NumSerieFacturaEmisor')->item(0)->textContent, "\n";
                echo '  Estado: ', $lineas->getElementsByTagName('EstadoRegistro')->item(0)->textContent, "\n";
                echo '  Código de error: ', $lineas->getElementsByTagName('CodigoErrorRegistro')->item(0)->textContent, "\n";
                echo '  Descripción del error: ', $lineas->getElementsByTagName('DescripcionErrorRegistro')->item(0)->textContent, "\n\n";
                echo '  +----------------------------------------------+',"\n\n";
        }


           
           @endphp 
          
         <h4>Esta informacion se guardara en la casilla registro de cada Factura</h4>

         @endif 



    </div>

</main>

@endsection