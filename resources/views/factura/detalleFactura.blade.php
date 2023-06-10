


@extends('layouts.app')
@section('content')

<div class="container"> 
<h1>Detalles de Factura </h1>
<div>
    <table border=2>
    <tr>
    <th>Ejercicio</th>
    <th>Serie</th>
    <th>Numero</th>
    <th>Fecha de emision</th>
    <th>IVA %</th>
    <th>REQ</th>
    <th>Observaciones</th>
    <th>Enviada</th>
    <th>id Cliente</th>
    </tr> 

   

    <tr>     
           <td>{{ $factura->ejercicio }}</td>
           <td>{{$factura->serie}}</td>
           <td>{{$factura->numero}}</td> 
           <td>{{$factura->fecha_emision}}</td>
           <td>{{$factura->IVA }}</td>
           <td>{{$factura->REQ }}</td>
           <td>{{$factura->Observaciones }}</td>
            @if($factura->enviada == 1)
               <td>si</td>
            @else
               <td>no</td>
            @endif
           <td>{{ $factura->cliente_id }}</td>

    </tr>
    
  

    </table>
    </div>

    <div class="row">
			<div class="col-lg-5 grid-margin grid-margin-lg-0">
				<div class="form-group">
            <form action="{{ url('DetalleFacturas')}}" method="post">

                @csrf  
               
                <input type="hidden" value="{{$factura->id }}" name="id" id="id" class="form-control"  >

					<label for="name"><strong>Buscar Producto</strong></label>
                    <select class="form-control form-control-lg" name="product_id" id="product_id">
                      <option value="">-- Seleccione un Producto --</option>
                      @foreach($productos as $producto)
                      	<option value="{{$producto['id']}}">{{$producto['descripcion']}}--{{$producto['precio']}}€</option> 
                        @endforeach
                   </select>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label for="stock"><strong>Cantidad</strong></label>
					<input type="number" value="" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad" >
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label for="stock"><strong>Precio de Venta</strong></label>
					<input type="number" value=""  name="precio" id="precio" class="form-control" placeholder="Precio de compra" >
				</div>
			</div>
		
			<div class="col-lg-1">
				<div class="form-group">
            
               <button type="submit" class="btn btn-success  float-right mt-4 ml-2" >Añadir <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg></button>
               </form>
				</div>
			</div>
		</div>
    <div>
   
   <br>
   <br>

   <table border=2>
    <tr>
    <th>id</th>
    <th>cantidad</th>
    <th>Precio</th>
    <th>Nombre Poducto</th>
    <th>Total</th>
    <th>Eliminar</th>
    </tr> 

    @foreach($detalles as $detalle)

    <tr>
           <td>{{$detalle['id']}}</td>
           <td>{{$detalle['cantidad']}}-unidades</td>
           <td>{{$detalle['precio']}}€</td>
           @foreach($productos as $producto)
           @if($producto['id'] == $detalle['producto_id'])
           <td>{{$producto['nombre']}}</td>
           @endif
           @endforeach
           <td>{{ $detalle['cantidad'] * $detalle['precio']}}€  </td>
           <td>
            <form action="{{ url('DetalleFacturas/'.$detalle->id) }}" method="post">
               @method("DELETE")
               @csrf
               <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></i></button>
            </form>
         </td>
     
           
    </tr>
    
    @endforeach

    </table>


   </div>

   
    <a href="{{route('inicio')}}" class="btn btn-primary">Volver</a></a>
</div>

@endsection
