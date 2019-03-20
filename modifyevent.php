<?php
SESSION_START();
include_once('controllers/controllermodifyevent.php');
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="assets/images/larsen.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/style.css" />
        <title>MON PROJET PRO</title>
    </head>
    <body>
        <?php
        include_once ('headernavbar.php');

        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <div class="row justify-content-between mt-2">
                <div class="btn btn-outline-warning btn-sm ml-1">
                    <a href="index.php">Retour site</a>
                </div>
                <div class="btn btn-outline-warning btn-sm mr-1">
                    <a href="mesevenements.php">Retour mes événements</a>
                </div>
            </div>
            <div class="row m-2 d-flex justify-content-between">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 border steptomodify">  
                    <p><i class="fas fa-bullhorn fa-2x mt-2 mr-2"></i>Remplisser les informations liées à votre événement</p>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 border steptomodify"> 
                    <p><i class="fas fa-bullhorn fa-2x mt-2 mr-2"></i>N'oublier pas la photo, elle permettra d'illustrer votre événement</p>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 border steptomodify"> 
                    <p><i class="fas fa-bullhorn fa-2x mt-2 mr-2"></i>Pour valider la modification, cliquer sur modifier</p>
                </div>
            </div>
            <div class="text-center">                        
                <h1><i class="mx-auto fas fa-pencil-alt fa-4x "></i>Modifier un événement</h1>
            </div>
            <div class="col-lg-6 col-md-10 col-sm-10 mx-auto">
                <!--                //////debut du form/////////-->
                <form id="formmodifyevent" class="form-group" action="" method="post" enctype="multipart/form-data" role="form" novalidate="">
                    <div class="form-inline">
                        <label class="checkbox" for="event_free">Plan gratuit</label>
                        <input class="checkbox mb-0" name="event_free" type="checkbox" value="" id="event_free">
                    </div>
                    <div class="form-group">
                        <label for="eventcategory_id"> Rubrique : </label>
                        <select  class="form-control py-2"  name="eventcategory_id"  id="exampleFormControlSelect1">
                            <!--                            //création de ternaire pour récupérer les données entrées par le user -->
                            <!--début de la condition si eventcategory_id existe et si eventcategory_id correspond à 1 alors tu m'affiches cette valeur par défaut sinon tu m'affiches rien-->
                            <option value="1" <?= $resultQueryShowEvent->eventcategory_id == 1 ? 'selected' : '' ?>>Concert</option>
                            <option value="2" <?= $resultQueryShowEvent->eventcategory_id == 2 ? 'selected' : '' ?> >Spectacle</option>
                            <option value="3" <?= $resultQueryShowEvent->eventcategory_id == 3 ? 'selected' : '' ?> >Expos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventsub_category_id"> Sous-rubrique : </label>
                        <select class="form-control py-2" name="eventsub_category_id" id="exampleFormControlSelect1">
                            <option value="1" <?= $resultQueryShowEvent->eventsub_category_id == 1 ? 'selected' : '' ?>>Concert</option>
                            <option value="2" <?= $resultQueryShowEvent->eventsub_category_id == 2 ? 'selected' : '' ?>>Danse</option>
                            <option value="3" <?= $resultQueryShowEvent->eventsub_category_id == 3 ? 'selected' : '' ?>>Cirque</option>
                            <option value="4" <?= $resultQueryShowEvent->eventsub_category_id == 4 ? 'selected' : '' ?>>Théâtre</option>
                            <option value="5" <?= $resultQueryShowEvent->eventsub_category_id == 5 ? 'selected' : '' ?>>Humour</option>
                            <option value="6" <?= $resultQueryShowEvent->eventsub_category_id == 6 ? 'selected' : '' ?>>Expo</option>
                            <option value="7" <?= $resultQueryShowEvent->eventsub_category_id == 7 ? 'selected' : '' ?>>Musée</option>
                            <option value="8" <?= $resultQueryShowEvent->eventsub_category_id == 8 ? 'selected' : '' ?>>Balade</option>
                            <option value="9" <?= $resultQueryShowEvent->eventsub_category_id == 9 ? 'selected' : '' ?>>Atelier</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="event_title">Titre / Artiste :</label>
                        <input class="form-control" name="event_title" id="title" placeholder="titre de l'événement" value="<?= $resultQueryShowEvent->event_title ?>" required/>
                        <span class="error"><?= isset($errorsArrayevent['event_title']) ? $errorsArrayevent['event_title'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Date : </label> 
                        <input type="date" class="form-control" name="event_date" id="date" placeholder="ex jj/mm/yyyy" value="<?= $resultQueryShowEvent->event_date ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_date']) ? $errorsArrayevent['event_date'] : ''; ?></span>
                    </div>                  
                    <div class="form-group">
                        <label for="event_time">Heure : </label> 
                        <input type="time" class="form-control" name="event_time" id="time" placeholder="  :  " value="<?= date('H:i', strtotime($resultQueryShowEvent->event_time)) ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_time']) ? $errorsArrayevent['event_time'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="showplaces_id">Salle de spectacle :</label>
                        <select class="form-control py-2" name="showplaces_id" required>
                            <!--                            //utilisation d'un foreach pour parcourir le tableau $allPlaces et afficher les informations via $place dans un select-->
                            <?php foreach ($allPlaces as $place) {
                                ?>
                                <option value="<?= $place->showplaces_id ?>" <?= $resultQueryShowEvent->showplaces_id == $place->showplaces_id ? 'selected' : '' ?>><?= $place->showplaces_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-control-file">
                        <label for="event_picture">Photo de l'événement / Artiste : </label> 
                        <div>
                            <p class="p-3 mb-2 bg-warning text-white">Vous souhaitez garder la photo ? Alors pas besoin de la charger à nouveau</p>
                            <p class="p-3 mb-2 bg-warning text-white">Vous souhaitez la modifier ? Alors chargez une nouvelle photo et le tour est joué</p>
                            <img class="w-35 pictureEvent border border-warning" src="img/<?= $resultQueryShowEvent->event_picture ?>" alt="photo événement" />
                        </div>
                        <input type="file" class="form-control-file text-center mb-2" accept="image/*" name="event_picture"  placeholder="modifier" ><br>
                        <span class="error"><?= isset($errorsArrayevent['event_picture']) ? $errorsArrayevent['event_picture'] : ''; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="event_description">Description :</label>
                        <textarea class="form-control" name="event_description" id="description" rows="4" placeholder="60 caractères maximum" required ><?= $resultQueryShowEvent->event_description ?></textarea><br>
                        <span class="error"><?= isset($errorsArrayevent['event_description']) ? $errorsArrayevent['event_description'] : ''; ?></span>
                    </div>
                    <div class="text-center">
                        <a type="button" class="btn btn-dark" href="mesevenements.php">Fermer</a>
                        <button type="submit" class="btn btn-warning" name="modifyEventBtn">Modifier</button>
                    </div>
                </form>
            </div>
            <!--fin du form-->
            <!--            //creation d'un bouton SCROLL TO TOP//-->-->
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button> 
        </div>

        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>




