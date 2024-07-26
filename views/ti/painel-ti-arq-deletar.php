<div class="painel">
    <?php
        include 'vac.php'; 
        include 'db.php';  

        $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';

        if(!empty($npost)) {
            if(mysqli_query($conexao, "DELETE FROM tidownloads WHERE id = '$npost'")){
                echo 'Apagado com sucesso';
            } else {
                echo 'Falha ao apagar dados';
            }
        } else {
            echo '';
        }

        


    ?>
        
        
        <div>
            <h3>Formularios Ti</h3>

            <div class="mini-painel">
                <a href="?pagina=painel-ti">Ti Posts</a>
                <a href="?pagina=painel-ti-arq">ti arquivos</a>
            </div>

            <div class="mini-painel">
                <a href="?pagina=painel-ti-arq"><img src="uploads/adicionar.png"></a>
                <a href="?pagina=painel-ti-arq-editar"><img src="uploads/editar.png"></a>
                <strong><a href="?pagina=painel-ti-arq-deletar"><img src="uploads/remover.png"></a></strong>
            </div>

            
            <form method="post" action="" enctype="multipart/form-data">
                <input type="number" name="post" placeholder="Qual o numero do arquivo?" required>
                <input type="submit" id="enviar" value="Enviar">
            </form>
        </div>
</div>