<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$allEventsObj = new event();


//je récupère les deux id categories et sous catégories dans l'url via le Get
//// pour afficher les événements par catégorie (dans les rubriques de la navbar)

if (isset($_GET['eventcategory_id']) && ($_GET['eventsub_category_id'])) {

    $eventcategory_id = $_GET['eventcategory_id'];
    $eventsub_category_id = $_GET['eventsub_category_id'];
    //j'applique la méthode showbycategory qui servira de filtre d'événements dans ma navbar 
    $arrayShowCategory = $allEventsObj->showByCategory($eventcategory_id, $eventsub_category_id);
} else {
      // sinon par défaut lorsque l'on est sur la page d'accueil tous les événements seront affichés
    // par la méthode showallevents
    $arrayShowCategory = $allEventsObj->showAllEvents();
}






