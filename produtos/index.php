<?php
    include_once "../config.php";

    include_once "../conexao.php";

    if (isset($_GET['inativo'])) {
        $inativo = $_GET['inativo'];
        if ($inativo == 1) {
            $sql = "SELECT p.*, e.quantidade FROM produto p JOIN vw_estoque e ON p.produto_id = e.produto_id";
        } else {
            $sql = "SELECT p.*, e.quantidade FROM produto p JOIN vw_estoque e ON p.produto_id = e.produto_id WHERE p.ativo = 1";
        }
    } else {
        $inativo = 0;
        $sql = "SELECT p.*, e.quantidade FROM produto p JOIN vw_estoque e ON p.produto_id = e.produto_id WHERE p.ativo = 1";
    }
    
    $dados_produtos = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <?php
            include_once "../common/head.php";
        ?>
    </head>

    <body class="">
        <div class="wrapper ">
            <?php
            include_once "../common/sidebar.php";
            ?>

            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Lista de Produtos</a>
                    </div>
                    </div>
                </nav>
                <!-- End Navbar -->

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Produtos</h4>
                                    <p class="card-category">Gerencie os Produtos</p>
                                    <a href="index.php?inativo=<?= $inativo == 1 ? "0" : "1" ?>" style="float: left;">
                                        <button type="button" class="btn pull-right" style="background-color: #eeeeee; color: #9c27b0">
                                            <?= $inativo == 1 ? "Ocultar Inativos" : "Mostrar Inativos" ?>
                                        </button>
                                    </a>
                                    <a href="form.php" style="float: right;">
                                        <button type="button" class="btn pull-right" style="background-color: #eeeeee; color: #9c27b0">Cadastrar</button>
                                    </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                    <th>ID</th>
                                                    <th>Descrição</th>
                                                    <th>Fabricante</th>
                                                    <th>Quantidade</th>
                                                    <th>Ativo</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($dados_produtos as $produto):
                                                    ?>
                                                    <tr>
                                                        <td><?=$produto['produto_id']?></td>
                                                        <td><?=$produto['descricao']?></td>
                                                        <td><?=$produto['fabricante']?></td>
                                                        <td><?=$produto['quantidade']?></td>
                                                        <td><?=$produto['ativo'] == 1 ? "Sim" : "Não" ?></td>
                                                        <td>
                                                            <a href="form.php?id=<?=$produto['produto_id']?>">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="excluir.php?id=<?=$produto['produto_id']?>">
                                                            <i class="material-icons">delete</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
                    include_once "../common/footer.php";
                ?>
            </div>
        </div>
        
        <?php
            include_once "../common/scripts.php";
        ?>
    </body>
</html>
