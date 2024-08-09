<?php
include_once("db.php");

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

function retorna($post, $conexao) {
    $post = mysqli_real_escape_string($conexao, $post);
    $result_post = "SELECT * FROM rh WHERE post = '$post' LIMIT 1";
    $resultado_post = mysqli_query($conexao, $result_post);
    $valores = array();

    if ($resultado_post && $resultado_post->num_rows > 0) {
        $row_post = mysqli_fetch_assoc($resultado_post);
        $valores['titulo'] = $row_post['titulo'];
        $valores['texto'] = $row_post['texto'];
    } else {
        $valores['titulo'] = '';
        $valores['texto'] = '';
    }
    
    return json_encode($valores);
}

if (isset($_GET['post'])) {
    echo retorna($_GET['post'], $conexao);
}
?>
