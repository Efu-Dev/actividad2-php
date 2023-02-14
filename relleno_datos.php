<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2 - Página 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <form action="resultados.php" method="post" class="ml-1 row g-3">
        <h2 class="text-center">Ingreso de Datos</h2>
        <?php
            $counter = 1;
            while($counter <= $_POST['numero']){
                echo "<div class='col-4'>";
                echo "<div class='card p-3'>";
                //A: Número de CI
                echo 'Estudiante #'.$counter.'.<br>';
                echo '<label for="cedula">Cédula:</label>';
                echo '<input type="text" maxlength="10" class="form-control" name="cedula'.$counter.'" required />';
                //B: Nombre del Alumno
                echo '<label for="nombre">Nombre:</label>';
                echo '<input type="text" maxlength="60" class="form-control" name="nombre'.$counter.'" required />';
                //C: Nota de matemáticas
                echo '<label for="nota_matematicas'.$counter.'">Nota de Matemáticas:</label>';
                echo '<input type="number" min="0" max="20" class="form-control" name="nota_matematicas'.$counter.'" required />';
                //D: Nota de física
                echo '<label for="nota_fisica'.$counter.'">Nota de Física:</label>';
                echo '<input type="number" min="0" max="20" class="form-control" name="nota_fisica'.$counter.'" required />';
                //E: Nota de programación
                echo '<label for="nota_programacion'.$counter.'">Nota de Programación:</label>';
                echo '<input type="number" min="0" max="20" class="form-control" name="nota_programacion'.$counter.'" required /><br><br>';
                $counter++;
                echo "</div>";
                echo "</div>";
            }
        ?>

        <button type="submit" class="btn btn-primary">Ver Datos</button>
    </form>
</body>
</html>