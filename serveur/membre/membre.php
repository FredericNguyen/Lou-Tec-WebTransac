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
        <title>REN-TEC - Membre</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../client/utilitaires/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../client/css/styles.css">
        <script src="../../client/utilitaires/jquery-3.6.3.min.js"></script>
        <script src="../../client/js/global.js"></script>
        <script src="../../client/Membre/panier.js"></script>
        <script src="../../client/Membre/requetesMembre.js"></script>
        <script src="../../client/Membre/vuesMembre.js"></script>
    </head>
    <body onLoad="chargerProduitsFETCH(); chargerCategoriesFETCH();">
        <?php
            require_once('../includes/header.php');
        ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav" style="margin-bottom: 20px;">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.php">REN-TEC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="serveur/about.php">About</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="serveur/devenirMembre.php">Profil</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="javascript: document.getElementById('dc').submit();">Deconnexion</a></li>
                    </ul>
                    <div class="photo">
                        <?php echo "  Bienvenu, ".$_SESSION['prenom'].", ".$_SESSION['nom']."  <img src='".$_SESSION['photo']."' width=48 height=48>"."  <img src='../../client/assets/img/cart.svg' onClick='afficherPanier();' width=48 height=48>"; ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="contenu"></div>
        <!-- Modal du panier -->
        <div class="modal fade" id="idModPanier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contenuPanier"></div>
            </div>
            </div>
        </div>
        </div>
        <!-- Fin du modal du panier -->
        <form id="dc" action="../connexion/controleurConnexion.php" method="POST">
      <input type="hidden" class="form-control is-valid" id="action_con" name="action_con" value="deconnexion" required>
      </form>
        <?php
            require_once('../includes/footer.php')
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
