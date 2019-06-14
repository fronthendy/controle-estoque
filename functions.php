<?php
session_start();

// $produtos = [];

// $produtos[] = [
//     "nome" => "Camiseta Moletom",
//     "preco" => 50.99,
//     "estoque" => 100,
//     "min" => 20,
//     "status" => true
// ];

// $produtos[] = [
//     "nome" => "Calça Jeans",
//     "preco" => 80.99,
//     "estoque" => 100,
//     "min" => 20,
//     "status" => true
// ];

// $produtos[] = [
//     "nome" => "Calça Moletom",
//     "preco" => 180.99,
//     "estoque" => 10,
//     "min" => 20,
//     "status" => true
// ];

// $produtos[] = [
//     "nome" => "Tenis Maneiro",
//     "preco" => 380.99,
//     "estoque" => 100,
//     "min" => 20,
//     "status" => true
// ];

// $produtos[] = [
//     "nome" => "Calça Moletom",
//     "preco" => 80.99,
//     "estoque" => 100,
//     "min" => 20,
//     "status" => true
// ];

// $produtos[] = [
//     "nome" => "Patinete de Empreendedor Hipster",
//     "preco" => 80.99,
//     "estoque" => 100,
//     "min" => 20,
//     "status" => true
// ];


function totalProduto($produtoPreco, $produtoEstoque)
{

    $total = $produtoPreco * $produtoEstoque;

    return $total;
}

function totalEstoque()
{
    global $produtos;
    $soma = 0;

    foreach ($produtos as $key => $produto) {
        $soma = $soma + totalProduto($produto['preco'], $produto['estoque']);
    }

    return $soma;
}


if (isset($_POST['login'])) {
    // var_dump($_POST);

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';


    if ($usuario == "" || $senha == "") {
        $erros = "Preencha os campos corretamente";
    } else {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        unset($erros);
        header('location: index.php');
    }
}

if (isset($_POST['cadastro-produto'])) {

    // trazer upload de foto do produto

    $arquivoProdutos = "produtos.json";

    if (file_exists($arquivoProdutos)) {
        $jsonProdutos = file_get_contents($arquivoProdutos);
        $arrayProdutos = json_decode($jsonProdutos, true);
        unset($_POST['cadastro-produto']);
        $arrayProdutos['produtos'][] = $_POST;
        $jsonProdutos = json_encode($arrayProdutos, true);
        file_put_contents($arquivoProdutos, $jsonProdutos);
    } else {
        $arquivo = fopen($arquivoProdutos, "w");
        $arrayProdutos = ["produtos" => []];
        unset($_POST['cadastro-produto']);
        $_POST["status"] = true;
        $arrayProdutos['produtos'][] = $_POST;
        $jsonProdutos = json_encode($arrayProdutos, true);
        var_dump($jsonProdutos);
        file_put_contents($arquivoProdutos, $jsonProdutos);
    }
}

function exibirProdutos()
{
    $arquivoProdutos = "produtos.json";

    if (file_exists($arquivoProdutos)) {
        $jsonProdutos = file_get_contents($arquivoProdutos);
        $arrayProdutos = json_decode($jsonProdutos, true);
        return $arrayProdutos["produtos"];
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
}

  // var_dump($produtos);
