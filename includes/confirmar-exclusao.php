<main>

<section>
    

    <h2 class="mt-3">Excluir vaga></h2>

    <form method="POST">
        <div class="form-group">
        <p>Você deseja realmente excluir a pessoa <strong><?=$obPessoa->nome?></strong></p>
        </div>
        <div class="form-group">
        <a href="index.php">
            <button class="btn btn-success">Cancelar</button>
        </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</section>

</main>