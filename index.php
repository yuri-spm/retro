<?php

use Source\CRUD\Models;
use Source\CRUD\Models\UserModel;
require_once 'vendor/autoload.php';

$modelUser = new Models\UserModel();
$modelAddress = new Models\UserAddress();

$user = $modelUser;
$address = $modelAddress;



$user->bootstrap($_POST['nome'],$_POST['email'],$_POST['cpf']);

if(!$modelUser->find($user->email)){
    echo "<p class='trigger warning'>Cadastro</p>";
    $user->save();
}


$email = $_POST['email'];

$user_id = $user->find($email);

var_dump($user_id, $email);





$address->bootstrap($user_id->clie_id,$_POST['rua'], 5, $_POST['complemento'],$_POST['bairro'],$_POST['cidade'],$_POST['cep'],$_POST['pontoReferencia'],$_POST['telefone']);
var_dump($address, $_POST["telefone"]);


if(!$modelAddress->findTelefone($_POST["telefone"])){
    echo "<p class='trigger warning'>Cadastro</p>";
    $address->save();
} else {
    echo "<p class='trigger accept'>Read</p>";
    $address = $modelAddress->findTelefone($user->telefone);
}
var_dump($address);






