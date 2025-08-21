<!DOCTYPE html>
<html lang="pt-bt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Doe Fácil!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <!-- CDNs (Content Delivery Network) do Bootstrap 5 -->
        <!-- Última versão compilada e minimizada do CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Última versão compilada de JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- CDNs para Máscaras JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <!-- CDN para Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <!-- Script JQuery para a máscara do telefone -->
        <script>
            $(document).ready(function(){
                $("#telefoneUsuario").mask("(00) 00000-0000");
                //$("#cepUsuario").mask("00000-000");
                $("#cpfUsuario").mask("000.000.000-00");
            });
        </script>

    </head>

    <body>
        <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b95b5bff;">
    <div class="container px-4 px-lg-5">

        <!-- Logo e slogan lado a lado -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <!-- Logo à esquerda -->
            <img src="img/logodoefacil.png" alt="Logo DoeFácil" style="width:80px;" title="Retornar para a Página Inicial" class="me-2">
            
            <!-- Texto à direita da logo -->
            <span>Compartilhe amor em forma de alimento! <i class="bi bi-emoji-smile"></i></span>
        </a>

        <!-- Botão do menu (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens de navegação -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="formDoacao.php">Efetuar Doação</a></li>
                <li class="nav-item"><a class="nav-link" href="formLogin.php">Login</a></li>
            </ul>

                <script>
        // Pega o arquivo da URL atual (ex: index.php)
        const currentPage = window.location.pathname.split("/").pop();

        // Seleciona todos os links dentro da navbar
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

        navLinks.forEach(link => {
            // Pega o href de cada link
            const linkPage = link.getAttribute("href");

            // Se o href for igual à página atual, adiciona 'active'
            if (linkPage === currentPage) {
                link.classList.add("active");
                link.setAttribute("aria-current", "page");
            }
        });
    </script>

            <!-- Botão do carrinho -->
            <form class="d-flex">
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
        