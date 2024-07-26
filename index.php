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
        case "documentos-gp": include("views/documentos-gp.php"); break;
        case "documentos-ti": include("views/documentos-ti.php"); break;
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
        case "painel-rh-arq": include("views/rh/painel-rh-arq.php"); break;
        case "painel-rh-arq-editar": include("views/rh/painel-rh-arq-editar.php"); break;
        case "painel-rh-arq-deletar": include("views/rh/painel-rh-arq-deletar.php"); break;
        case "painel-comu-arq": include("views/comunicacao/painel-comu-arq.php"); break;
        case "painel-comu-arq-editar": include("views/comunicacao/painel-comu-arq-editar.php"); break;
        case "painel-comu-arq-deletar": include("views/comunicacao/painel-comu-arq-deletar.php"); break;
        case "painel-editar": include("views/comunicacao/painel-editar.php"); break;
        case "painel-deletar": include("views/comunicacao/painel-deletar.php"); break;
        default: include("views/home.php"); break;
    }       

    include("footer.php");



    // Dicas - utilizar datatable para fazer search de tabelas, e bootstrap para estilizar

    /*
    
    if($pagina == "comunicacao"){
        include("views/comunicacao.php");
    }
    elseif($pagina == "documentos"){
        include("views/documentos.php");
    }
    elseif($pagina == "sobre"){
        include("views/sobre.php");
    }
    elseif($pagina == "gepe"){
        include("views/gepe.php");
    }
    elseif($pagina == "obras"){
        include("views/obras.php");
    }
    elseif($pagina == "orme"){
        include("views/orme.php");
    }
    elseif($pagina == "uti"){
        include("views/uti.php");
    }
    else{
        include("views/home.php");
    }

    
    include("footer.php");

?>


<?php 
/*
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intranet</title>
    <link rel="stylesheet" href="style.css">
    <script src="slide.js" defer></script>

</head>

<body>
    <header id="header"> 
        <div>
            <img src="saaelogo.png" alt="">
        </div>

        <nav>
        <a href="#home">HOME</a>
        <a href="">ARTIGOS</a>
        <a href="">UNIDADES</a>
        <a href="">DOCUMENTOS</a>
        <a href="">ARQUIVOS</a>
        <a href="">CONTATO</a>
        </nav>

        <div>
            <img src="login-de-usuario.png" alt="">
        </div>
    </header> 

    <section class="slider" id="home">

        <div class="slider-content">

            <input type="radio" name="btn-radio" id="radio1">
            <input type="radio" name="btn-radio" id="radio2">
            <input type="radio" name="btn-radio" id="radio3">
            <input type="radio" name="btn-radio" id="radio4">

            <div class="slide-box primeiro">
                <a href="ti.html"><img src="ban3.jpeg" alt=""></a>
            </div>

            <div class="slide-box">
                <a href=""><img src="ban4.jpeg" alt=""></a>
            </div>

            <div class="slide-box">
                <a href=""><img src="ban5.jpeg" alt=""></a>
            </div>

            <div class="slide-box">
                <a href=""><img src="ban2.jpeg" alt=""></a>
            </div>

            <div class="nav-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>

            <div class="nav-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>


        </div>

    </section>


    <nav class="acessfast">

        <nav><h1>Acesso Rápido</h1></nav>

        <nav class="itens">
            <!-- 
            rh online
            documentos da comunicação
            -->

            <nav>
                <a href=""><img src="comunicacao.png"></a>
                <h4>Comunica SAAE</h4>
            </nav>
            <nav>
                <a href="https://www.saaejacarei.sp.gov.br/site/"><img src="sitesaae.png"></a>
                <h4>Site SAAE</h4>
            </nav>

            <nav>
                <a href="https://www.jacarei.sp.gov.br/"><img src="sitepref.png"></a>
                <h4>Site Prefeitura</h4>
            </nav>

            <nav>
                <a href="https://painel-saaejacarei.geosiap.net.br/"><img src="siteembras.png"></a>
                <h4>Painel Embras</h4>
            </nav>

            <nav>
                <a href="https://boletinsoficiais.geosiap.net/pmjacarei/public/publicacoes"><img src="boletim.png"></a>
                <h4>Boletim Oficial</h4>
            </nav>

            <nav>
                <a href="Lista de Ramais SAAE - Março 2024.pdf"><img src="ramais1.png"></a>
                <h4>Lista de Ramais</h4>
            </nav>

            <nav>
                <a href="Lista e-mail atualizada - Março 2024.csv"><img src="listaemail1.png"></a>
                <h4>Lista de E-mail</h4>
            </nav>

            <nav>
                <a href="formgp.html"><img src="formgp.png"></a>
                <h4>Formulario Gestão de Pessoas</h4>
            </nav>

            <nav>
                <a href=""><img src="formti.png"></a>
                <h4>Formulario UTI</h4>
            </nav>

            <nav>
                <a href="https://saaejacarei.geosiap.net.br/saaejacarei/websis/siapegov/recursos_humanos/grh/grh_rh_online.php"><img src="rhonline.png"></a>
                <h4>RH Online</h4>
            </nav>


        </nav>

    </nav> <!-- fim do acessfast -->


    <nav class="artigos">
        <nav><h1>Artigos</h1></nav>
        <nav class="coluna">

            <nav> 
                <a href=""><img src="doc.comuni.png"></a>
                <h4>Documentos padronizados da Comunicação</h4>
            </nav>
            <nav>
                <a href=""><img src="form.gp.png"></a>
                <h4>Formulário Gestão de Pessoas</h4>
            </nav>

            <nav>
                <a href=""><img src="gov.png"></a>
                <h4>Assinatura eletrônica GOV BR</h4>
            </nav>
            <nav> 
                <a href=""><img src="adobe.png"></a>
                <h4>Assinatura eletrônica com ADOBE READER</h4>
            </nav>
        </nav>
    </nav><!--fim de artigos-->


    <nav class="rodape">

    </nav>

    <script src="index.js"></script>

</body>
</html>
*/

?>    