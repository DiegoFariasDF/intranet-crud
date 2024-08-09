<?php 
    
    #banco de dados
    include("db.php");
    include("header.php");
    #conteudo da pagina

   
        if(isset($_GET['pagina'])){
            $pagina = $_GET["pagina"];
        }
        else{
            $pagina = 'home';
        }
    
    
    

    switch ($pagina){
        case "comunicacao": include("views/comunicacao.php"); break;
        case "documentos": include("views/documentos.php"); break;
        case "documentos-gp": include("views/documentos-rh.php"); break;
        case "documentos-ti": include("views/documentos-ti.php"); break;
        case "documentos-lc": include("views/documentos-lc.php"); break;
        case "arquivos": include("views/arquivos.php"); break;
        case "sobre": include("views/sobre.php"); break;
        case "gepe": include("views/gepe.php"); break;
        case "obras": include("views/obras.php"); break;
        case "orme": include("views/orme.php"); break;
        case "uti": include("views/uti.php"); break;
        case "login": include("login.php"); break;
        case "painel": include("painel.php"); break;
        case "painel-ti": include("painel-ti.php"); break;
        case "painel-editar-ti": include("views/ti/painel-editar-ti.php"); break;
        case "painel-deletar-ti": include("views/ti/painel-deletar-ti.php"); break;
        case "painel-ti-arq": include("views/ti/painel-ti-arq.php"); break;
        case "painel-ti-arq-editar": include("views/ti/painel-ti-arq-editar.php"); break;
        case "painel-ti-arq-deletar": include("views/ti/painel-ti-arq-deletar.php"); break;
        case "rh": include("views/gepe.php"); break;
        case "painel-rh": include("painel-rh.php"); break;
        case "painel-editar-rh": include("views/rh/painel-editar-rh.php"); break;
        case "painel-deletar-rh": include("views/rh/painel-deletar-rh.php"); break;
        case "painel-rh-arq": include("views/rh/painel-rh-arq.php"); break;
        case "painel-rh-arq-editar": include("views/rh/painel-rh-arq-editar.php"); break;
        case "painel-rh-arq-deletar": include("views/rh/painel-rh-arq-deletar.php"); break;
        case "painel-comu-arq": include("views/comunicacao/painel-comu-arq.php"); break;
        case "painel-comu-arq-editar": include("views/comunicacao/painel-comu-arq-editar.php"); break;
        case "painel-comu-arq-deletar": include("views/comunicacao/painel-comu-arq-deletar.php"); break;
        case "painel-editar": include("views/comunicacao/painel-editar.php"); break;
        case "painel-deletar": include("views/comunicacao/painel-deletar.php"); break;
        case "lc": include("views/lc.php");break;
        case "painel-lc": include("painel-lc.php"); break;
        case "painel-editar-lc": include("views/lc/painel-editar-lc.php"); break;
        case "painel-deletar-lc": include("views/lc/painel-deletar-lc.php"); break;
        case "painel-lc-arq": include("views/lc/painel-lc-arq.php"); break;
        case "painel-lc-arq-editar": include("views/lc/painel-lc-arq-editar.php"); break;
        case "painel-lc-arq-deletar": include("views/lc/painel-lc-arq-deletar.php"); break;


        default: include("views/home.php"); break;
    }           

    include("footer.php");



    // Dicas - utilizar datatable para fazer search de tabelas, e bootstrap para estilizar


?>    