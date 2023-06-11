<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keyword" content="Ringtone Download Like and Upload">
        <meta name="Description" content="Download and Stream Ringtone,Upload Ringtone and Rate Ringtone">
        <meta name="theme-color" content="blue">
        <meta name="author" content="Diwakar Prasad">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <meta name="identifier-url" content="http://www.zedgeringtone.in/" />
        <meta name="title" content="Zedge Ringtone" />
        <meta name="copyright" content="© 2018 zedgeringtone.in" />

        <!-- Bootstrap CSS -->
        <base href="http://localhost/RingtoneProject/">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="css/player.css">
        <title>ZedgeRingtone.in</title>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid bg-gradient-light" style="margin: 0px;padding:10px">
            <div class="container">
                <h2 class="display-4 head">Zedge Ringtone.in</h2>
                <p class="lead">Music gives peace to the mind and body.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm" style="margin: 0px;">
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
            .display-4{
                color: #f35626;
                background-image: -webkit-linear-gradient(92deg,#f35626,#feab3a);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                -webkit-animation: hue 60s infinite linear;
                padding: 5px;
            }
            @keyframes hue {
                from {
                    -webkit-filter: hue-rotate(0deg);
                }

                to {
                    -webkit-filter: hue-rotate(-360deg);
                }
            }
            html body{
                transition: all ease .2s;
                background: url('img/eight_horns.png') fixed;
            }
            .row{
                margin-top: 20px;
            }
            .col{
                margin: 5px;
                padding: 5px;
                border-radius: 5px;
            }
            .main{
                margin-left: 10%;
                margin-right: 10%;
            }
            @media (max-width: 767.98px) {
                .display-4{
                    font-size: 40px;
                    transition: all ease .2s;
                }
                .main{
                    margin-left: 3%;
                    margin-right: 3%;
                }
                html body{
                    background-size: 25%;
                }

            }
        </style>
        <div class="card text-center shadow" style="margin:20px;">
            <div class="card-header ">
                Hello
            </div>


            <div class="card-body">
                <h5 class="card-title display-4">
                    <?php
                    if (isset($_GET['user'])) {
                        echo strtoupper($_GET['user']);

                        include 'db.php';
                        include 'service.php';
                        $page_sql = mysqli_query($conn, "SELECT * FROM `data` WHERE `uploader` = '" . $_GET['user'] . "'");
                        $rows = mysqli_num_rows($page_sql);

                        $page_rows = 5;
                        $last = ceil($rows / $page_rows);
                        if ($last < 1) {
                            $last = 1;
                        }
                        $pagenum = 1;
                        if (isset($_GET['pn'])) {
                            $pagenum = $_GET['pn'];
                        }
                        if ($pagenum < 1) {
                            $pagenum = 1;
                        } else if ($pagenum > $last) {
                            $pagenum = $last;
                        }
                        $limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
                        $paginationCtrls = '<nav aria-label="..."><ul class="pagination justify-content-center">';
                        // If there is more than 1 page worth of results
                        if ($last != 1) {
                            if ($pagenum > 1) {
                                $previous = $pagenum - 1;
                                $paginationCtrls .= '<li class="page-item"><a class="page-link" href="profile/user/' . $_GET['user'] . '/' . $previous . '/">Previous</a></li>';
                                // Render clickable number links that should appear on the left of the target page number
                                for ($i = $pagenum - 4; $i < $pagenum; $i++) {
                                    if ($i > 0) {
                                        $paginationCtrls .= '<li class="page-item"><a class="page-link" href="profile/user/' . $_GET['user'] . '/' . $i . '/">' . $i . '</a></li>';
                                    }
                                }
                            }
                            // Render the target page number, but without it being a link
                            $paginationCtrls .= '<li class="page-item active"><a class="page-link" >' . $pagenum . '<span class="sr-only">(current)</span></a></li> ';
                            // Render clickable number links that should appear on the right of the target page number
                            for ($i = $pagenum + 1; $i <= $last; $i++) {
                                $paginationCtrls .= '<li class="page-item"><a class="page-link" href="profile/user/' . $_GET['user'] . '/' . $i . '/">' . $i . '</a></li> ';
                                if ($i >= $pagenum + 4) {
                                    break;
                                }
                            }
                            // This does the same as above, only checking if we are on the last page, and then generating the "Next"
                            if ($pagenum != $last) {
                                $next = $pagenum + 1;
                                $paginationCtrls .= ' <li class="page-item"><a class="page-link" href="profile/user/' . $_GET['user'] . '/' . $next . '/">Next</a></li> </ul></nav>';
                            }
                        }
                        $user_details = "SELECT * FROM `data` WHERE `uploader` = '" . $_GET['user'] . "' $limit";
                        $user_dt_res = mysqli_query($conn, $user_details);
                        $no_of_upload = $rows;
                    }
                    ?>

                </h5>
                <p class="card-text">Uploads : <?php echo $no_of_upload; ?></p>
                <a href="uploader/users/login/login" class="btn btn-primary">Login</a>
            </div>

        </div>

        <div class="main" style="margin-top: 10px;">
            <h4 class="display-5 jumbotron shadow-sm p-3 mb-3 bg-light border" style="padding:10px; text-align: center;">Tones Uploaded By the User </h4>            
            <div class="container-fluid shadow p-3 mb-5 bg-white rounded border">  
                <?php
                while ($row = mysqli_fetch_array($user_dt_res)) {
                    $tags = $row['tags'];
                    $tag_list = explode(",", $tags);
                    $tit_link = str_replace(" ", "-", $row['title']);
                    echo '
                            <div class="row">
                                <div class="col">
                                    <div class="media">
                                        <img class="mr-3" src="img/play.png" height="20px" width="20px" alt="img-' . $tit_link . '">
                                        <div class="media-body">
                                            <a href="ringtone/' . $row['id'] . '/' . $tit_link . '"><h5 class="mt-0">' . $row['title'] . '</h5></a>
                                                <div class="social">
                                                    <span class="likes"><img src="img/like-ico2.png"></img></span>
                                                    <span class="nlikes"><small>' . getLikes($row['id']) . '</small></span>
                                                    <span class="dislikes"><img src="img/dislike-ico2.png"></span>
                                                    <span class="ndislikes"><small>' . getdisLikes($row['id']) . '</small></span>&nbsp;&nbsp;
                                                    
                                                </div>

                                                <small>' . $row['downloadCount'] . ' Downloads</small></br>
                                            ';
                    foreach ($tag_list as $x) {
                        echo '<a href="tags/' . $x . '">' . $x . ', </a>';
                    }
                    echo ' </div> 
                                        <button class="btn btn-primary mr-auto pull-right" type="submit" onclick="locationME(' . $row['id'] . ',\'' . $tit_link . '\')">Download</button>   
                                    </div>
                                </div>                            
                            </div>';
                }
                ?>                 
                <?php
                echo $paginationCtrls;
                mysqli_close($conn);
                ?>
            </div>

            <div class="ads" ><img src="img/ads.jpg" width="100%"></img></div><br>

        </div>

        <div class=" display-5 jumbotron " style="margin: 0px;padding: 20px; text-align: center;">
            Designed and Developed By Diwakar Prasad
        </div>

        <script>
            function locationME(d, t)
            {
                var data = d;
                window.location = 'ringtone/' + data + '/' + t;

            }
        </script>
        <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    </body>
</html>