<?php
    //session_start();
    require_once __DIR__."/CRUD/Databases.php";
  
    
  




    //-----------------------------INSERINDO COMANDO SQL A UMA VARIAVEL ------------------------------
    try{     
        
         //----------------------CADASTRO NOME E EMAIL DO FUNCIONARIO------------------------------------------
         //$cadastro = filter_input(INPUT_POST , 'cadastro', FILTER_SANITIZE_STRING);
         //if($cadastro){
            $nome1 = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email1 = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $cpf1 = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

                          
            $sql_func ="INSERT INTO cliente(nome, email, cpf) VALUES (:n,:e,:c)";
 
            $resp_f = $pdo->prepare($sql_func);
            if(!empty($nome1)){

            

        
            $resp_f->bindValue(":n", $nome1);
            $resp_f->bindValue(":e", $email1);
            $resp_f->bindValue(":c", $cpf1);
            $resp_f->execute();
            }else{
              header("Location: cadastro.php");
            }
         
          //$pdo->prepare($sql_func)->execute([$nome1, $email1, $cpf1]);
      //------------------------PEGANDO O ULTIMO ID INSERIDO----------------------------------------
           
       $sql = "SELECT * FROM cliente ORDER BY clie_id DESC";
          $sql = $pdo->query($sql);
          $row = $sql->fetch();
          $ultimo_id =$row['clie_id'];     
      
      //-------------------------CADASTRO ENDERECO CLIENTE -------------------------------------
 
      $rua1 = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
      $complemento1 = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
      $bairro1 = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
      $cidade1 = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
      $referencia1 =  filter_input(INPUT_POST, 'pontoReferencia', FILTER_SANITIZE_STRING);
      $cep1 = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
     
      $sql_func_endereco="INSERT INTO  clie_endereco (clie_id, rua,  complemento, bairro, cidade, cep, referencia)
      VALUES(:clie, :r, :co, :b, :c, :ce, :re)";

      $resp_endereco =$pdo->prepare($sql_func_endereco);

      if (!empty($ultimo_id)) {
        $resp_endereco->bindValue(":clie", $ultimo_id);
        $resp_endereco->bindValue(":r", $rua1);
        $resp_endereco->bindValue(":co", $complemento1);
        $resp_endereco->bindValue(":b", $bairro1);
        $resp_endereco->bindValue(":c", $cidade1);
        $resp_endereco->bindValue(":ce", $cep1);
        $resp_endereco->bindValue(":re", $referencia1);
        $resp_endereco->execute();
      }
     

 

         
      //$pdo->prepare($sql_func_endereco)->execute([$ultimo_id, $rua1, $complemento1, $bairro1, $cidade1, $cep1, $referencia1]);
     

      //------------------------CADASTRO TELEFONE FUNCIONARIO---------------------------------------
      $telefone1 = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
      $sql_func_telefone="INSERT INTO  clie_telefone (clie_id, tel_01)
      VALUES(:clie, :t)";

        if(!empty($telefone1)){
        $resp_telefone =$pdo->prepare($sql_func_telefone);
        $resp_telefone->bindValue(":clie", $ultimo_id);
        $resp_telefone->bindValue(":t", $telefone1);
        $resp_telefone->execute();
        }

        

      //$pdo->prepare($sql_func_telefone)->execute([$ultimo_id, $telefone1]);


  

        // }else{
          //   $_SESSION['msg'] = "<p style= 'color: red;'>MENSAGEM NÃO FOI ENVIADA</p>";
          //    header("Location: cadastro.php");
         //}

  

 

     
            //-----------------------------------MENSAGEM DE ERRO --------------------------------------------
    }catch(PDOException $erro){
        var_dump($erro);
    }catch(Exception $execption){
        var_dump($execption);
    }



   