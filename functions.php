<?php

$produtos = [];

$produtos[] = [
    "nome" => "Camiseta Moletom",
    "preco" => 50.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
];

$produtos[] = [
    "nome" => "Calça Jeans",
    "preco" => 80.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
];

$produtos[] = [
    "nome" => "Calça Moletom",
    "preco" => 180.99,
    "estoque" => 10,
    "min" => 20,
    "status" => true
];

$produtos[] = [
    "nome" => "Tenis Maneiro",
    "preco" => 380.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
];

$produtos[] = [
    "nome" => "Calça Moletom",
    "preco" => 80.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
];

$produtos[] = [
    "nome" => "Patinete de Empreendedor Hipster",
    "preco" => 80.99,
    "estoque" => 100,
    "min" => 20,
    "status" => true
];


function totalProduto ($produtoPreco, $produtoEstoque)
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





  // var_dump($produtos);
