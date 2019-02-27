<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet 
$eventObj = new event();
$profilEventObj = new event();
//j'instancie un nouvel objet
//j'utilise l'objet profileventobj pour utiliser la méthode getAllPlaces
//qui me permet d'afficher une liste déroulante avec les lieux de spectacle dans mon formulaire//
$allPlaces = $profilEventObj->getAllPlaces();

///////////////// On édite les regex//////////////////////////////////////
$regexEventCategoryId = '/^[0-9]$/';
//autorise les lettres alplhabet majuscules, minuscules,accents, . espace et chiffres
$regexLetter = '/^[a-zA-ZÄ-ÿ\'\.\- 0-9]{1,}+$/';
//autorise tout mais seulement 60 caracères
$regexDescription = '/^.{0,60}$/';
//autorise les lettres et chiffres et inclus les accents
$regexLetternumber = '/^[\wÄ-ÿ\-]+$/';
//autorise uniquement les chiffres et seulement 2 chiffres
$regexNumber = '/^[0-9]{2}+$/';
//autorise les lettres aplhabets chiffres -._,  mini 6 caractères
$regexPassword = '/^[\w0-9\-._]{6,}+$/';
//autorise les lettres et chiffres .-_
$regexMail = '/^[a-z0-9.-_]+@[a-z0-9.-_]+.[a-z]{2,6}$/';
//regexdate autorise pour le JJ j'autorise le 0 et entre 1 et 9 (ex02) ou bien entre 1 et 9 (ex14)ou bien entre 10 et 19 ou bien
//20 et 29 ou bien 30 et 31 pour le MM j'autorise entre 01 et 09 puis 10 à 12 pour le YYYY j'autorise 2018 2019 ou 2020 à 2022//
$regexdate = '/^(20(1[89]|2[0-2]))-(0[1-9]|1[0-2])-(0[1-9]|([1-9])|[12][0-9]|3[01])$/';
// autorise les chiffres
$regextime = '/^(0[0-9]|1[1-9]|2[0-3]):[0-5][0-9]$/';
//autorise les chiffres, lettres et accents et formats jpg bmp et png
$regexformatfichier = '/^[\wÄ-ÿ\-]+((.jpg|.bmp|.png))+$/';
////////////////////////fin des regex///////////////////////////////////////////
//on déclare un tableau d'erreurs vide
$errorsArrayevent = [];
//création de cette variable pour la fermeture du modal si toutes les informations rentrés par
//le user sont correctes
$modalErrorevent = false;

// Si la variable de session userlogin existe
// alors j'utilise l'objet profilEvent et je lui indique que le users_id = à la variable de session 
if (isset($_SESSION['userlogin'])) {
    $profilEventObj->users_id = $_SESSION['users_id'];
}

//j'utilise l'objet profileventobj pour utiliser la méthode Displayeventbyid
//afin d'afficher les événements via l'id de l'événement
$arrayProfileEvent = $profilEventObj->displayEventById();

