<div class="painel">
    <?php
    include 'vac.php'; 
    include 'db.php';  


    //Config de arquivos relacionado aos posts da comunicação
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura e limpa os dados do formulário
        $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
        $texto = mysqli_real_escape_string($conexao, $_POST['texto']);
        
        // Variável para o diretório de upload
        $pasta = "uploads/arquivos/";

        // Upload de arquivo
        if(isset($_FILES['arquivo'])){
            $arquivo = $_FILES['arquivo'];
            
            if($arquivo['error']){
                echo '';
            } elseif($arquivo['size'] > 2097152) {
                echo 'Arquivo muito grande (max 2mb)';
            } else {
                $nomeDoArquivo = $arquivo['name'];
                $nomeDoArquivoNew = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                if($extensao != "jpg" && $extensao != "png"){
                    echo "Tipo de arquivo não aceito";
                } else {
                    $arquivo_salvo = move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeDoArquivoNew.".".$extensao);
                    if($arquivo_salvo){
                        $url_arquivo = "http://localhost/cursophp/intranet-crud/".$pasta.$nomeDoArquivoNew.".".$extensao;
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
        $query = "INSERT INTO comunica (titulo, texto, path) VALUES ('$titulo', '$texto', '$path_arquivo')";

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
            <h3>Painel Comunicação</h3>

            <div class="mini-painel">
                <a href="?pagina=painel">Comunicação Posts</a>
                <a href="?pagina=painel-comu-arq">Comunicação Arquivos</a>
            </div>


            <div class="mini-painel">
                <strong><a href="http://localhost/cursophp/intranet-crud/index.php?pagina=painel"><img src="uploads/adicionar.png"></a></strong>
                <a href="?pagina=painel-editar"><img src="uploads/editar.png"></a>
                <a href="?pagina=painel-deletar"><img src="uploads/remover.png"></a>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="titulo" placeholder="Título" required>
                <textarea name="texto" placeholder="Digite o seu artigo" required></textarea>
                <input type="file" name="arquivo" id="">
                <input type="submit" id="enviar" value="Enviar">
            </form>
            <p><a href="sair.php">Sair</a></p>
        </div>


    
    
    
    

</div>


