<div class="home">

    <form method="post" action="login-1.php">
        <input type="text" name="usuario" placeholder="Nome de usuario:">
        <input type="password" name="senha" placeholder="Digite a senha:">
        <input type="submit" value="Entrar">


    </form>
    <?php 
        if (isset($_GET['erro'])){
            echo "Usuario e/ou senha invalidos";
        }

    ?>

</div>