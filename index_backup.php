<?php
include_once('controllerIndex.php');
include_once('seconnecter.php');
include_once('inscription.php');
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="images/larsen.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="style.css" />
        <title>MON PROJET PRO</title>
    </head>
    <body>
        <div class="container-fluid header">
            <div class="row">
                <div class="introduction col-lg-8 col-md-8 col-sm-12">
                    <h1>Créez vos évenements ? Professionnel ou particulier ?</h1> 
                </div>
                <div class="connection col-lg-4 col-md-4 col-sm-12">
                    <button type="button" class="headerbtn" data-toggle="modal" data-target="#inscription" data-whatever="inscription">Inscription</button>
                    <button type="button" class="headerbtn" data-toggle="modal" data-target="#seconnecter" data-whatever="connec">Se connecter</button>
                </div>
            </div>
        </div>
        <div class="container-fluid citation">
            <div class="row">
                <img class="img-fluid" src="images/concertnotedemusique (copie).png" alt="photoconcert" width="1300px" />
                <div class="citation">la culture à la portée de tous...</div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><img src="images/larsen.png" width="100px"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link zoom" href="#concert">Concert <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link zoom dropdown-toggle" href="#spectacle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Spectacle
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#danse">Danse</a>
                            <a class="dropdown-item" href="#cirque">Cirque</a>
                            <a class="dropdown-item" href="#theatre">Théatre</a>
                            <a class="dropdown-item" href="#humour">Humour</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link zoom dropdown-toggle" href="#expo" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Expo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#expos">Expos</a>
                            <a class="dropdown-item" href="#musees">Musées</a>
                        </div>
                    </li>      
                    <li class="nav-item dropdown">
                        <a class="nav-link zoom dropdown-toggle" href="#plansgratuits" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Plans gratuits
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#expos">Expos</a>
                            <a class="dropdown-item" href="#balades">Balades</a>
                            <a class="dropdown-item" href="#ateliers">Ateliers</a>
                        </div>
                    </li>               
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="recherche à proximité">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
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
                            <img class="d-block w-100" src="images/ballet-1376250_1280.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/concert-984276_1280.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/museum-1177081_1280.jpg" alt="Third slide">
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
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card" id="concert">
                            <img class="card-img-top image-fluid" src="images/hyphen-hyphen.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="card-text"><strong>HYPHEN HYPHEN</strong><br>Vendredi 18 Janvier 2019<br> 106 Rouen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <img class="card-img-top image-fluid" src="images/synapson.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="card-text"><strong>SYNAPSON</strong><br>Samedi 9 Février 2019<br> 106 Rouen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card" id="danse">
                            <img class="card-img-top image-fluid" src="images/findingnowchoregraphe-danse-hip-hop-.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="card-text"><strong>Finding now / Andrew Skeels</strong><br>Mardi 15 Janvier 2019<br> Théatre Juliobona -Lillebonne</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card" id="theatre">
                            <img class="card-img-top image-fluid" src="images/theatreles fantomesdelaruepapillon.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="card-text"><strong>Les fantômes de la rue papillon / Michel Jonasz et Eddy Moniot</strong><br>Vendredi 29 Mars 2019 à 20h30<br> Théatre Juliobona -Lillebonne</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fin des cards-->
</section>
<div class="parallaxbottom"></div>

<footer>
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="rubriquefooter">
                    <a href="#concert">Concert</a>
                    <a href="#spectacle">Spectacle</a>
                    <a href="#expo">Expo</a>
                    <a href="#plansgratuits">Plans gratuits</a>
                </div>
                <div><img src="images/larsen.png" alt="logosite" width="100px"/></div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div id="follow">Nous suivre
                    <a href="https://www.facebook.com/" class=" content picto" ><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.pinterest.fr/" class="content picto"><i class="fab fa-pinterest-p"></i></a>
                    <a href="https://www.instagram.com/?hl=fr" class="content picto"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/?lang=fr" class="content picto"><i class="fab fa-twitter"></i></a>
                </div>
                <div>Commander des billets
                    <a href="https://www.digitick.com/"><img src="images/digitick.jpg" width="50px" /></a>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="spectacleplaces">
                    <a href="https://www.le106.com/"><img src="images/106.png" width="50px" /></a>
                    <a href="http://www.juliobona.fr/"><img src="images/juliobona.jpeg" width="50px" /></a>
                    <a href="ttps://www.levolcan.com"><img src="images/volcan.jpeg" width="50px" /></a>
                    <a href="https://letetris.fr/"><img src="images/tetris.png" width="50px" /></a>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="rubriquebottomfooter">
                    Copyright @2019 |<a href="Mentions légales"> Mentions légales</a> 
                    Designed by laetitia |<a href="contact"> Nous contacter</a>  
                </div>
            </div>
        </div>
    </div>

</footer>

<script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
