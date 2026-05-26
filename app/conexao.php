<?php
$host = "db";
$user = "aluno";
$pass = "aluno";
$dbname = "desafio";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
