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
        <form class="was-validated" style="margin-top: 10%;" method="post" action="orden">
            @csrf
            <h1 class="text-danger font-weight-bold">Registro de Ordenes</h1>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="numero">Número:</label>
                      <input type="number" class="form-control" id="numero" name="numero" disabled>
                    </div>
                </div>
                <div class="col-sm-5">
        		    <div class="form-group">
        		      <label for="fecha">Fecha:</label>
        		      <input type="date" class="form-control" id="fecha" name="fecha" value="" disabled="">
        		    </div>
                </div>
                <div class="col-sm-5">
        		    <div class="form-group">
        		      <label for="numesa">Número de mesa:</label>
        		      <input type="number" class="form-control" id="numesa" name="numesa" required>
        		    </div>
                </div>
            </div>
            <a class="btn btn-danger" href="{{ url('/home') }}"><i class="fas fa-reply"></i> Volver</a>
    		<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Agregar</button>
		</form>
		<div class="row mt-10">
            <div class="col-sm-12">
                <p class="text-danger">
                    {{ $msg }} 
                </p>
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <table class="table table-light">
                    <tr>
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>Número Mesa</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody>
                        @forelse ($tipids as $tipid)
                        <tr>
                            <td>{{ $tipid->numero }}</td>
                            <td>{{ $tipid->fecha }}</td>
                            <td>{{ $tipid->NumMesa }}</td>
                            <td>{{ $tipid->estado }}</td>
                            <td><a class="btn btn-primary btn-xs" href="{{ url('/orden2') }}"> <i class="fas fa-edit"></i> </a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No hay registros.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection