<div class="painel">

    <?php
        include 'vac.php'; 
        include 'db.php';  

        $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';

        if(!empty($npost)) {
            if(mysqli_query($conexao, "DELETE FROM comunica WHERE post = '$npost'")){
                echo 'Apagado com sucesso';
            } else {
                echo 'Falha ao apagar dados';
            }
        } else {
            echo '';
        }

        


    ?>

    <div>
        <h3>Painel Comunicação</h3>

        <div class="mini-painel">
            <a href="http://localhost/cursophp/intranet-crud/index.php?pagina=painel"><img src="uploads/adicionar.png"></a>
            <a href="?pagina=painel-editar"><img src="uploads/editar.png"></a>
            <strong><a href="?pagina=painel-deletar"><img src="uploads/remover.png"></a></strong>
        </div>
        
        

        <form method="post" action="">
            <input type="number" name="post" placeholder="Qual o numero do post?" required>
            <input type="submit" id="enviar" value="Enviar">
        </form>
        <p><a href="sair.php">Sair</a></p>

        
    </div>
</div>