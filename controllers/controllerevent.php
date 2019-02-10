<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';

//on instancie un nouvel objet event
$eventObj = new event();

// On édite les regex
$regexLetter = '/^[a-zA-ZÄ-ÿ\-]+$/'; //autorise les lettres alplhabet majuscules et minuscules et les accents
$regextitle = '/^[A-ZÄ-ÿ\-]+$/'; //autorise les lettres de l'alphabet seulement les majuscules et accents
$regexLetternumber = '/^[\wÄ-ÿ\-]+$/'; //autorise les lettres maj et min et accents et chiffres de 0 à 9
$regexNumber = '/^[0-9]{2}+$/'; //autorise uniquement les chiffres et seulement 2 chiffres
$regexPassword = '/^[\w0-9\-._]{6,}+$/'; //autorise les lettres aplhabets chiffres -._,  mini 6 caractères
$regexMail = '/^[a-z0-9.-_]+@[a-z0-9.-_]+.[a-z]{2,6}$/'; //autorise les lettres et chiffres .-_
//regexdate autorise pour le JJ j'autorise le 0 et entre 1 et 9 (ex02) ou bien entre 1 et 9 (ex14)ou bien entre 10 et 19 ou bien
//20 et 29 ou bien 30 et 31 pour le MM j'autorise entre 01 et 09 puis 10 à 12 pour le YYYY j'autorise 2018 2019 ou 2020 à 2022//
$regexdate = '/^(0[1-9]|([1-9])|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(20([0-9][0-9]))$/'; //autorise le format date ex 12/01/2018
$regextime = '/^[0-9][0-9]:[0-3][0]:[0][0]$/'; // autorise les chiffres
$regexformatfichier = '/^[\wÄ-ÿ\-]+((.jpg|.bmp|.png))+$/'; //autorise les chiffres, lettres et accents et formats jpg bmp et png
//on déclare un tableau d'erreurs vide
$errorsArrayevent = [];
$extensions_valides = array('jpg', 'bmp', 'png');

$modalErrorevent = false;

if (isset($_POST['eventcategory_id'])) {
    $eventcategory_id = htmlspecialchars($_POST['eventcategory_id']);
    if (!preg_match($regexLetter, $eventcategory_id)) {
        $errorsArrayevent['eventcategory_id'] = 'Merci de saisir une catégorie d\'événements';
    }
    if (empty($eventcategory_id)) {
        $errorsArrayeventvent['eventcategory_id'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['eventsubcategory_id'])) {
    $eventsubcategory_id = htmlspecialchars($_POST['eventsubcategory_id']);
    if (!preg_match($regexLetter, $eventsubcategory_id)) {
        $errorsArrayevent['eventsubcategory_id'] = 'Merci de saisir une sous-catégorie d\'événements';
    }
    if (empty($eventsubcategory_id)) {
        $errorsArrayevent['eventsubcategory_id'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['event_title'])) {
    $event_title = htmlspecialchars($_POST['event_title']);
    if (!preg_match($regextitle, $event_title)) {
        $errorsArrayevent['event_title'] = 'Merci de saisir un titre en majuscule';
    }
    if (empty($event_title)) {
        $errorsArrayevent['event_title'] = 'Merci de saisir un titre';
    }
}

if (isset($_POST['event_date'])) {
    $event_date = htmlspecialchars($_POST['event_date']);
    if (!preg_match($regexdate, $event_date)) {
        $errorsArrayevent['event_date'] = 'Merci de saisir une date au format JJ/MM/YYYY';
    }
    if (empty($event_date)) {
        $errorsArrayevent['event_date'] = 'Merci de saisir une date';
    }
}

if (isset($_POST['event_time'])) {
    $event_time = htmlspecialchars($_POST['event_time']);
    if (!preg_match($regextime, $event_time)) {
        $errorsArrayevent['event_time'] = 'Merci de saisir un horaire au format HH:MM:SS';
    }
    if (empty($event_time)) {
        $errorsArrayevent['event_time'] = 'Merci de saisir un horaire';
    }
}

if (isset($_FILES['fileUpload']['name'])) {
    $event_picture = htmlspecialchars($_FILES['fileUpload']['name']);
    if (!preg_match($regexformatfichier, $event_picture)) {
        $errorsArrayevent['event_picture'] = 'Merci de choisir un fichier .png .jpg .bmp';
    }
    if (empty($event_picture)) {
        $errorsArrayevent['event_picture'] = 'Merci de charger une image';
    }
}


//if ($_FILES['fileUpload']['error'] > 0) {
//    $erreur = "erreur los du transfert";
//}
//if ($_FILES['fileUpload']['size'] > $MAX_SIZE) {
//    $erreur = "erreur le fichier est trop gros";
//}

if (isset($_POST['postalcode_id'])) {
    $postalcode_id = htmlspecialchars($_POST['postalcode_id']);
    if (!preg_match($regexLetternumber, $postalcode_id)) {
        $errorsArrayevent['postalcode_id'] = 'Merci de saisir une chaine de caractères';
    }
    if (empty($postalcode_id)) {
        $errorsArrayevent['postalcode_id'] = 'Merci de saisir une courte description';
    }
}

if (isset($_POST['showplaces_id'])) {
    $showplaces_id = htmlspecialchars($_POST['showplaces_id']);
    if (!preg_match($regexLetternumber, $showplaces_id)) {
        $errorsArrayevent['showplaces_id'] = 'Merci de renseigner une salle de spectacle';
    }
    if (empty($showplaces_id)) {
        $errorsArrayevent['showplaces_id'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['event_description'])) {
    $event_description = htmlspecialchars($_POST['event_description']);
    if (!preg_match($regexLetternumber, $event_description)) {
        $errorsArrayevent['event_description'] = 'Merci de saisir une chaine de caractères';
    }
    if (empty($event_description)) {
        $errorsArrayevent['event_description'] = 'Merci de saisir une courte description';
    }
}


if ((isset($_POST['submit'])) && (count($errorsArrayevent) !== 0)) {
    $newDate = str_replace('/', '-', $event_date);

    $eventObj->event_title = $event_title;
    $eventObj->event_date = $event_date;
    $eventObj->event_time = $event_time;
    $eventObj->event_picture = $event_picture;
    $eventObj->event_description = $event_description;
    $eventObj->users_id = $users_id;
    $eventObj->eventcategory_id = $eventcategory_id;
    $eventObj->postalcode_id = $postalcode_id;
    $eventObj->showplaces_id = $showplaces_id;
////j'éxécute la méthode createEvent avec les attributs précedement stockés
    $eventObj->CreateEvent();
    $modalErrorevent = true;
}
?>