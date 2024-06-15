<?php

$dbFile = 'bancocrud.sqlite';

try {
    $pdo = new PDO("sqlite:$dbFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com banco de dados realizada com sucesso!\n";
} catch (PDOException $e) {
    echo "Falha ao conectar com o banco de dados. Código de erro: " . $e->getMessage() . "\n";
    die();
}