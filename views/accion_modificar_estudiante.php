<?php
require '../../models/estudiante.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudiantesController\EstudiantesController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombres']);
$estudiante->setApellidos($_POST['apellidos']);

$estudiantesController = new EstudiantesController();
$resultado = $estudiantesController->update($estudiante->getCodigo(), $estudiante);
if ($resultado) {
    echo '<h1>Lograste modificar cambios</h1>';
} else {
    echo '<h1>Lo siento no se modificaron los cambios</h1>';
}
?>
<br>

