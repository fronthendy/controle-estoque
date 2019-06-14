<?php
include_once('header.php');
require_once('functions.php');
?>

<main class="container">
    <h1>Cadastro de produto</h1>

    <form action="cadastro-produto.php" method="POST" autocomplete="off">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" name="preco" class="form-control" value="<?php echo isset($_POST['preco']) ? $_POST['preco'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="qtd">Quantidade em estoque</label>
            <input type="number" name="estoque" class="form-control" value="<?php echo isset($_POST['estoque']) ? $_POST['estoque'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="qtd-minima">Quantidade minima</label>
            <input type="number" name="min" class="form-control" value="<?php echo isset($_POST['min']) ? $_POST['min'] : '' ?>">
        </div>
        <input type="hidden" name="status" value="true">

        <!-- ADICIONAR INPUT FILE AQUI -->

        <div class="form-group">
            <button class="btn btn-primary" name="cadastro-produto">Salvar</button>
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