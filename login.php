<div class="home">

    <h1>Acesse sua Conta</h1>

    <form method="post" action="">
        <input type="text" name="usuario" placeholder="Nome de usuario:">
        <input type="password" name="senha" placeholder="Digite a senha:">
        <input type="submit" value="Entrar">
    </form>

    <?php 
        include ('db.php');

        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            if(strlen($_POST['usuario']) == 0){
                echo "Preencha seu usuario";
            }
            elseif(strlen($_POST['senha']) == 0){
                echo "Preencha sua senha";
            }
            else{
                $usuario = $conexao->real_escape_string($_POST['usuario']);
                $senha = $conexao->real_escape_string($_POST['senha']);

                $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' and login = '$senha'";
                $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL");

                $quantidade = $sql_query->num_rows;

                if($quantidade == 1){
                    
                    $usuario = $sql_query->fetch_assoc();
                    if(!isset($_SESSION)){
                        session_start();
                    }
                        
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];

                    header("location:index.php?pagina=painel");
                } else {
                    echo "Falha ao logar";
                }
            }
        }
    ?>
</div>
