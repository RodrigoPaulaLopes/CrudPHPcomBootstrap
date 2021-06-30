<main>

<section>
    <a href="index.php">
        <button class="btn btn-success">voltar</button>
    </a>

    <h2 class="mt-3"><?=TITLE;?></h2>

    <form method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome." value="<?=$obPessoa->nome;?>">
        </div>
        <div class="form-group">
            <label>Idade</label>
            <input type="text" class="form-control" name="idade" placeholder="Digite sua idade" value="<?=$obPessoa->idade;?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</section>

</main>