@extends('layouts.app')
@section('content')

<div class="container">
   <div class="rounded border border-primary bg-info">
      <h1>Emisores</h1>
   </div>
</div>
<div>

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
         <th>Eliminar</th>
         <th>Editar</th>
      </tr>

      @foreach($emisores as $emisor)
      
      <tr>
         <td>{{$emisor['id']}}</td>
         <td>{{$emisor['nombre']}}</td>
         <td>{{$emisor['CIF']}}</td>
         <td>{{$emisor['provincia']}}</td>
         <td>{{$emisor['CodigoPostal']}}</td>
         <td>{{$emisor['poblacion']}}</td>
         <td>{{$emisor['email']}}</td>
         <td>{{$emisor['telefono']}}</td>
         <td>{{$emisor['Direccion']}}</td>
    

         <td><a href="{{ url('emisors/'.$emisor->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
         <td>
            <form action="{{ url('emisors/'.$emisor->id) }}" method="post">
               @method("DELETE")
               @csrf
               <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
         </td>


      </tr>

      @endforeach

   </table>

   <a href="{{url('emisors/create')}}" class="btn btn-success btn-sm">Crear</a>
   <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Volver</a></a>
</div>

@endsection