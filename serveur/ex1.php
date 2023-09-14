<?php
    require_once('includes/donnees.inc.php');
    require_once('includes/utilitaires.inc.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
    <link rel="stylesheet" href="../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="../client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="../client/js/global.js"></script>
</head>
<body>
    
    <h2>Liste des nombres impairs</h2>
<?php
function inutile(){
    return afficherTR();
}
    $rep    =    <<<REPONSE
                <table class='table'>
                <thead>
                    <tr>
                    <th>Nombres impairs</th>
                    </tr>
                </thead>
                <tbody>
            REPONSE;
            $rep .= inutile();
        $rep.="</tbody></table>";
        echo $rep;
?>
</body>
</html>


