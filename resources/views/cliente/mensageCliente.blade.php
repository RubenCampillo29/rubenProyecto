@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Clientes</h1>
        <h2>{{$msg}}</h2>
        <a href="{{url('clientes')}}" >Regresar</a>
    </div>
</main>



@endsection