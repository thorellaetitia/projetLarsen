<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$modifyEventObj = new event();

//on utilise l'objet modifyEventObj pour appliquer la méthode getAllplaces
//pour récupérer les lieux d'événements et l'afficher dans mon formulaire via le foreach
$allPlaces = $modifyEventObj->getAllPlaces();

///////////////// On édite les regex//////////////////////////////////////
$regexEventCategoryId = '/^[0-9]$/';
//autorise les lettres alplhabet majuscules, minuscules,accents, . espace et chiffres
$regexLetter = '/^[a-zA-ZÄ-ÿ\'\.\- 0-9]{1,}+$/';
//autorise les lettres de l'alphabet seulement les majuscules et accents
$regexDescription = '/^.{0,60}$/';
//autorise tout mais seulement 60 caracères
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
$regextime = '/^[0-9][0-9]:[0-3][0]:[0][0]$/';
//autorise les chiffres, lettres et accents et formats jpg bmp et png
$regexformatfichier = '/^[\wÄ-ÿ\-]+((.jpg|.bmp|.png))+$/';
////////////////////////fin des regex///////////////////////////////////////////
//on déclare un tableau d'erreurs vide
$errorsArraymodifyevent = [];

//debut de la condition au click sur le bouton créer l'événement
//et début des vérifications de chaque input du formulaire
////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['modifyEventBtn'])) {

    if (isset($_POST['eventcategory_id'])) {
        $eventcategory_id = htmlspecialchars($_POST['eventcategory_id']);
        if (!preg_match($regexEventCategoryId, $eventcategory_id)) {
            $errorsArrayevent['eventcategory_id'] = 'Merci de saisir une catégorie d\'événements';
        }
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

    }

    if (isset($_POST['event_free'])) {
        $event_free = htmlspecialchars($_POST['event_free']);
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
//création d'un tableau et si dans ce tableau on compare le fichier a uploadé et les formats autorisés
        if (!in_array($imageFileType, $arrayValidFormat)) {
            $errorsArrayevent['event_picture'] = 'Le format du fichier n\'est pas autorise.(jpg, jpeg, png ou bmp) ';
        }
    }

/////////////////////fin verification des fichiers UPLOAD////////////////////////////////////

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
            $errorsArrayevent['event_description'] = "le nombre de caractères est limité à 60";
        }
        if (empty($event_description)) {
            $errorsArrayevent['event_description'] = 'Merci de saisir une courte description';
        }
    }
////////////////////fin des vérifications de chaque input///////////////
//si le tableau d'erreur est vide alors on transfert l'image chargé
//vers notre fichier image img/ puis on hydrate les attributs de l'objet en récupérant les variables stockées et enfin 
//on applique la fonction modifyEvent et les informations seront modifiées dans la base de données
    if (count($errorsArraymodifyevent) == 0) {
        //on crée une variable de session modifyEventOK que l'on initialise (true) 
        //pour crée une alerte lorsque l'événement est bien créé
        $_SESSION['modifyEventOK'] = true;

        $modifyEventObj->event_id = $_GET['id'];
        $modifyEventObj->event_title = $event_title;
        $modifyEventObj->event_date = $event_date;
        $modifyEventObj->event_time = $event_time . ':00';
        $modifyEventObj->event_picture = $_FILES["event_picture"]["name"];
        $modifyEventObj->event_description = $event_description;
        $modifyEventObj->eventcategory_id = $eventcategory_id;
        $modifyEventObj->eventsub_category_id = $eventsub_category_id;
        $modifyEventObj->showplaces_id = $showplaces_id;

        //si l'input de la photo est vide donc pas de photo chargé par le user
        //on applique la méthode modifyEventWithoutPicture//
        //on modifie l'événement sans la photo//
        if ($_FILES['event_picture']['name'] == '') {
            $modifyEventObj->modifyEventWithoutPicture();
        } else { //sinon si l'input de la photo n'est pas vide cela veut dire que le user charge une
            //nouvelle photo donc on applique la méthode modifyEvent
            //cela veut dire on modifie l'événement y compris la photo
            $modifyEventObj->event_id = $_GET['id'];
            $resultQueryDeletePicture = $modifyEventObj->showEventByIdEvent();
            unlink('././img/' . $resultQueryDeletePicture->event_picture);
            if (move_uploaded_file($_FILES["event_picture"]["tmp_name"], 'img/' . $_FILES["event_picture"]["name"])) {
                
            } else {
                
            }
            $modifyEventObj->modifyEvent();
        }

        ////j'éxécute la méthode createEvent avec les attributs précedement stockés
        //si tout est ok renvoi vers mesevenemnents.php 
        header('Location: mesevenements.php');
        exit();
    }
}

//on utilise l'objet en lui spécifiant que l'id de l'événément = id dans l'url
//on applique la méthode pour afficher les spectacles, une fois modifiés 
$modifyEventObj->event_id = $_GET['id'];
$resultQueryShowEvent = $modifyEventObj->showEventByIdEvent();

