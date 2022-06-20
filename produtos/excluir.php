<?php   
    include_once "../conexao.php";

    $id = $_GET['id'];

    $sql = 'UPDATE produto SET ativo = 0 WHERE produto_id = ' . $id;

    $connect->exec($sql);

    Header('Location: index.php');
?>