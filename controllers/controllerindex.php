<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$allEventsObj = new event();

//j'instancie un nouvel objet

$resultArrayAllEvents = $allEventsObj->showAllEvents();

//if (isset($_GET['id'])) {
//    $allEventsObj->id = $_GET['id'];
//}


