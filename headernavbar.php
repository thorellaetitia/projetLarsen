<div>
    <div class="container-fluid header">
        <div class="row" id="header">
            <div class="introduction col-lg-8 col-md-8 col-sm-12">
                <h1>Larsen, votre agenda culturel gratuit,  <?php if (isset($_SESSION['userlogin'])) { ?>Bienvenue  <a href="moncompte.php" class="userprofil" ><i class="far fa-user"></i></a> <?= $_SESSION['users_login'] ?></h1> 
                <a href="deconnexion.php">déconnexion <i class="far fa-times-circle"></i></a>
            </div>            
            <div class="connection col-lg-4 col-md-4 col-sm-12">
                <button type="button" class="headerbtn" data-toggle="modal" data-target="#createanevent" data-whatever="createanevent">Créer son événement</button>
               
                    <?php } else { ?>
                    <button type="button" class="headerbtn" data-toggle="modal" data-target="#inscription" data-whatever="inscription">S'inscrire</button>
                    <button type="button" class="headerbtn" data-toggle="modal" data-target="#seconnecter" data-whatever="seconnecter">Se connecter</button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-fluid citation">
        <div class="row">
            <img class="img-fluid" src="../assets/images/concertnotedemusique (copie).png" alt="photoconcert" width="1300px" />
            <div class="citation">la culture à la portée de tous...</div>
        </div>
    </div>
</div>