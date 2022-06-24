<?php
include_once "../config.php";

include_once "../conexao.php";

$sql = "SELECT * FROM vw_lote_total";
$dados_lotes = $connect->query($sql);
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
                        <a class="navbar-brand" href="javascript:;">Listagem de Lotes</a>
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
                                    <h4 class="card-title ">Lotes</h4>
                                    <p class="card-category">Gerencie seus Lotes</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>Lote</th>
                                                <th>Data_Compra</th>
                                                <th>Qtd Entrada</th>
                                                <th>Qtd Saida</th>
                                                <th>Qtd Final</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($dados_lotes as $lote) :
                                                ?>
                                                    <tr>
                                                        <td><?= $lote['lote'] ?></td>
                                                        <td><?= date_format(date_create($lote['data_compra']), "d/m/Y") ?></td>
                                                        <td><?= $lote['qtd_entrada'] ?></td>
                                                        <td><?= $lote['qtd_saida'] ?></td>
                                                        <td><?= $lote['qtd_final'] ?></td>
                                                        <td>
                                                            <a href="detalhar.php?lote=<?= $lote['lote'] ?>">
                                                                <i class="material-icons">search</i>
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