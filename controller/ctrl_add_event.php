<?php
//import
include './utils/connectBdd.php';
include './model/model_event.php';
include './manager/manager_event.php';
include './view/view_add_event.php';
//message 
$message = "";
//test si le bouton submit est cliqué
if (isset($_POST['add'])) {
    //test si les champs sont remplis
    if ($_POST['nom_event'] != "" and $_POST['desc_event'] != "" and $_POST['date_event'] != "") {
        //sécurisation des variables POST
        $nom = cleanInput($_POST['nom_event']);
        $desc = cleanInput($_POST['desc_event']);
        $date = $_POST['date_event'];
        //instancier l'objet
        $event = new ManagerEvenement($nom, $desc, $date);
        $event->createEvent($bdd);
        $message = mb_strtoupper($event->getNomEvent()) . " a été ajouté en BDD";
    }
    //test sinon les champs sont vides
    else {
        $message = 'Les champs sont vides';
    }
}
//test sinon le bouton n'est pas cliqué
else {
    $message = 'Pour ajouter un event cliquez sur ajouter';
}
//affichage du message d'erreur
echo '<p style="grid-column:1;text-align:center;">' . $message . '</p>';
