<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$codigoEstudiante = $_GET['codigo'];
$actividades = $actividadController->read($codigoEstudiante);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a class="btn-registrar" href="views/form_actividades.php?codigo=<?php echo $codigoEstudiante; ?>">Registrar actividad</a>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumatoria = 0.0;
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    echo '      <a class="btn-modificar" href="views/form_actividades.php?id=' . $actividad->getId() . '">modificar</a>';
                    echo '      <a class="btn-eliminar"  href="views/accion_borrar_actividades.php?id=' . $actividad->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';

                    $sumatoria += $actividad->getNota(); 
                }
                $mensaje = "  ↑ Primero'Registrar actividad'";
                $mensajePromedio = " Su Promedio es 0.0";
                if(!empty($sumatoria)){
                $promedio = $sumatoria/count($actividades);
                if($promedio > 3){
                    $mensaje = "Felicitaciones aprobo";
                    $mensajePromedio = '<h1 id = "Aprobo">'.$promedio.'</h1>';

                }else {
                    $Mensaje = "Lo sentimos vuelva a intentar ";
                    $menPromedio = '<h1 id = "Perdio">'.$promedio.'</h1>';

                }
            }
                ?>
            </tbody>
        </table>
        <div>
        <h1 id = "Mensaje"><?php echo($mensaje)?></h1>
            <h1><?php echo($mensajePromedio)?></h1>
        </div>
        <a class = "Registrar" href="estudiantes.php">Click para volver a la lista de estudiantes</a>

    </main>
</body>

</html>