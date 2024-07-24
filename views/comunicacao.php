<div class="comunica">
    <div class="textos">
        <?php 
        include("db.php");

        $consulta = mysqli_query($conexao,"SELECT * FROM comunica");

        while ($linha = mysqli_fetch_array( $consulta )) {
            
            echo "<h3>".$linha['titulo']."</h3>";
            echo "<p>".$linha['texto']."</p>";
        }
        ?>
    <div>


</div>