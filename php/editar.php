<?php

require "Usuario.class.php";

$usuario = new Usuario();

$con = $usuario->conecta();

if(!$con){
    echo "Banco indisponível";
    exit();
}

/* excluir */

if(isset($_GET['excluir'])){

    $id = $_GET['excluir'];

    $sql = $con->prepare("DELETE FROM usuario WHERE id = :id");

    $sql->bindValue(":id", $id);

    if($sql->execute()){

        header("Location: tabela.php");

        exit();
    }
}

/* editar registro  */

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $nome = $_POST['nome'];

    $email = $_POST['email'];

    $senha = $_POST['senha'];

    $sql = $con->prepare("UPDATE usuario 
                          SET nome = :nome,
                              email = :email,
                              senha = :senha
                          WHERE id = :id");

    $sql->bindValue(":id", $id);

    $sql->bindValue(":nome", $nome);

    $sql->bindValue(":email", $email);

    $sql->bindValue(":senha", $senha);

    if($sql->execute()){

        header("Location: tabela.php");

        exit();
    }
}

/* busca o usuário pelo id */

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = $con->prepare("SELECT * FROM usuario WHERE id = :id");

    $sql->bindValue(":id", $id);

    $sql->execute();

    $dados = $sql->fetch();

    if(!$dados){

        echo "Usuario nao encontrado";

        exit();
    }

} else {

    echo "ID nao informado";

    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Usuario</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background: #eaf3ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container{
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2{
            text-align: center;
            color: #0066cc;
            margin-bottom: 25px;
        }

        input{
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="submit"]{
            background: #0066cc;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        input[type="submit"]:hover{
            background: #004999;
        }

        .excluir{
            display: block;
            text-align: center;
            background: red;
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .excluir:hover{
            background: darkred;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Editar Usuario</h2>

    <form method="post">

        <input 
            type="hidden" 
            name="id"
            value="<?php echo $dados['id']; ?>"
        >

        <input 
            type="text"
            name="nome"
            value="<?php echo $dados['nome']; ?>"
        >

        <input 
            type="text"
            name="email"
            value="<?php echo $dados['email']; ?>"
        >

        <input 
            type="password"
            name="senha"
            placeholder="Nova senha"
        >

        <input 
            type="submit"
            value="Salvar"
        >

    </form>

    <a 
        class="excluir"
        href="editar.php?excluir=<?php echo $dados['id']; ?>"
    >
        Excluir Usuario
    </a>

</div>

</body>

</html>