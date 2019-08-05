<style>
    p{
        padding-top: 10%;
        font-weight: bold;
        font-size: 1.5em;
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
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/ingrediente') }}">Registrar</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/ingrediente2') }}">Actualizar</a></li>
                </ul>
                    <img src="image/ingre.jpg" alt="ingrediente" width="200" height="200" class="img-responsive rounded">
            </div>

            <div class="col-md-4">
                <p>Platos</p>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/plato') }}">Registrar</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/plato2') }}">Actualizar</a></li>
                </ul>
                    <img src="image/plato.jpg" alt="plato" width="200" height="200" class="img-responsive rounded">
            </div>

            <div class="col-md-4">
                <p>Ingredientes de los platos</p>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/platoingrediente') }}">Registrar</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/platoingrediente2') }}">Actualizar</a></li>
                </ul>
                    <img src="image/platoingrediente.jpg" alt="platoingrediente" width="200" height="200" class="img-responsive rounded">
                
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-6">
                <p>Ordenes</p>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/orden') }}">Registrar</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/orden2') }}">Actualizar</a></li>
                </ul>
                    <img src="image/orden.jpg" alt="orden" width="200" height="200" class="img-responsive rounded">
            </div>

            <div class="col-md-6">
                <p>Ordenes de los platos</p>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/ordenplato') }}">Registrar</a></li>
                    <li class="page-item"><a class="page-link" href="{{ url('/ordenplato2') }}">Actualizar</a></li>
                </ul>
                    <img src="image/ordenplato.jpg" alt="ordenplato" width="200" height="200" class="img-responsive rounded">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6">
                <p>Liquidación</p>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/liquidacion') }}">Entrar</a></li>
                </ul>
                    <img src="image/liquidacion.png" border="0" alt="liquidacion" width="200" height="200" class="img-responsive rounded">
            </div>

            <div class="col-md-6">
                <p>Ventas</p>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="{{ url('/venta') }}">Entrar</a></li>
                </ul>
                    <img src="image/reporte.png" border="0" alt="reporte" width="200" height="200" class="img-responsive rounded">
            </div>
        </div>
    </div>
</div>
@endsection
