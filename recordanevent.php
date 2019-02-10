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

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card" id="event">
                        <div class="card-body">
                            <p>Récapitulatif de l'événement</p>
                            <div class="closebutton">
                                <a href="index.php">Fermer</a>
                            </div>
                            <?php
                            foreach ($eventList as $events) {
                                ?>
                                <div class="card-id">Titre : <?= $events->event_title ?></div>
                                <p class="card-title" >Nom de l'inscrit : <?= $events->users_id ?></p>
                                <p class="card-title" >Date de l'événement : <?= $events->event_date ?></p>
                                <p class="card-subtitle mb-2 text-muted">Heure : <?= $events->event_time ?></p>
                                <p class="card-text">Image : <?= $events->event_picture ?></p>
                                <p class="card-text">Description: <?= $events->event_description ?></p>
                                <p class="card-text"> Catégorie événement : <?= $events->eventcategory_id ?></p>
                                <p class="card-text"> code postal : <?= $events->postalcode_id ?></p>
                                <p class="card-text"> Lieu  : <?= $events->showplaces_id ?></p>

                                <a href="modifyevent.php?id=<?= $events-- > users_id ?>" class="card-link">Modifier l'événement</a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>




        <script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/script.js"></script>
    </body>
</html>



