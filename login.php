<div class="login">
    <img src="uploads/saaelogo.png">
    <div>
        
        <h3>Acesse sua Conta</h3>

        <form method="post" action="">
            <input type="text" name="usuario" placeholder="Nome de usuário">
            <input type="password" name="senha" placeholder="Digite a senha">
            <input type="submit" value="Entrar">
        </form>
        
        <?php 
        
        include ('db.php');

        
        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            
            if(strlen($_POST['usuario']) == 0){
                echo "Preencha seu usuário";
            }
            elseif(strlen($_POST['senha']) == 0){
                echo "Preencha sua senha";
            }
            else {
                
                $usuario = $conexao->real_escape_string($_POST['usuario']);
                $senha = $conexao->real_escape_string($_POST['senha']);

                
                $sql_code = "SELECT * FROM usuarios WHERE usuario = ?";
                $stmt = $conexao->prepare($sql_code);
                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $result = $stmt->get_result();

                
                if($result->num_rows == 1){
                    $usuario = $result->fetch_assoc();

                    // criptografia da senha
                    if(password_verify($senha, $usuario['login'])){
                        
                        session_start();

                        
                        $_SESSION['id'] = $usuario['id'];
                        $_SESSION['nome'] = $usuario['nome'];

                        if ($_SESSION['nome'] == "teste"){
                            header("location:?pagina=painel");
                            exit; 
                        }
                        elseif ($_SESSION["nome"] == "ti"){
                            header("location:?pagina=painel-ti");
                            exit; 
                        }
                        elseif ($_SESSION["nome"] == "rh"){
                            header("location:?pagina=painel-rh-arq");
                            exit; 
                        }


                        
                       
                    } else {
                        echo "Usuario/senha invalida";
                    }
                } else {
                    echo "Usuario/senha invalida";
                }

                
                $stmt->close();
            }
        }
        ?>
    </div>
</div>
