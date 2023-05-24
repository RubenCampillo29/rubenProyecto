@extends('layouts.app')

@section('content')



<div class="container">
    <h1>Enviar Facturas AEAT</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('datos.enviar') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="fecha_desde" class="col-sm-2 col-form-label"><strong>Fecha desde</strong></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fecha_desde" id="fecha_desde" value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="fecha_hasta" class="col-sm-2 col-form-label"><strong>Fecha hasta</strong></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fecha_hasta" id="fecha_hasta" value="">
                            </div>
                        </div>

                        <div class="mb-3 block">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado">
                                <option value="1">Enviada</option>
                                <option value="0">No enviada</option>
                                <option value="2">todas</option>
                            </select>
                            <button type="submit" class="btn btn-success">Ver</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @if(isset($facturas))

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('factura.seleccion') }}" method="POST">
                        @csrf

                        <table border="2">
                            <tr>
                                <th>Seleccionar</th>
                                <th>Ref Factura</th>
                                <th>Fecha de emision</th>
                                <th>IVA %</th>
                                <th>REQ</th>
                                <th>Observaciones</th>
                                <th>Enviada</th>
                                <th>Nombre Cliente</th>
                                <th>Fila registro</th>

                            </tr>
                            
                            @foreach($facturas as $factura)
                            
                            <tr>
                                <td>
                                    <input type="checkbox" name="facturas_check[]" value="{{ $factura['numero'] }}">
                                </td>
                                <td>{{$factura['ejercicio']. '-' .$factura['serie']. '-' .$factura['numero']}}</td>
                                <td>{{$factura['fecha_emision']}}</td>
                                <td>{{$factura['IVA']}}</td>
                                <td>{{$factura['REQ']}}</td>
                                <td>{{$factura['Observaciones']}}</td>
                                @if($factura['enviada'] == 1)
                                <td class="bg-gray-200">si</td>
                                @else
                                <td class='color_no'>no</td>
                                @endif

                                @foreach($clientes as $cliente)
                                @if($cliente['id'] == $factura['cliente_id'])
                                <td>{{$cliente['nombre']}}</td>
                                @endif
                                @endforeach
                                

                            </tr>
                            @endforeach

                        </table>

                        <button type="submit" class="btn btn-warning btn-sm">Enviar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@else


@endif

<div class="container">

    <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Volver</a>

</div>


@endsection