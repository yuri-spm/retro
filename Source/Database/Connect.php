<?php

namespace Source\Database;

use \PDO;
use \PDOException;


 //conexao BD1

class Connect{

    private const HOST = "localhost";

    private const USER = "root";
    private const PASSWD = "";



    private const DBNAME = "db_retro";
    
    private const OPTION =[
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
            
    ];

    private static $instance;

    public static function getInstance():PDO
    {
        if(empty(self::$instance)){
            try{
                self::$instance = new PDO(
                    "mysql:host=". self::HOST. ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTION
                );
                //echo "<p class='acept'>Conectado com sucesso</p>";
            }catch(PDOException $execption){
                die("<p class='alert alert-info'>Erro ao conectar</p>");
                var_dump($execption);
            }
        }
        return self::$instance;
    }    
        final private function __construct(){

        }
        final private function __clone(){

        }
   




}
/*


 //conexao BD2
class Connect
{
    private $pdo;
    //6 funções

    //CONEXAO COM O BANCO DE DADOS
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha,
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //dbname = nome do banco dedados
            //host = endereço do servidor
            //username = usuario
            //senha

          //pega o erro e coloca dentro da variavel $e
        } catch (PDOException $e) {
            echo "Erro com banco de dados: {$e->getMessage()}";

            exit();
        } catch (Exception $e) {
            echo "Erro generico: {$e->getMessage()}";
        }
    }
}



 

 //conexao BD3


    try{
        $pdo = new PDO("mysql:host=localhost;dbname=db_retro",
            "yuri",
            "7q5eb6eb@#",
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]);
        $pdo->setAttribute(   PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //dbname = nome do banco dedados
        //host = endereço do servidor
        //username = usuario
        //senha
    }catch(PDOException $e){
        echo "Erro com banco de dados: {$e->getMessage()}";

    }catch(Exception $e){
        echo "Erro generico: {$e->getMessage()}";
    }

*/