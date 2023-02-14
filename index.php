<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2 - Diego Faria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="container d-flex flex-column justify-content-center align-items-center h-100">
    <h4 class="text-center">Registro de Alumnos</h4>
    <h5 class="text-center">Diego Faría 29714067</h5>
    <div class="class w-50">
        <form class="card p-1" action="relleno_datos.php" method="post">
            <label for="numero">Número de Tarjetas:</label>
            <input class="form-control" type="number" class="mb-1" min="0" name="numero" id="numero" required>
            <button type="submit" class="btn btn-primary mt-2">Continuar ►►</button>
        </form>
    </div>
</body>
</html>