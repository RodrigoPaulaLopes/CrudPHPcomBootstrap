<?php
    require __DIR__.'/vendor/autoload.php';
    define('TITLE', 'Cadastrar Vaga');

    use App\entity\Pessoa;
    $pessoa = new Pessoa();
    
   if(isset($_POST['nome'], $_POST['idade'])){
       

       $pessoa->nome = $_POST['nome'];
       $pessoa->idade = $_POST['idade'];
      $pessoa->cadastrar();
      header('location: index.php?status=succes');
      exit;
   }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';
?>