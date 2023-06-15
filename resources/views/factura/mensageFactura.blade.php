@extends('layouts.app')
@section('content')

<main>
    <div class="container py-4">
        <h1>Factura</h1>
        <h2>{{$msg}}</h2>
        @if(isset($id))

        <a class="btn btn-success" href="{{ route('factura.detalle', $id)}}" >Añadir detalles</a>
        <a class="btn btn-primary" href="{{url('facturas')}}" >Finalizar</a>
        @else
        <a class="btn btn-primary" href="{{url('facturas')}}" >Regresar</a>
      
        @endif

        @if(isset($respuesta))
            
            <h3>{{$respuesta}}</h>
            

           
            
          
         @endif 



    </div>

</main>

@endsection