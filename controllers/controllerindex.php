<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$allEventsObj = new event();

//j'instancie un nouvel objet

if (isset($_GET['eventcategory_id']) && ($_GET['eventsub_category_id'])) {

    $eventcategory_id = $_GET['eventcategory_id'];
    $eventsub_category_id = $_GET['eventsub_category_id'];
    $arrayShowCategory = $allEventsObj->showByCategory($eventcategory_id, $eventsub_category_id);
} else {
    $eventcategory_id = $_GET['eventcategory_id'];
    $arrayShowCategory = $allEventsObj->showAllEvents();
}

//if (isset($_GET['eventcategory_id'])) {
//
//    $eventcategory_id = $_GET['eventcategory_id'];
//    $resultArrayAllEvents = $allEventsObj->showAllEvents();
//}



