<div class="painel">

    <?php
        include 'vac.php'; 
        include 'db.php';  

        // Verifica se houve envio do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $npost = isset($_POST['post']) ? mysqli_real_escape_string($conexao, $_POST['post']) : '';
            $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexao, $_POST['titulo']) : '';
            $texto = isset($_POST['texto']) ? mysqli_real_escape_string($conexao, $_POST['texto']) : '';
            $tabela = "comunica";
           

            // Query SQL corrigida
            $query = "UPDATE COMUNICA SET titulo = '$titulo', texto = '$texto' WHERE POST = '$npost'";
            
            // Executa a query
            if (mysqli_query($conexao, $query)) {
                $mensagem = "Registro atualizado com sucesso.";
            } else {
                $mensagem =  "Erro ao atualizar registro: " . mysqli_error($conexao);
            }
        }
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $("input[name='post']").blur(function() {
                var $tituloac = $("input[name='titulo']");
                var $textoac = $("textarea[name='texto']"); // Corrigido para textarea
                var postValue = $(this).val();
                
                $.getJSON('function-edit-comunica.php', { post: postValue }, function(json) {
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

    <div class="menulateral">
        <div><h2>Painel Comunicação</h2></div>
        <div class="menulateral1">     
            <strong><a href="?pagina=painel"><img src="uploads/shared-post.png">Posts</a></strong>
            <a href="?pagina=painel-comu-arq"><img src="uploads/compartilhar-pasta.png"> Arquivos</a>
            <a href="sair.php"><img src="uploads/logout-arredondado.png"> Sair</a>
                
        </div>

    </div>


    <div class="caixapainel">
        <h3>Painel Comunicação</h3>

        <div class="mini-painel">
            <a href="http://localhost/cursophp/intranet-crud/index.php?pagina=painel"><img src="uploads/adicionar.png"></a>
            <strong><a href="?pagina=painel-editar"><img src="uploads/editar.png"></a></strong>
            <a href="?pagina=painel-deletar"><img src="uploads/remover.png"></a>
        </div>
        
        <form method="post" action="">
            <input type="number" name="post" placeholder="Qual o numero do post?" required>
            <input type="text" name="titulo" placeholder="Titulo" required>
            <textarea name="texto" placeholder="Texto" required></textarea>
            <input type="submit" id="enviar" value="Enviar">
        </form>
        
        <div> <?php  echo $mensagem;?></div>
    </div>
</div>
