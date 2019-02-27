<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet
$profilUserObj = new users();

//j'utilise l'objet en lui spécifiant que l'attribut users_id = variable de session du user connceté (=id)
$profilUserObj->users_id = $_SESSION['users_id'];
//j'applique la méthode displayUserById pour afficher le profil du user
$arrayProfileUser = $profilUserObj->displayUserById();


