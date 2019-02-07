<?php
//on déclare un tableau d'erreurs vide;
$errorsArrayconnection = [];
$modalErrorconnection = false;


if (empty($_POST['login'])) {
    $errorsArrayconnection['login'] = 'login incorrect';
}

if (empty($_POST['password'])) {
    $errorsArrayconnection['password'] = 'mot de passe incorrect';
}

if ((isset($_POST['submit'])) && (count($errorsArrayconnection) == 0)) {
    $modalErrorconnection = true;
    
}
?>

