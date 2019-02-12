<?php
include_once('controllers/controllerevent.php');
?>

<div class="modal fade <?= $modalErrorevent ? 'modalErrorevent' : ''; ?>" id="createanevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEvent">Déjà inscrit ? Vous êtes ici pour annoncer un événement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form-->
                <form method="post" action="recordanevent.php" enctype="multipart/form-data" novalidate>

                    <div class="form-group">
                        Catégorie événement <select value="<?php (isset($eventcategory_id)) ? $eventcategory_id : ''; ?>" name="eventcategory_id">
                            <option>Veuillez renseigner un champ</option> 
                            <option value="1">Concert</option>
                            <option value="2">Spectacle</option>
                            <option value="3">Expos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        Sous-catégorie événement <select value="<?php (isset($eventsubcategory_id)) ? $eventsubcategory_id : ''; ?>" name="eventsubcategory_id">
                            <option>Veuillez renseigner un champ</option>
                            <option value="1">Plans gratuits</option>
                            <option value="2">Concert</option>
                            <option value="3">Danse</option>
                            <option value="4">Cirque</option>
                            <option value="5">Théâtre</option>
                            <option value="6">Humour</option>
                            <option value="7">Expo</option>
                            <option value="8">Musée</option>
                            <option value="9">Balade</option>
                            <option value="10">Atelier</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="event_title">Titre de l'événement </label> 
                        <textarea type="text" name="event_title" id="title" placeholder="Merci de le saisir en majuscule svp" rows="2" cols="50" value="<?php (isset($event_title)) ? $event_title : ''; ?>" required></textarea><br>
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
                            Code postal : <select name="postalcode_id" value="<?php (isset($postalcode_id)) ? $postalcode_id : ''; ?>">
                                <option disabled selected>Veuillez renseigner un champ</option> 
                                <option value="1">76000-Rouen</option>
                                <option value="2">76600-Le Havre</option>
                                <option value="3">76170-Lillebonne</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event_picture">Photo </label> 
                        <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
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
                        <input type="submit" class="btn btn-primary " name="createEventBtn" value="Créer" />
                    </div>
                </form>
                <!--fin du form-->
            </div>
        </div>
    </div>
</div><!-- fin modal -->
