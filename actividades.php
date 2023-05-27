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
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a href="views/form_actividades.php">Registrar actividad</a>
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
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/accion_modificar_actividades.php?id=' . $actividad->getId() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_actividades.php?id=' . $actividad->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>