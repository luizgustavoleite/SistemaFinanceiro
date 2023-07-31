<?php

require_once '../DAO/UsuarioDAO.php';

// Objeto Global
$objdao = new UsuarioDAO();


if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $ret = $objdao->GravarMeusDados($nome, $email);
}

$dados = $objdao->CarregarMeusDados();


// echo '<pre>';
// print_r($dados);
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

                        <?php include_once '_msg.php'; ?>
                        <h2>Meus Dados.</h2>

                        <h5>Nesta página você poderá alterar seus dados. </h5>

                        <form method="post" action="meusdados.php">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" placeholder="Digite seu nome" name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" placeholder="Digite seu e-mail" name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>" />
                            </div>

                            <button type="submit" onclick="return ValidarMeusDados()" class="tn btn-success" name="btnGravar">Gravar</button>

                        </form>

                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>



</body>

</html>