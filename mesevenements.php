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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left mt-2">  
                <div class="btn btn-outline-warning btn-sm">
                    <a href="index.php">Fermer</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right mt-2"> 
                <div class="btn btn-outline-warning btn-sm">
                    <a href="moncompte.php">Retour mon compte</a>
                </div>
            </div>
        </div>
       
        <div class="row">
            <h1 class="myevents mx-auto">Mes événements</h1>
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
                                    <ul class="card-media-object-social-list d-flex justify-content-between">
                                        <li class="d-xl-none d-lg-none d-md-block d-sm-block d-xs-block rounded-circle bg-warning ml-1 mb-2">
                                            <a href="mesevenements.php?id=<?= $events->event_id ?>"><i class="mx-auto far fa-trash-alt pt-2 text-dark"></i></a>
                                        </li>
                                        <li class="d-xl-none d-lg-none d-md-block d-sm-block d-xs-block rounded-circle bg-warning ml-1 mb-2">
                                            <a href="modifyevent.php?id=<?= $events->event_id ?>"><i class="mx-auto fas fa-pencil-alt pt-2 text-dark"></i></a>
                                        </li>
                                        <li class="rounded-circle bg-warning ml-1 mb-2" data-container="body" data-toggle="popover"
                                            data-trigger="hover" data-placement="top" data-content="<?= $events->event_description ?>">
                                            <i class="mx-auto fas fa-search-plus text-dark pt-2"></i>
                                        </li>
                                    </ul>
                                </div>
                                <!-- body container -->
                                <div class="card-media-body col-sm-12 col-md-8 col-lg-8 mx-auto <?= $events->eventcategory_name ?>">
                                    <div class="card-media-body-top">
                                        <span class="subtle"> <?= $events->event_date ?>, <?= $events->event_time ?></span>
                                        <div class="card-media-body-top-icons u-float-right d-flex justify-content-between ">
                                            <a href="mesevenements.php?id=<?= $events->event_id ?>" class="btn btn-outline-warning btn-sm d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none">Supprimer</a>
                                            <a href="modifyevent.php?id=<?= $events->event_id ?>" class="btn btn-outline-warning btn-sm d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none">Modifier</a>
                                        </div>
                                        <span class="card-media-body-heading small d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none"><?= $events->event_title; ?></span>
                                        <a class="card-media-body-heading small d-xl-none d-lg-none d-md-block d-sm-block d-xs-block"  data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-title="<?= ($events->event_title); ?>"><?= substr($events->event_title, 0, 15); ?>...</a>


                                    </div>
                                    <div class="card-media-body-supporting-bottom">
                                        <span class="card-media-body-supporting-bottom-text subtle"><?= $events->showplaces_name ?> <?= $events->showplaces_postalcode ?></span>
                                        <span class="card-media-body-supporting-bottom-text subtle u-float-right"><?= $events->eventsub_category_name ?></span>
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

        <!--        <a href="index.php" class="btn btn-outline-warning btn-sm">Diffuser l'événement</a><br>-->


        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>




