<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Pessoa');



use App\entity\Pessoa;

if(isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('loaction: index.php?status=error');
    exit;
}

$obPessoa = Pessoa::getPessoa($_GET['id']);
print_r($obPessoa);
if(!$obPessoa instanceof Pessoa){
    header('loaction: index.php?status=error');
    exit;
}

if(isset($_POST['nome'], $_POST['idade'])){

   $pessoa->nome = $_POST['nome'];
   $pessoa->idade = $_POST['idade'];
    $pessoa->atualizar();
    header('location: index.php?status=succes');
    exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
?>