@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Emisor</h1>
        <h2>{{$msg}}</h2>
        <a href="{{route('emisors.index')}}" class="btn btn-primary" >Regresar</a>
    </div>
</main>



@endsection