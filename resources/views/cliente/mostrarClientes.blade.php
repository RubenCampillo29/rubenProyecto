@extends('layouts.app')
@section('content')


<div class="container">
   <div class="rounded border border-primary bg-info">
      <h1>Clientes</h1>
   </div>


   <table border=2>
      <tr>
         <th>id</th>
         <th>Nombre</th>
         <th>CIF</th>
         <th>Provincia</th>
         <th>Codigo Postal</th>
         <th>Poblacion</th>
         <th>Email</th>
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
         <td>{{$cliente['CodigoPostal']}}</td>
         <td>{{$cliente['poblacion']}}</td>
         <td>{{$cliente['email']}}</td>
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
               <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                     <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                     <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                  </svg></button>
            </form>
         </td>


      </tr>

      @endforeach
  
   </table>
   <a href="{{url('clientes/create')}}" class="btn btn-success ">Crear</a>
   <a href="{{route('inicio')}}" class="btn btn-primary ">Volver</a>
   

</div>

@endsection