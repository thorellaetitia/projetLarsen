<?php

include_once('controllers/controllerinscription.php');
?>

<div class="modal fade <?= $modalErrorinscription ? 'modalErrorinscription' : ''; ?>" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modalinscription">Bienvenue sur le formulaire d'inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form-->
                <form method="post" action="include/user.php" >
                    <div class="form-group">
                        Civilité : <select value="<?php (isset($civilite)) ? $civilite : ''; ?>" required name="civilite" />
                            <option >Veuillez faire votre choix</option>   
                            <option value="Monsieur">Monsieur</option>
                            <option value="Madame">Madame</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Votre nom : </label>
                        <input type="text" name="name" id="name" placeholder="ex : Dupont" value="<?php (isset($name)) ? $name : ''; ?>"  required /><br>
                        <span class="error"><?= isset($errorsArray['name']) ? $errorsArray['name'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Votre prénom :</label> 
                        <input type="text" name="firstname" id="firstname" placeholder="ex : Stéphane" value="<?php (isset($firstname)) ? $firstname : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="age">Votre âge : </label> 
                        <input type="text" name="age" id="age" placeholder="âge" value="<?php (isset($age)) ? $age : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['age']) ? $errorsArray['age'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="mail">Votre mail : </label> 
                        <input type="text" name="mail" id="age" placeholder="monsieurtruc@gmail.com" value="<?php (isset($mail)) ? $mail : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['mail']) ? $errorsArray['mail'] : ''; ?></span>
                    </div>                         
                    <div class="form-group">
                        <label for="login">Votre login : </label>
                        <input type="text" name="login" id="login" placeholder="login" <?php (isset($login)) ? $login : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['login']) ? $errorsArray['login'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="text" name="password" id="password" placeholder="mot de passe" <?php (isset($password)) ? $password : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="secondpassword">Confirmer : </label>
                        <input type="text" name="secondpassword" id="password" placeholder="mot de passe" <?php (isset($secondpassword)) ? $secondpassword : ''; ?>" required /><br>
                        <span class="error"><?= isset($errorsArray['secondpassword']) ? $errorsArray['secondpassword'] : ''; ?></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary " name="submit" value="S'inscrire" />
                    </div>
                </form>
                <!--fin du form-->
            </div>
        </div>
    </div>
</div><!-- fin modal -->
