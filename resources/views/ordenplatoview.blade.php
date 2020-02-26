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
        <form class="was-validated" style="margin-top: 10%;" method="post" action="ordenplato">
            @csrf
            <h1 class="text-danger font-weight-bold">Registro de Platos a las Ordenes</h1>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="id">Id:</label>
                      <input type="number" class="form-control" id="id" name="id" disabled>
                    </div>
                </div>
                <div class="col-sm-3">
        		    <div class="form-group">
        		      <label for="numorden">Número de la orden:</label>
        		      <input type="number" class="form-control" id="numorden" name="numorden" required>
        		    </div>
                </div>
                <div class="col-sm-3">
        		    <div class="form-group">
        		      <label for="codplato">Código del plato</label>
        		      <input type="number" class="form-control" id="codplato" name="codplato" required>
        		    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                      <label for="cantidad">Cantidad:</label>
                      <input type="number" class="form-control" id="cantidad" name="cantidad" required>
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
                        <th>Id</th>
                        <th>Número Orden</th>
                        <th>Código Plato</th>
                        <th>Cantidad</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                    <tbody>
                        @forelse ($tipids as $tipid)
                        <tr>
                            <td>{{ $tipid->id }}</td>
                            <td>{{ $tipid->numOrden }}</td>
                            <td>{{ $tipid->codPlato }}</td>
                            <td>{{ $tipid->cantidad }}</td>
                            <td>{{ $tipid->valor }}</td>
                            <td><a class="btn btn-primary btn-xs" href="{{ url('/ordenplato2') }}"> <i class="fas fa-edit"></i> </a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No hay registros.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection