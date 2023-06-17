@extends('layouts.app')
@section('content')
<div class="container">
   <div class="rounded border border-primary bg-info">
      <h1>Productos</h1>
   </div>
      <table border=2>
         <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Eliminar</th>
         </tr>

         @foreach($productos as $producto)

         <tr>
            <td>{{$producto['id']}}</td>
            <td>{{$producto['nombre']}}</td>
            <td>
               <p>{{$producto['precio']}}€</p>
            </td>
            <td>{{$producto['descripcion']}}</td>
            <td>
               <a href="{{ url('productos/'.$producto->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
            </td>
            <td>
               <form action="{{ url('productos/'.$producto->id) }}" method="post">
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

      <a href="{{url('productos/create')}}" class="btn btn-success ">Crear</a>
      <a class="btn btn-primary" href="{{route('inicio')}}">Inicio</a></a>

</div>

   @endsection