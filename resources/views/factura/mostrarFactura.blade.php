


@extends('layouts.app')
@section('content')
<div class="container">
   <div class="rounded border border-primary bg-info">
      <h1>Facturas</h1>
   </div>
<div>

    <table border=2>
    <tr>
    <th>id</th>
    <th>Ejercicio</th>
    <th>Serie</th>
    <th>Numero</th>
    <th>Fecha de emision</th>
    <th>IVA %</th>
    <th>REQ</th>
    <th>Observaciones</th>
    <th>Enviada</th>
    <th>Emisor</th>
    <th>Nombre</th>
    <th>Detalle </th>
    <th>Editar</th>
    <th>Eliminar</th>
    </tr> 

    @foreach($facturas as $factura)

    <tr>
          <td>{{$factura['id']}}</td>
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
           @foreach($emisores as $emisor)
           @if($emisor['id'] == $factura['emisor_id'])
           <td>{{$emisor['nombre']}}</td>
           @endif
           @endforeach
           @foreach($clientes as $cliente)
           @if($cliente['id'] == $factura['cliente_id'])
           <td>{{$cliente['nombre']}}</td>
           @endif
           @endforeach


           <td><a href="{{ route('factura.detalle', $factura['id'])}}"class="btn btn-primary btn-sm" >Ver</a></td>
           <td><a href="{{ url('facturas/'.$factura['id'].'/edit') }}" class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
           <td>
            <form action="{{ url('facturas/'.$factura->id) }}" method="post" >
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></button>
            </form>   
            </td>

    </tr>
    
    @endforeach

    </table>

    <a href="{{url('facturas/create')}}" class="btn btn-success btn-sm">Crear</a>
    <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Inicio</a></a>
</div>

@endsection
