<?php session_start();
require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiar_datos($_POST['usuario']);
    $password = limpiar_datos($_POST['password']);
    
    if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {
        $_SESSION['admin'] = $blog_admin['usuario'];
        header('Location:' . RUTA . '/admin');
    }
}

require 'views/login_view.php';

