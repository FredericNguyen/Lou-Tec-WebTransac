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
    <title>Membre</title>
</head>
<body>
    <h1>Page Membre</h1>
</body>
</html>