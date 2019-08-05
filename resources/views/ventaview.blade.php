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
      </ul>
        <form class="was-validated" style="margin-top: 10%;" method="post" action="venta">
            @csrf
            <h1>Ventas</h1>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="fecha">Fecha:</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>
            </div>
    		<button type="submit" class="btn btn-info">Mostrar</button>
		</form>
		<div class="row mt-10">
            <div class="col-sm-12">
                <p class="text-danger">
                    {{ $msg }} 
                </p>
            </div>
        </div>

    </div>
</body>
</html>