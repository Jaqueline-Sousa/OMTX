<?php
$host = "localhost";
$user = "root";
$pass = "senac"; // senha definida por você
$dbname = "db_omtx"; // banco que você criou

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>