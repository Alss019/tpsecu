<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addUtil.css">
    <title>Document</title>
</head>

<body>
    <div class="add">
        <h3>Inscription</h3>
        <form action="" method="post">

            <p><input type="text" name="name_util" id="input" placeholder="Nom"></p>

            <p><input type="text" name="first_name_util" id="input" placeholder="Prenom"></p>

            <p><input type="mail" name="mail_util" id="input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email"></p>

            <p><input type="password" name="pwd_util" id="input" pattern="(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z]).{6,}" placeholder="Mot de passe"></p>

            <p><input type="password" name="confirm_pwd" id="input" pattern="(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z]).{6,}" placeholder="Confirmer mot de passe"></p>
            <p>Cocher si Admin
                <input type="checkbox" name="id_role">
            </p>
            <p><input type="submit" value="Ajouter" name="createUtil"></p>
        </form>
    </div>
    <div class="connex">
        <h3>Connexion</h3>
        <form action="" method="post">
            <!-- <p>Saisir un email :</p> -->
            <p><input type="mail" name="mail_util" id="input" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email"></p>
            <!-- <p>Saisir un mot de passe :</p> -->
            <p><input type="password" name="pwd_util" id="input" pattern="(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z]).{6,}" placeholder="Mot de passe"></p>
            <p><input type="submit" value="Connexion" name="connect"></p>
        </form>
    </div>
</body>

</html>