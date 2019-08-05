<!DOCTYPE html>
<html>
<head>
	<title>Restaurante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body{
            background: url("image/fondo.jpg") no-repeat center center;
            width: 100%;
            height: auto;
            background-size: cover;
            background-attachment: fixed;
        }
        h1{
            text-align: center;
            margin-top: -5%;
            color: tomato;
        }
        a {
            color: blue;
            padding: 0 25px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        p {
            background-color: lightgrey;
            background-size: auto;
        }
    </style>
</head>
<body>
	<div class="container">

        <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link alert alert-danger" href="{{ url('/home') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link alert alert-danger" href="{{ url('/ingrediente') }}">Registrar</a>
        </li>
      </ul>

        <form class="was-validated" style="margin-top: 10%;" method="post" action="ingrediente2">
            @csrf
            <h1>Actualización de Ingredientes</h1>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="codigo">Código:</label>
                      <input type="number" class="form-control" id="codigo" name="codigo" required>
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
		    <button type="submit" class="btn btn-info">Guardar</button>
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
                <table class="table table-bordered table-primary">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                    </tr>
                    <tbody>
                        @forelse ($tipids as $tipid)
                        <tr>
                            <td>{{ $tipid->codigo }}</td>
                            <td>{{ $tipid->nombre }}</td>
                            <td>{{ $tipid->proveedor }}</td>
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
</body>
</html>