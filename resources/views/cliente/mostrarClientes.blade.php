@extends('layouts.app')
@section('content')


<div class="container">
   <div class="rounded border border-primary bg-info">
      <h1>Clientes</h1>
   </div>
</div>
<div>

   <table border=2>
      <tr>
         <th>id</th>
         <th>Nombre</th>
         <th>CIF</th>
         <th>Provincia</th>
         <th>Telefono</th>
         <th>Dirección</th>
         <th>REQ</th>
         <th>Eliminar</th>
         <th>Editar</th>
      </tr>

      @foreach($clientes as $cliente)

      <tr>
         <td>{{$cliente['id']}}</td>
         <td><a href="{{route('cliente.facturas', $cliente['id'])}}" class="link-serio">{{$cliente['nombre']}}</a></td>
         <td>{{$cliente['CIF']}}</td>
         <td>{{$cliente['provincia']}}</td>
         <td>{{$cliente['telefono']}}</td>
         <td>{{$cliente['Direccion']}}</td>
         @if($cliente['REQ'] == 1)
         <th>si</th>
         @else
         <th>no</th>
         @endif

         <td><a href="{{ url('clientes/'.$cliente->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
         <td>
            <form action="{{ url('clientes/'.$cliente->id) }}" method="post">
               @method("DELETE")
               @csrf
               <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
         </td>


      </tr>

      @endforeach

   </table>

   <a href="{{url('clientes/create')}}" class="btn btn-primary btn-sm">Crear</a>
   <a href="{{route('facturas.index')}}" class="btn btn-primary btn-sm">Facturas</a>
   <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Volver</a></a>
</div>

@endsection