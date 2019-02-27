<?php

class database { //on crée une class database

    public $database;    //attribut database

    public function __construct() { //utilisation méthode magique / cette fonction pemet de déclarer des constructeurs pour les classes. 
    //Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet, ce
    // qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé. 
        //connexion à la base
        //PHP essaie d'exécuter les instructions à l'intérieur du bloc try
        ////On crée la connexion en indiquant dans l'ordre les paramètres : le nom d'hôte (localhost) ; la base de données (LARSEN2) ; le login (fiadone) ; le mot de passe (fiadone)
        try {  
            $this->database = new PDO('mysql:host=localhost;dbname=LARSEN2;charset=utf8', 'fiadone', 'fiadone', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
        //pour afficher les erreurs sql
        
            //S'il y a une erreur, il rentre dans le bloc catch et fait ce qu'on lui demande (ici, on arrête l'exécution de la page en affichant un message décrivant l'erreur).
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function __destruct() {  //utilisation méthode magique destruct/  La méthode destructeur est appelée dès qu'il n'y a plus de référence sur un objet donné, 
    //ou dans n'importe quel ordre pendant la séquence d'arrêt. 
        $this->database = NULL;
    }

}

