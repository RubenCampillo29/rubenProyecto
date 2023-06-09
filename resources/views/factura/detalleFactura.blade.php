


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
            
               <button type="submit" class="btn btn-success  float-right mt-4 ml-2" >Añadir</button>
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
           <td>
            <form action="{{ url('DetalleFacturas/'.$detalle->id) }}" method="post">
               @method("DELETE")
               @csrf
               <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
         </td>
     
           
    </tr>
    
    @endforeach

    </table>


   </div>

   
    <a href="{{route('inicio')}}" class="btn btn-primary">Volver</a></a>
</div>

@endsection
