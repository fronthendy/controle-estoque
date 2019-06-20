<?php

include_once('header.php');
require_once('functions.php');

if (isset($_GET['pos'])) {
    $pos = $_GET['pos'];
    $produtos = carregaProdutos();
    if ($pos >= count($produtos)) {
        echo ('Produto inexistente');
        exit(1);
    }
    $produto = $produtos[$pos];
} else {
    $pos = null;
    $produto = [
        "nome" => '',
        "preco" => 0,
        "estoque" => 0,
        "min" => 0,
        "status" => false
    ];
}

?>

<main class="container">
    <h1>Alterar produto</h1>

    <form action="index.php" method="POST" autocomplete="off">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $produto['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" name="preco" class="form-control" value="<?php echo $produto['preco'] ?>">
        </div>
        <div class="form-group">
            <label for="qtd">Quantidade em estoque</label>
            <input type="number" name="estoque" class="form-control" value="<?php echo ($produto['estoque']) ?>">
        </div>
        <div class="form-group">
            <label for="qtd-minima">Quantidade minima</label>
            <input type="number" name="min" class="form-control" value="<?php echo ($produto['min']) ?>">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status" value="1" <?php echo (isset($produto['status']) ? 'checked' : ''); ?>>
        </div>
        <?php
        var_dump($produto);
        if (isset($produto['imagem'])) {
            echo "<img src='" . $produto['imagem'] . "'>";
        }
        ?>
        <div class="form-group">
            <label for="foto">Foto do produto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>


        <input type="hidden" name="pos" value="<?= $pos ?>">

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="alterar-produto">Salvar</button>
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