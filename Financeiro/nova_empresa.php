<?php

require_once '../DAO/EmpresaDAO.php';

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $objdao = new EmpresaDAO();
    $ret = $objdao->CadastrarEmpresas($nome, $telefone, $endereco);
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
                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá cadastras todas as suas empresas. Exemplo: Conta de luz</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="nova_empresa.php">
                <div class="form-group">
                    <label>Nome da empresa*</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da empresa..." maxlength="35"/>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="number" class="form-control" name="telefone" id="telefone" placeholder="Digite o telefone da empresa (opcional)" maxlength="35" />
                </div>
                <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o endereço da empresa (opcional)" maxlength="35" />
                </div>
                <button class="tn btn-success" name="btnGravar" onclick="return ValidarEmpresa()" >Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>