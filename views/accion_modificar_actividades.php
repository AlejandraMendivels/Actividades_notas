<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);

$actividadController = new ActividadController();
$resultado = $actividadController->update($actividad->getId(), $actividad);
if ($resultado) {
    echo '<h1>Lograste modificar la actividad</h1>';
} else {
    echo '<h1>lo siento , no se modificar la actividad </h1>';
}

