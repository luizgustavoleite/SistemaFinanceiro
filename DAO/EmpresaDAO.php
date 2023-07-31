<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class EmpresaDAO extends Conexao
    {

        public function CadastrarEmpresas($nome, $telefone, $endereco)
        {
            if (trim($nome) == '') {
                return 0;
            }
            //Passo 1: criar uma variável que receberá o obj conexao
            $conexao = parent::retornarConexao();

            //Passo 2: criar uma variável que receberá o texto do comando SQL que deverá ser executado no 
            //banco de dados
            $comando_sql = 'insert into tb_empresa 
                            (nome_empresa,telefone_empresa,endereco_empresa,id_usuario) 
                            values (?, ?, ?, ?);';

            //Passo 3: Criar um objeto que será configurado e levado no Banco de dados para ser executado
            $sql = new PDOStatement();

            //Passo 4: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql
            $sql = $conexao->prepare($comando_sql);

            //Passo 5: Verificar se no comando_sql exite o "?" para ser configurado. Se tiver, configurar os bindValues
            $sql->bindValue(1, $nome);
            $sql->bindValue(2, $telefone);
            $sql->bindValue(3, $endereco);
            $sql->bindValue(4, UtilDAO::CodigoLogado());

            try {
                //Passo 6: Executar no banco de dados.
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }

        public function AlterarEmpresas($nome, $telefone, $endereco, $idEmpresa){
            if($nome == '' || $telefone == '' || $endereco == '' || $idEmpresa == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'update tb_empresa set nome_empresa = ?, telefone_empresa = ?, endereco_empresa = ? where id_empresas = ? and id_usuario = ?;';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $telefone);
                $sql->bindValue(3, $endereco);
                $sql->bindValue(4, $idEmpresa);
                $sql->bindValue(5, UtilDAO::CodigoLogado());

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }    

        public function ExcluirEmpresas($idEmpresa)
        {
            if ($idEmpresa == '') {
                return 0;
            } else {
                $conexao = parent::retornarConexao();
                $comando_sql = 'delete 
                        from tb_empresa 
                        where id_empresas= ? and id_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $idEmpresa);
                $sql->bindValue(2, UtilDAO::CodigoLogado());

                try {
                    $sql->execute();

                    return 1;
                } catch (Exception $ex) {
                    return -4;
                }
            }
        }

        public function ConsultarEmpresas()
        {
            $conexao = parent::retornarConexao();

            $comando_sql = 'select id_empresas, nome_empresa, telefone_empresa, endereco_empresa
            from tb_empresa
            where id_usuario = ?
            order by nome_empresa ASC';

            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, UtilDAO::CodigoLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function DetalharEmpresas($idEmpresa)
        {
            $conexao = parent::retornarConexao();
            $comando_sql = 'select id_empresas, nome_empresa, telefone_empresa, endereco_empresa
                            from tb_empresa
                            where id_empresas=? and id_usuario = ?';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $idEmpresa);
            $sql->bindValue(2, UtilDAO::CodigoLogado());
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
        }
    }
