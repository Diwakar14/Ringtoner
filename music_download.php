                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php
session_start();
?>

<?php
    include 'db.php';
    include 'service.php';

    $id = $_GET['id'];

    if($id ==NULL){
        header('location: home');
    }                        
    $sql = "SELECT * FROM data WHERE id=".$id;
    $result = mysqli_query($conn, $sql);                        
    while($row = mysqli_fetch_array($result)){
        $title = $row['title'];
        $downloadC = $row['downloadCount'];
        $tags = $row['tags'];
        $path = $row['path'];
        $date = $row['date'];
        $cat = $row['category'];
        $uploader = $row['uploader'];
        $id_music = $row['id'];
    }
     $catspace = str_replace(" ", "-", $cat);
     $tag_list = explode(",", $tags);

     $allowed = 0;
    if(isset($_SESSION['username'])){                           
        $user = $_SESSION['username'];  

        $ch_user_sql = 'SELECT * FROM user WHERE username="'.$user.'"';
        $userResult = mysqli_query($conn, $ch_user_sql);
        $user_exist = mysqli_num_rows($userResult);
        $user_row = mysqli_fetch_array($userResult);

        if($user_exist > 0){
            $allowed = 1;
            $user_like = $user_row['username'];
            //echo $user_like;
        }  else {
            $allowed = 0;                             
            $user_like = $user_row['username'];                              
        }

    }  else {
        $user_like = "";
    }                                         
