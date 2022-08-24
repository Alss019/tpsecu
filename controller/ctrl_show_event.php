<?php
include './utils/connectBdd.php';
include './model/model_event.php';
include './manager/manager_event.php';
include './view/view_show_event.php';

$event = new ManagerEvenement(null, null, null);
//stocke dans un tableau la liste des articles de la BDD
$liste = $event->showAllEvent($bdd);
//boucle pour afficher la liste des articles (avec le nom et le prix)
foreach ($liste as $value) {

    echo '<li>
            <span>' . $value->nom_event . '</span>
            <span>' . $value->desc_event . '</span>
            <span>' . $value->date_event . '</span>
        </li>';
}
echo   '</ul>
        </body>
        </html>';
