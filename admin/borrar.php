<?php session_start();

require 'config.php';
require '../functions.php';

comprobar_sesion();

$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: ../error.php');
}

$id = limpiar_datos($_GET['id']);
if (!$id) {
    header('Location: ' . RUTA . '/admin');
}

$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
$statement->execute(array('id' => $id));

header('Location: ' . RUTA . '/admin');

