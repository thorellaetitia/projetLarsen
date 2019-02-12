<?php
session_start();
include_once('controllers/controllerinscription.php');
include_once('controllers/controllerseconnecter.php');
include_once('controllers/controllerevent.php');

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
        ?>
        <?php
        include_once ('navbar.php');
        include_once('include/seconnecter.php');
        include_once('include/inscription.php');
        include_once ('include/createanevent.php');
        ?>
        <!--caroussel  -->
        <div class="container-fluid">
            <div class="row" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="assets/images/ballet-1376250_1280.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="assets/images/concert-984276_1280.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="assets/images/museum-1177081_1280.jpg" alt="Third slide">
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
            </div>
        </div>
        <!--fin du caroussel  -->
        <div class="parallaxtop"></div>
        <!--debut des cards-->
        <section>
            <div class="container-fluid">
                <div class="row">

                    <?php
                    $url = 'http://www.fnacspectacles.com/rss/?flux=famille&famid=1MC';
                    $url2 = 'http://projet/xml/fluxrssfnac';

                    $rss = @simplexml_load_file($url);
                    if (!$rss) {
                        $rss = simplexml_load_file($url2);
                    }
                    foreach ($rss->channel->item as $item) {
                        ?>                    
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="card" id="concert">
                                <img class="card-img-top image-fluid" id="cardimagetop" src="<?= $item->enclosure['url']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <div class="card-text"><strong><?= $item->title; ?></strong><br><?= $item->description; ?><br></div>
                                </div>
                                <div class="footer">
                                    <div>Prix indicatif : </div>
                                    <div>Réserver vos billets<a href="https://www.digitick.com/"><img src="assets/images/digitick.jpg" width="50px" /></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>  

                </div>
            </div>
            <!--fin des cards-->
        </section>
        <div class="parallaxbottom"></div>
        <?php
        include_once ('footer.php');
        ?>

        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>
