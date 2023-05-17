


@extends('layouts.app')
@section('content')
<h1>Detalle Factura </h1>

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

    @foreach($facturas as $factura)

    <tr>     
           <td>{{$factura['ejercicio']}}</td>
           <td>{{$factura['serie']}}</td>
           <td>{{$factura['numero']}}</td> 
           <td>{{$factura['fecha_emision']}}</td>
           <td>{{$factura['IVA']}}</td>
           <td>{{$factura['REQ']}}</td>
           <td>{{$factura['Observaciones']}}</td>
            @if($factura['enviada'] == 1)
               <td>si</td>
            @else
               <td>no</td>
            @endif
           <td>{{$factura['cliente_id']}}</td>

    </tr>
    
    @endforeach

    </table>

    <div class="row">
			<div class="col-lg-5 grid-margin grid-margin-lg-0">
				<div class="form-group">
            <form action="{{url('DetalleFacturas')}}" method="post">

                @csrf  
                @foreach($facturas as $factura)
                <input type="hidden" value="{{$factura['ejercicio']}}" name="ejercicio" id="ejercicio" class="form-control"  >
                <input type="hidden" value="{{$factura['serie']}}" name="serie" id="serie" class="form-control"  >
                <input type="hidden" value="{{$factura['numero']}}" name="numero" id="numero" class="form-control"  >
                @endforeach

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
					<label for="stock"><strong>Precio de compra</strong></label>
					<input type="number" value=""  name="precio" id="precio" class="form-control" placeholder="Precio de compra" >
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label for="stock"><strong>Descripcion</strong></label>
					<input type="text" value="" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" >
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
    <th>Descripcion</th>
    <th>Nombre</th>
    </tr> 

    @foreach($detalles as $detalle)

    <tr>
           <td>{{$detalle['id']}}</td>
           <td>{{$detalle['cantidad']}}</td>
           <td>{{$detalle['precio']}}</td> 
           <td>{{$detalle['descripcion']}}</td> 
           <td>{{$detalle['producto_id']}}</td>
     
           
    </tr>
    
    @endforeach

    </table>


   </div>

     <a href="">Crear</a>
    <a href="{{route('inicio')}}">Volver</a></a>
</div>

@endsection
