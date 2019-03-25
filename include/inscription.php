<?php
include_once('controllers/controllerinscription.php');
?>
<!--//debut du modal//-->
<div class="modal fade <?= $modalErrorinscription ? 'modalErrorinscription' : ''; ?>" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modalinscription">Pas encore inscrit ? Inscrivez-vous en quelques clics</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--début du form-->
                <form method="post" action="" novalidate >
                    <div class="form-group">
                        <label for="usertypes_id"> Vous êtes* </label>
                        <select class="form-control py-2" name="usertypes_id">
                            <option disabled <?= !isset($_POST['usertypes_id']) ? 'selected' : '' ?>>Veuillez renseigner un champ</option> 
                            <!-- //création de ternaire pour récupérer les données entrées par le user -->
                            <!--début de la condition si usertypes_id existe et si usertypes_id correspond à 1 alors tu m'affiches cette valeur par défaut sinon tu m'affiches rien-->
                            <option value="1" <?= isset($_POST['usertypes_id']) && $_POST['usertypes_id'] == 1 ? 'selected' : '' ?>>Professionnel</option>
                            <option value="2" <?= isset($_POST['usertypes_id']) && ($_POST['usertypes_id'] == 2) ? 'selected' : '' ?>>Particulier</option>
                        </select>
                        <span class="error"><?= isset($errorsArrayinscription['usertypes_id']) ? $errorsArrayinscription['usertypes_id'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Votre nom* </label>
                        <input class="form-control" type="text" name="name" id="name" value="<?= (isset($name)) ? $name : ''; ?>"  required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['name']) ? $errorsArrayinscription['name'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Votre prénom* </label> 
                        <input class="form-control" type="text" name="firstname" id="firstname" value="<?= (isset($firstname)) ? $firstname : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['firstname']) ? $errorsArrayinscription['firstname'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="age">Votre âge* </label> 
                        <input class="form-control" type="text" name="age" id="age" value="<?= (isset($age)) ? $age : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['age']) ? $errorsArrayinscription['age'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="mail">Votre mail* </label> 
                        <input class="form-control" type="email" name="mail" id="age" placeholder="ex monmail@gmail.com" value="<?= (isset($mail)) ? $mail : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['mail']) ? $errorsArrayinscription['mail'] : ''; ?></span>
                    </div>                         
                    <div class="form-group">
                        <label for="login">Votre pseudo* </label>
                        <input class="form-control" type="text" name="login" id="login" value="<?= (isset($login)) ? $login : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['login']) ? $errorsArrayinscription['login'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe* </label>
                        <input class="form-control" type="password" name="password" id="password" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['password']) ? $errorsArrayinscription['password'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="secondpassword">Confirmer* </label>
                        <input class="form-control" type="password" name="secondpassword" id="secondpassword" required /><br>
                        <span class="error"><?= isset($errorsArrayinscription['secondpassword']) ? $errorsArrayinscription['secondpassword'] : ''; ?></span>
                    </div>
                    <p class="inputwarning">Tous les champs marqués * sont obligatoires</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning" name="createUserBtn">S'inscrire</button>
                    </div>
                     <p class="datawarning text-justify">Les données personnelles rentrées sur ce site resteront privées et ne seront donc pas utilisées à des fins commerciales. 
                         De plus, les données ne seront visibles que par l'utilisateur.</p>
                </form>
                <!--fin du form-->

            </div>
        </div>
    </div>
</div><!-- fin modal -->
