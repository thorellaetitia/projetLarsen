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
        
        include_once('navbar.php');
        ?>
        <div class="closebutton">
            <a href="index.php">Fermer</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">

                        <!--form-->
                        <form id="formmodifyevent" method="post" action="" enctype="multipart/form-data" novalidate>

                            <div class="form-group">
                                Catégorie événement <select name="eventcategory_id">
                                    <option>Veuillez renseigner un champ</option> 
                                    <option value="1">Concert</option>
                                    <option value="2">Spectacle</option>
                                    <option value="3">Expos</option>
                                </select>
                            </div>
                            <div class="form-group">
                                Sous-catégorie événement <select name="eventsubcategory_id">
                                    <option>Veuillez renseigner un champ</option>
                                    <option value="1">Concert</option>
                                    <option value="2">Danse</option>
                                    <option value="3">Cirque</option>
                                    <option value="4">Théâtre</option>
                                    <option value="5">Humour</option>
                                    <option value="6">Expo</option>
                                    <option value="7">Musée</option>
                                    <option value="8">Balade</option>
                                    <option value="9">Atelier</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="event_free">Plans gratuits</label>
                                <input class="form-check-input" name="event_free" type="checkbox" value="" id="event_free">
                            </div>
                            <div class="form-group">
                                <label class="mr-" for="event_title">Titre de l'événement</label> 
                                <textarea type="text" name="event_title" id="title" placeholder="Merci de saisir un titre " rows="1" cols="30" value="<?php (isset($event_title)) ? $event_title : ''; ?>" required></textarea><br>
                                <span class="error"><?= isset($errorsArrayevent['event_title']) ? $errorsArrayevent['event_title'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="event_date">Date : </label> 
                                <input type="date" name="event_date" id="date" placeholder="ex jj/mm/yyyy" value="<?php (isset($event_date)) ? $event_date : ''; ?>"  required /><br>
                                <span class="error"><?= isset($errorsArrayevent['event_date']) ? $errorsArrayevent['event_date'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="event_time">Heure : </label> 
                                <input type="text" name="event_time" id="time" placeholder="  :  " value="<?php (isset($event_time)) ? $event_time : ''; ?>" required /><br>
                                <span class="error"><?= isset($errorsArrayevent['event_time']) ? $errorsArrayevent['event_time'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    Le lieu : <select name="showplaces_id" value="<?php (isset($showplaces_id)) ? $showplaces_id : ''; ?>">
                                        <option>Veuillez renseigner un champ</option> 
                                        <option value="1">Le 106</option>
                                        <option value="2">Le VOLCAN</option>
                                        <option value="3">Théâtre Juliobona</option>
                                        <option value="4">Le Tetris</option>
                                        <option value="5">Le MuMa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    Code postal : <select name="showplaces_postalcode" value="<?php (isset($showplaces_postalcode)) ? $showplaces_postalcode : ''; ?>">
                                        <option disabled selected>Veuillez renseigner un champ</option> 
                                        <option value="1">76000-Rouen</option>
                                        <option value="2">76600-Le Havre</option>
                                        <option value="3">76170-Lillebonne</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="event_picture">Photo </label> 
                                <input type="file" accept="image/*" name="event_picture" id="image" placeholder="parcourir" value="<?php (isset($event_picture)) ? $event_picture : ''; ?>" required /><br>
                                <span class="error"><?= isset($errorsArrayevent['event_picture']) ? $errorsArrayevent['event_picture'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="event_description">Description de l'événement : </label>
                                <textarea type="text" name="event_description" id="description" rows="4" cols="50" placeholder="description de l'événement" value="<?php (isset($event_description)) ? $event_description : ''; ?>" required ></textarea><br>
                                <span class="error"><?= isset($errorsArrayevent['event_description']) ? $errorsArrayevent['event_description'] : ''; ?></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <input type="submit" class="btn btn-primary " name="modifyEventBtn" value="Modifier" />
                            </div>
                        </form>
                        <!--fin du form-->
                    </div>
                </div>
            </div>
        </div>


        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>



