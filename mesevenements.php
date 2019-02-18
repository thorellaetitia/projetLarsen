<?php
session_start();
include_once('controllers/controllermesevenements.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="assets/images/larsen.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/style.css" />

        <title>MON PROJET PRO</title>
    </head>
    <body>
        <?php
        include_once ('headernavbar.php');
        ?>
        <?php
        include_once ('navbar.php');
        ?>
        <div class="closebutton ml-3">
            <a href="index.php">Fermer</a>
        </div>
        <div class="row">
            <h2 class="myevents mx-auto">Mes événements</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($resultAllDataEvent as $events) {
                    ?>
                    <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                        <div class="containerevent">
                            <div class="card-media">
                                <div class="card-media-object-container">
                                    <div class="card-media-object" style="background-image: url(img/<?= $events->event_picture ?>);"></div>
                                    <ul class="card-media-object-social-list">
                                        <li>
                                            <img src="https://s13.postimg.cc/c5aoiq1w7/stock3_f.jpg" class="">
                                        </li>
                                    </ul>
                                </div>
                                <!-- body container -->
                                <div class="card-media-body <?= $events->eventcategory_name ?>">
                                    <div class="card-media-body-top">
                                        <span class="subtle"> <?= $events->event_date ?>, <?= $events->event_time ?></span>
                                        <div class="card-media-body-top-icons u-float-right">
                                            <a href="mesevenements.php?id=<?= $events->event_id ?>" class="btn btn-outline-warning btn-sm">Supprimer</a>
                                            <a href="modifyevent.php?id=<?= $events->event_id ?>" class="btn btn-outline-warning btn-sm">Modifier</a>
    <!--                                            <svg fill="#888888" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            </svg>-->
                                        </div>
                                    </div>
                                    <span class="card-media-body-heading"><?= $events->event_title ?><br><?= $events->event_description ?></span>
                                    <div class="card-media-body-supporting-bottom">
                                        <span class="card-media-body-supporting-bottom-text subtle"><?= $events->showplaces_name ?> <?= $events->showplaces_postalcode ?></span>
                                        <span class="card-media-body-supporting-bottom-text subtle u-float-right">Free &ndash; $30</span>
                                    </div>
                                    <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                                        <span class="card-media-body-supporting-bottom-text subtle">#<?= $events->eventcategory_name ?></span>
                                        <a href="https://www.digitick.com/" class="card-media-body-supporting-bottom-text card-media-link u-float-right"><img src="assets/images/digitick.jpg" width="50px" /></a>
                                    </div>
                                </div>
                                <!-- media container -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>



        <!--        <a href="index.php" class="btn btn-outline-warning btn-sm">Diffuser l'événement</a><br>
                > 
                

        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>