//début de la condition au click sur le bouton créer l'événement
//et début des vérifications de chaque input du formulaire
////////////////////////////////////////////////////////////////////////////////////////////
//Si le click sur le bouton du formulaire (createEventBtn) existe alors
if (isset($_POST['createEventBtn'])) {
//si la catégorie de mon événement existe
    if (isset($_POST['eventcategory_id'])) {
        //ma catégorie sera = à ce que je récupère dans l'input
        $eventcategory_id = htmlspecialchars($_POST['eventcategory_id']);
        //si ma catégorie ne correspond pas à ce que j'ai défini dans mon expression régulière
        if (!preg_match($regexEventCategoryId, $eventcategory_id)) {
            //alors tu m'affiches le message ci-dessous que tu stockes das mon tableau d'erreurs
            $errorsArrayevent['eventcategory_id'] = 'Merci de saisir une catégorie d\'événements';
        }
        // si ma catégorie est vide alors tu m'affiches le message que tu stocke dans mon tableau d'erreurs
        if (empty($eventcategory_id)) {
            $errorsArrayeventvent['eventcategory_id'] = 'Merci de faire votre choix';
        }
    }

    if (isset($_POST['eventsub_category_id'])) {
        $eventsub_category_id = htmlspecialchars($_POST['eventsub_category_id']);
        if (!preg_match($regexEventCategoryId, $eventsub_category_id)) {
            $errorsArrayevent['eventsub_category_id'] = 'Merci de saisir une sous-catégorie d\'événements';
        }
        if (empty($eventsub_category_id)) {
            $errorsArrayevent['eventsub_category_id'] = 'Merci de faire votre choix';
        }
    }

    if (isset($_POST['event_title'])) {
        $event_title = htmlspecialchars($_POST['event_title']);
        if (!preg_match($regexLetter, $event_title)) {
            $errorsArrayevent['event_title'] = 'Merci de saisir une chaine de caractères';
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
        if (strtotime('today') > strtotime($event_date)) {
            $errorsArrayevent['event_date'] = 'La date choisie n\'est pas valide';
        }
    }

    if (isset($_POST['event_free'])) {
        $event_free = htmlspecialchars($_POST['event_free']);
    }

    if (isset($_POST['event_time'])) {
        $event_time = htmlspecialchars($_POST['event_time']);
        if (!preg_match($regextime, $event_time)) {
            $errorsArrayevent['event_time'] = 'Merci de saisir un horaire au format HH:MM';
        }
        if (empty($event_time)) {
            $errorsArrayevent['event_time'] = 'Merci de saisir un horaire';
        }
    }
///////vérifications sur le type de fichier upload//////////
//spécifie le dossier dans lequel les images sont stockées
// Vérifie si chaque image est bien un fichier image ou non
    if (isset($_FILES["event_picture"])) {
        $target_dir = "img/";
//spécifie le chemin du fichier à être chargé
        $target_file = $target_dir . basename($_FILES['event_picture']['name']);
        //spécifie l'extension du fichier
        $imageFileType = strtolower(pathinfo($_FILES['event_picture']['name'], PATHINFO_EXTENSION));
        // Vérifie si le nom du fichier existe déjà dans la base de données
        if (file_exists($target_file)) {
            $errorsArrayevent['event_picture'] = 'Le fichier existe déjà';
        }
        // Vérifie le poids du fichier
        if ($_FILES["event_picture"]["size"] > 500000) {
            $errorsArrayevent['event_picture'] = 'L\'image ne doit pas accéder 500kb';
        }

        $arrayValidFormat = ["jpg", "png", "jpeg", "bmp"];
        // Prise en compte de certains formats de fichiers
        //création d'un tableau et dans ce tableau on compare le fichier a télécharger et les formats autorisés
        if (!in_array($imageFileType, $arrayValidFormat)) {
            $errorsArrayevent['event_picture'] = 'Le format du fichier n\'est pas autorise.(jpg, jpeg, png ou bmp) ';
        }
    }

/////////////////////fin verif des fichiers UPLOAD////////////////////////////////////

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
        if (!preg_match($regexDescription, $event_description)) {
            $errorsArrayevent['event_description'] = 'le nombre de caractères est limité à 60';
        }
        if (empty($event_description)) {
            $errorsArrayevent['event_description'] = 'Merci de saisir une courte description';
        }
    }
//si te tableau d'erreurs est vide alors
    if (count($errorsArrayevent) == 0) {
        //on transfert la photo de l'événement dans notre dossier img
        if (move_uploaded_file($_FILES["event_picture"]["tmp_name"], 'img/' . $_FILES["event_picture"]["name"])) {
            echo "le fichier " . basename($_FILES["event_picture"]["name"]) . " a été chargé.";
        } else {
            echo "désolé, il y a une erreur de chargement de fichier.";
        }
        //on hydrate les attributs de l'objet//
        $eventObj->users_id = $_SESSION['users_id'];
        $eventObj->event_title = $event_title;
        $eventObj->event_date = $event_date;
        $eventObj->event_time = $event_time . ':00';
        $eventObj->event_free = $event_free;
        $eventObj->event_picture = $_FILES["event_picture"]["name"];
        $eventObj->event_description = $event_description;
        $eventObj->eventcategory_id = $eventcategory_id;
        $eventObj->eventsub_category_id = $eventsub_category_id;
        $eventObj->showplaces_id = $showplaces_id;

        ////j'éxécute la méthode createEvent avec les attributs précedement stockés
        $eventObj->CreateEvent();
        //je crée une variable de session createEventok et je l'initialise avec = true
        //l'objectif de cette variable est d'afficher un message une fois l'événement créé
        $_SESSION['createEventOk'] = true;

        //si tout est ok renvoi vers mesevenements.php 
        header('Location: mesevenements.php');
        //toujours mettre un exit après un header, le script est arrêté, une fois l'événement
        // créé il y a un renvoi vers la page mesevenements.php
        exit();
    } else {
        //création d'une variable pour que le modal reste ouvert s'il y a des erreurs
        $modalStayOpenIfErrors = true;
    }
}