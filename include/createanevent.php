<?php
include_once('controllers/controllerevent.php');
?>

<div class="modal fade bd-example-modal-lg <?= isset($modalStayOpenIfErrors) ? 'modalErrorevent' : '' ?>" id="createanevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEvent">Déjà inscrit ? Vous êtes ici pour annoncer un événement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form-->
                <form class="form-group" action="" method="post" enctype="multipart/form-data" role="form" novalidate>
                    <div class="form-inline">
                        <label class="checkbox" for="event_free">Plans gratuits</label>
                        <input class="checkbox mb-0" name="event_free" type="checkbox" value="" id="event_free" required>
                    </div>
                    <div class="form-group">
                        <label for="eventcategory_id"> Catégorie événement</label>
                        <select  class="form-control form-control-lg"  name="eventcategory_id"  id="exampleFormControlSelect1" >
                            <option selected="selected" value="<?= (isset($eventcategory_id)) ? $eventcategory_id : ''; ?>">Veuillez renseigner un champ</option>
                            <option value="1">Concert</option>
                            <option value="2">Spectacle</option>
                            <option value="3">Expos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventsub_category_id"> Sous-catégorie événement</label>
                        <select class="form-control form-control-lg" name="eventsub_category_id" id="exampleFormControlSelect1" >
                            <option value="<?= (isset($eventsub_category_id)) ? $eventsub_category_id : ''; ?>">Veuillez renseigner un champ</option>
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
                    <div class="form-group">
                        <label for="event_title">Titre :</label>
                        <textarea class="form-control" name="event_title" id="title" placeholder="titre de l'événement" rows="2" required></textarea>
                        <span class="error"><?= isset($errorsArrayevent['event_title']) ? $errorsArrayevent['event_title'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Date : </label> 
                        <input type="date" class="form-control" name="event_date" id="date" placeholder="ex jj/mm/yyyy" required /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_date']) ? $errorsArrayevent['event_date'] : ''; ?></span>
                    </div>                  
                    <div class="form-group">
                        <label for="event_time">Heure : </label> 
                        <input type="text" class="form-control" name="event_time" id="time" placeholder="ex h:m" required /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_time']) ? $errorsArrayevent['event_time'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="showplaces_id">Salles de spectacle :</label>
                        <select class="form-control form-control-lg" name="showplaces_id" required>
                                <option value="<?php (isset($showplaces_id)) ? $showplaces_id : ''; ?>">Veuillez renseigner un champ</option> 
                            <option value="1">Le 106</option>
                            <option value="2">Le VOLCAN</option>
                            <option value="3">Théâtre Juliobona</option>
                            <option value="4">Le Tetris</option>
                            <option value="5">Le MuMa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="showplaces_postalcode"> Code postal :</label>
                        <select class="form-control form-control-lg" name="showplaces_postalcode" required>
                            <option value="<?php (isset($showplaces_postalcode)) ? $showplaces_postalcode : ''; ?>" >Veuillez renseigner un champ</option> 
                            <option value="1">76000-Rouen</option>
                            <option value="2">76600-Le Havre</option>
                            <option value="3">76170-Lillebonne</option>
                        </select>
                    </div>
                    <div class="form-control-file">
                        <label  for="event_picture">Photo </label> 
                        <input type="file" class="form-control-file text-center mb-2" accept="image/*" name="event_picture" id="image" placeholder="parcourir" /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_picture']) ? $errorsArrayevent['event_picture'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Description :</label>
                        <textarea class="form-control" name="event_description" id="description" rows="4" placeholder="description de l'événement" required></textarea><br>
                        <span class="error"><?= isset($errorsArrayevent['event_description']) ? $errorsArrayevent['event_description'] : ''; ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark">Fermer</button>
                        <button type="submit" class="btn btn-warning" name="createEventBtn">Créer</button>
                    </div>
                </form>
            </div>

            <!--fin du form-->
        </div>
    </div>
</div>
<!-- fin modal -->
