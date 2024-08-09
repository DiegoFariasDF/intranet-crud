<div class="painel">
    
    
    

    <?php
    include 'vac.php'; 
    include 'db.php';  

    $mensagem="";
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
                $mensagem = '';
            } elseif($arquivo['size'] > 2097152) {
                $mensagem = 'Arquivo muito grande (max 2mb)';
            } else {
                $nomeDoArquivo = $arquivo['name'];
                $nomeDoArquivoNew = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                if($extensao != "jpg" && $extensao != "png"){
                    $mensagem = "Tipo de arquivo não aceito";
                } else {
                    $arquivo_salvo = move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeDoArquivoNew.".".$extensao);
                    if($arquivo_salvo){
                        $url_arquivo = "http://localhost/cursophp/intranet-crud/".$pasta.$nomeDoArquivoNew.".".$extensao;
                        $mensagem = "<p>Arquivo enviado com sucesso: <a href=\"$url_arquivo\">$nomeDoArquivoNew.$extensao</a></p>";
                    } else {
                        $mensagem = "<p>Falha ao enviar o arquivo</p>";
                    }
                }
            }
        }
    
        // Se um arquivo foi enviado, monte a string para o banco de dados
        $path_arquivo = isset($nomeDoArquivoNew) && isset($extensao) ? "$pasta$nomeDoArquivoNew.$extensao" : '';

        // Inserir no banco de dados
        $query = "INSERT INTO lc (titulo, texto, path) VALUES ('$titulo', '$texto', '$path_arquivo')";

        // Executa a query
        $executar = mysqli_query($conexao, $query);
        
        if ($executar) {
            $mensagem .= "Inserção realizada com sucesso!";
        } else {
            $mensagem .= "Erro na inserção: " . mysqli_error($conexao);
        }          
    }
    ?>
       

       <div class="menulateral">
            <div><h2>Painel Licitação e Compras</h2></div>
            <div class="menulateral1">  

                
                <strong><a href="?pagina=painel-lc"><img src="uploads/shared-post.png">Posts</a></strong>
                <a href="?pagina=painel-lc-arq"><img src="uploads/compartilhar-pasta.png"> Arquivos</a>
                <a href="sair.php"><img src="uploads/logout-arredondado.png"> Sair</a>
                
            </div>

        </div>

        <div class="caixapainel">
            <h3>Painel Licitação e Compras</h3>

            <div class="mini-painel">
                <strong><a href="?pagina=painel-lc"><img src="uploads/adicionar.png"></a></strong>
                <a href="?pagina=painel-editar-lc"><img src="uploads/editar.png"></a>
                <a href="?pagina=painel-deletar-lc"><img src="uploads/remover.png"></a>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="titulo" placeholder="Título" required>
                <textarea name="texto" placeholder="Digite o seu artigo" required></textarea>
                <input type="file" name="arquivo" id="">
                <input type="submit" id="enviar" value="Enviar">
            </form>

            <div><?php echo $mensagem;?></div>
            
        </div>


    
    
    
    

</div>


