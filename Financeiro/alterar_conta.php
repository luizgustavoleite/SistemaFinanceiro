<?php
require_once '../DAO/ContaDAO.php';

$dao = new ContaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $idConta = $_GET['cod'];

    $dados = $dao->DetalharContas($idConta);

    // Tratamento para verificar se existe alguma informação dentro do Array $dados
    if (count($dados) == 0) {
        header('location: consultar_conta.php');
        exit;
    }
} else if (isset($_POST['btnGravar'])) {
    $idConta = $_POST['cod'];
    $bancoConta = ltrim(trim($_POST['nome']));
    $agenciaConta = ltrim(trim($_POST['agencia']));
    $numeroConta = ltrim(trim($_POST['numero']));
    $saldoConta = ltrim(trim($_POST['saldo']));

    $ret = $dao->AlterarContas($bancoConta, $agenciaConta, $numeroConta, $saldoConta, $idConta);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} 
else if (isset($_POST['btnExcluir'])) {
    $idConta = $_POST['cod'];
    $ret = $dao->ExcluirContas($idConta);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
}
else {
    header('location: consultar_conta.php');
    exit;
}






?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once "_head.php"
?>

<body>
    <div id="wrapper">
        <?php
        include_once "_topo.php";
        include_once "_menu.php";
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once  '_msg.php' ?>
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar ou excluir suas contas bancárias</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="alterar_conta.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                    <div class="form-group">
                        <label>Nome do banco*</label>
                        <input type="text" class="form-control" name="nome" id="banco" placeholder="Digite o nome do banco..." value="<?= $dados[0]['banco_conta'] ?>" maxlength="35"/>
                    </div>
                    <div class="form-group">
                        <label>Agência*</label>
                        <input type="number" class="form-control" name="agencia" id="agencia" placeholder="Digite o nome da agência..." value="<?= $dados[0]['agencia_conta'] ?>" maxlength="35"/>
                    </div>
                    <div class="form-group">
                        <label>Número da conta*</label>
                        <input type="number" class="form-control" name="numero" id="numero" placeholder="Digite o número da conta..." value="<?= $dados[0]['numero_conta'] ?>" maxlength="35"/>
                    </div>
                    <div class="form-group">
                        <label>Saldo da conta*</label>
                        <input class="form-control" name="saldo" id="saldo" placeholder="Digite o saldo da conta..." value="<?= $dados[0]['saldo_conta'] ?>" maxlength="35"/>
                    </div>
                    <button class="btn btn-warning" name="btnGravar" onclick="return ValidarConta()">Gravar</button>
                    <!-- <button class="tn btn-danger" name="btnExcluir">Excluir</button> -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">
                        Excluir
                    </button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a conta: <b> <?= $dados[0]['banco_conta'] ?>, <?= $dados[0]['agencia_conta'] ?>, <?= $dados[0]['numero_conta'] ?></b>? </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button class="btn btn-primary" name="btnExcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>