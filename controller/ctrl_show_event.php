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

        echo '<tr class="row">
                <td>' . $value->nom_event . '</td>
                <td>' . $value->desc_event . '</td>
                <td>' . $value->date_event .  '</td>
            </tr>';
}
echo '</table>
            </div>
        </main>';