?>
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
        <meta name="title" content="<?php echo $title;?>" />
        <meta name="copyright" content="© 2018 zedgeringtone.in" />
        
        <!-- Bootstrap CSS -->
        <base href="http://localhost/RingtoneProject/ringtone">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/player.css">
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <title>ZedgeRingtone.in - <?php echo $title;?></title>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid bg-gradient-light" style="margin: 0px;padding:10px">
            <div class="container">
                <h2 class="display-4">Zedge Ringtone.in</h2>
                <p class="lead">Music gives peace to the mind and body.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm" style="margin: 0px;">
            <a class="navbar-brand" href="../RingtoneProject/">
                <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
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
            .social{
                padding: 3px;
            }
            .boss{
                padding: 10px;
                margin: 10px;
                cursor: pointer;
                transition: all ease .2s;    
            }
            .bossl{
                padding: 15px;               
                background: url('img/like-ico.png') no-repeat center;
            }
            .bossl:hover{
                background: url('img/like-ico-h.png') no-repeat center;
            }
            .bossd{
                padding: 10px;               
                background: url('img/dislike-ico.png') no-repeat center;
            }
            .bossd:hover{
                background: url('img/dislike-ico-h.png') no-repeat center;
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
                .download_card{
                    text-align: center;
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


        <div class="main download_card" style="margin-top: 10px;"><br>
            <h4 class="display-5 jumbotron shadow-sm p-3 mb-5 bg-light border" style="padding:10px; text-align: center;">'<?php echo $title;?>' Ringtone</h4>       
            <div class="container-fluid shadow p-3 mb-5 bg-white rounded border ">               
                <div class="row container-fluid" style="margin-right: -0;margin-top: 0px;margin-left: 0px;padding-left: 0px;padding-right: 0px;">
                    <div class="col">                        
                            <script>                                
                                    var audio = new Audio();audio.src = '<?php echo $path;?>';audio.autoplay = false;audio.loop = true;                                     
                            </script>
                            <div class="page">
                        <div class="c-progress-bar">
                            <canvas id="inactiveProgress" class="c-progress-inactive" height="150px" width="150px"></canvas>
                            <canvas id="activeProgress" class="c-progress-active" height="150px" width="150px"></canvas>
                            <p id="play_time"></p>
                            <span class="oi oi-media-play play" id="play"></span>
                            <span class="oi oi-media-pause pause" id="pause"></span>
                        </div>
                            </div>
                            <div class="action" style="text-align:center;">
                                 <span class="likes bossl boss" id="likes" onclick="likedMe('<?php echo $user_like;?>',<?php echo $id_music;?>)"></span>  
                                 <span class="nlikes badge badge-pill badge-success" id="nlikes<?php echo $id_music;?>"><?php echo getLikes($id_music);?></span>  
                                 <span class="dislikes bossd boss" id="dislikes" onclick="dislikedMe('<?php echo $user_like;?>',<?php echo $id_music;?>)"></span>                                                             
                                 <span class="ndislikes badge badge-pill badge-danger" id="ndislikes<?php echo $id_music;?>"><?php echo getdisLikes($id_music);?></span>
                            </div>
                    </div>
                    <div class="col" style="padding:0px;margin: 0px;">
                        <div class="display-5 container" style="text-align:center;">
                            <h3><strong><u>Download Ringtone</u></strong></h3>
                        </div>
                        <ul class="detail container-fluid" style="list-style:none;">
                            <li style="padding:5px;"><strong>Downloaded :</strong> <?php echo $downloadC;?></li>
                            <li style="padding:5px;"><strong>Uploaded By :</strong> <?php echo '<a href="profile/user/'.strtolower($uploader).'/1/">'.$uploader.'</a>';?></li>
                            <li style="padding:5px;"><strong>Category :</strong> <?php echo '<a href="category/'.strtolower($catspace).'">'.$cat.'</a>';?></li>
                            <li style="padding:5px;"><strong>Uploaded On : </strong><?php echo '<a href="sort/'.$date.'/">'.$date.'</a>';?></li>
                            
                            <li style="padding:5px;"><strong>Tags  :</strong> 
                                <?php 
                                    foreach($tag_list as $x){
                                        echo '<a href="tags/'.strtolower($x).'">'.$x.', </a>';
                                    }
                                ?>                         
                            </li>
                        </ul>

                        <button type="button" class="btn btn-primary btn-lg " onclick="download(<?php echo $id;?>)"style="width: 100%;">Download</button>
                    </div>
                </div>                             
            </div>
            <div class="ads" ><img src="img/ads.jpg" width="100%"></img></div><br>
        </div>

        <div class="main" style="margin-top: 10px;">
            <h4 class="display-5 jumbotron shadow p-3 mb-5 bg-light border" style="padding:10px; text-align: center;">You May also Like</h4>         

            <div class="row">
                <div class="col">
                    <div class="container-fluid shadow p-3 mb-5 bg-white rounded border">               
                        <?php
                        
                        
                        $sqlQuery = 'SELECT * FROM data WHERE live=1 LIMIT 0,5';
                        $sqlResult = mysqli_query($conn, $sqlQuery);
                        $NoOfRow = mysqli_num_rows($sqlResult);
                        
                        while ($row = mysqli_fetch_array($sqlResult)) {
                            $tags = $row['tags'];
                            $tag_list = explode(",", $tags);
                            $tit_link = str_replace(" ", "-", $row['title']);                                                        
                            echo '
                            <div class="row">
                                <div class="col">
                                    <div class="media">
                                        <img class="mr-3" src="img/play.png" height="20px" width="20px" alt="img-'.$tit_link.'">
                                        <div class="media-body">
                                            <a href="ringtone/'.$row['id'].'/'.strtolower($tit_link).'"><h5 class="mt-0">' . $row['title'] . '</h5></a>
                                                <div class="social">
                                                    <span class="likes"><img src="img/like-ico2.png"></img></span>
                                                    <span class="nlikes"><small>'.  getLikes($row['id']).'</small></span>
                                                    <span class="dislikes"><img src="img/dislike-ico2.png"></span>
                                                    <span class="ndislikes"><small>'.  getdisLikes($row['id']).'</small></span>&nbsp;&nbsp;
                                                    
                                                </div>
                                                   
                                                <small>'.$row['downloadCount'].' Downloads</small></br>
                                            ';
                                            foreach($tag_list as $x){
                                                        echo '<a href="tags/'.strtolower($x).'">'.$x.', </a>';
                                                    }
                            
                            echo ' </div> 
                                        <button class="btn btn-primary mr-auto pull-right" type="submit" onclick="locationME('.$row['id'].',\''.strtolower($tit_link).'\')">Download</button>   
                                    </div>
                                </div>                            
                            </div>';                                                   
                        }
                        ?> 
                                                                                            
                    </div>
                </div>
                
                <div class="col">
                    <div class="container-fluid shadow p-3 mb-5 bg-white rounded border">               
                        <?php
                        include 'db.php';
                        
                        $sqlQuery = 'SELECT * FROM data WHERE live=1 limit 5,5';
                        $sqlResult = mysqli_query($conn, $sqlQuery);
                        $NoOfRow = mysqli_num_rows($sqlResult);
                        
                        while ($row = mysqli_fetch_array($sqlResult)) {                            
                            $tags = $row['tags'];
                            $tag_list = explode(",", $tags); 
                            $tit_link = str_replace(" ", "-", $row['title']);
                            echo '
                            <div class="row">
                                <div class="col">
                                    <div class="media">
                                        <img class="mr-3" src="img/play.png" height="20px" width="20px" alt="img-'.$tit_link.'">
                                        <div class="media-body">
                                            <a href="ringtone/'.$row['id'].'/'.strtolower($tit_link).'"><h5 class="mt-0">' . $row['title'] . '</h5></a>
                                                <div class="social">
                                                    <span class="likes"><img src="img/like-ico2.png"></img></span>
                                                    <span class="nlikes"><small>'.  getLikes($row['id']).'</small></span>
                                                    <span class="dislikes"><img src="img/dislike-ico2.png"></span>
                                                    <span class="ndislikes"><small>'.  getdisLikes($row['id']).'</small></span>&nbsp;&nbsp;                                                    
                                                </div>
                                                <small>'.$row['downloadCount'].' Downloads</small></br>
                                            ';
                                            foreach ($tag_list as $x) {
                                                echo '<a href="tags/' . strtolower($x) . '">' . $x . ', </a>';
                                            }
                            echo '</div>'
                                . '<button class="btn btn-primary mr-auto pull-right" type="submit" onclick="locationME('.$row['id'].',\''.strtolower($tit_link).'\')">Download</button>   
                                    </div>
                                </div>                            
                            </div>';                                                       
                        }
                        ?> 
                                                                                            
                    </div>
                </div>
            </div>   
 <div class="ads" ><img src="img/ads.jpg" width="100%"></img></div><br>
        </div>

        <div class="main" style="margin-top: 10px;">
            <h4 class="display-5 jumbotron shadow p-3 mb-5 bg-light border" style="padding:10px; text-align: center;">Latest Ringtone</h4>         
                       <div class="row">
                <div class="col">
                    <div class="container-fluid shadow p-3 mb-5 bg-white rounded border">               
                        <?php                                                
                        $sqlQuery = "SELECT * FROM `data` where live=1 ORDER BY `data`.`date` ASC LIMIT 0,5";
                        //$sqlQuery = 'SELECT * FROM data LIMIT 0,5';
                        $sqlResult = mysqli_query($conn, $sqlQuery);
                        $NoOfRow = mysqli_num_rows($sqlResult);
                        
                        while ($row = mysqli_fetch_array($sqlResult)) {
                            $tags = $row['tags'];
                            $tag_list = explode(",", $tags);
                            $tit_link = str_replace(" ", "-", $row['title']);
                            echo '
                            <div class="row">
                                <div class="col">
                                    <div class="media">
                                        <img class="mr-3" src="img/play.png" height="20px" width="20px" alt="img-'.$tit_link.'">
                                        <div class="media-body">
                                            <a href="ringtone/'.$row['id'].'/'.strtolower($tit_link).'"><h5 class="mt-0">' . $row['title'] . '</h5></a>
                                                <div class="social">
                                                    <span class="likes"><img src="img/like-ico2.png"></img></span>
                                                    <span class="nlikes"><small>'.  getLikes($row['id']).'</small></span>
                                                    <span class="dislikes"><img src="img/dislike-ico2.png"></span>
                                                    <span class="ndislikes"><small>'.  getdisLikes($row['id']).'</small></span>&nbsp;&nbsp;                                                    
                                                </div>
                                                <small>'.$row['downloadCount'].' Downloads</small></br>
                                            ';
                                            foreach($tag_list as $x){
                                                        echo '<a href="tags/'.strtolower($x).'">'.$x.', </a>';
                                                    }
                            
                            echo ' </div> 
                                        <button class="btn btn-primary mr-auto pull-right" type="submit" onclick="locationME('.$row['id'].',\''.strtolower($tit_link).'\')">Download</button>   
                                    </div>
                                </div>                            
                            </div>';                                                   
                        }
                        ?>                                                                                             
                    </div>
                </div>
                
                <div class="col">
                    <div class="container-fluid shadow p-3 mb-5 bg-white rounded border">               
                        <?php
                        $sqlQuery = "SELECT * FROM `data` where live=1 ORDER BY `data`.`date` ASC LIMIT 5,5";
                        $sqlResult = mysqli_query($conn, $sqlQuery);
                        $NoOfRow = mysqli_num_rows($sqlResult);
                        
                        while ($row = mysqli_fetch_array($sqlResult)) {                            
                            $tags = $row['tags'];
                            $tag_list = explode(",", $tags);  
                            $tit_link = str_replace(" ", "-", $row['title']);
                            echo '
                            <div class="row">
                                <div class="col">
                                    <div class="media">
                                        <img class="mr-3" src="img/play.png" height="20px" width="20px" alt="img-'.$tit_link.'">
                                        <div class="media-body">
                                            <a href="ringtone/'.$row['id'].'/'.strtolower($tit_link).'"><h5 class="mt-0">' . $row['title'] . '</h5></a>
                                                <div class="social">
                                                    <span class="likes"><img src="img/like-ico2.png"></img></span>
                                                    <span class="nlikes"><small>'.  getLikes($row['id']).'</small></span>
                                                    <span class="dislikes"><img src="img/dislike-ico2.png"></span>
                                                    <span class="ndislikes"><small>'.  getdisLikes($row['id']).'</small></span>&nbsp;&nbsp;                                                
                                                </div>
                                                <small>'.$row['downloadCount'].' Downloads</small></br>
                                            ';
                                            foreach ($tag_list as $x) {
                                                echo '<a href="tags/' . strtolower($x) . '">' . $x . ', </a>';
                                            }
                            echo '</div>'
                                . '<button class="btn btn-primary mr-auto pull-right" type="submit" onclick="locationME('.$row['id'].',\''.strtolower($tit_link).'\')">Download</button>   
                                    </div>
                                </div>                            
                            </div>';
                                                       
                        }
                        mysqli_close($conn);
                        ?>                                                                                            
                    </div>
                </div>
            </div>
             <div class="ads" ><img src="img/ads.jpg" width="100%"></img></div><br>
        </div>

        <div class=" display-5 jumbotron " style="margin: 0px;padding: 20px; text-align: center;">
            Designed and Developed By Diwakar Prasad
        </div>

        <script>
        function download(id){            
            window.location = 'download/fastdownload/'+id+'/';
        }
        function locationME(id,t){ 
            window.location = 'ringtone/'+id+'/'+t;
        }
        
        </script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/social.js"></script>
        <script src="js/player.js"></script>
        <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    </body>
</html>