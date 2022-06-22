<?php
include_once "../config.php";

include_once "../conexao.php";

if (isset($_GET['lote'])) {
    $id = $_GET['lote'];

    $sql = 'SELECT DISTINCT lote, data_compra FROM entradas WHERE lote = ' . $id;
    $dados_lote = $connect->query($sql);

    $sql = 'SELECT * FROM vw_lote_detalhe WHERE lote = ' . $id;
    $dados_produtos = $connect->query($sql);

    foreach ($dados_lote as $dado) {
        $lote = $dado;
    }
} else {
    echo "<script type='javascript'>alert('Não foi possível encontrar o lote');</script>";
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
                        <h3> Detalhamento do Lote </h3>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Detalhes do Lote</h4>
                                </div>
                                <div class="card-body">
                                    <form action="salvar.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lote:</label>
                                                    <input disabled type="text" class="form-control" name="lote" value="<?= $id ? $lote['lote'] : "" ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Data Compra:</label>
                                                    <input disabled type="text" class="form-control" name="data_compra" value="<?= $id ? date_format(date_create($lote['data_compra']), "d/m/Y") : "" ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </form>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>ID</th>
                                                <th>Produto</th>
                                                <th>Data Validade</th>
                                                <th>Qtd Entrada</th>
                                                <th>Qtd Saida</th>
                                                <th>Qtd Restante</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($dados_produtos as $produto) :
                                                ?>
                                                    <tr>
                                                        <td><?= $produto['produto_id'] ?></td>
                                                        <td><?= $produto['descricao'] ?></td>
                                                        <td><?= $produto['data_validade'] ? date_format(date_create($produto['data_validade']), "d/m/Y") : "" ?></td>
                                                        <td><?= $produto['qtd_entrada'] ?></td>
                                                        <td><?= $produto['qtd_saida'] ?></td>
                                                        <td><?= $produto['qtd_final'] ?></td>
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