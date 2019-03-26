<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
    <a class="navbar-brand order-lg-1" data-toggle="modal" href="http://projet"><img src="../assets/images/larsen.png" alt="logo larsen" width="100px" /></a>       
    <button class="navbar-toggler order-md-3 col-2 col-sm-1 col-md-1" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse order-lg-2 col-lg-7" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link zoom" id="content_concert" href="index.php?eventcategory_id=1&eventsub_category_id=1#content">Concert <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link zoom dropdown-toggle" id="content_spectacle" href="index.php?eventcategory_id=2#content" id="navbarDropdownspectacle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Spectacle
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?eventcategory_id=2&eventsub_category_id=2&#content">Danse</a>
                    <a class="dropdown-item" href="index.php?eventcategory_id=2&eventsub_category_id=3#content">Cirque</a>
                    <a class="dropdown-item" href="index.php?eventcategory_id=2&eventsub_category_id=4#content">Théatre</a>
                    <a class="dropdown-item" href="index.php?eventcategory_id=2&eventsub_category_id=5#content">Humour</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link zoom dropdown-toggle" id="content_expo" href="index.php?eventcategory_id=3#content" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Expo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?eventcategory_id=3&eventsub_category_id=6#content">Expo</a>
                    <a class="dropdown-item" href="index.php?eventcategory_id=3&eventsub_category_id=7#content">Musée</a>
                    <a class="dropdown-item" href="index.php?eventcategory_id=3&eventsub_category_id=8#content">Balade</a>
                    <a class="dropdown-item" href="index.php?eventcategory_id=3&eventsub_category_id=9#content">Atelier</a>
                </div>
            </li>      
            <li class="nav-item active">
                <a class="nav-link zoom dropdown-toggle"  id="content_free" href="#plansgratuits" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Plans gratuits
                </a>
            </li>               
        </ul>
    </div>
    <div class="order-md-2 order-lg-3 col-12 col-sm-12 col-md-8 col-lg-4">
        <form action="index.php" method="get" id="searchnav" class="form-inline justify-content-center mb-2 mr-2">
            <input class="col-8 col-sm-6 col-md-6 col-lg-10 form-control mr-1" type="search" name="terme" placeholder="rechercher">
            <button class="col-1 btn btn-outline-warning btn-sm my-2 my-sm-0" type="submit" name="search"><i class="fas fa-search fa-2x" id="search"></i></button>
        </form>
    </div>
</nav>
