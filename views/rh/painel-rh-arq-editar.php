<div class="painel">
    <?php
    include 'vac.php'; 
    include 'db.php';  

    $mensagem = '';
            //Config de arquivos relacionado aos documentos de downloads comunicação
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                // Variável para o diretório de upload
                $pasta = "uploads/arquivos/";

                // Upload de arquivo
                if(isset($_FILES['form-comunicacao'])){
                    $arquivo = $_FILES['form-comunicacao'];
                    $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';
                    
                    if($arquivo['error']){
                        $mensagem = '<p>Erro ao enviar o arquivo</p>';
                    } elseif($arquivo['size'] > 2097152) {
                        $mensagem = '<p>Arquivo muito grande (max 2mb)</p>';
                    } else {
                        $nomeDoArquivo = $arquivo['name'];
                        $nomeDoArquivoNew = uniqid();
                        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                        

                        if($extensao != "pdf" && $extensao != "doc" && $extensao != "xlsx" && $extensao != "pptx" && $extensao != "zip"){
                            $mensagem .= "<p>Tipo de arquivo não aceito</p>";
                        } else {
                            $arquivo_salvo = move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeDoArquivoNew.".".$extensao);
                            if($arquivo_salvo){
                                $url_arquivo = "http://localhost/cursophp/intranet-crud/index.php?pagina=documentos";
                                $mensagem .= "<p>Arquivo enviado com sucesso: <a href=\"$url_arquivo\">$nomeDoArquivoNew.$extensao</a></p>";
                            } else {
                                $mensagem .= "<p>Falha ao enviar o arquivo</p>";
                            }
                        }
                    }
                }
            
                // Se um arquivo foi enviado, monte a string para o banco de dados
                $path_arquivo = isset($nomeDoArquivoNew) && isset($extensao) ? "$pasta$nomeDoArquivoNew.$extensao" : '';

                //$query = "UPDATE COMUNICA SET titulo = '$titulo', texto = '$texto' WHERE POST = '$npost'";

            
                // Inserir no banco de dados
                $query = "UPDATE rhdownloads  SET nome = '$nomeDoArquivo', origem = '$path_arquivo' WHERE id = '$npost'";

                // Executa a query
                $executar = mysqli_query($conexao, $query);
                
                if ($executar) {
                    $mensagem .= "<p>Inserção realizada com sucesso!</p>";
                } else {
                    $mensagem .= "<p>Erro na inserção: </p>" . mysqli_error($conexao);
                }          
            }
        
        ?>
        
        <div class="menulateral">
            <div><h2>Painel Comunicação</h2></div>
            <div class="menulateral1">  

                
                <strong><a href="?pagina=painel-rh-arq"><img src="uploads/compartilhar-pasta.png"> Arquivos</a></strong>
                <a href="sair.php"><img src="uploads/logout-arredondado.png"> Sair</a>
                
            </div>

        </div>
        
        
        <div class="caixapainel">
            <h3>Formularios RH</h3>

            <div class="mini-painel">
                <a href="?pagina=painel-rh-arq"><img src="uploads/adicionar.png"></a>
                <strong><a href="?pagina=painel-rh-arq-editar"><img src="uploads/editar.png"></a></strong>
                <a href="?pagina=painel-rh-arq-deletar    "><img src="uploads/remover.png"></a>
            </div>

            
            <form method="post" action="" enctype="multipart/form-data">
                <input type="number" name="post" placeholder="Qual o numero do arquivo?" required>
                <input type="file" name="form-comunicacao" id="">
                <input type="submit" id="enviar" value="Enviar">
            </form>

            <div><?php echo $mensagem;?></div>
        </div>
</div>