<div class="documentos">
    <div>
        <h3>DOCUMENTOS</h3>

        <div class="mini-painel">
            <a href="?pagina=documentos">Comunicação</a>
            <a href="?pagina=documentos-gp">Gestão de Pessoas</a>
            <strong><a href="?pagina=documentos-ti">Tecnologia da Informação</a></strong>
        </div>        

        <table>
            <tr>
                <td>Nº Do Arquivo</td>
                <td>Arquivo</td>
                <td>Download</td>
            </tr>
            
            <?php 
            include("db.php");

            $consulta = mysqli_query($conexao, "SELECT * FROM tidownloads");

            while ($linha = mysqli_fetch_array($consulta)) {
                echo "<tr>";

                echo "<td>".$linha["id"]."</td>";
                echo "<td>".$linha['nome']."</td>";

                // Verifica a extensão do arquivo
                $extensao = strtolower(pathinfo($linha['nome'], PATHINFO_EXTENSION));

                // Exibe de acordo com o tipo de arquivo
                if ($extensao == "pdf" || $extensao == "png") {
                    echo "<td><a href=\"" . $linha['origem'] . "\">Download</a></td>";
                } elseif ($extensao == "pdf") {
                    echo "<td><a href=\"" . $linha['origem'] . "\">Download</a></td>";
                } else {
                    echo "<td><a href=\"" . $linha['origem'] . "\">Download</a></td>";
                }

                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
