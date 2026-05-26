<?php
session_start();

if(isset($_SESSION['nome'])){
    $nome = $_SESSION['nome'];
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin-top: 100px;
        }

        .btn{
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn:hover{
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Olá <?php echo $nome; ?></h1>

    <a class="btn" href="tabela.php">
        Ver Registros
    </a>

</body>
</html>