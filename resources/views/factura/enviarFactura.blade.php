@extends('layouts.app')

@section('content')

<h1>Enviar Facturas</h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="">

                        <div class="mb-3 row">
                            <label for="fecha_emision" class="col-sm-2 col-form-label"><strong>Fecha desde</strong></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fecha_emision" id="fecha_emision" value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="fecha_emision" class="col-sm-2 col-form-label"><strong>Fecha hasta</strong></label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fecha_emision" id="fecha_emision" value="">
                            </div>
                        </div>
                        <div class="mb-3 block">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado">
                            <option value="1">Enviada</option>
                            <option value="0">No enviada</option>
                            <option value="2">todas</option>
                        </select>
                        <a href="" class="btn btn-primary btn-sm">Ver</a>
                    </div>
                    </form>



                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                 
                 //SELECT *
FROM facturas
WHERE fecha_emision > '2010-01-01' AND fecha_emision < '2013-12-31' AND enviado = 1;


                    </select>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <a href="{{route('inicio')}}" class="btn btn-primary btn-sm">Volver</a>

</div>
@endsection