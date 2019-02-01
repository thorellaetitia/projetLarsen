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
$errorsArrayinscription = [];

$modalErrorinscription = false;


if (isset($_POST['civilite'])) {
    $civilite = htmlspecialchars($_POST['civilite']);
    if (!preg_match($regexLetter, $civilite)) {
        $errorsArrayinscription['civilite'] = 'Merci de saisir une chaîne de caractères';
    }
    if (empty($civilite)) {
        $errorsArrayinscription['civilite'] = 'Merci de saisir un nom';
    }
}


if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
    if (!preg_match($regexLetter, $name)) {
        $errorsArrayinscription['name'] = 'Merci de saisir une chaîne de caractères';
    }
    if (empty($name)) {
        $errorsArrayinscription['name'] = 'Merci de saisir un nom';
    }
}

if (isset($_POST['firstname'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexLetter, $firstname)) {
        $errorsArrayinscription['firstname'] = 'Merci de saisir une chaîne de caractères';
    }
    if (empty($firstname)) {
        $errorsArrayinscription['firstname'] = 'Merci de saisir un prénom';
    }
}

if (isset($_POST['age'])) {
    $age = htmlspecialchars($_POST['age']);
    if (!preg_match($regexNumber, $age)) {
        $errorsArrayinscription['age'] = 'Merci de saisir un chiffre';
    }
    if (empty($age)) {
        $errorsArrayinscription['age'] = 'Merci de saisir votre âge';
    }
}

if (isset($_POST['mail'])) {
    $mail = htmlspecialchars($_POST['mail']);
    if (!preg_match($regexMail, $mail)) {
        $errorsArrayinscription['mail'] = 'Merci de saisir une adresse mail valide';
    }
    if (empty($mail)) {
        $errorsArrayinscription['mail'] = 'Merci de saisir votre adresse mail';
    }
}

if (isset($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']);
    if (!preg_match($regexLetternumber, $login)) {
        $errorsArrayinscription['login'] = 'Merci de saisir un login valide';
    }
    if (empty($login)) {
        $errorsArrayinscription['login'] = 'Merci de saisir un login';
    }
}

if (isset($_POST['password'])) {
    $password = htmlspecialchars($_POST['password']);
    if (!preg_match($regexPassword, $password)) {
        $errorsArrayinscription['password'] = 'Merci de saisir un minimum de 6 caractères';
    }
    if (empty($password)) {
        $errorsArrayinscription['password'] = 'Merci de saisir un mot de passe';
    }
}

if (isset($_POST['secondpassword'])) {
    $secondpassword = htmlspecialchars($_POST['secondpassword']);
    if (!preg_match($regexPassword, $secondpassword)) {
        $errorsArrayinscription['secondpassword'] = 'Merci de saisir un minimum de 6 caractères';

        if ($secondpassword !== $password) {
            $errorsArrayinscription['secondpassword'] = 'Mot de passe invalide';
        }
        if (empty($secondpassword)) {
            $errorsArrayinscription['secondpassword'] = 'Veuillez rentrer un mot de passe';
        }
    }
}

if ((isset($_POST['submit'])) && (count($errorsArrayinscription) !== 0)) {
    $modalErrorinscription = true;
}

var_dump($_POST);
?>

