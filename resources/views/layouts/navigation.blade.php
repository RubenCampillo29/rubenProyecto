<style>
    .card {
        margin: 20px;
        background-color: #9805;

    }

    nav {

        display: flex;
    }
</style>






<nav>




    <div class="card" style="width: 18rem;">
        <img src=" " class="card-img-top" alt="factura">
        <div class="card-body">
            <h5 class="card-title">Facturas</h5>
            <p class="card-text"></p>
            <a href="{{route('facturas.index')}}" class="btn btn-primary">ver</a>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Clientes</h5>
            <p class="card-text"></p>
            <a href="{{route('clientes.index')}}" class="btn btn-primary">ver</a>
        </div>
    </div>


    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Productos</h5>
            <p class="card-text"></p>
            <a href="{{route('productos.index')}}" class="btn btn-primary">ver</a>
        </div>
    </div>



    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Todos los detalles</h5>
            <p class="card-text"></p>
            <a href="{{route('DetalleFacturas.index')}}" class="btn btn-primary">ver</a>
        </div>
    </div>

</nav>