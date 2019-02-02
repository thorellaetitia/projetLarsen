<?php

// On édite les regex

$regexLetternumber = '/^[\wÄ-ÿ\-]+$/'; //autorise les lettres maj et min et accents et chiffres de 0 à 9
$regexPassword = '/^[\w0-9\-._]{6,}+$/'; //autorise les lettres aplhabets chiffres -._,  mini 6 caractères

$errorsArrayconnection = [];
$modalErrorconnection = false;
$messagevalide = 'vous êtes connecté';


if (isset($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']);
    if (!preg_match($regexLetternumber, $login)) {
        $errorsArrayconnection['login'] = 'Merci de saisir un login, majuscule, minuscule et accents acceptés';
    }
    if (empty($login)) {
        $errorsArrayconnection['login'] = 'Merci de saisir un login';
    }
}

if (isset($_POST['password'])) {
    $password = htmlspecialchars($_POST['password']);
    if (!preg_match($regexPassword, $password)) {
        $errorsArrayconnection['password'] = 'Merci de saisir un minimum de 6 caractères';
    }
    if (empty($password)) {
        $errorsArrayconnection['password'] = 'Merci de saisir un mot de passe';
    }
}

if (isset($_POST['secondpassword'])) {
    $secondpassword = htmlspecialchars($_POST['secondpassword']);
    if (!preg_match($regexPassword, $secondpassword)) {
        $errorsArrayconnection['secondpassword'] = 'Merci de saisir un minimum de 6 caractères';

        if ($secondpassword !== $password) {
            $errorsArrayconnection['secondpassword'] = 'Votre mot de passe est différent';
        }
        if (empty($secondpassword)) {
            $errorsArrayconnection['secondpassword'] = 'Veuillez confirmer votre mot de passe';
        }
    }
}
var_dump($errorsArrayconnection);

if ((isset($_POST['submit'])) && (count($errorsArrayconnection) !== 0)) {
    $modalErrorconnection = true;
    $messagevalide;
}


?>

