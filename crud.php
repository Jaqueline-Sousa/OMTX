<?php
session_start();
if(!isset($_SESSION["logado"])) {
    header("Location: index.php");
    exit;
}
include "config/db.php";

$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// CREATE
if ($action == "create" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $status = $_POST["status"];
    $sql = "INSERT INTO tb_chamados (titulo, descricao, status, data_criacao) VALUES ('$titulo', '$descricao', '$status', NOW())";
    if ($conn->query($sql)) { header("Location: dashboard.php"); exit; }
}

// UPDATE
if ($action == "update" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $status = $_POST["status"];
    $sql = "UPDATE tb_chamados SET titulo='$titulo', descricao='$descricao', status='$status', data_atualizacao=NOW() WHERE id=$id";
    if ($conn->query($sql)) { header("Location: dashboard.php"); exit; }
}

// DELETE
if ($action == "delete" && $id > 0) {
    $conn->query("DELETE FROM tb_chamados WHERE id=$id");
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Chamados - OMTX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard">
        <a href="dashboard.php" class="btn">← Voltar</a>

        <?php if ($action == "create"): ?>
            <h1>Novo Chamado</h1>
            <form method="POST">
                <input type="text" name="titulo" placeholder="Título" required>
                <input name="descricao" placeholder="Descrição" required>
                <select name="status">
                    <option value="Aberto">Aberto</option>
                    <option value="Em Andamento">Em Andamento</option>
                    <option value="Fechado">Fechado</option>
                </select>
                <button type="submit" class="btn">Salvar</button>
            </form>

        <?php elseif ($action == "read" && $id > 0): 
            $res = $conn->query("SELECT * FROM tb_chamados WHERE id=$id");
            $chamado = $res->fetch_assoc();
        ?>
            <h1>Detalhes do Chamado</h1>
            <p><strong>ID:</strong> <?= $chamado["id"] ?></p>
            <p><strong>Título:</strong> <?= $chamado["titulo"] ?></p>
            <p><strong>Descrição:</strong> <?= $chamado["descricao"] ?></p>
            <p><strong>Status:</strong> <?= $chamado["status"] ?></p>
            <p><strong>Criado em:</strong> <?= $chamado["data_criacao"] ?></p>
            <p><strong>Última atualização:</strong> <?= $chamado["data_atualizacao"] ?? "Nunca atualizado" ?></p>

        <?php elseif ($action == "update" && $id > 0): 
            $res = $conn->query("SELECT * FROM tb_chamados WHERE id=$id");
            $chamado = $res->fetch_assoc();
        ?>
            <h1>Editar Chamado</h1>
            <form method="POST">
                <input type="text" name="titulo" value="<?= $chamado['titulo'] ?>" required>
                <input name="descricao" value="<?= $chamado['descricao'] ?>" required>
                <select name="status">
                    <option value="Aberto" <?= $chamado['status']=="Aberto" ? "selected" : "" ?>>Aberto</option>
                    <option value="Em Andamento" <?= $chamado['status']=="Em Andamento" ? "selected" : "" ?>>Em Andamento</option>
                    <option value="Fechado" <?= $chamado['status']=="Fechado" ? "selected" : "" ?>>Fechado</option>
                </select>
                <button type="submit" class="btn">Atualizar</button>
            </form>

        <?php else: ?>
            <h1>Ação inválida</h1>
        <?php endif; ?>
    </div>
</body>
</html>