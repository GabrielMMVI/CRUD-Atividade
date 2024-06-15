<?php
global $pdo;
require_once ("connect.php");
require_once ("usuarios.php");

$usuario = new usuarios($pdo);

$lista = $usuario->listarTodos();
echo "Listando usuários: ".PHP_EOL;
echo "+-+-+-+-+-+-+-+-+-+-+-+".PHP_EOL;
print_r($lista);

//$novo = $usuario->inserirUsuario("Leorio Paradiknight","leori0rioknight@huntermail.hxh","030318parad");
