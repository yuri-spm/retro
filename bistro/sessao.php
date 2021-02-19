<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    session_start();
    include __DIR__."/Source/Classes/Pessoa";
    $_SESSION ['confirmacao_pedido'] = "Pedido confirmado!";
    $_SESSION ['confirmacao_cadastro'] = "Cadastro efetuado com sucesso!";
    $_SESSION ['confirmacao_nome'] = $_POST['nome'];

       
    
    
    
    ?>




</body>
</html>