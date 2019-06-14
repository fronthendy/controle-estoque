<?php
    // var_dump($_POST['senha']);

    if($_POST['nome'] == "") {
        echo "Preencha o campo NOME";
    }

    if($_POST['sobrenome'] == "") {
        echo "Preencha o campo SOBRENOME";
    }

    if (strlen($_POST['senha']) < 5) {
        echo "A senha precisa ter mais de 5 caracteres";
    }

    //echo strlen($_POST['senha']) < 5 ? "A senha precisa ter mais de 5 caracteres" : "";

    //VALIDAÇÃO
    //campos obrigatorios
    //tamanho minimo ou maximo
    //email, verficar formato

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="teste.php" method="post">
        <input type="text" name="nome" placeholder="nome">
        <br>
        <input type="text" name="sobrenome" placeholder="sobrenome">
        <br>
        <input type="email" name="email" placeholder="email">
        <br>
        <input type="password" name="senha" placeholder="senha">
        <br>
        <button>enviar</button>
    </form>
</body>
</html>