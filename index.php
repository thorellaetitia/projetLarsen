<?php
session_start();
include_once('controllers/controllerinscription.php');
include_once('controllers/controllerseconnecter.php');
include_once('controllers/controllerevent.php');
include_once('controllers/controllerindex.php');
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
        <link rel="stylesheet" href="assets/style.css" />
        <title>MON PROJET PRO</title>
    </head>
    <body>
        <?php
        include_once ('headernavbar.php');
        include_once ('picturenavbar.php');
        ?>        <?php
        include_once ('navbar.php');
        include_once('include/seconnecter.php');
        include_once('include/inscription.php');
        ?>
        <!--caroussel  -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/balletv2.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="p-3 mb-2 bg-warning text-white">DANSE variation Hip-Hop</h2>
                        <h2 class="text-light bg-dark">DOUBLE - Cie Dessources (Belgique)</h2>
                        <p>mardi 23 Avril à 20h30 THEATRE JULIOBONA #LILLEBONNE</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/concertv2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="p-3 mb-2 bg-danger text-white">CONCERT </h2>
                        <h2 class="text-light bg-dark">ARCHIVE  + 1ère partie en concert au TETRIS</h2>
                        <p>jeudi 7 Novembre à 20h30 LE TETRIS #LE HAVRE</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/expov2.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="p-3 mb-2 bg-success text-white">EXPOSITION</h2>
                        <h2 class="text-light bg-dark">RAOUL DUFY AU HAVRE</h2>
                        <p>du 18 Mai au 3 Novembre Le MUMA #LE HAVRE</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--fin du caroussel  -->
        <div class="parallaxtop"></div>
        <!--debut des cards-->
        <section id="content">
            <?php
            if (isset($_GET['eventcategory_id']) && ($_GET['eventsub_category_id'])) {
                if (($_GET['eventcategory_id'] == 1) && ($_GET['eventsub_category_id'] == 1)) {
                    ?>
            <div class="filter concert"><img src="/assets/images/musicv2.jpg" /></div> 
                    <?php
                }
                if (($_GET['eventcategory_id'] == 2) && ($_GET['eventsub_category_id'] == 2 || 3 || 4 || 5)) {
                    ?>
                    <div class="filter spectacle"><img src="/assets/images/theatrev2.jpg" /></div> 
                    <?php
                }
                if (($_GET['eventcategory_id'] == 3) && ($_GET['eventsub_category_id'] == 6 || 7 || 8 || 9)) {
                    ?>
                    <div class="filter musée"><img src="/assets/images/museumv2.jpg" /></div> 
                    <?php
                }
            } else {
                
            }
            ?>

            <div class="container-fluid">
                <div class="row">
                    <?php
                    foreach ($arrayShowCategory as $allEvents) {
                        ?>

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="containerevent">

                                <div class="card-media row">

                                    <div class="card-media-object-container col-xs-12 col-sm-6 col-md-6">
                                        <div class="card-media-object <?php if (strtotime('today') > strtotime($allEvents->event_date)) { ?>
                                                 grayscale
                                                 <?php
                                             }
                                             ?>" style="background-image: url(img/<?= $allEvents->event_picture ?>); "></div>
                                        <ul class="card-media-object-social-list">
                                            <!--bouton qui permet l'affichage du descriptif de l'événement-->
                                            <li type="button" class="rounded-circle bg-warning ml-1 mb-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?= $allEvents->event_description ?>"><i class="mx-auto fas fa-search-plus text-dark pt-2"></i></li>
                                        </ul>
                                    </div>
                                    <!--modal-->
                                    <!-- body container -->

                                    <div class="card-media-body col-xs-12 col-sm-6 col-md-6 <?= $allEvents->eventcategory_name ?>">
                                        <div class="card-media-body-top">
                                            <span class="subtle"><?= $newdate = date('d/m/Y', strtotime($allEvents->event_date)) ?> à <?= $newdate2 = date('H:i', strtotime($allEvents->event_time)) ?></span>

                                            <span class="card-media-body-heading small d-none d-xl-block d-lg-block d-md-none d-sm-none d-xs-none"><?= $allEvents->event_title; ?></span>
                                            <span class="card-media-body-heading small d-xl-none d-lg-none d-md-block d-sm-block d-xs-block"><?= substr($allEvents->event_title, 0, 20); ?>...</span>
                                        </div>
                                        <div class="card-media-body-supporting-bottom">
                                            <span class="card-media-body-supporting-bottom-text subtle"><?= $allEvents->showplaces_name ?></span>
                                            <span class="card-media-body-supporting-bottom-text subtle u-float-right"><?= $allEvents->eventsub_category_name ?></span>
                                        </div>
                                        <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                                            <span class="card-media-body-supporting-bottom-text subtle">#<?= $allEvents->eventcategory_name ?></span>
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
            <!--            //creation d'un bouton SCROLL TO TOP//-->
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button> 


            <!--fin des cards-->
        </section>

        <div class="parallaxbottom"></div>

        <?php
        include_once ('footer.php');
        ?>



        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"/></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"/></script>
<script src="assets/script.js"></script>
</body>
</html>
