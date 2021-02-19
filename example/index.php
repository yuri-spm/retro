<?php


use Source\CRUD\Models;
use Source\CRUD\Models\UserModel;
use Source\CRUD\Models\UserAddress;

require_once 'vendor/autoload.php';
/*
$model = new UserModel();


$user = $model->loadClient(1);




var_dump($user);
*/
/* Load Cliente ok

$model = new UserModel();

$user = $model->loadCliente(6);

var_dump($user);
*/




//Bootstrap


/*

$model = new UserModel();
$user = $model->bootstrap(
    "Antonio",
    "curso2@upinside.com.br",
    34892493385
);

var_dump($user);
echo "<hr/>";

if (!$model->find($user->email)) {
    echo "<p class='trigger warning'>Cadastro</p>";
    $user->save();
} else {
    echo "<p class='trigger accept'>Read</p>";
    $user = $model->find($user->email);
}

var_dump($user);

*/






// Atualizando

$model = new UserAddress();
$user = $model->findTelefone(44445555);
var_dump($user);



$user->complemento = "apt 602";
if ($user != $model->findTelefone(44445555)) {
    $user->save();
    echo "<p class='trigger warning'>Atualizado!</p>";
} else {
    echo "<p class='trigger accept'>Já atualizado!</p>";
}







/*

 $model = new UserModel();
$user = $model->loadCliente(3);
if ($user) {
    $user->destroy();
}

var_dump($user);


*/
