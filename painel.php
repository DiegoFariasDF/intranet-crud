

<div class="painel">

    <?php
        include 'vac.php'; 
        include 'db.php';  

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o formulário foi submetido via POST

            // Captura e limpa os dados do formulário
            $titulo_bruto = mysqli_real_escape_string($conexao, $_POST['titulo']);
            $texto_bruto = mysqli_real_escape_string($conexao, $_POST['texto']);

            $titulo = "<h3>".$titulo_bruto."</h3>";
            $texto =   "<p>".$texto_bruto."</p>";
            

            // Monta a query SQL corretamente
            $query = "INSERT INTO comunica (titulo, texto) VALUES ('$titulo', '$texto')";

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
            <strong><a href="http://localhost/cursophp/intranet-crud/index.php?pagina=painel"><img src="uploads/adicionar.png"></a></strong>
            <a href="?pagina=painel-editar"><img src="uploads/editar.png"></a>
            <a href="?pagina=painel-deletar"><img src="uploads/remover.png"></a>
        </div>
        
        

        <form method="post" action="">
            <input type="text" name="titulo" placeholder="Título" required>
            <textarea type="text" name="texto" placeholder="Digite o seu artigo"></textarea required>
            <!-- <input type="text" name="texto" id="texto" placeholder="Digite o seu artigo"> -->
            <input type="submit" id="enviar" value="Enviar">
        </form>
        <p><a href="sair.php">Sair</a></p>

        
    </div>
</div>


