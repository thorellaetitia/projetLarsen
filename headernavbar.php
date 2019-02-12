<div>
    <div class="container-fluid header">
        <div class="row">
            <div class="introduction col-lg-6 col-md-6 col-sm-12">
                <h1>Professionnel ou particulier,  <?php if (isset($_SESSION['userlogin'])) { ?>Bienvenue, <?= $_SESSION['users_login'] ?> <a href=""></a></h1> 
                <a href="deconnexion.php">deconnexion</a>
            </div>            
            <div class="connection col-lg-6 col-md-6 col-sm-12">
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