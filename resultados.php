<?php
    $counter = 0;
    $promedio_materias = [0,0,0];

    $aprobados = [0,0,0];

    $aplazados = [0,0,0];

    $aprobadas_todas = 0;
    $aprobadas_una = 0;
    $aprobadas_dos = 0;

    $nota_maxima = [0,0,0];

    // Primera tabla: Promedio Materias, Segunda Tabla: Aprobados por materia, Tercera Tabla: Aplazados por materia
    foreach($_POST as $key=>$value){
        if(str_contains($key, "nota")){
            if(str_contains($key, "fisica")){
                $promedio_materias[0] += $value;
                if($value >= 10){
                    $aprobados[0]++;
                } else{
                    $aplazados[0]++;
                }
            } elseif(str_contains($key, "matematicas")){
                $promedio_materias[1] += $value;
                if($value >= 10){
                    $aprobados[1]++;
                } else{
                    $aplazados[1]++;
                }
            } elseif(str_contains($key, "programacion")){
                $promedio_materias[2] += $value;
                if($value >= 10){
                    $aprobados[2]++;
                } else{
                    $aplazados[2]++;
                }
            }
        }
    }

    $promedio_materias[0] /= $_POST['numero'];
    $promedio_materias[1] /= $_POST['numero'];
    $promedio_materias[2] /= $_POST['numero'];

    // Cuarta Tabla: Número de alumnos que aprobaron todas, Quinta Tabla y Sexta Tabla 
    $cedula = "";
    $pasadas = 0;
    foreach($_POST as $key=>$value){
        if(str_contains($key, 'cedula')){
            if($pasadas == 3){
                $aprobadas_todas += 1;
            } elseif($pasadas == 2){
                $aprobadas_dos += 1;
            } elseif($pasadas == 1){
                $aprobadas_una += 1;
            }
            $cedula = $value;
            $pasadas = 0;
        } elseif(str_contains($key, 'nota')){
            if(str_contains($key, 'matematicas') && $value >= 10){
                $pasadas += 1;
            } elseif(str_contains($key, 'fisica') && $value >= 10){
                $pasadas += 1;
            } elseif(str_contains($key, 'programacion') && $value >= 10){
                $pasadas += 1;
            }
        }
    }

    if($pasadas == 3){
        $aprobadas_todas += 1;
    } elseif($pasadas == 2){
        $aprobadas_dos += 1;
    } elseif($pasadas == 1){
        $aprobadas_una += 1;
    }

    // Séptima Tabla: Búsqueda de Máximo
    foreach($_POST as $key=>$value){
        if(str_contains($key, 'nota')){
            if(str_contains($key, 'fisica')){
                if($value > $nota_maxima[0]){
                    $nota_maxima[0] = $value;
                }
            } elseif(str_contains($key, 'matematicas') && $value >= 10){
                if($value > $nota_maxima[1]){
                    $nota_maxima[1] = $value;
                }
            } elseif(str_contains($key, 'programacion') && $value >= 10){
                if($value > $nota_maxima[2]){
                    $nota_maxima[2] = $value;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - Diego Faria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="container">
    <!--TABLA 1 -->
    <h4 class="text-center">Nota Promedio en Cada Materia</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Física</th>
                <th>Matemáticas</th>
                <th>Programación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $promedio_materias[0]; ?></td>
                <td><?php echo $promedio_materias[1]; ?></td>
                <td><?php echo $promedio_materias[2]; ?></td>
            </tr>
        </tbody>
    </table>

    <!--TABLA 2 -->
    <h4 class="text-center">Alumnos Aprobados en Cada Materia</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Física</th>
                <th>Matemáticas</th>
                <th>Programación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $aprobados[0]; ?></td>
                <td><?php echo $aprobados[1]; ?></td>
                <td><?php echo $aprobados[2]; ?></td>
            </tr>
        </tbody>
    </table>

    <!--TABLA 3 -->
    <h4 class="text-center">Alumnos Aplazados en Cada Materia</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Física</th>
                <th>Matemáticas</th>
                <th>Programación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $aplazados[0]; ?></td>
                <td><?php echo $aplazados[1]; ?></td>
                <td><?php echo $aplazados[2]; ?></td>
            </tr>
        </tbody>
    </table>

    <!--TABLA 4 -->
    <h4 class="text-center">Alumnos que Aprobaron Todas las Materias</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Número</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $aprobadas_todas; ?></td>
            </tr>
        </tbody>
    </table>

    <!--TABLA 5 -->
    <h4 class="text-center">Alumnos que Aprobaron Solo Dos Materias</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Número</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $aprobadas_dos; ?></td>
            </tr>
        </tbody>
    </table>

    <!--TABLA 6 -->
    <h4 class="text-center">Alumnos que Aprobaron Solo Una Materia</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Número</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $aprobadas_una; ?></td>
            </tr>
        </tbody>
    </table>

    <!--TABLA 7 -->
    <h4 class="text-center">Nota Máxima por Materia</h4>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th>Física</th>
                <th>Matemáticas</th>
                <th>Programación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $nota_maxima[0]; ?></td>
                <td><?php echo $nota_maxima[1]; ?></td>
                <td><?php echo $nota_maxima[2]; ?></td>
            </tr>
        </tbody>
    </table>

    <a class="btn btn-primary" href="index.php">Regresar al Inicio</a>

</body>
</html>