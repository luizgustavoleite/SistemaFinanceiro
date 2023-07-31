<?php

require_once '../DAO/ContaDAO.php';

$dao = new ContaDAO();
$contas = $dao->ConsultarContas();

// echo '<pre>';
// print_r($contas);
// echo '</pre>';


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once "_head.php";
?>

<body>
    <div id="wrapper">
        <?php
        include_once "_topo.php";
        include_once "_menu.php";
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once  '_msg.php'; ?>
                        <h2>Consultar Contas</h2>
                        <h5>Consulte todas suas contas aqui. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span> Contas Cadastradas. Caso deseje alterar, clique no botão "Alterar"</spam>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Banco</th>
                                                <th>Agência</th>
                                                <th>Número da Conta</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($contas); $i++) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $contas[$i]['banco_conta'] ?></td>
                                                    <td><?= $contas[$i]['agencia_conta'] ?></td>
                                                    <td><?= $contas[$i]['numero_conta'] ?></td>
                                                    <td><?= $contas[$i]['saldo_conta'] ?></td>
                                                    <td>
                                                        <a href="alterar_conta.php?cod=<?= $contas[$i]['id_conta'] ?>" class="btn btn-warning btn-sm">Consultar</a>
                                                    </td>
                                                </tr>
                                            <?php  } ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>