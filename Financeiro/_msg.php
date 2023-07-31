<?php


// Retorna o ret para pagina de consulta, assim a mensgem éemitida na tela para o usuário. Registrando a operação.
if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {
    switch ($ret) {
        case 0:
            echo '<div class="alert alert-warning">
                        Preencher o(s) campo(s) obrigatório(s)
                </div>';
            break;
        case 1:
            echo '<div class="alert alert-success">
                        Ação realizada com sucesso!
                </div>';
            break;
        case -1:
            echo '<div class="alert alert-danger">
                    Ocorreu um erro na operação. Tente novamente mais tarde!
                </div>';
            break;
        case -2:
            echo '<div class="alert alert-warning">
                    A senha deve conter no mínimo 6 caracteres!
                </div>';
            break;
        case -3:
            echo '<div class="alert alert-warning">
                    As senhas devem ser iguais!
                </div>';
            break;
        case -4:
            echo '<div class="alert alert-danger">
                            O registro não poderá ser excluído, pois está em uso!
                        </div>';
            break;
            case -5:
                echo '<div class="alert alert-danger">
                                E-mail já cadastrado! 
                            </div>';
                break;
            case -6:
                echo '<div class="alert alert-danger">
                                Usuário não encontrado!
                            </div>';
                break;
    }
}
