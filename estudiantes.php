<?php
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/estudiantesController.php';

use estudiantesController\EstudiantesController;

$estudiantesController = new EstudiantesController();

$estudiantes = $estudiantesController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a class="btn-registrar" href="views/form_estudiantes.php">Registrar estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombres() . '</td>';
                    echo '  <td>' . $estudiante->getApellidos() . '</td>';
                    echo '  <td>';
                    echo '      <a class="btn-modificar" href="views/form_estudiantes.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    echo '      <a class="btn-eliminar"  href="views/accion_borrar_estudiantes.php?codigo=' . $estudiante->getCodigo() . '">Borrar</a>';
                    echo '      <a class="btn-notas"     href="actividades.php?codigo=' . $estudiante->getCodigo() . '&nombre=' . $estudiante->getNombres() . '&apellido=' . $estudiante->getApellidos() . '">Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>