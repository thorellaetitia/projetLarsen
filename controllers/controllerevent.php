<?php

// On édite les regex
$regexLetter = '/^[a-zA-ZÄ-ÿ\-]+$/'; //autorise les lettres alplhabet majuscules et minuscules et les accents
$regextitle = '/^[A-ZÄ-ÿ\-]+$/'; //autorise les lettres de l'alphabet seulement les majuscules et accents
$regexLetternumber = '/^[\wÄ-ÿ\-]+$/'; //autorise les lettres maj et min et accents et chiffres de 0 à 9
$regexNumber = '/^[0-9]{2}+$/'; //autorise uniquement les chiffres et seulement 2 chiffres
$regexPassword = '/^[\w0-9\-._]{6,}+$/'; //autorise les lettres aplhabets chiffres -._,  mini 6 caractères
$regexMail = '/^[a-z0-9.-_]+@[a-z0-9.-_]+.[a-z]{2,6}$/'; //autorise les lettres et chiffres .-_
//regexdate autorise pour le JJ j'autorise le 0 et entre 1 et 9 (ex02) ou bien entre 1 et 9 (ex14)ou bien entre 10 et 19 ou bien
//20 et 29 ou bien 30 et 31 pour le MM j'autorise entre 01 et 09 puis 10 à 12 pour le YYYY j'autorise 2018 2019 ou 2020 à 2022//
$regexdate = '/^(20(1[89]|2[0-2]))-(0[1-9]|1[0-2])-(0[1-9]|([1-9])|[12][0-9]|3[01])$/'; //autorise le format date US ex 2018/01/12
$regextime = '/^[0-9][0-9]:[0-3][0]:[0][0]$/'; // autorise les chiffres
$regexformatfichier = '/^[\wÄ-ÿ\-]+((.jpg|.bmp|.png))+$/'; //autorise les chiffres, lettres et accents et formats jpg bmp et png
//on déclare un tableau d'erreurs vide
$errorsArray = [];

$modalErrorevent=false;

if (isset($_POST['category'])) {
    $category = htmlspecialchars($_POST['category']);
    if (!preg_match($regexLetter, $category)) {
        $errorsArray['category'] = 'Merci de saisir une catégorie d\'événements';
    }
    if (empty($category)) {
        $errorsArray['category'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['souscategory'])) {
    $souscategory = htmlspecialchars($_POST['souscategory']);
    if (!preg_match($regexLetter, $souscategory)) {
        $errorsArray['souscategory'] = 'Merci de saisir une sous-catégorie d\'événements';
    }
    if (empty($souscategory)) {
        $errorsArray['souscategory'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['status'])) {
    $status = htmlspecialchars($_POST['status']);
    if (!preg_match($regexLetter, $status)) {
        $errorsArray['status'] = 'Merci de sélectionner un status';
    }
    if (empty($status)) {
        $errorsArray['status'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['category'])) {
    $category = htmlspecialchars($_POST['category']);
    if (!preg_match($regexLetter, $category)) {
        $errorsArray['category'] = 'Merci de sélectionner une catégorie';
    }
    if (empty($category)) {
        $errorsArray['category'] = 'Merci de faire votre choix svp';
    }
}

if (isset($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    if (!preg_match($regextitle, $title)) {
        $errorsArray['title'] = 'Merci de saisir un titre en majuscule';
    }
    if (empty($title)) {
        $errorsArray['title'] = 'Merci de saisir un titre';
    }
}

if (isset($_POST['date'])) {
    $date = htmlspecialchars($_POST['date']);
    if (!preg_match($regexdate, $date)) {
        $errorsArray['date'] = 'Merci de saisir une date au format JJ/MM/YYYY';
    }
    if (empty($date)) {
        $errorsArray['date'] = 'Merci de saisir une date';
    }
}

if (isset($_POST['time'])) {
    $time = htmlspecialchars($_POST['time']);
    if (!preg_match($regextime, $time)) {
        $errorsArray['time'] = 'Merci de saisir un horaire au format HHhMM';
    }
    if (empty($time)) {
        $errorsArray['time'] = 'Merci de saisir un horaire';
    }
}

if (isset($_FILES['fileUpload']['name'])) {
    $image = htmlspecialchars($_FILES['fileUpload']['name']);
    if (!preg_match($regexformatfichier, $image)) {
        $errorsArray['image'] = 'Merci de choisir un fichier aux formats suivants png jpg bmp';
    }
    if (empty($image)) {
        $errorsArray['image'] = 'Merci de charger une image';
    }
}

if (isset($_POST['postalcode'])) {
    $postalcode = htmlspecialchars($_POST['postalcode']);
    if (!preg_match($regexLetternumber, $postalcode)) {
        $errorsArray['postalcode'] = 'Merci de saisir une chaine de caractères';
    }
    if (empty($postalcode)) {
        $errorsArray['description'] = 'Merci de saisir une courte description';
    }
}

if (isset($_POST['theater'])) {
    $theater = htmlspecialchars($_POST['theater']);
    if (!preg_match($regexLetternumber, $theater)) {
        $errorsArray['theater'] = 'Merci de renseigner une salle de spectacle';
    }
    if (empty($theater)) {
        $errorsArray['theater'] = 'Merci de faire votre choix';
    }
}

if (isset($_POST['description'])) {
    $description = htmlspecialchars($_POST['description']);
    if (!preg_match($regexLetternumber, $description)) {
        $errorsArray['description'] = 'Merci de saisir une chaine de caractères';
    }
    if (empty($description)) {
        $errorsArray['description'] = 'Merci de saisir une courte description';
    }
}

if ((isset($_POST['submit'])) && (count($errorsArray) !== 0)) {
    
    $modalErrorevent = true;
}

var_dump($_POST);
?>