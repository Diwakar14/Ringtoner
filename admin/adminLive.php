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
        <div class="jumbotron jumbotron-fluid bg-gradient-light shadow" style="margin: 0px;padding:10px">
            <div class="container">
                <h2 class="display-4">ZedgeRingtone.in - Dashboad</h2>
                <p class="lead">Music gives peace to the mind and body.</p>
            </div>
        </div>

        <style>
            html body{
                transition: all ease .2s;
                background: url('img/eight_horns.png') fixed;
            }


            @media (max-width: 767.98px) {
                .display-4{
                    font-size: 40px;
                    transition: all ease .2s;
                }

            }

        </style>
        <?php
        include_once 'check_login_status.php';
        include '../service.php';
        

        
        if($user_ok == TRUE){
            
        }else{
            header("location: ../../adminLogin");
        }


        //for live update..

        if (isset($_POST['action']) && isset($_POST['song_id'])) {           
            if ($_POST['action'] == '1') {
                $sql_live = "UPDATE data SET live='0' WHERE id=". $_POST['song_id'] . " LIMIT 1";
                $query_l_res = mysqli_query($conn, $sql_live);
            } else if ($_POST['action'] == '2') {
                $sql_del = "DELETE FROM `data` WHERE id=" . $_POST['song_id'];
                $query_d_res = mysqli_query($conn, $sql_del);
                
//                $sql_del_file = "SELECT * `data` WHERE id=".$_GET['song_id'];
//                $sql_del_file_res = mysqli_query($conn, $sql_del_file);
//                $path = mysqli_fetch_array($sql_del_file_res);
//                
//                unlink("../".$path['path']);
            }
        }

        //for delete delete command..
        ?>
        <h4 class="display-5 jumbotron shadow-sm p-3 mb-2 bg-light border sticky-top" style="padding:10px; ">
            <?php echo $_SESSION['username']; ?><a href="admin/dashboard" class="btn btn-primary" style="margin-left:25px;">Queued Tones</a><span style="float:right;font-size: 20px;">
                <a class="btn btn-danger" href="admin/logout">Log Out</a></span></h4>            


        <div class="main" style="margin-left: 5%;margin-right: 5%;margin-top: 5px;"><br>
            <h4 class="display-5 jumbotron shadow-sm p-3 mb-2 bg-light border" style="padding:10px; text-align: center;">Ringtones Live</h4>            
            <div class="container-fluid shadow p-3 mb-2 bg-white rounded border">  
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Uploader</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql_page = "SELECT * FROM data WHERE live = 1";
                        $sql_query_page = mysqli_query($conn, $sql_page);
                        
                        $rows = mysqli_num_rows($sql_query_page);
                        
                        // This is the number of results we want displayed per page
                        $page_rows = 5;
                        // This tells us the page number of our last page
                        $last = ceil($rows / $page_rows);
                        // This makes sure $last cannot be less than 1
                        if ($last < 1) {
                            $last = 1;
                        }
                        // Establish the $pagenum variable
                        $pagenum = 1;
                        if(isset($_GET['pn'])){
                            $pagenum = $_GET['pn'];    
                        }
                        
                         
                        if ($pagenum < 1) { 
                            $pagenum = 1; 
                        } else if ($pagenum > $last) { 
                            $pagenum = $last; 
                        }
                        // This sets the range of rows to query for the chosen $pagenum
                        $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                        
                        
                        // Establish the $paginationCtrls variable
                        $paginationCtrls = '<nav aria-label="..."><ul class="pagination justify-content-center">';
                        // If there is more than 1 page worth of results
                        if($last != 1){
                                
                                if ($pagenum > 1) {
                                $previous = $pagenum - 1;
                                        $paginationCtrls .= '<li class="page-item"><a class="page-link" href="admin_live/'.$previous.'/live">Previous</a></li>';
                                        // Render clickable number links that should appear on the left of the target page number
                                        for($i = $pagenum-4; $i < $pagenum; $i++){
                                                if($i > 0){
                                                $paginationCtrls .= '<li class="page-item"><a class="page-link" href="admin_live/'.$i.'/live">'.$i.'</a></li>';
                                                }
                                    }
                            }
                                // Render the target page number, but without it being a link
                                $paginationCtrls .= '<li class="page-item active"><a class="page-link" >'.$pagenum.'<span class="sr-only">(current)</span></a></li> ';
                                // Render clickable number links that should appear on the right of the target page number
                                for($i = $pagenum+1; $i <= $last; $i++){
                                        $paginationCtrls .= '<li class="page-item"><a class="page-link" href="admin_live/'.$i.'/live">'.$i.'</a></li> ';
                                        if($i >= $pagenum+4){
                                                break;
                                        }
                                }
                                // This does the same as above, only checking if we are on the last page, and then generating the "Next"
                            if ($pagenum != $last) {
                                $next = $pagenum + 1;
                                $paginationCtrls .= ' <li class="page-item"><a class="page-link" href="admin_live/'.$next.'/live">Next</a></li> </ul></nav>';
                            }
                        }
                        
                        $sql = "SELECT * FROM data WHERE live = 1 $limit";
                        $sql_query = mysqli_query($conn, $sql);
                        
                        while ($row = mysqli_fetch_array($sql_query)) {
                            echo ' <tr>
                                    <th scope="row">' . $row['id'] . '</th>
                                    <td>
                                    <div class="social">
                                                    <span class="likes"><img src="img/like-ico2.png"></img></span>
                                                    <span class="nlikes"><small>'.  getLikes($row['id']).'</small></span>
                                                    <span class="dislikes"><img src="img/dislike-ico2.png"></span>
                                                    <span class="ndislikes"><small>'.  getdisLikes($row['id']).'</small></span>&nbsp;&nbsp;
                                                    
                                    </div></td>
                                    <td>' . $row['title'] . '</td>
                                    <td>' . $row['category'] . '</td>
                                    <td>' . $row['uploader'] . '</td>
                                    <td>' . $row['date'] . '</td>
                                    <td>
                                        <form method="post">
                                            <div class="input-group">
                                            <input type="hidden" value="' . $row['id'] . '" name="song_id">
                                             <select class="custom-select" id="inputGroupSelect04" name="action">
                                               <option selected>Choose...</option>
                                               <option value="1">Remove Live</option>
                                               <option value="2">Delete</option>

                                             </select>
                                             <div class="input-group-append">
                                               <button class="btn btn-outline-secondary" type="submit">Go</button>
                                             </div>
                                           </div>
                                        </form>
                                    </td>
                                </tr>';
                        }
                        
                        
                        ?>

                    </tbody>
                </table>
                
                
                <?php 
                
                echo $paginationCtrls;
                mysqli_close($conn);
                ?>
            </div>

            <div style="margin-top: 20px;">
            </div>
            <br>
        </div>

        <div class=" display-5 jumbotron " style="margin: 0px;padding: 20px; text-align: center;">
            Designed and Developed By Diwakar Prasad
        </div>

        <script>


        </script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
