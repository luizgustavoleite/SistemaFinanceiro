<?php

require_once '../DAO/ContaDAO.php';

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero'];
    $saldo = $_POST['saldo'];

    $objdao = new ContaDAO();
    $ret = $objdao->CadastrarContas($nome, $agencia, $numero, $saldo);
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
                        <?php include_once '_msg.php' ?>
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas contas</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="nova_conta.php">
                <div class="form-group">
                    <label>Nome do banco*</label>
                    <input type="text" class="form-control" name="nome" id="banco" placeholder="Digite o nome do banco..." maxlength="35" />
                </div>
                <div class="form-group">
                    <label>Agência*</label>
                    <input type="number" class="form-control" name="agencia" id="agencia" placeholder="Digite o nome da agência..." maxlength="35" />
                </div>
                <div class="form-group">
                    <label>Número da conta*</label>
                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Digite o número da conta..." maxlength="35" />
                </div>
                <div class="form-group">
                    <label>Saldo da conta*</label>
                    <input type="number" class="form-control" name="saldo" id="saldo" placeholder="Digite o saldo da conta..." maxlength="35"/>
                </div>
                <button class="tn btn-success" name="btnGravar" onclick="return ValidarConta()" >Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>