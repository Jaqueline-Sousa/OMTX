<?php
session_start();
if(!isset($_SESSION["logado"])) {
    header("Location: index.php");
    exit;
}
include "config/db.php";

$result = $conn->query("SELECT * FROM tb_chamados ORDER BY data_criacao DESC LIMIT 10");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - OMTX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard">
        <h1>Últimos Chamados</h1>
        <a href="crud.php?action=create" class="btn">Novo Chamado</a>
        <a href="logout.php" class="btn-danger">Sair</a>
        <a href="#" onclick="window.print()" class="btn-print">Imprimir</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data Criação</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["titulo"] ?></td>
                <td><?= $row["data_criacao"] ?></td>
                <td><?= $row["status"] ?></td>
                <td>
                    <a href="crud.php?action=read&id=<?= $row['id'] ?>">Ver</a> |
                    <a href="crud.php?action=update&id=<?= $row['id'] ?>">Editar</a> |
                    <a href="crud.php?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Excluir chamado?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>