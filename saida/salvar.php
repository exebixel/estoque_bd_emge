<?php
include_once "../conexao.php";

$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];
$data_saida = $_POST['data_saida'];
$lote = $_POST['lote'];

$sql = $connect->prepare('SELECT entrada_id FROM entradas WHERE produto_id = :produto_id AND lote = :lote');
$sql->bindValue(':produto_id', $produto_id);
$sql->bindValue(':lote', $lote);
$sql->execute();
echo $sql->rowCount();

if (!$sql->rowCount()) {
    header('Location: index.php?success=0');
    exit();
}


try {
    $sql = $connect->prepare('INSERT INTO saidas(produto_id, quantidade, data_saida, lote) VALUES (:produto_id,:quantidade,:data_saida,:lote)');
    $sql->bindValue(':produto_id', $produto_id);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':data_saida', $data_saida);
    $sql->bindValue(':lote', $lote);
    $sql->execute();

    header('Location: index.php?success=1');
} catch (PDOException $e) {
    // echo $e->getMessage();
    header('Location: index.php?success=0');
}

// var_dump($sql);
