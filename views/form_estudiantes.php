<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudiantesController\EstudiantesController;

$codigo = empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo = 'Registrar estudiante';
$urlAction = "accion_registar_estudiantes.php";
$estudiante = new Estudiante();
if (!empty($codigo)) {
    $titulo = 'Modificar estudiante';
    $urlAction = "accion_modificar_estudiantes.php";
    $estudiantesController = new EstudiantesController();
    $estudiante = $estudiantesController->readRow($codigo); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <header>
        <h1><?php echo $titulo ?></h1>
    </header>
    <main>
        <form action = "<?php echo $urlAction;?>" method="post">
            <label>
                <span>Codigo:</span>
                <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo(); ?>" required>
            </label>
            <br>
            <label>
                <span>Nombres</span>
                <input type="text" name="nombres" value="<?php echo $estudiante->getNombres(); ?>" required>
            </label>
            <br>
            <label>
                <span>Apellidos:</span>
                <input type="text" name="apellidos" value="<?php echo $estudiante->getApellidos(); ?>" required>
            </label>
            <br>
            <button type="submit">Guardar Estudiante</button>
        </form>
        
    </main>
</body>

</html>