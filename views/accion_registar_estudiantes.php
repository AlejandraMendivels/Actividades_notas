<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudiantesController\EstudiantesController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombres']);
$estudiante->setApellidos($_POST['apellidos']);

$estudiantesController = new EstudiantesController();
$resultado = $estudiantesController->create($estudiante);
if ($resultado) {
    echo '<h1">Genial, Haz registrado un estudiante</h1>';
} else {
    echo '<h1">Lo siento , No se registro el estudiante</h1>';
}
