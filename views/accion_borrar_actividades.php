<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>Haz borrado la actividad</h1>';
} else {
    echo '<h1>Lo lamento , no se pudo borrar la actividad</h1>';
}

