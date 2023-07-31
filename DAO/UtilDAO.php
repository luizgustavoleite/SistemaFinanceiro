<?php

    class UtilDAO{

        private static function IniciarSessao(){
            if(!isset($_SESSION)){
                session_start();
            }
        }

        public static function CriarSessao($cod, $nome){
            // Comando self chama uma Função Estática
            self::IniciarSessao();
    
            // Comando que identifica o numero e o nome do usuário que está realizando o acesso ao sistema
            $_SESSION['cod'] = $cod;
            $_SESSION['nome'] = $nome;
        }

        public static function CodigoLogado(){
            self::IniciarSessao();
            return $_SESSION['cod'];
        }

        public static function NomeLogado(){
            self::IniciarSessao();
            return $_SESSION['nome'];
        }

        public static function Deslogar(){
            self::IniciarSessao();
            unset($_SESSION['cod']);
            unset($_SESSION['nome']);

            header('location: login.php');
            exit;
        }

        public static function VerfificarLogado(){
            self::IniciarSessao();
            if(!isset($_SESSION['cod']) || $_SESSION['cod'] == ''){
                header('location: login.php');
                exit;
            }
        }
    }