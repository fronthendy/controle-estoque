<?php
require_once('functions.php'); // garante que o arquivo só foi incluido uma vez
include_once('header.php'); // inclui header na pagina

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

<main>
    <div class="container">
        <h1>Deletar Produto</h1>
        <p><?php echo $produto['nome']; ?></p>
        <p><?php echo $produto['preco']; ?></p>
        <p><?php echo $produto['estoque']; ?></p>
        <form action="index.php" method="POST">
            <input type="hidden" name="pos" value="<?php echo $pos; ?>">
            <button class="btn btn-danger" name="deletar-produto">Confirmar</button>
        </form>
    </div>
</main>

<?php
include_once('footer.php'); // inclui footer na pagina
?>