<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelUsers.php';

//j'instancie un nouvel objet
$mailusersObj = new users ();

//on déclare un tableau d'erreurs vide;
$errorsArrayconnection = [];
$modalErrorconnection = false;


if (empty($_POST['login'])) {
    $errorsArrayconnection['login'] = 'login incorrect';
}

if (isset($_POST['password'])) {
    $password = htmlspecialchars($_POST['password']);

    if (empty($_POST['password'])) {
        $errorsArrayconnection['password'] = 'mot de passe incorrect';
    }
}

if ((isset($_POST['connectBtn'])) && (count($errorsArrayconnection) == 0)) {
    $dataUser = $mailusersObj->checkUserByMail($users_mail);

    //on va vérifier que le mot de passe soit égale au mot de passe récupéré dans la bdd
    if (is_object($dataUser)) {
        if (password_verify($password, $dataUser->users_password)) {
            $_SESSION['users_id'] = $dataUser->users_id;
            $_SESSION['users_name'] = $dataUser->users_name;
            $_SESSION['users_firstname'] = $dataUser->users_firstname;
            $_SESSION['users_mail'] = $dataUser->users_mail;
            $_SESSION['users_age'] = $dataUser->users_age;
            $_SESSION['users_login'] = $dataUser->users_login;
            $_SESSION['usertypes_id'] = $dataUser->usertypes_id;
        }
    } else {
        echo 'échec de la connexion';
    }

    $modalErrorconnection = true;
}

var_dump($_SESSION);


?>

