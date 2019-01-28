<?php
include_once('controllers/controllerIndex.php');
?>

<!-- Modal -->
<div class="modal fade <?= $modalError ? 'modalError' : ''; ?>" id="seconnecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="connect">Déjà inscrit ? Se connecter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php ?>
                <!--form-->
                <form method="post" action="user.php">
                    <div class="form-group">
                        <label for="login">Votre login : </label>
                        <input type="text" name="login" id="login" placeholder="login" value="<?php (isset($login)) ? $login : '';  ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['login']) ? $errorsArray['login'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="text" name="password" id="password" placeholder="mot de passe" value="<?php (isset($password)) ? $password : '';  ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="secondpassword">Confirmer : </label>
                        <input type="text" name="secondpassword" id="secondpassword" placeholder="mot de passe" value="<?php (isset($secondpassword)) ? $secondpassword : '';  ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['secondpassword']) ? $errorsArray['secondpassword'] : ''; ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary " name="submit" value="Se connecter" /><br>
                    </div>
                </form>

            </div>
            <!--fin du form-->
        </div>
    </div>
</div>

