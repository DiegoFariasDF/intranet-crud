<div class="painel">
    <?php
    include 'vac.php'; 
    include 'db.php';  

    
    $mensagem = '';

    // Config de arquivos relacionado aos documentos de downloads comunicação
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Variável para o diretório de upload
        $pasta = "uploads/arquivos/";

        // Upload de arquivo
        if (isset($_FILES['form-comunicacao'])) {
            $arquivo = $_FILES['form-comunicacao'];
            
            if ($arquivo['error']) {
                $mensagem = 'Erro ao enviar o arquivo.';
            } elseif ($arquivo['size'] > 2097152) {
                $mensagem = 'Arquivo muito grande (max 2mb).';
            } else {
                $nomeDoArquivo = $arquivo['name'];
                $nomeDoArquivoNew = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                if (!in_array($extensao, ['pdf', 'doc', 'xlsx', 'pptx', 'zip'])) {
                    $mensagem = 'Tipo de arquivo não aceito.';
                } else {
                    $arquivo_salvo = move_uploaded_file($arquivo["tmp_name"], $pasta.$nomeDoArquivoNew.".".$extensao);
                    if ($arquivo_salvo) {
                        $url_arquivo = "http://localhost/cursophp/intranet-crud/index.php?pagina=documentos";
                        $mensagem = "Arquivo enviado com sucesso: <a href=\"$url_arquivo\">$nomeDoArquivoNew.$extensao</a>";
                    } else {
                        $mensagem = 'Falha ao enviar o arquivo.';
                    }
                }
            }
        }
    
        // Se um arquivo foi enviado, monte a string para o banco de dados
        $path_arquivo = isset($nomeDoArquivoNew) && isset($extensao) ? "$pasta$nomeDoArquivoNew.$extensao" : '';

        // Inserir no banco de dados
        $query = "INSERT INTO comunicacaodownloads (nome, origem) VALUES ('$nomeDoArquivo', '$path_arquivo')";

        // Executa a query
        $executar = mysqli_query($conexao, $query);
        
        if ($executar) {
            $mensagem .= " Inserção realizada com sucesso!";
        } else {
            $mensagem .= " Erro na inserção: " . mysqli_error($conexao);
        }
    }
    ?>

        <div class="menulateral">
            <div><h2>Painel Comunicação</h2></div>
            <div class="menulateral1">  

                <a href="?pagina=painel"><img src="uploads/shared-post.png">Posts</a>
                <strong><a href="?pagina=painel-comu-arq"><img src="uploads/compartilhar-pasta.png"> Arquivos</a></strong>
                <a href="sair.php"><img src="uploads/logout-arredondado.png"> Sair</a>
                
            </div>

        </div>
        
        
        <div class="caixapainel">
            <h3>Formularios Comunicação</h3>

           

            <div class="mini-painel">
                <strong><a href="?pagina=painel-comu-arq"><img src="uploads/adicionar.png"></a></strong>
                <a href="?pagina=painel-comu-arq-editar"><img src="uploads/editar.png"></a>
                <a href="?pagina=painel-comu-arq-deletar"><img src="uploads/remover.png"></a>
            </div>

            
            <form method="post" action="" enctype="multipart/form-data">
                <input type="file" name="form-comunicacao" id="">
                <input type="submit" id="enviar" value="Enviar">
            </form>

            <div><?php echo $mensagem;?></div>
        </div>
</div>