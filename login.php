<?php 
    include_once('header.php'); 
    require_once('functions.php');

    if(isset($_SESSION['logado']) && !isset($_GET['logout'])) {
        header('location: index.php');
    }
 ?>

<main class="container">
    <h1>Login</h1>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : '' ?>">    
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control"  value="<?php echo isset($_POST['senha']) ? $_POST['senha'] : '' ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" name="login">Entrar</button>
        </div>
        <?php
            if(isset($erros)) {
                echo "<div class='alert alert-danger'>";
                echo "<p>$erros</p>";
                echo "</div>";
            }
        ?>
    </form>
</main>

<?php include_once('footer.php'); ?>