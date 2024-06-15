<?php
global $pdo;
require_once ("connect.php");
require_once ("Usuarios.php");

$usuario = new Usuarios($pdo);

$id = $_GET['id'];

$user = $pdo->prepare("SELECT * from usuarios Where id = :id");
$user->execute([':id' => $id]);
$dados = $user->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza e valida os dados do formulário
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);


    $atualizar = $usuario->atualizarUsuario($id, $nome, $email, $senha);

    if ($atualizar) {
        $mensagem = "Seus dados foram alterados!";
    } else {
        $mensagem = "Erro ao atualizar o usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title
</head>
<body>
<main>
    <h2>Editar Usuário</h2>
    <form method="post">
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $dados['email'] ?>" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <input type="submit" value="Editar">
    </form>
    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
    <button onclick="window.location.href='index.php'">Voltar para lista</button>
</main>
</body>
</html>