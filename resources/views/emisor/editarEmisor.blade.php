@extends('layouts.app')

@section('content')


<main>
  <div class="container py-4">
    <h2>Editar Emisor</h2>
      
    <form action="{{url('emisors/'.$emisor->id)}}" method="post">
    
    @csrf
    @method("PUT")

    <div class="mb-3 row">
       <label for="cif" class="col-sm-2 col-form-label"><strong>CIF</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="cif" id="cif" value="{{ $emisor->CIF }}" required>
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="nombre" class="col-sm-2 col-form-label"><strong>Nombre</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $emisor->nombre }}" required>
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="provincia" class="col-sm-2 col-form-label"><strong>Provincia</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="provincia" id="provincia" value="{{ $emisor->provincia }}" >
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="direccion" class="col-sm-2 col-form-label"><strong>Direccion</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $emisor->Direccion }}" >
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="telefono" class="col-sm-2 col-form-label"><strong>Telefono</strong></label>
        <div class="col-sm-5">
          <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $emisor->telefono }}" >
        </div>      
    </div>

        
    
    <a href="{{route('emisors.index')}}" class="btn btn-secondary">Regresar</a>
    <button type="submit" class="btn btn-success" >Guardar</button>



    </form>

  </div>
</main>

@endsection