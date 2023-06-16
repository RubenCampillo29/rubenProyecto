@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Clientes</h1>
        <h2>{{$msg}}</h2>
        <a class="btn btn-primary" href="{{ route('clientes.index')}}" >Regresar</a>
    </div>
</main>



@endsection