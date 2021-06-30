<?php
    $mensagem = '';
    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
        }
    }
    $resultados = '';
    foreach($pessoas as $pessoa){
        $resultados .= '<tr><td>'.$pessoa->id.'</td><td>'.$pessoa->nome.'</td><td>'.$pessoa->idade.'</td>
                            <td><a href="./editar.php?id='.$pessoa->id.'">
                            <buttons type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="./excluir.php?id='.$pessoa->id.'">
                            <buttons type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        <tr>'; 
    }
$resultados = strlen($resultados) ? $resultados : '<tr><td collspan="6" class="texte-center">Nenhuma pessoa encontrada</td><tr>'
?>

<main>

<section>
    <a href="cadastrar.php">
        <button class="btn btn-success">Cadastrar</button>
    </a>
</section>
<section>
    <table class='table text-light mt-3 text-center'>
    <thead>
        <th>ID</th>
        <th>NOME</th>
        <th>IDADE</th>
        <th>AÇÕES</th>
    </thead>
    <tbody>
        <?=$resultados?>
    </tbody>
    </table>
</section>
</main>