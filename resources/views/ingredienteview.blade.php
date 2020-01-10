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
    <form class="was-validated" style="margin-top: 10%;" method="post" action="ingrediente">
            @csrf
            <h1 class="text-danger font-weight-bold">Registro de Ingredientes</h1>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="codigo">Código:</label>
                      <input type="text" class="form-control" id="codigo" name="codigo" disabled>
                    </div>
                </div>
                <div class="col-sm-5">
        		    <div class="form-group">
        		      <label for="nombre">Nombre:</label>
        		      <input type="text" class="form-control" id="nombre" name="nombre" required>
        		    </div>
                </div>
                <div class="col-sm-5">
        		    <div class="form-group">
        		      <label for="proveedor">Proveedor:</label>
        		      <input type="text" class="form-control" id="proveedor" name="proveedor" required>
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
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                        <th></th>
                    </tr>
                    <tbody>
                        @forelse ($tipids as $tipid)
                        <tr>
                            <td>{{ $tipid->codigo }}</td>
                            <td>{{ $tipid->nombre }}</td>
                            <td>{{ $tipid->proveedor }}</td>
                            <td><a class="btn btn-primary btn-xs" href="{{ url('/ingrediente2') }}"> <i class="fas fa-edit"></i> </a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No hay registros.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>        

    </div>
</div>
@endsection