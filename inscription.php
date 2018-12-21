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
        <div class="modal fade <?= $modalError ? 'modalError' : ''; ?>" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- debut modal -->

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bienvenue sur le formulaire d'inscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--form-->
                        <form method="post" action="index.php" novalidate>
                            <div class="form-group">
                                Civilité : <select required name="civilite">
                                    <option value="" disabled selected>Veuillez faire votre choix</option>   
                                    <option value="Monsieur">Monsieur</option>
                                    <option value="Madame">Madame</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Votre nom : </label>
                                <input type="text" name="name" id="name" placeholder="ex : Dupont" required /><br>
                                <span class="error"><?= isset($errorsArray['name']) ? $errorsArray['name'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Votre prénom :</label> 
                                <input type="text" name="firstname" id="firstname" placeholder="ex : Stéphane" required /><br>
                                <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="age">Votre âge : </label> 
                                <input type="text" name="age" id="age" placeholder="âge" required /><br>
                                <span class="error"><?= isset($errorsArray['age']) ? $errorsArray['age'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="mail">Votre mail : </label> 
                                <input type="text" name="mail" id="age" placeholder="monsieurtruc@gmail.com" required /><br>
                                <span class="error"><?= isset($errorsArray['mail']) ? $errorsArray['mail'] : ''; ?></span>
                            </div>                         
                            <div class="form-group">
                                <label for="login">Votre login : </label>
                                <input type="text" name="login" id="login" placeholder="login" required /><br>
                                <span class="error"><?= isset($errorsArray['login']) ? $errorsArray['login'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe : </label>
                                <input type="text" name="password" id="password" placeholder="mot de passe" required /><br>
                                <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="secondpassword">Confirmer : </label>
                                <input type="text" name="secondpassword" id="password" placeholder="mot de passe" required /><br>
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

    </body>
</html>