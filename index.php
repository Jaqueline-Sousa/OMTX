<?php
session_start();

$usuario = "admin";
$senha = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["usuario"] === $usuario && $_POST["senha"] === $senha) {
        $_SESSION["logado"] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - OMTX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">
    <div class="login-box">
        <h2>OMTX</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <?php if(isset($erro)) echo "<p class='erro'>$erro</p>"; ?>
        </form>
    </div>
</body>
</html>