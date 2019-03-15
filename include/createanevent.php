<?php
include_once('controllers/controllerevent.php');
?>
<!--//debut du modal //-->
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
                        <input class="checkbox mb-0" name="event_free" type="checkbox" value="" id="event_free">
                    </div>
                    <div class="form-group">
                        <label for="eventcategory_id"> Catégorie événement</label>
                        <select class="form-control py-2"  name="eventcategory_id"  id="exampleFormControlSelect1" >
<!--                            //création de ternaire pour récupérer les données entrées par le user -->
                        <!--début de la condition si eventcategory_id existe et si eventcategory_id correspond à 1 alors tu m'affiches cette valeur par défaut sinon tu m'affiches rien-->
                            <option disabled <?= !isset($_POST['eventcategory_id']) ? 'selected' : '' ?>>Veuillez renseigner un champ</option>
                            <option value="1" <?= isset($_POST['eventcategory_id']) && ($_POST['eventcategory_id']== 1) ? 'selected' : '' ?>>Concert</option>
                            <option value="2" <?= isset($_POST['eventcategory_id']) && $_POST['eventcategory'] == 2 ? 'selected': ''?>>Spectacle</option>
                            <option value="3" <?= isset($_POST['eventcategory_id']) && $_POST['eventcategory_id'] == 3 ? 'selected': ''?>>Expo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventsub_category_id"> Sous-catégorie événement</label>
                        <select class="form-control py-2" name="eventsub_category_id" id="exampleFormControlSelect1" >
                            <option disabled <?= !isset($_POST['eventsub_category_id']) ? 'selected' : '' ?>>Veuillez renseigner un champ</option>
                            <option value="1" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 1 ? 'selected' : ''?>>Concert</option>
                            <option value="2" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 2 ? 'selected' : ''?>>Danse</option>
                            <option value="3" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 3 ? 'selected' : ''?>>Cirque</option>
                            <option value="4" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 4 ? 'selected' : ''?>>Théâtre</option>
                            <option value="5" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 5 ? 'selected' : ''?>>Humour</option>
                            <option value="6" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 6 ? 'selected' : ''?>>Expo</option>
                            <option value="7" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 7 ? 'selected' : ''?>>Musée</option>
                            <option value="8" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 8 ? 'selected' : ''?>>Balade</option>
                            <option value="9" <?= isset($_POST['eventsub_category_id']) && $_POST['eventsub_category_id']== 9 ? 'selected' : ''?>>Atelier</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="event_title">Titre :</label>
                        <input class="form-control" type="text" name="event_title" id="title" value="<?= isset($_POST['event_title']) ? htmlspecialchars($_POST['event_title']) : '' ?>" placeholder="titre de l'événement" required />
                        <span class="error"><?= isset($errorsArrayevent['event_title']) ? $errorsArrayevent['event_title'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Date : </label> 
                        <input type="date" class="form-control" name="event_date" id="date" placeholder="ex jj/mm/yyyy" value="<?= isset($_POST['event_date']) ? $_POST['event_date'] : '' ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_date']) ? $errorsArrayevent['event_date'] : ''; ?></span>
                    </div>                  
                    <div class="form-group">
                        <label for="event_time">Heure : </label> 
                        <input type="time" class="form-control" name="event_time" id="time" placeholder="ex h:m" value="<?= isset($_POST['event_time']) ? $_POST['event_time'] : '' ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_time']) ? $errorsArrayevent['event_time'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="showplaces_id">Salles de spectacle :</label>
                        <select class="form-control py-2" name="showplaces_id" required>
                            <option disabled <?= !isset($_POST['showplaces_id']) ? 'selected' : '' ?>>Veuillez renseigner un champ</option>
<!--                       //utilisation d'un foreach pour parcourir le tableau $allPlaces et afficher les informations via $place dans un select-->
                            <?php foreach ($allPlaces as $place) { ?>
                            <option value="<?= $place->showplaces_id ?>" <?= isset($_POST['showplaces_id']) && $_POST['showplaces_id'] == $place->showplaces_id ? 'selected' : '' ?>><?= $place->showplaces_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-control-file">
                        <label  for="event_picture">Photo </label> 
                        <input type="file" class="form-control-file text-center mb-2" accept="image/*" name="event_picture" id="image" placeholder="parcourir" /><br>
                        <span class="error"><?= isset($errorsArrayevent['event_picture']) ? $errorsArrayevent['event_picture'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Description :</label>
                        <textarea class="form-control" name="event_description" id="description" rows="4" placeholder="description de l'événement" required><?= isset($_POST['event_description']) ? htmlspecialchars($_POST['event_description']) : '' ?></textarea><br>
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
