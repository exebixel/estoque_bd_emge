<?php   
    include_once "../conexao.php";
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }else{
        $id = 0;
    }

    if ($id){
        $campos = array();
        
        if(!empty($_POST['descricao'])){
            $descricao = $_POST['descricao'];
            $campos[]= " descricao='$descricao'";
        }
        if(!empty($_POST['fabricante'])){
            $fabricante = $_POST['fabricante'];
            $campos[]=" fabricante='$fabricante'";
        }
        if(!empty($_POST['ativo'])){
            $ativo = $_POST['ativo'];
            $campos[]=" ativo='$ativo'";
        }
        
        $sql = 'UPDATE produto SET' .implode(',', $campos). ' WHERE produto_id = ' . $id;
    }else {
        $descricao = $_POST['descricao'];
        $fabricante = $_POST['fabricante'];
        $ativo = $_POST['ativo'];
        
        $sql = 'INSERT INTO produto(descricao, fabricante, ativo) VALUES ("'. $descricao .'", "'. $fabricante .'", "'. $ativo .'")';
    }

    // var_dump($sql);
    $connect->exec($sql);

    Header('Location: index.php');
?>