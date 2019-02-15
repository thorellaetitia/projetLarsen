<?php

require_once 'models/modelDatabase.php';
require_once 'models/modelEvent.php';
require_once 'models/modelUsers.php';

//on instancie un nouvel objet event
$eventObj = new event();
$profilEventObj = new event();
//j'instancie un nouvel objet

$resultAllDataEvent = $profilEventObj->getAllDataEventCategory();


        
        
        
 
