<?php

class event extends database { //on crée une class event dont le parent est database donc appointments héritent des attributs et methodes de database
//on définit les attributs de la table event car ils n'existent pas dans database

    public $id;
    public $title;
    public $status;
    public $time;
    public $image;
    public $description;

}

?>