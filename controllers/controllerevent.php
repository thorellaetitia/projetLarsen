<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$eventObj = new event();
$profilEventObj = new event();
//j'instancie un nouvel objet

// On édite les regex
$regexEventCategoryId = '/^[0-9]$/';
$regexLetter = '/^[a-zA-ZÄ-ÿ\-]+$/'; //autorise les lettres alplhabet majuscules et minuscules et les accents
$regextitle = '/^[A-ZÄ-ÿ\-]+$/'; //autorise les lettres de l'alphabet seulement les majuscules et accents
$regexLetternumber = '/^[\wÄ-ÿ\-]+$/'; //autorise les lettres maj et min et accents et chiffres de 0 à 9
$regexNumber = '/^[0-9]{2}+$/'; //autorise uniquement les chiffres et seulement 2 chiffres
$regexPassword = '/^[\w0-9\-._]{6,}+$/'; //autorise les lettres aplhabets chiffres -._,  mini 6 caractères
$regexMail = '/^[a-z0-9.-_]+@[a-z0-9.-_]+.[a-z]{2,6}$/'; //autorise les lettres et chiffres .-_
//regexdate autorise pour le JJ j'autorise le 0 et entre 1 et 9 (ex02) ou bien entre 1 et 9 (ex14)ou bien entre 10 et 19 ou bien
//20 et 29 ou bien 30 et 31 pour le MM j'autorise entre 01 et 09 puis 10 à 12 pour le YYYY j'autorise 2018 2019 ou 2020 à 2022//
$regexdate = '/^(20(1[89]|2[0-2]))-(0[1-9]|1[0-2])-(0[1-9]|([1-9])|[12][0-9]|3[01])$/';//autorise le format date ex 2018/02/10
$regextime = '/^[0-9][0-9]:[0-3][0]:[0][0]$/'; // autorise les chiffres
$regexformatfichier = '/^[\wÄ-ÿ\-]+((.jpg|.bmp|.png))+$/'; //autorise les chiffres, lettres et accents et formats jpg bmp et png
//on déclare un tableau d'erreurs vide
$errorsArrayevent = [];

$modalErrorevent = false;

if (isset($_SESSION['userlogin'])) {
    $profilEventObj->users_id = $_SESSION['users_id'];
    }

$arrayProfileEvent = $profilEventObj->displayEventById();

if (isset($_POST['createEventBtn'])) {

if (isset($_POST['eventcategory_id'])) {
    $eventcategory_id = htmlspecialchars($_POST['eventcategory_id']);
    if (!preg_match($regexEventCategoryId, $eventcategory_id)) {
        $errorsArrayevent['eventcategory_id'] = 'Merci de saisir une catégorie d\'événements';
    }
    if (empty($eventcategory_id)) {
        $errorsArrayeventvent['eventcategory_id'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['eventsubcategory_id'])) {
    $eventsubcategory_id = htmlspecialchars($_POST['eventsubcategory_id']);
    if (!preg_match($regexEventCategoryId, $eventsubcategory_id)) {
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
///////verifications sur le type de fichier upload//////////
//spécifie le dossier dans lequel les images sont stockées

// Vérifie si chaque image est bien un fichier image ou du fake
if (isset($_FILES["event_picture"])) {
    $target_dir = "img/";
//spécifie le chemin du fichier à être chargé
    $target_file = $target_dir . basename($_FILES['event_picture']['name']);
//déclaration de la variable uploadok si = 1 alors fichier correct prêt a chargé
    //spécifie l'extension du fichier
    $imageFileType = strtolower(pathinfo($_FILES['event_picture']['name'], PATHINFO_EXTENSION));
        // Vérifie si le nom du fichier existe déjà dans la bdd
    if (file_exists($target_file)) {
        $errorsArrayevent['event_picture'] = 'Le fichier existe déjà';
    }
    // Vérifie le poids du fichier
    if ($_FILES["event_picture"]["size"] > 500000) {
        $errorsArrayevent['event_picture'] = 'L\'image ne doit pas accéder 500kb';
    }
    
    $arrayValidFormat = ["jpg", "png", "jpeg", "bmp"];
    // Prise en compte de certains formats de fichiers
    if (!in_array($imageFileType, $arrayValidFormat)) {
        $errorsArrayevent['event_picture'] = 'Le format du fichier n\'est pas autorise.(jpg, jpeg, png ou bmp) ';
    }
}



/////////////////////fin verif des fichiers UPLOAD////////////////////////////////////

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

    if (count($errorsArrayevent) == 0) {
        if (move_uploaded_file($_FILES["event_picture"]["tmp_name"], 'img/'.$_FILES["event_picture"]["name"])) {
            echo "The file ". basename($_FILES["event_picture"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        } 
        $newDate = str_replace('/', '-', $event_date);
        $eventObj->users_id = $_SESSION['users_id'];
        $eventObj->event_title = $event_title;
        $eventObj->event_date = $event_date;
        $eventObj->event_time = $event_time;
        $eventObj->event_picture = $_FILES["event_picture"]["name"];
        $eventObj->event_description = $event_description;
        $eventObj->eventcategory_id = $eventcategory_id;
        $eventObj->postalcode_id = $postalcode_id;
        $eventObj->showplaces_id = $showplaces_id;
    ////j'éxécute la méthode createEvent avec les attributs précedement stockés
        $eventObj->CreateEvent();
        $modalErrorevent = true;
        header('Location: moncompte.php');
        exit();
    }
    else {
        $modalStayOpenIfErrors = true;
    }
}