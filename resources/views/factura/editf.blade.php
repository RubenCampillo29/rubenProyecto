@extends('layouts.app')

@section('content')

<style>
#req::-webkit-inner-spin-button,
#req::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

</style>

<main>
  <div class="container py-6">
    <h2>Introducir Factura</h2>

    <form action="{{url('facturas/'.$factura->id)}}" method="post">


      @csrf
      @method("PUT")

      <div class="mb-3 row">
        <label for="col-sm-2 col-form-label"><strong>Emisor</strong></label>
        <div class="col-sm-5">
          <select class="form-control" name="emisor_id" id="emisor_id">
            <option value="">-- Seleccione un emisor --</option>
            @foreach($emisores as $emisor)
            @if($factura['emisor_id'] == $emisor['id'])
            <option value="{{$emisor['id']}}" selected >{{$emisor['nombre']}}</option>
            @endif
            <option value="{{$emisor['id']}}" >{{$emisor['nombre']}}</option>
            @endforeach
          </select>
        </div>
      </div>


      <div class="mb-3 row">
        <label for="col-sm-2 col-form-label"><strong>Cliente</strong></label>
        <div class="col-sm-5">
          <select class="form-control" name="cliente_id" id="cliente_id">
            <option value="">-- Seleccione un cliente --</option>
            @foreach($clientes as $cliente)
            @if($factura['cliente_id'] == $cliente['id'])
            <option value="{{$cliente['id']}}" selected >{{$cliente['nombre']}}</option>
            @endif
            <option value="{{$cliente['id']}}" >{{$cliente['nombre']}}</option>
            @endforeach
          </select>
        </div>
      </div>

  
     

      <div class="mb-3 row">
      
        <div class="col-sm-5">
          <input type="hidden" class="form-control" name="id" id="id" value="{{ $factura->id }}">
        </div>
      </div>


      <div class="mb-3 row">
      <label for="ejercicio" class="col-sm-2 col-form-label"><strong>Ejercicio</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="ejercicio" id="ejercicio" value="{{ $factura->ejercicio }}">
        </div>
      </div>

      <div class="mb-3 row">
      <label for="fecha_emision" class="col-sm-2 col-form-label"><strong>Serie</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="serie" id="serie" value="{{ $factura->serie }}" required>
        </div>
      </div>

      <div class="mb-3 row">
      <label for="fecha_emision" class="col-sm-2 col-form-label"><strong>Numero</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="numero" id="numero" value="{{ $factura->numero }}">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="fecha_emision" class="col-sm-2 col-form-label"><strong>Fecha de emision</strong></label>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="fecha_emision" id="fecha_emision" value="{{ $factura->fecha_emision  }}">
        </div>
      </div>


      <label for="IVA" class="col-sm-2 col-form-label"><strong>IVA %</strong></label>
      <div class="col-sm-10">
        <select name="IVA" id="IVA">
          <option value="0">No IVA</option>
          <option value="4" selected>4</option>
          <option value="10">10</option>
          <option value="21">21</option>
        </select>
      </div>
 
    
      <label for="REQ" class="col-sm-2 col-form-label"><strong>Recargo (REQ)</strong></label>
      <div class="col-sm-10">
        <select name="REQ" id="REQ">
          <option value="0">No REQ</option>
          <option value="0.5" selected>0.5</option>
          <option value="1.4">1.4</option>
          <option value="5.2">5.2</option>
        </select>
      </div>
  


      <div class="mb-3 row">
        <label for="observaciones" class="col-sm-2 col-form-label"><strong>Observaciones</strong></label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="observaciones" id="observaciones" value="{{ $factura->Observaciones }}" required>
        </div>
      </div>

    


      <label for="enviada" class="col-sm-2 col-form-label"><strong>Enviada</strong></label>
      <div class="col-sm-5">
        <select name="enviada" id="enviada">
          <option value="1">Si</option>
          <option value="0" @if($factura->enviada == 0)
            {{'selected'}}
            @endif
            >No
          </option>
        </select>
      </div>


    

      <div class="mb-2 row">
        <label for="user_id" class="col-sm-2 col-form-label"><strong></strong></label>
        <div class="col-sm-5">
          <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$factura->user_id }}">
        </div>
      </div>


      <button type="submit" class="btn btn-success">Guardar</button>
      <a href="{{url('facturas')}}" class="btn btn-secondary">Regresar</a>

    </form>

  </div>

</main>

@endsection