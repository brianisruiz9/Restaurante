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
        <form class="was-validated" style="margin-top: 10%;" method="post" action="orden2">
            @csrf
            <h1 class="text-danger font-weight-bold">Actualización de Ordenes</h1>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="numero">Número:</label>
                      <input type="number" class="form-control" id="numero" name="numero" required>
                    </div>
                </div>
                <div class="col-sm-5">
        		    <div class="form-group">
        		      <label for="fecha">Fecha:</label>
        		      <input type="date" class="form-control" id="fecha" name="fecha" value="" required>
        		    </div>
                </div>
                <div class="col-sm-5">
        		    <div class="form-group">
        		      <label for="numesa">Número de mesa:</label>
        		      <input type="number" class="form-control" id="numesa" name="numesa" required>
        		    </div>
                </div>
            </div>
            <a class="btn btn-danger" href="{{ url('/orden') }}"><i class="fas fa-reply"></i> Volver</a>
    		<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
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