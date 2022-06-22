<?php
include_once "../conexao.php";

$nota_fiscal = $_POST['nota_fiscal'];
if ($nota_fiscal == "") {
    $nota_fiscal = null;
}

$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];
$valor_unitario = $_POST['valor_unitario'];
$data_compra = $_POST['data_compra'];
$data_validade = $_POST['data_validade'];
if ($data_validade == "") {
    $data_validade = null;
}

try {
    $sql = $connect->prepare('INSERT INTO entradas(nota_fiscal, produto_id, quantidade, valor_unitario, data_compra, data_validade) VALUES (:nota_fiscal,:produto_id,:quantidade,:valor_unitario,:data_compra,:data_validade)');
    $sql->bindValue(':nota_fiscal', $nota_fiscal);
    $sql->bindValue(':produto_id', $produto_id);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':valor_unitario', $valor_unitario);
    $sql->bindValue(':data_compra', $data_compra);
    $sql->bindValue(':data_validade', $data_validade);
    $sql->execute();

    Header('Location: index.php?success=1');
} catch (PDOException $e) {
    // echo $e->getMessage();
    Header('Location: index.php?success=0');
}

// var_dump($sql);
