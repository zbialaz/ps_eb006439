<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP, BOOTSTRAP ICONS, FONT-AWESOME ICONS, ANIMATE CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- ANIMATED.CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- CSS PRINCIPAL -->
    <link rel="stylesheet" href="/assets/css/style-sb-admin.css">
    <link rel="stylesheet" href="/assets/css/style-admin.css">
    <!-- SWEET ALERT -->
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=rR1j2AEmlNlfUq2Q9SpmYBpuaXwptQci2Ez3T1aP_GzFuz8s3P1FS04xnGYmnZ-AFDtnBWtBVevUsTq9nk3Bzgw3LHnupWUFusfIOkRb1rIk2LEcfHJgGNdeydTvaiYWNS7Eicqs3O7Sx5yC2s9XbpPtsPEc5PmSlkUEeltXAGwDCm5-ss1bW1e3AN5zuxE-2gH0YwtGkcHYmofcLk5Yq-Mb_d_lLRAW9q_XL2YY14vJoz334f9Q8XBv6rGZna_Vv9BBbIxim6KLOgXqVw52-jlXVn4cLK9HIfu612ammwqekWCl5M4yeAbOkeL7jEl3o1rk5xSpgawaQOQ0Iqh3IaW-3gPWLUtp7ZdwMgL0EDCpEuIwngbmIZwihyq0prmQ7N44zEJrKkHMlgQnvuOEDvp-MExUtWEKppuC6ASMdva0F-re7RH2zsGvi2u8xEf3w7R2Jdf18xLF9AKuXEHqcb0EGk1_B-IGfErI0-KgFq49SBzOwDeUcyBazPlE-EdOFPled4X16CxUcFpcSURwI1vsaR4926OaKmQdylz30dPS0Zi-OcszShNd3iUq-1mc2vjRJW0TUPbg6VE_mXCZTPtJTnYBHnbQ2YbU16geJEAbgww2jqd6GMVVzfqzznHlRbz35HzanE4o0mfgROIsTZ72eZyZE0R6OTqHKdw5L-1gh7tdz3gQSaEPCZ-5iIxIBlAG5wa2CvpG-_ZInUtTmlyFTcw_R7bSMc4jBPBHERopLWg2fYlUPgG21nZYBzSY6Gut6srRwMjN4jfNcjehU7v3C0yJtSfr9F8-Ny14D7zeQIwXCPgeKRINYBbSb2CfIj0yc-kZB0YB3vG0Yysw2_NCo7sRE5WNPs4wQnqtA3jFpEkd_oW77ukkZHw88zb7PcHttpGQzBYHPZgvuUSJv_de2ojWjMrN0d9J_n8Jfpt16qYBQsNsmljU8oVc-6RjDWWbpBPCgSRWVH6bZOWcualUSo5maMXpVhMcVSPSqDi8V2gpEPuzI7fcKW-4jeNW5tI7RIRzAV_tfESvSOzL04tfHZAGScRIRH_aXLUPoyF4irSGUUah54g1XsugnV_5molXpJ-iBBL_xAnUcHP0tRNJEza01SQYNwtxbWoBfbpet8MxtJWbVuesMPyUpDtHW60zQAmenstTqQ-pcO9rsOeAgYO5KWQ8q8bKL_ZAr462ypyPvBrMnmAwt3FI3EtDGbX7DFaeaeHt-38chVLotGLEH8vnHY8zS3SG4_HOcb59FfxVwJJsLkmyWp71tqmL5CSezrkGBUKiDv7v_jhZ4kpd0AUSzQLRFfgzC-iobEGMwww92oPd_5EcP8Zcdd8Z1To91wdvyDkoSss5fGonN9PVMxj8_Czw-oNJDe-dT2MBXRGuKnroJyWGh-CsQlVc2qphAdfX0FMd-zh0rhXoQOIeWXHEQVjDYQEslOGWswBplKIM8mlwvgnnaBYeo75J-BYN2nDUfdqGIN8Tu63RJRbu8lVwttUckiY-T4BTpdTjMm8ypGc0nuczkrAMxMeUgzSNBUPyAirTgYUzbLJvlLsLuYsjWddFYQALqrcM1A2vwZg8J67iNYn4BqQ1srpaDBUrghQFxS1WfMzvOte7FThipX-jNBNaUrQkWCzt4pC4ITtkBq5fHk6_ytlGid-i" charset="UTF-8"></script><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= $titulo??'' ?></title>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/admin"><?=$nomesite??''?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form action="/admin/busca" method="POST" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" name="busca" placeholder="Buscar por..." aria-label="Buscar por..." aria-describedby="btnNavbarSearch">
                <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/admin/config">Configurações</a></li>
                    <li><a class="dropdown-item" href="/admin/log">Exibir log</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/logout">Sair</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- EXEMPLO DE TÍTULO DO GRUPO DE LINKS NO MENU -->
                        <div class="sb-sidenav-menu-heading">Menu</div>

                        <!-- EXEMPLO DE LINK NO MENU -->
                        <a class="nav-link" href="/admin/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="/admin/empresas">
                            <div class="sb-nav-link-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            Empresas
                        </a>

                        <a class="nav-link" href="/admin/usuarios">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-fill-lock"></i></div>
                            Usuários
                        </a>

                        <a class="nav-link" href="/admin/clientes">
                            <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                            Clientes
                        </a>

                        <a class="nav-link" href="/admin/dicas">
                            <div class="sb-nav-link-icon"><i class="bi bi-lightbulb-fill"></i></div>
                            Dicas
                        </a>

                        <a class="nav-link" href="/admin/marcas">
                            <div class="sb-nav-link-icon"><i class="bi bi-bookmarks-fill"></i></div>
                            Marcas
                        </a>

                        <a class="nav-link" href="/admin/categorias">
                            <div class="sb-nav-link-icon"><i class="bi bi-diagram-2-fill"></i></div>
                            Cetegorias
                        </a>

                        <a class="nav-link" href="/admin/produtos">
                            <div class="sb-nav-link-icon"><i class="bi bi-tags-fill"></i></div>
                            Produtos
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logado como:</div>
                    <?=$usuario['nome']??''?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?=$tituloInterno??''?></h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->