<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$eventObj = new event();
$profilEventObj = new event();
$deleteEventObj = new event();
//j'instancie un nouvel objet

$resultAllDataEvent = $profilEventObj->getAllDataEventCategory();

//$eventObj->event_picture = $_FILES["event_picture"]["name"];


if (isset($_GET['id'])) {
    $deleteEventObj->event_id = $_GET['id'];
//    $deleteEventObj->event_picture;
    $deleteEventObj->deleteEvent();
    /* Fichier à supprimer */
//    if (file_exists($_FILES["event_picture"]["name"])) {
//        unlink('img/' . $_FILES ["event_picture"]["name"]);
//    }
}

$deleteEventObj->users_id = $_SESSION['users_id'];





