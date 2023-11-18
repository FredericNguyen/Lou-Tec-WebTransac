<?php
    session_start(); 
    if(!isset($_SESSION['role'])){
        //on redirige tous les demandes de cette page a la page d'accueil si pas de connexion
        header('Location: ../../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../client/utilitaires/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../client/css/styles.css">
    <script src="../../client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.js"></script>
    <script src="../../client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="../../client/js/global.js"></script>
    <script src="../../client/Produit/requetesProduit.js"></script>
    <script src="../../client/Produit/vuesProduit.js"></script>
    <script src="../../client/Admin/requetesAdmin.js"></script>
    <script src="../../client/Admin/vuesAdmin.js"></script>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript: chargerCategoriesFETCH(); chargerProduitsFETCH();">Gérer Produits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript: listerMembres();">Gérer Membres</a>
            </li>
            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="javascript: document.getElementById('dc').submit();">Deconnexion</a></li>
          </ul>
        </div>
      </div>
      <form id="dc" action="../connexion/controleurConnexion.php" method="POST">
      <input type="hidden" class="form-control is-valid" id="action_con" name="action_con" value="deconnexion" required>
      </form>
    </nav>
      
      <!-- Fin de barre de navigation -->
      <div class="container" id="contenu" ></div>
</body>
</html>