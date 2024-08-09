<div class="documentos">
    <div>
        <h3>DOCUMENTOS</h3>

        <ul class="mini-painel">
            <li><strong><a href="?pagina=documentos">Comunicação</a></strong></li>
            <li><a href="?pagina=documentos-gp">Gestão de Pessoas</a></li>
            <li><a href="?pagina=documentos-ti">Tecnologia da Informação</a></li>
            <li><a href="?pagina=documentos-lc">Licitação e Compras</a></li>
            
            
            
        </ul>        

        <table id="customers">
            <tr>
                <th>Nº Do Arquivo</th>
                <th>Arquivo</th>
                <th>Download</th>
            </tr>
            
            <?php 
            include("db.php");

            $consulta = mysqli_query($conexao, "SELECT * FROM comunicacaoDownloads");

            while ($linha = mysqli_fetch_array($consulta)) {
                echo "<tr>";

                echo "<td>".$linha["id"]."</td>";
                echo "<td>".$linha['nome']."</td>";

                // Verifica a extensão do arquivo
                $extensao = strtolower(pathinfo($linha['nome'], PATHINFO_EXTENSION));

                // Exibe de acordo com o tipo de arquivo
                if ($extensao == "pdf" || $extensao == "png") {
                    echo "<td><a href=\"" . $linha['origem'] . "\"><img src=\"uploads/baixar.png\"></a></td>";
                } elseif ($extensao == "pdf") {
                    echo "<td><a href=\"" . $linha['origem'] . "\"><img src=\"uploads/baixar.png\"></a></td>";
                } else {
                    echo "<td><a href=\"" . $linha['origem'] . "\"><img src=\"uploads/baixar.png\"></a></td>";
                }

                echo "</tr>";
            }
            ?>
        </table>
        
    </div>
</div>
