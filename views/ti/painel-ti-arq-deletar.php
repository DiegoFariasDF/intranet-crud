<div class="painel">
    <?php
        include 'vac.php'; 
        include 'db.php';  

        $mensagem = '';

        $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';

        if(!empty($npost)) {
            if(mysqli_query($conexao, "DELETE FROM tidownloads WHERE id = '$npost'")){
                $mensagem = 'Apagado com sucesso';
            } else {
                $mensagem = 'Falha ao apagar dados';
            }
        } else {
            $mensagem = '';
        }

        


    ?>

        <div class="menulateral">
            <div><h2>Painel Comunicação</h2></div>
            
            <div class="menulateral1">  

                
            <a href="?pagina=painel-ti"><img src="uploads/shared-post.png">Posts</a>
            <strong><a href="?pagina=painel-ti-arq"><img src="uploads/compartilhar-pasta.png"> Arquivos</a></strong>
            <a href="sair.php"><img src="uploads/logout-arredondado.png"> Sair</a>
                
        </div>

        </div>
        
        <div class="caixapainel">
            <h3>Formularios Ti</h3>

            <div class="mini-painel">
                <a href="?pagina=painel-ti-arq"><img src="uploads/adicionar.png"></a>
                <a href="?pagina=painel-ti-arq-editar"><img src="uploads/editar.png"></a>
                <strong><a href="?pagina=painel-ti-arq-deletar"><img src="uploads/remover.png"></a></strong>
            </div>

            
            <form method="post" action="" enctype="multipart/form-data">
                <input type="number" name="post" placeholder="Qual o numero do arquivo?" required>
                <input type="submit" id="enviar" value="Enviar">
            </form>

            <div><?php echo $mensagem; ?></div>
        </div>
</div>