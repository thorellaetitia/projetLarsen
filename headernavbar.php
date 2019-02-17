<div id="headernavbar">
    <div class="container-fluid header">
        <div class="row" id="header">
            <div class="introduction col-lg-8 col-md-8 col-sm-12">
                <p>Larsen, votre agenda culturel gratuit <?php if (isset($_SESSION['userlogin'])) { ?> Bienvenue  <?= $_SESSION['users_login'] ?><a href="moncompte.php" class="btn btn-outline-warning btn-sm" id="loginpicto"><i class="far fa-user fa-2x"></i></a>
                    <a href="deconnexion.php">déconnexion<i class="far fa-times-circle" id=""></i></a></p> 
            </div>            
            <div class="connection col-lg-4 col-md-4 col-sm-12">
                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#createanevent" data-whatever="createanevent">Créer son événement</button>

                <?php } else { ?>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#inscription" data-whatever="inscription">S'inscrire</button>
                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#seconnecter" data-whatever="seconnecter">connexion</button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-fluid citation">
        <div class="row">
            <img class="img-fluid" src="../assets/images/concertnotedemusique (copie).png" alt="photoconcert" width="1300px" />
          
        </div>
    </div>
</div>