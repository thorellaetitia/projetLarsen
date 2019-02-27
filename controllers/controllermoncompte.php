<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet
$profilUserObj = new users();

$profilUserObj->users_id = $_SESSION['users_id'];
$arrayProfileUser = $profilUserObj->displayUserById();


