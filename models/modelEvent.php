<?php

class event extends database {

//on crée une class event dont le parent est database donc  héritent des attributs et methodes de database
//on définit les attributs de la table event car ils n'existent pas dans database

    public $event_id;
    public $event_title;
    public $event_date;
    public $event_time;
    public $event_picture;
    public $event_description;
    public $users_id;
    public $eventcategory_id;
    public $event_free;
    public $showplaces_id;

//      création fonction createEvent pour ajouter des event dans la bdd
//    on crée une fonction qui va nous permettre de créer des événenements 
    public function CreateEvent() {
        $query = 'INSERT INTO `poqs_event` SET `event_title` = :event_title,'
//:firstname = marqueur nominatif
                . ' `event_date` = :event_date,'
                . ' `event_time` = :event_time,'
                . ' `event_picture` = :event_picture,'
                . ' `event_description` = :event_description,'
                . '`users_id` = :users_id,'
                . '`eventcategory_id`=:eventcategory_id,'
                . '`showplaces_id` = :showplaces_id,'
                . '`event_free` = :event_free';

//injection d'éléments dans la base de données (lastName,fistName...)donc on prépare la requête
//besoin de bindvalue pour faire le lien entre les éléments que l'on va rentrer dans la base et 
//les éléments du formulaire.
        $eventList = $this->database->prepare($query);
//        //les bindvalue sécurisent l'injection d'éléments dans la base en spécifiant les valeurs sring entiers...
        $eventList->bindValue(':event_title', $this->event_title, PDO::PARAM_STR);
        $eventList->bindValue(':event_date', $this->event_date, PDO::PARAM_STR);
        $eventList->bindValue(':event_time', $this->event_time, PDO::PARAM_STR);
        $eventList->bindValue(':event_picture', $this->event_picture, PDO::PARAM_STR);
        $eventList->bindValue(':event_description', $this->event_description, PDO::PARAM_STR);
        $eventList->bindvalue(':users_id', $this->users_id, PDO::PARAM_INT);
        $eventList->bindValue(':eventcategory_id', $this->eventcategory_id, PDO::PARAM_INT);
        $eventList->bindValue(':event_free', $this->event_free, PDO::PARAM_INT);
        $eventList->bindValue(':showplaces_id', $this->showplaces_id, PDO::PARAM_INT);
        //lorsque l'on prépare la requete on doit l'éxécuter
        return $eventList->execute();
    }

    public function displayEventById() {
//je fais ma requête dans une variable $query
        $query = 'SELECT * FROM `poqs_event` WHERE `users_id`=:users_id';
//le résultat de ma requête je le stocke dans $showProfileList
//$this = correspond aux attributs de ma classe ex patients, à l'élément de ma classe (table patients) 
        $resultProfileEvent = $this->database->prepare($query);
//avec le this=ATTRIBUT il faut cibler l'élément de ma classe 
//Je lie le marqueur nominatif id à l'attribut id
        $resultProfileEvent->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
        $resultProfileEvent->execute();
        $arrayProfileEvent = $resultProfileEvent->fetchAll(PDO::FETCH_OBJ);
        return $arrayProfileEvent;
//le résultat = on lui demande d'aller chercher les éléments firstname,lastname...etc donc il faut 
//faire un fetchALL en utilisant l'objet PDO.
    }

    public function getAllDataEventCategory() {

        $query = 'SELECT *'
                . 'FROM `poqs_event`'
                . 'INNER JOIN `poqs_eventcategory`'
                . 'ON `poqs_event`.`eventcategory_id` = `poqs_eventcategory`.`eventcategory_id`'
                . 'INNER JOIN `poqs_showplaces`'
                . 'ON `poqs_event`.`showplaces_id` = `poqs_showplaces`.`showplaces_id`';

        $result = $this->database->query($query);

        $resultAllDataEvent = $result->fetchAll(PDO::FETCH_OBJ);
        return $resultAllDataEvent;
    }

