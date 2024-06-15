<?php

global $pdo;
require_once "Usuarios.php";
require_once "connect.php";
require_once "index.php";

$usuario = new Usuarios($pdo);
$usuario->listarTodos();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
    $cadastrar = $usuario->inserirUsuario($nome, $email, $senha);

    echo "<p>Usuário cadastrado com sucesso!</p>";
} else {
    echo "Houve um erro ao cadastrar o usuário :(";
}

?>
