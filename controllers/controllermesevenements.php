<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$eventObj = new event();
$profilEventObj = new event();
$deleteEventObj = new event();

//pour supprimer un événement on utilise la fonction deleteEvent mais on précise
//par l'objet $deleteEventObj qu'il doit supprimer via l'id de l'événenemt récupéré dans l'url $_GET
if (isset($_GET['id'])) {
    $deleteEventObj->event_id = $_GET['id'];

    //on crée une méthode getImageNameBeforDelete pour récupérer le nom de l'image chargé dasn la base de données à la création de l'événement
    $fileNameToDelete = $deleteEventObj->getImageNameBeforeDelete();

    if ($fileNameToDelete) {

        //on lui demande de supprimer l'image on cible event_picture//
        unlink('img/' . $fileNameToDelete->event_picture);
        //on lui demande de supprimer l'événement
        $deleteEventObj->deleteEvent();

        //on créé une variable de session deleteEventOK qu'on intialise (true)//
        //afin de créer un message lorsque l'événement sera supprimé
        $_SESSION['deleteEventok'] = true;
    }
}

//on doit lui préciser aussi que l'objet $deleteEventObj est lié à l'id du users connecté $_SESSION
//de cette façon on fait bien le lien entre l'id de l'événement et l'id du users
$deleteEventObj->users_id = $_SESSION['users_id'];


$profilEventObj->users_id = $_SESSION['users_id'];
$resultEventNumber = $profilEventObj->countEventById();


//on va utiliser l'objet $profilEventObj pour utiliser la fonction displayEventById
// et utiliser la requête $arrayProfileEvent pour parcourir le tableau et afficher nos informations
// via le foreach dans la vue mesevenements.php

$arrayProfileEvent = $profilEventObj->displayEventById();