    public function modifyEvent() {
        $query = 'UPDATE `poqs_event` SET `event_title` = :event_title,'
                . ' `event_date` = :event_date,'
                . '`event_time` = :event_time,'
                . '`event_picture` = :event_picture,'
                . '`event_description` = :event_description,'
                . '`users_id` = :users_id,'
                . '`eventcategory_id` = :eventcategory_id,'
                . '`showplaces_id` = :showplaces_id '
                . 'WHERE `event_id` = :event_id';

        $resultQueryModifyEvent = $this->database->prepare($query);
        $resultQueryModifyEvent->bindValue(':event_title', $this->event_title, PDO::PARAM_STR);
        $resultQueryModifyEvent->bindValue(':event_date', $this->event_date, PDO::PARAM_STR);
        $resultQueryModifyEvent->bindValue(':event_time', $this->event_time, PDO::PARAM_STR);
        $resultQueryModifyEvent->bindValue(':event_picture', $this->event_picture, PDO::PARAM_STR);
        $resultQueryModifyEvent->bindValue(':event_description', $this->event_description, PDO::PARAM_STR);
        $resultQueryModifyEvent->bindvalue(':users_id', $this->users_id, PDO::PARAM_INT);
        $resultQueryModifyEvent->bindValue(':eventcategory_id', $this->eventcategory_id, PDO::PARAM_INT);
        $resultQueryModifyEvent->bindValue(':showplaces_id', $this->showplaces_id, PDO::PARAM_INT);
        $resultQueryModifyEvent->bindValue(':event_id', $this->event_id, PDO::PARAM_INT);

        $resultQueryModifyEvent->execute();
    }

    public function deleteEvent() {
        $query = 'DELETE FROM `poqs_event` WHERE `event_id`=:event_id';
        //on commence une transaction et désactivation de l'autocommit =begintransaction
        $this->database->beginTransaction();
        $resultQueryDeleteEvent = $this->database->prepare($query);
        $resultQueryDeleteEvent->bindValue(':event_id', $this->event_id, PDO::PARAM_INT);
        $resultQueryDeleteEvent->execute();
        //on valide les modifications et la connexion a la bdd = retour en mode auto-commit =commit
        $this->database->commit();
        //on s'apercoit d'une erreur et on annule les modifications =rollBack
    }

    public function showAllEvents() {

        $query = 'SELECT *'
                . 'FROM `poqs_event`'
                . 'INNER JOIN `poqs_eventcategory`'
                . 'ON `poqs_event`.`eventcategory_id` = `poqs_eventcategory`.`eventcategory_id`'
                . 'INNER JOIN `poqs_showplaces`'
                . 'ON `poqs_event`.`showplaces_id` = `poqs_showplaces`.`showplaces_id`';

        $result = $this->database->query($query);

        $resultArrayAllEvents = $result->fetchAll(PDO::FETCH_OBJ);
        return $resultArrayAllEvents;
    }

    public function showByCategory($eventcategory_id,$eventsub_category_id) {

        $query = 'SELECT * FROM `poqs_event`'
                . ' INNER JOIN `poqs_eventcategory`'
                . ' ON `poqs_event`.`eventcategory_id` = `poqs_eventcategory`.`eventcategory_id`'
                . ' INNER JOIN poqs_eventsub_category'
                . ' ON poqs_event.eventcategory_id = poqs_eventsub_category.eventcategory_id'
                . ' INNER JOIN `poqs_showplaces`'
                . ' ON `poqs_event`.`showplaces_id` = `poqs_showplaces`.`showplaces_id`'
                . ' WHERE poqs_eventsub_category.eventsub_category_id = :eventsub_category_id'
                . ' AND poqs_eventcategory.eventcategory_id = :eventcategory_id';

        $resultQueryShowCategory = $this->database->prepare($query);

        $resultQueryShowCategory->bindValue(':eventcategory_id', $eventcategory_id, PDO::PARAM_INT);
        $resultQueryShowCategory->bindValue(':eventsub_category_id', $eventsub_category_id, PDO::PARAM_INT);
        $resultQueryShowCategory->execute();
        $arrayShowCategory = $resultQueryShowCategory->fetchAll(PDO::FETCH_OBJ);
        return $arrayShowCategory;
    }

}
