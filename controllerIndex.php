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
$regexdate = '/^(0[1-9]|([1-9])|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(20(1[89]|2[0-2]))$/'; //autorise le format date ex 12/01/2018
$regextime = '/^[1-2][0-5]h[0-5][0]$/'; // autorise les chiffres
$regexformatfichier = '/^[\wÄ-ÿ\-]+((.jpg|.bmp|.png))+$/'; //autorise les chiffres, lettres et accents et formats jpg bmp et png

//on déclare un tableau d'erreurs vide
$errorsArray = [];
$modalError = false;

if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
    if (!preg_match($regexLetter, $name)) {
        $errorsArray['name'] = 'Merci de saisir une chaîne de caractères';
    }
    if (empty($name)) {
        $errorsArray['name'] = 'Merci de saisir un nom';
    }
}

if (isset($_POST['firstname'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexLetter, $firstname)) {
        $errorsArray['firstname'] = 'Merci de saisir une chaîne de caractères';
    }
    if (empty($firstname)) {
        $errorsArray['firstname'] = 'Merci de saisir un prénom';
    }
}

if (isset($_POST['age'])) {
    $age = htmlspecialchars($_POST['age']);
    if (!preg_match($regexNumber, $age)) {
        $errorsArray['age'] = 'Merci de saisir un chiffre';
    }
    if (empty($age)) {
        $errorsArray['age'] = 'Merci de saisir votre âge';
    }
}

if (isset($_POST['mail'])) {
    $mail = htmlspecialchars($_POST['mail']);
    if (!preg_match($regexMail, $mail)) {
        $errorsArray['mail'] = 'Merci de saisir une adresse mail valide';
    }
    if (empty($mail)) {
        $errorsArray['mail'] = 'Merci de saisir votre adresse mail';
    }
}

if (isset($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']);
    if (!preg_match($regexLetternumber, $login)) {
        $errorsArray['login'] = 'Merci de saisir un login valide';
    }
    if (empty($login)) {
        $errorsArray['login'] = 'Merci de saisir un login';
    }
}

if (isset($_POST['password'])) {
    $password = htmlspecialchars($_POST['password']);
    if (!preg_match($regexPassword, $password)) {
        $errorsArray['password'] = 'Merci de saisir un minimum de 6 caractères';
    }
    if (empty($password)) {
        $errorsArray['password'] = 'Merci de saisir un mot de passe';
    }
}

if (isset($_POST['secondpassword'])) {
    $secondpassword = htmlspecialchars($_POST['secondpassword']);
    if (!preg_match($regexPassword, $secondpassword)) {
        $errorsArray['secondpassword'] = 'Merci de saisir un minimum de 6 caractères';

        if ($secondpassword !== $password) {
            $errorsArray['secondpassword'] = 'Mot de passe invalide';
        }
        if (empty($secondpassword)) {
            $errorsArray['secondpassword'] = 'Veuillez rentrer un mot de passe';
        }
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


if (isset($_POST['description'])) {
    $description = htmlspecialchars($_POST['description']);
    if (!preg_match($regexLetternumber, $description)) {
        $errorsArray['description'] = 'Merci de saisir une chaine de caractères';
    }
    if (empty($description)) {
        $errorsArray['description'] = 'Merci de saisir une courte description';
    }
}

if ((isset($_POST['submit']))&& (count($errorsArray)!=0)){
  $modalError=true;  
}

?>