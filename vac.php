<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("Voce não pode acessar essa pagina, porque não esta logado  <a href=\"http://localhost/cursophp/intranet-crud/index.php?pagina=login\">Entrar</a>");
}

// Restrições de acesso baseadas no perfil
$pagina_permitida = false;

if ($_SESSION['nome'] == "teste" && (
    $_GET['pagina'] == "painel" ||
    $_GET['pagina'] == "painel-editar" ||
    $_GET['pagina'] == "painel-deletar" ||
    $_GET['pagina'] == "painel-comu-arq" ||
    $_GET['pagina'] == "painel-comu-arq-editar" ||
    $_GET['pagina'] == "painel-comu-arq-deletar"
)) {
    $pagina_permitida = true;
}
elseif ($_SESSION['nome'] == "ti" && (
    $_GET['pagina'] == "painel-ti" ||
    $_GET['pagina'] == "painel-editar-ti" ||
    $_GET['pagina'] == "painel-deletar-ti" ||
    $_GET['pagina'] == "painel-ti-arq" ||
    $_GET['pagina'] == "painel-ti-arq-editar" ||
    $_GET['pagina'] == "painel-ti-arq-deletar"
)) {
    $pagina_permitida = true;
}
elseif ($_SESSION['nome'] == "rh" && (
    $_GET['pagina'] == "painel-rh-arq" ||
    $_GET['pagina'] == "painel-editar-rh" ||
    $_GET['pagina'] == "painel-deletar-rh" ||
    $_GET['pagina'] == "painel-rh-arq" ||
    $_GET['pagina'] == "painel-rh-arq-editar" ||
    $_GET['pagina'] == "painel-rh-arq-deletar"
)) {
    $pagina_permitida = true;
}

if (!$pagina_permitida) {
    // Se não tiver permissão para acessar esta página, redireciona para uma página de erro ou para o painel principal
    die("Você não tem permissão para fazer alterações nesse painel  <a href=\"http://localhost/cursophp/intranet-crud/index.php?pagina=login\">Entrar</a>");
}



?>