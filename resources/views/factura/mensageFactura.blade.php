@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Factura</h1>
        <h2>{{$msg}}</h2>
        <a href="{{url('facturas')}}" >Regresar</a>
    </div>
</main>



@endsection