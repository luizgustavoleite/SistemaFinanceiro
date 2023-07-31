<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao{

    public function CadastrarContas($nome, $agencia, $numero, $saldo){
        if (trim($nome) == '' || trim($agencia) == '' || trim($numero) == ''|| trim($saldo) == ''){
            return 0;
        }

        //Passo 1: criar uma variável que receberá o obj conexao
        $conexao = parent::retornarConexao();

        //Passo 2: criar uma variável que receberá o texto do comando SQL que deverá ser executado no 
        //banco de dados
        $comando_sql = 'insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
                        values (?, ?, ?, ?, ?);';

        //Passo 3: Criar um objeto que será configurado e levado no Banco de dados para ser executado
        $sql = new PDOStatement();

        //Passo 4: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //Passo 5: Verificar se no comando_sql exite o "?" para ser configurado. Se tiver, configurar os bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            //Passo 6: Executar no banco de dados.
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    
    }

    public function ConsultarContas(){
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta
        from tb_conta
        where id_usuario = ?
        order by banco_conta ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();

    }

    public function DetalharContas($idConta)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta
                        from tb_conta
                        where id_conta=? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlterarContas($nome, $agencia, $numero, $saldo, $idConta)
    {

        if (trim($nome) == '' || trim($agencia) == '' || trim($numero) == '' || trim($saldo) == '' || $idConta == '') {
            return 0;
        }
        else{ 

        $conexao = parent::retornarConexao();
        $comando_sql = 'update tb_conta 
                        set banco_conta = ?, agencia_conta = ?, numero_conta = ?, saldo_conta = ?
                        where id_conta = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
         }}
    }

    public function ExcluirContas($idConta){
        $conexao = parent::retornarConexao();

        $comando_sql = 'delete from tb_conta where id_conta = ? and id_usuario = ?;';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try{
            $sql->execute();
            return 1;


        }catch(Exception $ex){
            return -4;
        }
    }
}