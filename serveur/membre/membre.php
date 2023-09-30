<?php
    session_start(); 
    if(!isset($_SESSION['role'])){
        //on redirige tous les demandes de cette page a la page d'accueil si pas de connexion
        header('Location: ../../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>REN-TEC - Accueil</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../client/utilitaires/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../client/css/styles.css">
        <script src="../../client/utilitaires/jquery-3.6.3.min.js"></script>
        <script src="../../client/js/global.js"></script>
    </head>
    <body>
        <?php
            require_once('../includes/header.php');
        ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.php">REN-TEC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="serveur/about.php">About</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="serveur/devenirMembre.php">Profil</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="javascript: document.getElementById('formDec').submit();">Deconnexion</a></li>
                    </ul>
                    <?php echo $_SESSION['prenom'].', '.$_SESSION['nom']; ?>
                </div>
            </div>
        </nav>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="client/assets/img/intro.jpg" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Fresh Coffee</span>
                            <span class="section-heading-lower">Worth Drinking</span>
                        </h2>
                        <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                        <div class="card" style="width: 18rem;">
                            <img src="./client/assets/img/products-01.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">RÉCUREUSE (LAVEUSE) À PLANCHER 28″-34″</h5>
                                <p class="card-text"><span>Prix Jour: 236$ <br></span><span>VOIR PLUS DE DÉTAILS</span></p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./client/assets/img/products-02.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">CHARIOT TÉLESCOPIQUE 10000 LB - DIECI - ICARUS 45.17</h5>
                                <p class="card-text"><span>Prix Jour: 910$ <br></span><span>VOIR PLUS DE DÉTAILS</span></p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./client/assets/img/products-03.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">CÂBLE DE NYLON - 7/8″ X 300</h5>
                                <p class="card-text"><span>Prix Jour: 51$ <br></span><span>VOIR PLUS DE DÉTAILS</span></p>
                            </div>
                        </div>
                </div>
                <form id="formDec" action="../connexion/controleurConnexion.php" method="POST">
                    <input type="hidden" name="action" value="deconnexion">          
            </div>
        </section>
        <?php
            require_once('../includes/footer.php')
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="client/js/scripts.js"></script>
    </body>
</html>
