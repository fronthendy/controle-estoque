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

    $arquivoProdutos = "produtos.json";
    $imagemProduto = "";

    if ($_FILES) {

        $nome = $_FILES["foto"]["name"]; // nome do arquivo
        $nomeTemp = $_FILES["foto"]["tmp_name"]; // nome temporario do arquivo
        $erro = $_FILES["foto"]["error"]; // erros no upload
        $pastaRaiz = dirname(__FILE__); // encontra local do projeto
        $pasta = "produtos/"; // pasta para salvar imagem dos produtos

        $caminhoCompleto = $pastaRaiz . "/" . $pasta . $nome; // string com caminho e nome do arquivo

        if ($erro == UPLOAD_ERR_OK) {
            move_uploaded_file($nomeTemp, $caminhoCompleto); // move arquivo para minha pasta
            $imagemProduto = $pasta . $nome;
        }
    }


    if (file_exists($arquivoProdutos)) {
        $jsonProdutos = file_get_contents($arquivoProdutos);
        $arrayProdutos = json_decode($jsonProdutos, true);
        unset($_POST['cadastro-produto']);
        unset($_POST['foto']);
        $infoProduto = $_POST;
        $infoProduto['imagem'] = $imagemProduto;
        $arrayProdutos['produtos'][] = $infoProduto;
        $jsonProdutos = json_encode($arrayProdutos, true);
        file_put_contents($arquivoProdutos, $jsonProdutos);
    } else {
        $arquivo = fopen($arquivoProdutos, "w");
        $arrayProdutos = ["produtos" => []];
        unset($_POST['cadastro-produto']);
        unset($_POST['foto']);
        $infoProduto = $_POST;
        $infoProduto['imagem'] = $imagemProduto;
        $arrayProdutos['produtos'][] = $infoProduto;
        $jsonProdutos = json_encode($arrayProdutos, true);
        file_put_contents($arquivoProdutos, $jsonProdutos);
    }
}

if (isset($_POST['alterar-produto'])) {
    $arquivoProdutos = "produtos.json";
    $imagemProduto = "";

    if ($_FILES) {

        $nome = $_FILES["foto"]["name"]; // nome do arquivo
        $nomeTemp = $_FILES["foto"]["tmp_name"]; // nome temporario do arquivo
        $erro = $_FILES["foto"]["error"]; // erros no upload
        $pastaRaiz = dirname(__FILE__); // encontra local do projeto
        $pasta = "produtos/"; // pasta para salvar imagem dos produtos

        $caminhoCompleto = $pastaRaiz . "/" . $pasta . $nome; // string com caminho e nome do arquivo

        if ($erro == UPLOAD_ERR_OK) {
            move_uploaded_file($nomeTemp, $caminhoCompleto); // move arquivo para minha pasta
            $imagemProduto = $pasta . $nome;
        }
    }


    $jsonProdutos = file_get_contents($arquivoProdutos);
    $arrayProdutos = json_decode($jsonProdutos, true);
    unset($_POST['alterar-produto']);
    unset($_POST['foto']);
    $infoProduto = $_POST;
    $pos = $_POST['pos'];
    $infoProduto['imagem'] = $imagemProduto !== "" ? $imagemProduto : $arrayProdutos['produtos'][$pos]['imagem'];
    $arrayProdutos['produtos'][$pos] = $infoProduto;
    $jsonProdutos = json_encode($arrayProdutos, true);
    file_put_contents($arquivoProdutos, $jsonProdutos);
}

if (isset($_POST['deletar-produto'])) {

    $arquivoProdutos = "produtos.json";
    $jsonProdutos = file_get_contents($arquivoProdutos);
    $arrayProdutos = json_decode($jsonProdutos, true);
    $pos = $_POST['pos'];
    unset($arrayProdutos['produtos'][$pos]);
    $arrayProdutos['produtos'] = array_values($arrayProdutos['produtos']);
    $jsonProdutos = json_encode($arrayProdutos, true);
    file_put_contents($arquivoProdutos, $jsonProdutos);
}

function carregaProdutos()
{
    $arquivoProdutos = "produtos.json";

    if (file_exists($arquivoProdutos)) {
        $jsonProdutos = file_get_contents($arquivoProdutos);
        $arrayProdutos = json_decode($jsonProdutos, true);

        // teste se arrayProdutos === false. se for
        // use a json_last_error_msg para imprimir msg
        // de erro na tela. 
        return $arrayProdutos["produtos"];
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
}

  // var_dump($produtos);
