@extends('layouts.app')

@section('content')


<main>
  <div class="container py-4">
    <h2>Registrar Producto</h2>

    <form action="{{url('productos')}}" method="post">

    @csrf


    <div class="mb-3 row">
       <label for="nombre" class="col-sm-2 col-form-label"><strong>Nombre</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre')}}" required>
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="precio" class="col-sm-2 col-form-label"><strong>Precio</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="precio" id="precio" value="{{ old('precio')}}" >
        </div>      
    </div>

    
    <div class="mb-3 row">
       <label for="descripcion" class="col-sm-2 col-form-label"><strong>Descripción</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('poblacion')}}" >
        </div>      
    </div>

   


    <a href="{{url('productos')}}" class="btn btn-secondary">Regresar</a>
    <button type="submit" class="btn btn-success" >Guardar</button>



    </form>

  </div>
</main>

@endsection