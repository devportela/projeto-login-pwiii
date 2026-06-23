<?php

require "../php/Usuario.class.php";

$usuario = new Usuario();

$con = $usuario->conecta();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tabela de Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<?php

if (!$con) {

    echo "Banco indisponível. Tente mais tarde!";
    exit();

} else {

    echo "<a href='../php/cadastrar.php' class='btn btn-success my-3'>
            Novo Usuário
          </a>";

    $usuarios = $usuario->listarUsuarios();

    if (empty($usuarios)) {

        echo "<div class='alert alert-warning'>
                Não há usuários para listar!
              </div>";

    } else {

        $table = '<table class="table table-striped">';

        $table .= '<thead>';

        $table .= '<tr>';
        $table .= '<th>Selecionar Usuário</th>';
        $table .= '<th>Código</th>';
        $table .= '<th>Nome</th>';
        $table .= '<th>Email</th>';
        $table .= '<th>Ações</th>';
        $table .= '<th></th>';
        $table .= '</tr>';

        $table .= '</thead>';

        $table .= '<tbody>';

        foreach ($usuarios as $item) {

            $id = $item['id'];
            $nome = $item['nome'];
            $email = $item['email'];

            $table .= '<tr>';

            $table .= '<td>
                        <input type="checkbox" value="'.$id.'">
                       </td>';

            $table .= '<td>'.$id.'</td>';
            $table .= '<td>'.$nome.'</td>';
            $table .= '<td>'.$email.'</td>';

            $table .= '<td>
                        <a class="btn btn-info"
                           href="editar.php?id='.$id.'">
                           Editar
                        </a>
                       </td>';

            $table .= '<td>
                        <a class="btn btn-danger"
                           href="excluir.php?id='.$id.'">
                           Excluir
                        </a>
                       </td>';

            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        echo $table;
    }
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>