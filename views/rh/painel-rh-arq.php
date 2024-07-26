<div class="painel">
    <?php
    include 'vac.php'; 
    include 'db.php';  
            //Config de arquivos relacionado aos documentos de downloads comunicação
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                // Variável para o diretório de upload
                $pasta = "uploads/arquivos/";

                // Upload de arquivo
                if(isset($_FILES['form-comunicacao'])){
                    $arquivo = $_FILES['form-comunicacao'];
                    
                    if($arquivo['error']){
                        echo 'Erro ao enviar o arquivo';
                    } elseif($arquivo['size'] > 2097152) {
                        echo 'Arquivo muito grande (max 2mb)';
                    } else {
                        $nomeDoArquivo = $arquivo['name'];
                        $nomeDoArquivoNew = uniqid();
                        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                        if($extensao != "pdf" && $extensao != "doc" && $extensao != "xlsx" && $extensao != "pptx" && $extensao != "zip"){
                            echo "Tipo de arquivo não aceito";
                        } else {
                            $arquivo_salvo = move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeDoArquivoNew.".".$extensao);
                            if($arquivo_salvo){
                                $url_arquivo = "http://localhost/cursophp/intranet-crud/index.php?pagina=documentos";
                                echo "<p>Arquivo enviado com sucesso: <a href=\"$url_arquivo\">$nomeDoArquivoNew.$extensao</a></p>";
                            } else {
                                echo "<p>Falha ao enviar o arquivo</p>";
                            }
                        }
                    }
                }
            
                // Se um arquivo foi enviado, monte a string para o banco de dados
                $path_arquivo = isset($nomeDoArquivoNew) && isset($extensao) ? "$pasta$nomeDoArquivoNew.$extensao" : '';

                // Inserir no banco de dados
                $query = "INSERT INTO rhdownloads (nome, origem) VALUES ('$nomeDoArquivo', '$path_arquivo')";

                // Executa a query
                $executar = mysqli_query($conexao, $query);
                
                if ($executar) {
                    echo "Inserção realizada com sucesso!";
                } else {
                    echo "Erro na inserção: " . mysqli_error($conexao);
                }          
            }
        
        ?>
        
        
        <div>
            <h3>Formularios rh</h3>

            

            <div class="mini-painel">
                <strong><a href="?pagina=painel-rh-arq"><img src="uploads/adicionar.png"></a></strong>
                <a href="?pagina=painel-rh-arq-editar"><img src="uploads/editar.png"></a>
                <a href="?pagina=painel-rh-arq-deletar"><img src="uploads/remover.png"></a>
            </div>

            
            <form method="post" action="" enctype="multipart/form-data">
                <input type="file" name="form-comunicacao" id="">
                <input type="submit" id="enviar" value="Enviar">
            </form>
        </div>
</div>