
@extends('layouts.app')
@section('content')
<h1>Todos los detalles </h1>



<table border=2>




    <tr>
    <th>id</th>
    <th>cantidad</th>
    <th>Precio</th>
    <th>Descripcion</th>
    <th>Nombre</th>
    </tr> 

    @foreach($detalles as $detalle)

    <tr>
           <td>{{$detalle['id']}}</td>
           <td>{{$detalle['cantidad']}}</td>
           <td>{{$detalle['precio']}}</td> 
           <td>{{$detalle['descripcion']}}</td> 
           <td>{{$detalle['producto_id']}}</td>
     
           
    </tr>
    
    @endforeach

    </table>


    @endsection

