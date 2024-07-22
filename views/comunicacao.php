<div class="home">
    
    <?php 
    include("db.php");

    $consulta = mysqli_query($conexao,"SELECT * FROM comunica");

    while ($linha = mysqli_fetch_array( $consulta )) {
        echo $linha['titulo'];
        echo $linha['texto'];
    }
    ?>

</div>