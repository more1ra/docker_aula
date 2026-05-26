<?php
include "conexao.php";

$conn->query("
CREATE TABLE IF NOT EXISTS pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    sobrenome VARCHAR(100),
    endereco VARCHAR(255)
)
");

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$endereco = $_POST['endereco'];

$sql = "INSERT INTO pessoas (nome, sobrenome, endereco)
        VALUES ('$nome', '$sobrenome', '$endereco')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Cadastro realizado com sucesso!</h1>";
    echo "<a href='index.php'>Voltar</a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
