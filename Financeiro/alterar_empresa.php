<?php

require_once '../DAO/EmpresaDAO.php';

$dao = new EmpresaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $idEmpresa = $_GET['cod'];

    $dados = $dao->DetalharEmpresas($idEmpresa);

    // Tratamento para verificar se existe alguma informação dentro do Array $dados
    if (count($dados) == 0) {
        header('location: consultar_empresa.php');
        exit;
    }
} else if (isset($_POST['btnGravar'])) {
    $idEmpresa = $_POST['cod'];
    $nomeEmpresa = ltrim(trim($_POST['nome']));
    $teleEmpresa = ltrim(trim($_POST['telefone']));
    $enderecoEmpresa = ltrim(trim($_POST['endereco']));

    $ret = $dao->AlterarEmpresas($nomeEmpresa, $teleEmpresa, $enderecoEmpresa, $idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnExcluir'])) {
    $idEmpresa = $_POST['cod'];
    $ret = $dao->ExcluirEmpresas($idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_empresa.php');
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
                        <?php include_once  '_msg.php'; ?>
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá cadastrar ou excluir todas as suas empresas. Exemplo: Conta de luz</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="alterar_empresa.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresas'] ?>">
                    <div class="form-group">
                        <label>Nome da empresa*</label>
                        <input class="form-control" name="nome" id="nome" placeholder="Digite o nome da empresa..." value="<?= $dados[0]['nome_empresa'] ?>" maxlength="35" />
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="number" class="form-control" name="telefone" placeholder="Digite o telefone da empresa..." value="<?= $dados[0]['telefone_empresa'] ?>" maxlength="35" />
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" placeholder="Digite o endereço da empresa..." value="<?= $dados[0]['endereco_empresa'] ?>" maxlength="35" />
                    </div>
                    <button class="btn btn-warning" name="btnGravar" onclick="return ValidarEmpresa()">Salvar</button>
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
                                    Deseja excluir a empresa: <b> <?= $dados[0]['nome_empresa'] ?></b>? </div>
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