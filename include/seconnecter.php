<?php
include_once('./controllers/controllerseconnecter.php');
?>

<!-- Modal -->
<div class="container-fluid">
    <div class="modal fade <?= $modalErrorconnection ? 'modalErrorconnection' : ''; ?>" id="seconnecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConnecter">Déjà inscrit ? Se connecter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php ?>
                    <!--form-->
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="login">Votre login : </label>
                            <input type="text" name="users_login" id="login" placeholder="login" value="" required /><br>
                            <span class="error"><?= !empty($errorsArrayconnection['users_login']) ? $errorsArrayconnection['users_login'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe : </label>
                            <input type="password" name="users_password" id="password" placeholder="mot de passe" value="" required /><br>
                            <span class="error"><?= !empty($errorsArrayconnection['users_password']) ? $errorsArrayconnection['users_password'] : ''; ?></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <input type="submit" class="btn btn-primary " name="connectBtn" value="Se connecter" /><br>
                        </div>
                    </form>

                </div>
                <!--fin du form-->
            </div>
        </div>
    </div>
</div>

