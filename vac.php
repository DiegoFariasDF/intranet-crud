<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("Voce não pode acessar essa pagina, porque não esta logado  <a href=\"http://localhost/intranet-crud/index.php?pagina=login\">Entrar</a>");
}

?>