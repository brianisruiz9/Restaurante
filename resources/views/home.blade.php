<style>
    p{
        padding-top: 10%;
        font-weight: bold;
        font-size: 1.5em;
    }
    #ingre{
        background-image:url(image/ingre.jpg);
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <p>Ingredientes</p>
                    <a class="btn btn-light" href="{{ url('/ingrediente') }}">
                    <img src="image/ingre.jpg" alt="ingrediente" width="200" height="200" class="img-responsive rounded">
                    </a>            
            </div>

            <div class="col-md-4">
                <p>Platos</p>
                    <a class="btn btn-light" href="{{ url('/plato') }}">
                    <img src="image/plato.jpg" alt="plato" width="200" height="200" class="img-responsive rounded">
                    </a>
            </div>

            <div class="col-md-4">
                <p>Ingredientes de los platos</p>
                    <a class="btn btn-light" href="{{ url('/platoingrediente') }}">
                        <img src="image/platoingrediente.jpg" alt="platoingrediente" width="200" height="200" class="img-responsive rounded">
                    </a>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-6">
                <p>Ordenes</p>
                    <a class="btn btn-light" href="{{ url('/orden') }}">
                        <img src="image/orden.jpg" alt="orden" width="200" height="200" class="img-responsive rounded">
                    </a>
            </div>

            <div class="col-md-6">
                <p>Ordenes de los platos</p>
                    <a class="btn btn-light" href="{{ url('/ordenplato') }}">
                        <img href="" src="image/ordenplato.jpg" alt="ordenplato" width="200" height="200" class="img-responsive rounded">
                    </a>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6">
                <p>Liquidación</p>
                    <a class="btn btn-light" href="{{ url('/liquidacion') }}">
                        <img src="image/liquidacion.png" border="0" alt="liquidacion" width="200" height="200" class="img-responsive rounded">
                    </a>
            </div>

            <div class="col-md-6">
                <p>Ventas</p>
                    <a class="btn btn-light" href="{{ url('/venta') }}">
                        <img src="image/reporte.png" border="0" alt="reporte" width="200" height="200" class="img-responsive rounded">
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
