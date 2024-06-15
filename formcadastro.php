<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Usuário</title>
</head>
<body>
<h1>Cadastre seus dados:</h1>
<form action="formulariocadastro.php" method="post">
    <label for="nome">Nome: </label><br>
    <input type="text" name="nome" id="nome"><br><br>
    <label for="email">Email: </label><br>
    <input type="email" name="email" id="email"><br><br>
    <label for="senha">Senha: </label><br>
    <input type="password" name="senha" id="senha"><br><br>

    <input type="submit" value="Enviar">

</form>
</body>
</html>
<?php
global$pdo;
require_once"Usuarios.php";
$usuario = new Usuarios($pdo);
$lista = $usuario->listarTodos();
?>