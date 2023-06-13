<style>
    .card {
        margin: 20px;
        background-color: #9805;

    }

    nav {

        display: flex;
    }
</style>

@guest

<div class="container text-center">
  <div class="card" style="width: 18rem; display: inline-block;">
    <div class="card-body">
      <a href="{{route('register')}}" class="card-link btn btn-primary btn-lg">Registro</a>
      <a href="{{route('login')}}" class="card-link btn btn-secondary btn-lg">Login</a>
    </div>
  </div>
</div>




@else




<nav class="d-flex justify-content-center">



    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/factura.jpg') }}" class="card-img-top" alt="factura">
                <div class="card-body">
                    <h5 class="card-title">Facturas</h5>
                    <p class="card-text"></p>
                    <a href="{{route('facturas.index')}}" class="btn btn-primary">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="width: 16rem;">
                <img src=" {{ asset('images/Clientes3.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text"></p>
                    <a href="{{route('clientes.index')}}" class="btn btn-primary">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                        </svg>

                    </a>

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
            <img src="{{ asset('images/agencia.jpg') }}" class="card-img-top" alt="...">
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
            <div class="card" style="width: 15rem;">
                <img src="{{ asset('images/oficinas.avif') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Emisor</h5>
                    <p class="card-text"></p>
                    <a href="{{route('emisors.index')}}" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>




</nav>

@endguest