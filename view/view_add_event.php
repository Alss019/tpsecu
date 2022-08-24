<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Add Event</title>
</head>

<body>
    <div class="add">
        <h3>Ajouter un évenment</h3>
        <form action="" method="post">
            <p><input type="text" name="nom_event" id="input" placeholder="Saisir l'evenement"></p>
            <p><textarea type="textarea" name="desc_event" placeholder="saisir la descritpion"></textarea></p>
            <p>saisir la date et l'heure : </p>
            <p><input type="datetime-local" id="input" name="date_event"></p>
            <p><input type="submit" value="Ajouter" name="add"></p>
        </form>
    </div>
    <div id="error"></div>
</body>

</html>