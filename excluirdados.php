<?php
global $pdo;
require_once "connect.php";
require_once "Usuarios.php";

$usuario = new Usuarios($pdo);

$id = $_GET['id'];

$excluir = $usuario->excluirUsuario($id);

if ($excluir){
    header('Location: index.php');
    exit();
} else {
    echo "Houve um erro ao excluir este usuário :(";
}
