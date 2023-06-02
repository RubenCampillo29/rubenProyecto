<style>
    .card {
        margin: 20px;
        background-color: #9805;

    }

    nav {

        display: flex;
    }
</style>

<nav class="d-flex justify-content-center">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/factura.jpg') }}" class="card-img-top" alt="factura">
                <div class="card-body">
                    <h5 class="card-title">Facturas</h5>
                    <p class="card-text"></p>
                    <a href="{{route('facturas.index')}}" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="width: 16rem;">
                <img src=" {{ asset('images/Clientes3.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text"></p>
                    <a href="{{route('clientes.index')}}" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/productos.webp') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text"></p>
                    <a href="{{route('productos.index')}}" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>

                  
</nav>

<nav class="d-flex justify-content-center">

<div class="col-md-2">
            <div class="card" style="width: 16rem;">
                <img src="{{ asset('images/productos.webp') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Enviar</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('factura.enviar')}}" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-2">
            <div class="card" style="width: 16rem;">
                <img src="{{ asset('images/productos.webp') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Emisor</h5>
                    <p class="card-text"></p>
                    <a href="{{route('emisors.index')}}" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>




</nav>


