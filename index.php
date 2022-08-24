<?php
include './utils/fonction.php';
include './view/header.php';


session_start();
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine 
$path = isset($url['path']) ? $url['path'] : '/';
//test de la valeur $path dans l'URL et import de la ressource 
switch ($path) {
        //route /routing/addUser -> ./controler/controler_add_user.php 
    case $path === "/tpsecu/addUtil":
        include './controller/ctrl_add_util.php';
        break;
    case $path === "/tpsecu/active":
        include './controller/ctrl_active_compte.php';
        break;
    case $path === "/tpsecu/addEvent":
        include './controller/ctrl_add_event.php';
        break;
    case $path === "/tpsecu/showEvent":
        include './controller/ctrl_show_event.php';
        break;
    default:
        include './controller/ctrl_home.php';
        break;
}
