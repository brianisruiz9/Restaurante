<style>
    label{
        font-weight: bold;
        font-size: 1.3em;
        }
    h1{
        text-align: center;
        color: tomato;  
    }
    #cont{
        margin-top:-8%;
    }
    button{
        align: center;
    }
    p {
        background-color: lightgrey;
        background-size: auto;
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

	<div id="cont" class="container">
        <form class="was-validated" style="margin-top: 10%;" method="post" action="venta">
            @csrf
            <h1 class="text-danger font-weight-bold">Ventas</h1>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="fecha">Fecha:</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>
            </div>
            <a class="btn btn-danger" href="{{ url('/home') }}"><i class="fas fa-reply"></i> Volver</a>
    		<button type="submit" class="btn btn-info"><i class="fas fa-plus"></i> Mostrar</button>
		</form>
		<div class="row mt-10">
            <div class="col-sm-12">
                <p class="text-danger">
                    {{ $msg }} 
                </p>
            </div>
        </div>

    </div>
@endsection