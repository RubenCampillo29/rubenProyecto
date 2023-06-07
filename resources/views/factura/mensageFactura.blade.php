@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Factura</h1>
        <h2>{{$msg}}</h2>
        @if(isset($numero))
        <a class="btn btn-success" href="{{ route('factura.detalle', $numero)}}" >Añadir detalles</a>
        <a class="btn btn-primary" href="{{url('facturas')}}" >Finalizar</a>
        @else
        <a class="btn btn-primary" href="{{url('facturas')}}" >Regresar</a>
        @endif

    </div>

</main>

@endsection