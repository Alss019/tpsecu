<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ManagerUtil extends Utilisateur
{
    public function createUtil(object $bdd): void
    {
        //récupérer les valeurs de l'objet utilisateur
        $name = $this->getNameUtil();
        $first = $this->getFirstNameUtil();
        $mail = $this->getMailUtil();
        $password = $this->getPwdUtil();
        $id = $this->getIdRole();
        $valide = $this->getValide();
        $token = $this->getToken();
        try {
            //Preparation de la requete
            $req = $bdd->prepare('INSERT INTO utilisateur(name_util, first_name_util,
                mail_util, pwd_util, id_role, valide_util, token_util)
                VALUES (?, ?, ?, ?, ?, ?, ?)');
            // Affection des parametres
            $req->bindparam(1, $name, PDO::PARAM_STR);
            $req->bindparam(2, $first, PDO::PARAM_STR);
            $req->bindparam(3, $mail, PDO::PARAM_STR);
            $req->bindparam(4, $password, PDO::PARAM_STR);
            $req->bindparam(5, $id, PDO::PARAM_STR);
            $req->bindparam(6, $valide, PDO::PARAM_BOOL);
            $req->bindparam(7, $token, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getUtilByMail(object $bdd): ?array
    {
        try {
            $mail = $this->getMailUtil();
            //préparation de la requête
            $req = $bdd->prepare('SELECT id_util, name_util, 
            first_name_util, mail_util, pwd_util, id_role, valide_util, token_util 
            FROM utilisateur WHERE mail_util = ?');
            //affectation des paramètres
            $req->bindparam(1, $mail, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        //exception
        catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
        return $data;
    }
    public function sendMail2(
        ?string $userMail,
        ?string $subject,
        ?string $emailMessage,
        ?string $login_smtp,
        ?string $mdp_smtp
    ) {
        require './vendor/autoload.php';
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $login_smtp;
            $mail->Password   = $mdp_smtp;
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            //Recipients
            $mail->setFrom($login_smtp, 'secu');
            $mail->addAddress($userMail);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $emailMessage;
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    //fonction active un compte
    public function activateUtil(object $bdd): void
    {
        try {
            $token = $this->getToken();
            //préparation de la requête
            $req = $bdd->prepare('UPDATE utilisateur SET valide_util = 1 
                    WHERE token_util = ?');
            //affectation des paramètres
            $req->bindparam(1, $token, PDO::PARAM_STR);
            $req->execute();
        }
        //exception
        catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    //récuper un utilisateur avec son token
    public function getUtilByToken(object $bdd): ?array
    {
        try {
            $token = $this->getToken();
            //préparation de la requête
            $req = $bdd->prepare('SELECT id_util, name_util, 
                    first_name_util, mail_util, pwd_util, id_role, valide_util, token_util 
                    FROM utilisateur WHERE token_util = ?');
            //affectation des paramètres
            $req->bindparam(1, $token, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        //exception
        catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
        return $data;
    }
}
