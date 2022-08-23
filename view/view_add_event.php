<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Add Event</title>
</head>
<body>
    <h3>Ajouter un évenment</h3>
    <form action="" method="post">
        <p>saisir le nom :</p>
        <p><input type="text" name="nom_event"></p>
        <p>saisir la descritpion :</p>
        <p><input type="text" name="desc_event"></p>
        <p>saisir la date et l'heure : </p>
        <p><input type="date" name="date_event"></p>
        <p><input type="submit" value="Ajouter" name="add"></p>
    </form>
    <div id="error"></div>
</body>
</html>