<div class="painel">

    <?php
        include 'vac.php'; 
        include 'db.php';  

        // Verifica se houve envio do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';
            $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexao, $_POST['titulo']) : '';
            $texto = isset($_POST['texto']) ? mysqli_real_escape_string($conexao, $_POST['texto']) : '';
           

            // Query SQL corrigida
            $query = "UPDATE COMUNICA SET titulo = '$titulo', texto = '$texto' WHERE POST = '$npost'";
            
            // Executa a query
            if (mysqli_query($conexao, $query)) {
                echo "Registro atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar registro: " . mysqli_error($conexao);
            }
        }
    ?>

    <div>
        <h3>Painel Comunicação</h3>

        <div class="mini-painel">
            <a href="http://localhost/cursophp/intranet-crud/index.php?pagina=painel"><img src="uploads/adicionar.png"></a>
            <strong><a href="?pagina=painel-editar"><img src="uploads/editar.png"></a></strong>
            <a href="?pagina=painel-deletar"><img src="uploads/remover.png"></a>
        </div>
        
        <form method="post" action="">
            <input type="number" name="post" placeholder="Qual o numero do post?" required>
            <input type="text" name="titulo" placeholder="Titulo" required>
            <textarea name="texto" placeholder="Texto" required></textarea>
            <input type="submit" id="enviar" value="Enviar">
        </form>
        

    </div>
</div>
