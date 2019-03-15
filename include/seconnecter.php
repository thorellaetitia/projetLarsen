<?php
include_once('./controllers/controllerseconnecter.php');
?>

<!-- Modal -->
<div class="container-fluid">
    <div class="modal fade <?= $modalErrorconnection ? 'modalErrorconnection' : ''; ?>" id="seconnecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConnecter">Déjà inscrit ? Connectez vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--form-->

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="login">Votre login : </label>
                            <input class="form-control" type="text" name="users_login" id="login" value="" required />
<!--                            //si le tableau d'erreur users_login n'est pas vide alors tu me crée l'erreur dans le tableau sinon tu m'affiches rien-->
                            <span class="error "><?= !empty($errorsArrayconnection['users_login']) ? $errorsArrayconnection['users_login'] : ''; ?></span>
<!--                            //Si les erreurs existent alors tu m'affiches le message suivant// -->
                            <span class="error text-danger"><p> <?= isset($messageErrorAccount) ? 'Ce compte n\'existe pas, merci d\'essayer à nouveau' : '' ?></p></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe : </label>
                            <input class="form-control" type="password" name="users_password" id="password" value="" required />
                            <span class="error"><?= !empty($errorsArrayconnection['users_password']) ? $errorsArrayconnection['users_password'] : ''; ?></span>
                            <span class="error text-danger"><p> <?= isset($messageNonValidPassword) ? 'le mot de passe ne correspond pas au login, merci d\'essayer à nouveau' : '' ?></p></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-warning" name="connectBtn">Se connecter</button>
                        </div>
                    </form>

                </div>
                <!--fin du form-->
            </div>
        </div>
    </div>
<!--    fin du modal-->
</div>

