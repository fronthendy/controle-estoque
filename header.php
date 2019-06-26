<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lojinha</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a href="#" class="navbar-brand">
                        <img src="img/logo_preto.png" alt="Lojinha">
                    </a> </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-8">
                    <ul class="nav navbar-nav">
                        <li><a href="cadastro-produto.php">Cadastro de produtos</a></li>
                        <li><a href="index.php">Controle de estoque</a></li>
                        <?php
                        if (isset($_SESSION['logado']) && isset($_SESSION['usuario'])) {
                            echo "<li><a> $_SESSION[usuario] </a></li>";
                            echo "<li><a href='login.php?logout=true'>Sair</a></li>";
                        } else {
                            echo "<li><a href='login.php'>Login</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>