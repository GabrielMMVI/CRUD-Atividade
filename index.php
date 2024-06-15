<?php
global $pdo;
require_once ("connect.php");
require_once("Usuarios.php");

$usuario = new usuarios($pdo);

$lista = $usuario->listarTodos();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="tabelaestilo.css">
</head>
<body>
<main>
    <h2><a href="formulariocadastro.php">Cadastrar um novo usuário</a></h2><br>
</main>
<p>Listagem de usuários:</p>
<table>
    <tr>
        <th><strong>ID</strong></th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th colspan="2">Ações</th>
    </tr>
    <tbody>
    <?php foreach ($lista as $user):?>
    <tr>
        <td><strong><?= $user ['id']?></strong></td>
        <td><?= $user['nome'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['senha'] ?></td>
        <td>
            <a href="editardados.php?id=<?= $user['id']; ?>">Editar dados</a>
        </td>
        <td>
            <a href="excluirdados.php?id=<?= $user['id']; ?>">Ecluir usuários</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>