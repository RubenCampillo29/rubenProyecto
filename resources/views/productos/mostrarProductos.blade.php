

@extends('layouts.app')
@section('content')
<div class="container">
   <h1>Productos</h1>
</div>
<div>
    <table border=2>
    <tr>
    <th>id</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Descripcion</th>
    </tr> 

    @foreach($productos as $producto)

    <tr>
           <td>{{$producto['id']}}</td>
           <td>{{$producto['nombre']}}</td> 
           <td><p>{{$producto['precio']}}€</p></td>
           <td>{{$producto['descripcion']}}</td>
           
    </tr>
    
    @endforeach

    </table>

     <a href="" class="btn btn-primary">Crear</a>
    <a class="btn btn-primary" href="{{route('inicio')}}">Inicio</a></a>
    <a class="btn btn-primary" href="{{route('facturas.index')}}" class="button">Facturas</a>
</div>

@endsection