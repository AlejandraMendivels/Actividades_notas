<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiantesController\EstudiantesController;

$estudiantesController = new EstudiantesController();
$resultado = $estudiantesController->delete($_GET['codigo']);
if ($resultado) {
    echo '<h1>Se ha eliminado al estudiante</h1>';
} else {
    echo '<h1>Lo siento , no se ha podifo borrar al estudiante</h1>';
}
