@extends('layouts.app')

@section('content')


<main>
  <div class="container py-4">
    <h2>Editar Cliente</h2>

    <form action="{{url('clientes/'.$cliente->id)}}" method="post">

    @csrf
    @method("PUT")

    <div class="mb-3 row">
       <label for="cif" class="col-sm-2 col-form-label"><strong>CIF</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="cif" id="cif" value="{{ $cliente->CIF }}" required>
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="nombre" class="col-sm-2 col-form-label"><strong>Nombre</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $cliente->nombre }}" required>
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="provincia" class="col-sm-2 col-form-label"><strong>Provincia</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="provincia" id="provincia" value="{{ $cliente->provincia }}" >
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="direccion" class="col-sm-2 col-form-label"><strong>Direccion</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $cliente->Direccion }}" >
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="telefono" class="col-sm-2 col-form-label"><strong>Telefono</strong></label>
        <div class="col-sm-5">
          <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $cliente->telefono }}" >
        </div>      
    </div>

    <div class="mb-3 row">
       <label for="req" class="col-sm-2 col-form-label"><strong>Recargo de equivalencia</strong></label>
        <div class="col-sm-5">
         <select name="req" id="req">
         <option value="1">Si</option> 
         <option value="0" 
          @if($cliente->REQ == 0) 
          {{'selected'}} 
          @endif
          >No</option>
         </select>
        </div>      
    </div>

    <a href="{{url('clientes')}}" class="btn btn-secondary">Regresar</a>
    <button type="submit" class="btn btn-success" >Guardar</button>



    </form>

  </div>
</main>

@endsection