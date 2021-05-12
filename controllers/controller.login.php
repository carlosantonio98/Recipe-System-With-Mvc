<?php
$email = $_POST['email'];
$pass  = $_POST['password'];


include '../resources/class/class.connection.php';
include '../models/model.usuario.php';

try {
    session_start();
    $db->debug();

    $sql = "SELECT * FROM fin_usuarios WHERE Correo=? and Clave=?";

    $usuario->get($sql,array($email,$pass));

    if ($usuario->data->Correo==$email) {

        $_SESSION['usuario'] = $usuario->data;

        switch ($usuario->data->FkRol) {
            case 1:
                header("location:../?page=menu-admin");
                break;
            case 2:
                header("location:../?page=menu-empleado");
                break;
            case 3:
                header("location:../?page=menu-cliente");
                break;
        }
    } else {
        $_SESSION['error'] = true;
        header("location:../?page=login");
    }

} catch (Exception $e) {

}
