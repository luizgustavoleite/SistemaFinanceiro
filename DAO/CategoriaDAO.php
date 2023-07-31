<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao
{

    public function CadastrarCategoria($nome)
    {
        if (trim($nome) == '') {
            return 0;
        }

        //Passo 1: criar uma variável que receberá o obj conexao
        $conexao = parent::retornarConexao();

        // Passo 2: criar uma variável que receberá o texto do comando SQL que deverá ser executado no BD
        $comando_sql = 'insert into tb_categoria (nome_categoria,id_usuario) 
                        values (?, ?);';

        //Passo 3: Criar um objeto que será configurado e levado no Banco de dados para ser executado
        $sql = new PDOStatement();

        //Passo 4: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //Passo 5: Verificar se no comando_sql exite o "?" para ser configurado. Se tiver, configurar os bindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            //Passo 6: Executar no banco de dados.
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarCategoria($nome, $idCategoria)
    {

        if (trim($nome) == '' || $idCategoria == '') {
            return 0;
        }else{ 

        $conexao = parent::retornarConexao();
        $comando_sql = 'update tb_categoria set nome_categoria = ? where id_Categoria = ? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $idCategoria);
        $sql->bindValue(3, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }}
    }

    public function ExcluirCategoria($idCategoria){
        if($idCategoria == ''){
            return 0;
        }else{ 
        $conexao = parent::retornarConexao();
        $comando_sql = 'delete from tb_categoria where id_categoria=? and id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try{
            $sql->execute();

            return 1;
        }
        catch(Exception $ex){
            return -4;

        } }
    }

    public function ConsultarCategoria()
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_categoria, nome_categoria
                        from tb_categoria
                        where id_usuario = ?
                        order by nome_categoria ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_categoria, nome_categoria 
                        from tb_categoria 
                        where id_categoria=? and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
}
