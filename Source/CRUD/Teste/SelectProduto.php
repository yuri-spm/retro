<?php
    require_once("Databases.php");
        
        $cmd = $pdo->query("SELECT * FROM produto");
        $result = $cmd -> fetch(PDO::FETCH_ASSOC);

        foreach($result as $key=>$value){
            var_dump($result);
        }


    $res = array();
    $cmd = $pdo->query("SELECT * FROM produto ORDER BY id ASC");
    $res = $cmd-> fetch(PDO::FETCH_ASSOC);
