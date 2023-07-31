<?php

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/ContaDAO.php';
require_once '../DAO/EmpresaDAO.php';

$dao_cat = new CategoriaDAO();
$dao_emp = new EmpresaDAO();
$dao_con = new ContaDAO();

if (isset($_POST['btnGravar'])) {
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];
    $empresa = $_POST['empresa'];
    $conta = $_POST['conta'];
    $obs = $_POST['obs'];

    $objdao = new MovimentoDAO();
    $ret = $objdao->RealizarrMovimentos($tipo, $data, $valor, $categoria, $empresa, $conta, $obs);
}

$categorias = $dao_cat->ConsultarCategoria();
$empresas = $dao_emp->ConsultarEmpresas();
$contas = $dao_con->ConsultarContas();



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

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você pode realizar seus movimentos de entrada ou saída financeira</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="realizar_movimento.php">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Tipo do movimento</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data</label>
                            <input type="date" class="form-control" name="data" id="data" />
                        </div>
                        <div class="form-group">
                            <label>Valor do movimento</label>
                            <input type="text" class="form-control" name="valor" id="valor" placeholder="Digite o valor do movimento..." maxlength="35"/>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                <?php foreach ($categorias as $item) { ?>
                                    <option value="<?= $item['id_categoria'] ?>">
                                        <?= $item['nome_categoria'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <select class="form-control" name="empresa" id="empresa">
                                <option value="">Selecione</option>
                                <?php foreach ($empresas as $item) { ?>
                                    <option value="<?= $item['id_empresas'] ?>">
                                        <?= $item['nome_empresa'] ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Conta</label>
                            <select class="form-control" name="conta" id="conta">
                                <option value="">Selecione</option>
                                <?php foreach ($contas as $item) { ?>
                                    <option value="<?= $item['id_conta'] ?>">
                                        <?= 'Banco: ' . $item['banco_conta'] . ', Agência: ' . $item['agencia_conta'] . ' / Número: ' . $item['numero_conta'] . ' - Saldo: R$ ' . $item['saldo_conta'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Observação (opcional)</label>
                            <textarea name="obs" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="btnrealizarmov">
                            <button class="tn btn-success" name='btnGravar' onclick="return ValidarMovimento()">Finalizar lançamento</button>
                        </div>
                </form>

            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>