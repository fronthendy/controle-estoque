<?php

include_once('header.php');
require_once('functions.php');

?>

<main class="container">
    <h1>Cadastro de produto</h1>

    <form action="index.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" name="preco" class="form-control">
        </div>
        <div class="form-group">
            <label for="qtd">Quantidade em estoque</label>
            <input type="number" name="estoque" class="form-control">
        </div>
        <div class="form-group">
            <label for="qtd-minima">Quantidade minima</label>
            <input type="number" name="min" class="form-control">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status">
        </div>
        <div class="form-group">
            <label for="foto">Foto do produto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="cadastro-produto">Salvar</button>
        </div>
        <?php
        if (isset($erros)) {
            echo "<div class='alert alert-danger'>";
            echo "<p>$erros</p>";
            echo "</div>";
        }
        ?>
    </form>
</main>

<?php include_once('footer.php'); ?>