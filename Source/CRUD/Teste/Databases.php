<?php

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

    

    