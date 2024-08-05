<div class="painel">

    <?php
        include 'vac.php'; 
        include 'db.php';  

        $mensagem = '';

        $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';

        if(!empty($npost)) {
            if(mysqli_query($conexao, "DELETE FROM comunica WHERE post = '$npost'")){
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

                
                <strong><a href="?pagina=painel-ti"><img src="uploads/shared-post.png">Posts</a></strong>
                <a href="?pagina=painel-ti-arq"><img src="uploads/compartilhar-pasta.png"> Arquivos</a>
                <a href="sair.php"><img src="uploads/logout-arredondado.png"> Sair</a>
                
        </div>

    </div>

    <div class="caixapainel">
        <h3>Painel TI</h3>

        <div class="mini-painel">
            <a href="?pagina=painel-ti"><img src="uploads/adicionar.png"></a>
            <a href="?pagina=painel-editar-ti"><img src="uploads/editar.png"></a>
            <strong><a href="?pagina=painel-deletar-ti"><img src="uploads/remover.png"></a></strong>
        </div>
        
        

        <form method="post" action="">
            <input type="number" name="post" placeholder="Qual o numero do post?" required>
            <input type="submit" id="enviar" value="Enviar">
        </form>
        
        <div> <?php echo $mensagem;?></div>
        
    </div>
</div>