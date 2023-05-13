


@extends('layouts.app')
@section('content')
<h1>Facturas</h1>

<div>
    <table border=2>
    <tr>
    <th>Ejercicio</th>
    <th>Serie</th>
    <th>Numero</th>
    <th>Fecha de emision</th>
    <th>IVA %</th>
    <th>REQ</th>
    <th>Observaciones</th>
    <th>Enviada</th>
    <th>id Usuario</th>
    <th>id Cliente</th>
    </tr> 

    @foreach($facturas as $factura)

    <tr>
           <td>{{$factura['ejercicio']}}</td>
           <td>{{$factura['serie']}}</td>
           <td>{{$factura['numero']}}</td> 
           <td>{{$factura['fecha_emision']}}</td>
           <td>{{$factura['IVA']}}</td>
           <td>{{$factura['REQ']}}</td>
           <td>{{$factura['Observaciones']}}</td>
            @if($factura['enviada'] == 1)
               <td>si</td>
            @else
               <td>no</td>
            @endif
           <td>{{$factura['user_id']}}</td>
           <td>{{$factura['cliente_id']}}</td>
         

    </tr>
    
    @endforeach

    </table>

     <a href="">Crear</a>
    <a href="{{route('inicio')}}">Volver</a></a>
</div>

@endsection
