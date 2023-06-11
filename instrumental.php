<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="Description" content="Download and Stream Ringtone,Upload Ringtone,Rate Ringtone and Share among people">
        <meta name="theme-color" content="blue">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="css/player.css">
        <title>Ringtone Website</title>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid bg-gradient-light" style="margin: 0px;padding:10px">
            <div class="container">
                <h2 class="display-4">Zedge Ringtone.in</h2>
                <p class="lead">Music gives peace to the mind and body.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top " style="margin: 0px;">
            <a class="navbar-brand" href="../RingtoneProject/">
                <img src="#" width="30" height="30" class="d-inline-block align-top" alt="">
                Zedge
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="ringtones/popular/1/">Rintones <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="instrumental">Instrumental</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="search_data/" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <style>
            .row{
                margin-top: 20px;
            }
            .col{
                margin: 5px;
                padding: 5px;
                border-radius: 5px;
            }

        </style>
        <?php
        include 'db.php';
        ?>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/Guitar-HD-Wallpaper-51.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Music with Instruments</h5>
                        <p>Music make me Happy</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/maxresdefault (1).jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Music with Instruments</h5>
                        <p>Music make me Happy</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/maxresdefault.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Music with Instruments</h5>
                        <p>Music make me Happy</p>
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

<br><br>
    <div class="main" style="margin-left: 10%;margin-right: 10%;margin-top: 10px;">
        <div class="card-group">
            <div class="card">
                <img class="card-img-top" src="img/vocal-lessons-music-lessons.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="cat/Bhakti/"><h5 class="card-title">Bhakti Music</h5></a>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/happyrock.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="cat/Guitar/"><h5 class="card-title">Guitar Music</h5></a>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>       
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/music9.jpg" alt="Card image cap">
                <div class="card-body">
                    <a href="cat/Bollywood/"><h5 class="card-title">Bollywood Music</h5></a>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    
                </div>
            </div>
        </div>
    </div>

    

<br><br>

        <div class="ads" ><img src="img/ads.jpg" width="100%"></img></div><br>
    </div>

    <div class=" display-5 jumbotron " style="margin: 0px;padding: 20px; text-align: center;">
        Designed and Developed By Diwakar Prasad
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
