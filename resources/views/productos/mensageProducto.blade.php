@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Producto</h1>
        <h2>{{$msg}}</h2>
        <a class="btn btn-primary" href="{{ route('productos.index')}}"  >Regresar</a>
    </div>
</main>



@endsection