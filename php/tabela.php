<?php
require "Usuario.class.php";

$usuario = new Usuario();

$con = $usuario->conecta();

if($con){

    $user = $usuario->listarUsuarios();

    if(empty($user)){

        echo "Não ha usuarios para listar!";

    }else{
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tabela de Usuarios</title>

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
        }

        h1{
            text-align: center;
            color: #0066cc;
            margin-bottom: 20px;
        }

        table{
            border-collapse: collapse;
            width: 700px;
        }

        th, td{
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th{
            background: #0066cc;
            color: white;
        }

        tr:nth-child(even){
            background: #f5f9ff;
        }

        a{
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
        }

        a:hover{
            text-decoration: underline;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Usuarios Cadastrados</h1>

    <table>

        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php
        foreach($user as $item){
        ?>

        <tr>

            <td><?php echo $item['id']; ?></td>

            <td><?php echo $item['nome']; ?></td>

            <td><?php echo $item['email']; ?></td>

            <td><?php echo $item['senha']; ?></td>

            <td>
                <a href="editar.php?id=<?php echo $item['id']; ?>">
                    Editar
                </a>
            </td>

            <td>
                <a href="excluir.php?id=<?php echo $item['id']; ?>">
                    Excluir
                </a>
            </td>

        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>

</html>

<?php
    }

}else{

    echo "Banco indisponivel. Tente mais tarde!";
}
?>