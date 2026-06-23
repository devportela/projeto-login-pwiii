<?php

require "Usuario.class.php";

$usuario = new Usuario();

$con = $usuario->conecta();

if(!$con){
    echo "Banco indisponível";
    exit();
}

if(!isset($_GET['id'])){
    echo "ID não informado";
    exit();
}

$id = $_GET['id'];

$sql = $con->prepare("DELETE FROM usuario WHERE id = :id");
$sql->bindValue(":id", $id);

if($sql->execute()){
    header("Location: tabela.php");
    exit();
}else{
    echo "Erro ao excluir usuário";
}