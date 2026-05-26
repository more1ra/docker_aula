<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Docker</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);
            width:350px;
        }

        h1{
            text-align:center;
            color:#333;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
            color:#555;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:12px;
            background:#007bff;
            border:none;
            color:white;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#0056b3;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Cadastro</h1>

        <form action="salvar.php" method="POST">

            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Sobrenome</label>
            <input type="text" name="sobrenome" required>

            <label>Endereço</label>
            <input type="text" name="endereco" required>

            <button type="submit">
                Cadastrar
            </button>

        </form>
    </div>

</body>
</html>
