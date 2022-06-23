<?php
include_once "../config.php";

include_once "../conexao.php";

$sql = 'SELECT produto_id, descricao FROM produto WHERE ativo = 1';
$dados_produtos = $connect->query($sql);

$success = "";
if (isset($_GET['success'])) {
    $success = $_GET['success'];
}

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
                        <h3>Retirar Produto</h3>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <?php if ($success == 1) : ?>
                                <div class="alert alert-success" role="alert">
                                    Produto retirado com sucesso!
                                </div>
                            <?php elseif ($success == 0) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Erro ao retirar produto!
                                </div>
                            <?php endif ?>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Retirar produto do estoque</h4>
                                    <p>Preencha os campos</p>
                                </div>
                                <div class="card-body">
                                    <form action="salvar.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Produto*</label>
                                                    <select class="form-control" name="produto_id" required>
                                                        <option disabled selected value> -- selecione um produto -- </option>
                                                        <?php foreach ($dados_produtos as $produto) : ?>
                                                            <option value="<?= $produto['produto_id'] ?>">
                                                                <?= $produto['descricao'] ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Quantidade*</label>
                                                    <input type="number" step="1" min="1" value="1" class="form-control" name="quantidade" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Data Saida*</label>
                                                    <input type="date" class="form-control" name="data_saida" required value="<?= date('Y-m-d') ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                    <div class="form-group">
                                                    <label>Lote*</label>
                                                    <input type="number" class="form-control" name="lote" required />
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                                        <a href="index.php"><button type="button" class="btn btn-primary pull-right">Voltar</button></a>
                                        <div class="clearfix"></div>
                                    </form>
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