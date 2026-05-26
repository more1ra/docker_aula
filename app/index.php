<?php
$host = "db";
$user = "aluno";
$pass = "aluno";
$dbname = "desafio";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$conn->query("
CREATE TABLE IF NOT EXISTS pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL
)
");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $endereco = $_POST["endereco"];

    $sql = "INSERT INTO pessoas (nome, sobrenome, endereco)
            VALUES ('$nome', '$sobrenome', '$endereco')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar: " . $conn->error;
    }
}

$resultado = $conn->query("SELECT * FROM pessoas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro PHP + Docker</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            margin: 0;
            padding: 30px;
        }

        .container {
            background: white;
            max-width: 700px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h1 {
            text-align: center;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #0056b3;
        }

        .msg {
            color: green;
            font-weight: bold;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cadastro de Pessoas</h1>

    <?php if ($mensagem != "") { ?>
        <p class="msg"><?php echo $mensagem; ?></p>
    <?php } ?>

    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" required>

        <label>Endereço:</label>
        <input type="text" name="endereco" required>

        <button type="submit">Cadastrar</button>
    </form>

    <h2>Cadastros realizados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Endereço</th>
        </tr>

        <?php while ($pessoa = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $pessoa["id"]; ?></td>
                <td><?php echo $pessoa["nome"]; ?></td>
                <td><?php echo $pessoa["sobrenome"]; ?></td>
                <td><?php echo $pessoa["endereco"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
