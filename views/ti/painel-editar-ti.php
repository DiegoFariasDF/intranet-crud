
<div class="painel">
    <?php
        include 'vac.php'; 
        include 'db.php';  

        // Verifica se houve envio do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';
            $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexao, $_POST['titulo']) : '';
            $texto = isset($_POST['texto']) ? mysqli_real_escape_string($conexao, $_POST['texto']) : '';
            $tabela = "ti";

            // Query SQL corrigida
            $query = "UPDATE ti SET titulo = '$titulo', texto = '$texto' WHERE post = '$npost'";
            
            // Executa a query
            if (mysqli_query($conexao, $query)) {
                echo "Registro atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar registro: " . mysqli_error($conexao);
            }
        }
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $("input[name='post']").blur(function() {
                var $tituloac = $("input[name='titulo']");
                var $textoac = $("textarea[name='texto']"); // Corrigido para textarea
                var postValue = $(this).val();
                
                $.getJSON('function-edit-ti.php', { post: postValue }, function(json) {
                    console.log('Resposta do servidor:', json); // Depuração
                    if (json.titulo) {
                        $tituloac.val(json.titulo);
                        $textoac.val(json.texto);
                    } else {
                        $tituloac.val('');
                        $textoac.val('');
                        alert('Post não encontrado.');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.error('Erro na requisição AJAX:', textStatus, errorThrown); // Depuração
                });
            });
        });
    </script>
    <div>
        <h3>Painel TI</h3>

        <div class="mini-painel">
            <a href="?pagina=painel-ti"><img src="uploads/adicionar.png" alt="Adicionar"></a>
            <strong><a href="?pagina=painel-editar-ti"><img src="uploads/editar.png" alt="Editar"></a></strong>
            <a href="?pagina=painel-deletar-ti"><img src="uploads/remover.png" alt="Remover"></a>
        </div>
        
        <form method="post" action="">
            <input type="number" name="post" placeholder="Qual o número do post?" required>
            <input type="text" name="titulo" placeholder="Título" required>
            <textarea name="texto" placeholder="Texto" required></textarea>
            <input type="submit" id="enviar" value="Enviar">
        </form>
        <p><a href="sair.php">Sair</a></p>

    </div>
</div>

