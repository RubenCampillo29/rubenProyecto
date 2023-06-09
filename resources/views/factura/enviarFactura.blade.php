@extends('layouts.app')

@section('content')








<div class="container">
    <div class="rounded border border-primary bg-info">
        <h1>Enviar Facturas AEAT</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('datos.enviar') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="fecha_desde" class="col-sm-2 col-form-label"><strong>Fecha desde</strong></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fecha_desde" id="fecha_desde" value="" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="fecha_hasta" class="col-sm-2 col-form-label"><strong>Fecha hasta</strong></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fecha_hasta" id="fecha_hasta" value="" required>
                            </div>
                        </div>

                        <div class="mb-5 block">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado">
                                <option value="1">Enviada</option>
                                <option value="0">No enviada</option>
                                <option value="2">todas</option>
                            </select>

                            <div class="mb-5 block">
                                <label for="emisor">Emisor</label>
                                <select name="emisor" id="emisor">
                                    @foreach($emisores as $emi)
                                    <option value="{{ $emi['id'] }}">{{ ($emi['nombre']) }}</option>
                                    @endforeach
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
                                <th><i class="bi bi-check2">Seleccionar</i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                    </svg></th>
                                <th>id</th>
                                <th>Ref Factura</th>
                                <th>Fecha de emision</th>
                                <th>IVA %</th>
                                <th>REQ</th>
                                <th>Observaciones</th>
                                <th>Enviada</th>
                                <th>Nombre Cliente</th>
                                <th>Nombre Emisor</th>

                            </tr>

                            @foreach($facturas as $factura)

                            <tr>
                                <td>
                                    @if($factura['enviada'] == 1)

                                    @else
                                    <input type="checkbox" name="facturas_check[]" value="{{ $factura['id'] }}">
                                    @endif
                                </td>
                                <td>{{$factura['id']}}</td>
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

                                @foreach($emisores as $emisor)
                                @if($emisor['id'] == $factura['emisor_id'])
                                <td>{{$emisor['nombre']}}</td>
                                @endif
                                @endforeach


                            </tr>
                            @endforeach


                        </table>

                        <button type="submit" class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1h2.846zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1zm6 0h-5v1h5v-1z" />
                            </svg><i class="bi bi-capslock">Enviar</i></button>
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