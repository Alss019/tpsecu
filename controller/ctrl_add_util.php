<?php
include './utils/connectBdd.php';
include './id_smtp.php';
include './model/model_util.php';
include './manager/manager_util.php';
include './view/view_add_util.php';

$message = "";
//test si le bouton submit est cliqué
if (isset($_POST['createUtil'])) {
    //test si tous les champs sont remplis
    if (
        $_POST['name_util'] != "" and $_POST['first_name_util'] != "" and
        $_POST['mail_util'] != "" and $_POST['pwd_util'] != "" and
        $_POST['confirm_pwd'] != ""
    ) {
        //stocker et nettoyer les super globales $_POST (password)
        $pwd_util = cleanInput($_POST['pwd_util']);
        $confirm_pwd = cleanInput($_POST['confirm_pwd']);
        //test correspondance du mot de passe
        if ($pwd_util == $confirm_pwd) {
            //stocker et nettoyer les super globales $_POST
            $name_util = cleanInput($_POST['name_util']);
            $first_name_util = cleanInput($_POST['first_name_util']);
            $mail_util = cleanInput($_POST['mail_util']);
            //instance d'un objet ManagerUtil (role utilisateur)
            $util = new ManagerUtil(
                $name_util,
                $first_name_util,
                $mail_util,
                $pwd_util,
                1
            );
            //création du token
            $util->setToken(md5($mail_util));
            //récupération d'un compte utilisateur en BDD
            $testMail = $util->getUtilByMail($bdd);
            //test existence de l'utilisateur (éviter les doublons)
            if ($testMail == null) {
                //test si admin
                if (isset($_POST['id_role'])) {
                    //set id_role à 2
                    $util->setIdRole(2);
                }
                //paramètre cout (nbr de tour de l'algo de hash)
                $options = [
                    'cost' => 12,
                ];
                //hasher le mot de passe
                $pwd_util = password_hash($pwd_util, PASSWORD_BCRYPT, $options);
                //set du password hash
                $util->setPwdUtil($pwd_util);
                //insertion du compte en BDD
                $util->createUtil($bdd);
                //Variables pour envoi du mail de confirmation
                //récupération du token
                $hash = $util->getToken();
                $userMail = $mail_util;
                $subject = utf8_decode("Vérification de votre compte secu");
                $emailMessage = "<a href='http://localhost/tpsecu/active?id=$hash'>
                Activer votre compte utilisateur</a>";
                //envoi du mail d'activation
                $util->sendMail2(
                    $userMail,
                    $subject,
                    $emailMessage,
                    $login_smtp,
                    $mdp_smtp
                );
                //message de confirmation
                $message = "<br>Le compte $name_util à été ajouté";
            }
            //test sinon l'utilisateur existe déja
            else {
                $message = "Le compte existe déja";
            }
        }
        //test sinon mot de passe ne correspondent pas
        else {
            $message = "Les mots de passe de correspondent pas";
        }
    } else {
        $message = "Veuillez compléter tous les champs";
    }
}
//test non cliqué
else {
    $message = "Veuillez compléter le formulaire et cliquer sur ajouter";
}
echo '<p style="grid-column:1; text-align:center;">' . $message . '</p>';

if (isset($_POST['connect'])) {
    if ($_POST['mail_util'] != "" && $_POST['pwd_util'] != "") {

        $pwd_util = cleanInput($_POST['pwd_util']);
        $mail_util = cleanInput($_POST['mail_util']);

        $util = new ManagerUtil(null, null, $mail_util, $pwd_util, null, null, null);

        $compte = $util->getUtilByMail($bdd);
        // on verifie si il y a un compte ayant ce mail en BDD 
        if ($compte != null) {
            // on peut passer à la verification du mot de 
            $hash = $compte[0]['pwd_util'];
            //vérifie si le mot de passe correspond
            $password = password_verify($pwd_util, $hash);

            if ($password) {
                // les mots de passe correspondent
                // on initialise les varibles de session
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $compte[0]['id_util'];
                $_SESSION['name'] = $compte[0]['name_util'];
                $_SESSION['first'] = $compte[0]['first_name_util'];
                $_SESSION['mail'] = $compte[0]['mail_util'];
                $_SESSION['roles'] = $compte[0]['id_role'];
                // on redirige vers la page d'accueil
                $message = "Connexion réussi";
                redirection("/tpsecu/", "1000");
            } else {
                $message = "Erreur de connexion";
            }
        }
    }
}
echo '<p style="grid-column:2;text-align:center;">' . $message . '</p>';
