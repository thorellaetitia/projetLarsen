<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on crée une variable de session pour créer un message lorsque le user est connecté
$_SESSION['userconnectedOK'] = true;