<?php
include './utils/connectBdd.php';
include './model/model_utilisateur.php';
include './manager/manager_utilisateur.php';
include './view/view_active.php';
$message = "";
//test si $_GET['id'] existe et est non vide
if (isset($_GET['id']) and $_GET['id'] != "") {
    //nettoyer le contenu de $_GET['id']
    $token = cleanInput($_GET['id']);
    //instance de ManagerUtil
    $util = new ManagerUtil(null, null, null, null, null);
    //set la valeur du token
    $util->setToken($token);
    //récupére l'utilisateur
    $testToken = $util->getUtilByToken($bdd);
    //test si l'utilisateur existe
    if ($testToken != null) {
        //active le compte
        $util->activateUtil($bdd);
        $message = "Le compte à été activé";
    }
    //l'utilisateur n'existe pas
    else {
        $message = "erreur impossible d'activer le compte";
    }
}
//$_GET['id'] n'existe pas ou vide
else {
    $message = "Erreur aucuns Paramètres";
}
echo $message;
