<?php
$bdd = new PDO(
    'mysql:host=localhost;dbname=tpsecu',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
