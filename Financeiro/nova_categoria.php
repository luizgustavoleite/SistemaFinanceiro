<?php
    require_once '../DAO/CategoriaDAO.php';
    
    if (isset($_POST['btnGravar'])) {
        $nome = $_POST['nome'];

        $objdao = new CategoriaDAO();
        $ret = $objdao->CadastrarCategoria($nome);
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
                        <h2>Nova Categoria</h2>
                        <h5>Aqui você poderá cadastras todas as suas categorias financeiras. Exemplo: Conta de luz</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="nova_categoria.php">
                <div class="form-group">
                    <label>Nome da categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da categoria" maxlength="35" />
                </div>
                <button class="tn btn-success" name="btnGravar" onclick="return ValidarCategoria()" >Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>