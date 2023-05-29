


@extends('layouts.app')
@section('content')
<div class="container">
   <h1>Facturas</h1>
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
    <th>id Usuario</th>
    <th>Nombre</th>
    <th>Detalle </th>
    <th>Editar</th>
    <th>Eliminar</th>
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
               <td class="bg-gray-200" >si</td>
            @else
               <td class='color_no'>no</td>
            @endif
           <td>{{$factura['user_id']}}</td>
           @foreach($clientes as $cliente)
           @if($cliente['id'] == $factura['cliente_id'])
           <td>{{$cliente['nombre']}}</td>
           @endif
           @endforeach


           <td><a href="{{ route('factura.detalle', $factura['numero'])}}"class="btn btn-primary btn-sm" >Ver</a></td>
           <td><a href="{{ url('facturas/'.$factura['numero'].'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
           <td>
            <form action="{{ url('facturas/'.$factura->numero) }}" method="post" >
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>   
            </td>


    </tr>
    
    @endforeach

    </table>

    <a href="{{url('facturas/create')}}" class="btn btn-success btn-sm">Crear</a>
    <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Inicio</a></a>
</div>

@endsection
