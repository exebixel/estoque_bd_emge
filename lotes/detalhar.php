<?php    
    include_once "../config.php";

    include_once "../conexao.php";

    if (isset($_GET['lote'])){
        $id = $_GET['lote'];

        $sql = 'SELECT DISTINCT lote, data_compra FROM entradas WHERE'
        $dados_lote = $connect->query($sql);

        $sql = 'SELECT * FROM vw_lote_detalhe WHERE lote = ' .$lote;
        $dados_produtos = $connect->query($sql);

        // foreach ($dados_lote as $dado){
        //     $infos = $dado;
        // }
    }else{
        $id = 0;
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
                            <?= $id ? "<h3>Editar</h3>" : "<h3>Cadastrar</h3>" ?>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <form class="navbar-form">
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </form>
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
                                        <h4 class="card-title">Dados</h4>
                                        <p class="card-category"><?= $id ? "Preencha somente os campos que quiser atualizar" : "Complete os campos"?></p>
                                    </div>
                                    <div class="card-body">
                                        <form action="salvar.php" method="post">
                                            <input type="hidden" name="id" value="<?=$id?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Ativo</label>
                                                        <select class="form-control" name="ativo">
                                                            <option value="1" <?= $id && $infos['ativo'] == 1 ? "selected" : "" ?>>Sim</option>
                                                            <option value="0" <?= $id && $infos['ativo'] == 0 ? "selected" : "" ?>>Não</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Descrição</label>
                                                        <input type="text" class="form-control" name="descricao" value="<?= $id ? $infos['descricao'] : "" ?>" <?= $id ? "" : "required" ?>/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Fabricante</label>
                                                        <input type="text" class="form-control" name="fabricante" value="<?= $id ? $infos['fabricante'] : "" ?>"/>
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
