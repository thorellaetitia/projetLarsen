<?php

class users extends database { //on crée une class clients dont le parent est database donc clients héritent des attributs et methodes de database
//on définit les attributs de la table clients car ils n'existent pas dans database

    public $id;
    public $name;
    public $firstName;
    public $mail;
    public $age;
    public $login;
    public $password;
    public $userTypes;

    //création fonction creatusers pour ajouter des users dans la bdd
    //on crée une fonction qui va nous permettre de créer les patients
    public function CreateUsers() {
        $query = 'INSERT INTO `users` SET `name` = :lastName,'
                . ' `firstname` = :firstName,'     //:firstname = marqueur nominatif
                . ' `mail` = :mail,'
                . ' `age` = :age,'
                . ' `login` = :login'
                . ' `password` = :password'
                . ' `usertypes` = :userTypes';
        //injection d'éléments dans la base de données (lastName,fistName...)donc on prépare la requête
        //besoin de bindvalue pour faire le lien entre les éléments que l'on va rentrer dans la base et 
        //les éléments du formulaire.
        $usersList = $this->database->prepare($query);
        //les bindvalue sécurisent l'injection d'éléments dans la base en spécifiant les valeurs sring entiers...
        $usersList->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $usersList->bindValue(':name', $this->lastName, PDO::PARAM_STR);
        $usersList->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $usersList->bindValue(':age', $this->age, PDO::PARAM_INT);
        $usersList->bindValue(':login', $this->login, PDO::PARAM_STR);
        $usersList->bindValue(':password', $this->password, PDO::PARAM_STR);
        $usersList->bindValue(':usertypes', $this->userTypes, PDO::PARAM_STR);
        
        //lorsque l'on prépare la requete on doit l'éxécuter
        return $usersList->execute();
    }
    
     //création fonction showlistUsers pour afficher la liste des users
    //on crée une fonction qui va nous permettre d'afficher les patients
    //pas d'injection d'éléments donc pas besoin de préparer ni éxécuter ni de bindvalue
    //je crée ma fonction ShowAllPatients
    public function ShowAllUsers() {
        //je stock ma requête dans une variable $query
        $query = 'SELECT * FROM users';
        //le résultat de ma requête je le stocke dans $resultQueryAllPatients
        //$this = correspond aux attributs de ma classe ex patients, à l'élément de ma classe (table patients) 
        $resultQueryAllUsers = $this->database->query($query);
        //avec le this il faut cibler l'élément de ma classe
        //le fetchall permet de récupérer toutes les infos de la requete et les transformer ds un tableau d'objets
        $arrayAllUsers = $resultQueryAllUsers->fetchALL(PDO::FETCH_OBJ);
        return $arrayAllUsers;
        //le résultat = on lui demande d'aller chercher les éléments firstname,lastname...etc donc il faut 
        //faire un fetchALL en utilisant l'objet PDO.
    }

    //exercice 3
    public function lastInsertId() {
        //je fais ma requête dans une variable $query
        $query = 'SELECT * FROM `patients` WHERE `id`=:id';
        //le résultat de ma requête je le stocke dans $showProfileList
        //$this = correspond aux attributs de ma classe ex patients, à l'élément de ma classe (table patients) 
        $resultProfilePatient = $this->database->prepare($query);
        //avec le this=ATTRIBUT il faut cibler l'élément de ma classe 
        //Je lie le marqueur nominatif id à l'attribut id
        $resultProfilePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        $resultProfilePatient->execute();
        $arrayProfilePatient = $resultProfilePatient->fetch(PDO::FETCH_OBJ);
        return $arrayProfilePatient;
        //le résultat = on lui demande d'aller chercher les éléments firstname,lastname...etc donc il faut 
        //faire un fetchALL en utilisant l'objet PDO.
    }

    //exercice4
    public function modifypatient() {
        $query = 'UPDATE `patients` SET `lastname` = :lastName, `firstname` = :firstName, `birthdate` = :birthDate, `phone` = :phone, `mail` = :mail WHERE `id` = :id';
        $resultQueryModifyPatient = $this->database->prepare($query);
        $resultQueryModifyPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        $resultQueryModifyPatient->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $resultQueryModifyPatient->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $date= DateTime::createFromFormat('d/m/Y', $this->birthDate); 
        $dateus = $date->format('Y-m-d');
        $resultQueryModifyPatient->bindValue(':birthDate', $dateus, PDO::PARAM_STR);
        $resultQueryModifyPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $resultQueryModifyPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $resultQueryModifyPatient->execute();
    }
    
    
}

?>
