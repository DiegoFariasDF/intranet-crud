<div class="comunica">

    <div class="textotopo">
        <img src="uploads/header-comunica.png" alt="">
    </div>

    <div class="textos">

        <?php 
        include("db.php");

        $consulta = mysqli_query($conexao, "SELECT * FROM comunica");

        while ($linha = mysqli_fetch_array($consulta)) {

            echo "<div class=comunicaum>";
            echo "<h3>".$linha['titulo']."</h3>";
            echo "<p>".$linha['texto']."</p>";

            // Verifica a extensão do arquivo
            $extensao = strtolower(pathinfo($linha['path'], PATHINFO_EXTENSION));

            // Exibe de acordo com o tipo de arquivo
            if ($extensao == "jpg" || $extensao == "png") {
                echo "<img src=\"".$linha["path"]."\" alt=\"Imagem\">";
            } elseif ($extensao == "pdf") {
                echo "<a href=\"".$linha["path"]."\"><img src=\"uploads/manual.png\" alt=\"Manual\"></a>";
            }

            echo "<c>Post nº".$linha['post']." Postado em:".$linha['data_upload']."</c>";
            
            echo "</div>";

            echo "<div class=\"separa\"> </div>";
            
        }
        ?>
    </div>
</div>
