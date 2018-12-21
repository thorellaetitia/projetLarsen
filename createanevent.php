<?php
include_once('controllerIndex.php');
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="style.css" />
        <title>MON PROJET PRO</title>
    </head>
    <body>
        <div class="modal fade <?= $modalError ? 'modalError' : ''; ?>" id="createanevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Déjà inscrit ? Vous êtes ici pour annoncer un événement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--form-->
                        <form method="post" action="user.php" enctype="multipart/form-data" novalidate>
                            <div class="form-group">
                                Vous êtes : <select name="status">
                                    <option disabled selected>Veuillez renseigner un champ</option> 
                                    <option value="Particulier">Particulier</option>
                                    <option value="Professionnel">Professionnel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                Catégorie événement <select name="category">
                                    <option disabled selected>Veuillez renseigner un champ</option> 
                                    <option value="concert">Concert</option>
                                    <option value="spectacle">Spectacle</option>
                                    <option value="expo">Expos</option>
                                </select>
                            </div>
                            <div class="form-group">
                                Sous-catégorie événement <select name="souscategory">
                                    <option disabled selected>Veuillez renseigner un champ</option>
                                    <option value="spectacle">Plans gratuits</option>
                                    <option value="concert">Concert</option>
                                    <option value="danse">Danse</option>
                                    <option value="cirque">Cirque</option>
                                    <option value="theater">Théâtre</option>
                                    <option value="humour">Humour</option>
                                    <option value="expos">Expo</option>
                                    <option value="musees">Musée</option>
                                    <option value="walk">Balade</option>
                                    <option value="ateliers">Atelier</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Titre de l'événement </label> 
                                <textarea type="text" name="title" id="title" placeholder="Merci de le saisir en majuscule svp" rows="2" cols="50" required></textarea><br>
                                <span class="error"><?= isset($errorsArray['title']) ? $errorsArray['title'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="date">Date : </label> 
                                <input type="date" name="date" id="date" placeholder="ex jj/mm/yyyy" required /><br>
                                <span class="error"><?= isset($errorsArray['date']) ? $errorsArray['date'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="time">Heure : </label> 
                                <input type="text" name="time" id="time" placeholder="..h.." required /><br>
                                <span class="error"><?= isset($errorsArray['time']) ? $errorsArray['time'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    Le lieu : <select name="theater">
                                        <option disabled selected>Veuillez renseigner un champ</option> 
                                        <option value="106">Le 106</option>
                                        <option value="volcan">Le VOLCAN</option>
                                        <option value="Juliobona">Théâtre Juliobona</option>
                                        <option value="Tetris">Le Tetris</option>
                                        <option value="Juliobona">Le MuMa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    Code postal : <select name="postalcode">
                                        <option disabled selected>Veuillez renseigner un champ</option> 
                                        <option value="76000">76000-Rouen</option>
                                        <option value="76600">76600-Le Havre</option>
                                        <option value="76170">76170-Lillebonne</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Photo </label> 
                                <input type="file" name="image" id="image" placeholder="parcourir" required /><br>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                                <span class="error"><?= isset($errorsArray['image']) ? $errorsArray['image'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="description">Description de l'événement : </label>
                                <textarea type="text" name="description" id="description" rows="4" cols="50" placeholder="description de l'événement" required></textarea><br>
                                <span class="error"><?= isset($errorsArray['description']) ? $errorsArray['description'] : ''; ?></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <input type="submit" class="btn btn-primary " name="submit" value="Créer" />
                            </div>
                        </form>
                        <!--fin du form-->
                    </div>
                </div>
            </div>
        </div><!-- fin modal -->

    </body>
</html>