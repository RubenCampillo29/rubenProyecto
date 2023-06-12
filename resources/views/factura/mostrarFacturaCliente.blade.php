


@extends('layouts.app')
@section('content')
<div class="container">
<div class="rounded border border-primary bg-info">
      <h1>Facturas de {{ $cliente->nombre }}</h1>
   </div>
</div>
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
         
          
         

    </tr>
    
    @endforeach

    </table>

    <a href="{{url('facturas/create')}}" class="btn btn-success btn-sm">Crear</a>
    <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Inicio</a></a>
</div>

@endsection
