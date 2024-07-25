<div class="painel">
    <?php
        include 'vac.php'; 
        include 'db.php';  

        $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';

        if(!empty($npost)) {
            if(mysqli_query($conexao, "DELETE FROM comunicacaodownloads WHERE id = '$npost'")){
                echo 'Apagado com sucesso';
            } else {
                echo 'Falha ao apagar dados';
            }
        } else {
            echo '';
        }

        


    ?>
        
        
        <div>
            <h3>Formularios Comunicação</h3>

            <div class="mini-painel">
                <a href="?pagina=painel">Comunicação Posts</a>
                <a href="?pagina=painel-comu-arq">Comunicação Arquivos</a>
            </div>

            <div class="mini-painel">
                <a href="?pagina=painel-comu-arq"><img src="uploads/adicionar.png"></a>
                <a href="?pagina=painel-comu-arq-editar"><img src="uploads/editar.png"></a>
                <strong><a href="?pagina=painel-comu-arq-deletar"><img src="uploads/remover.png"></a></strong>
            </div>

            
            <form method="post" action="" enctype="multipart/form-data">
                <input type="number" name="post" placeholder="Qual o numero do arquivo?" required>
                <input type="submit" id="enviar" value="Enviar">
            </form>
        </div>
</div>