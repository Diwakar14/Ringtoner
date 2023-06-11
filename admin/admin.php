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

        
        if($user_ok == TRUE){
            
        }else{
            header("location: ../adminLogin");
        }
//        if (isset($_SESSION['admin'])) {
//            $sql = "SELECT * FROM admin WHERE username='" . $_SESSION['admin'] . "' LIMIT 1";
//            $sql_res = mysqli_query($conn, $sql);
//            $check_conn = mysqli_num_rows($sql_res);
//            if ($check_conn == 0) {
//                header("location: ../adminLogin");
//            }
//        } else {
//            header("location: ../adminLogin");
//        }




        if (isset($_GET['category'])) {
            $add_sql = "INSERT INTO `selectoptions`(`options`) VALUES ('" . $_GET['category'] . "')";
            $add_res = mysqli_query($conn, $add_sql);
        }
        
        if (isset($_GET['cat_del'])) {
            $del_sql = "DELETE FROM `selectoptions` WHERE options='".$_GET['cat_del']."'";
            $del_res = mysqli_query($conn, $del_sql);
        }

        //for live update..

        if (isset($_GET['action']) && isset($_GET['song_id'])) {
            if ($_GET['action'] == '1') {
                $sql_live = "UPDATE data SET live='1' WHERE id=" . $_GET['song_id'] . " LIMIT 1";
                $query_l_res = mysqli_query($conn, $sql_live);
            } else if ($_GET['action'] == '2') {
                $sql_del = "DELETE FROM `data` WHERE id=" . $_GET['song_id'];
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
            <?php echo $_SESSION['username']; ?><a href="admin_live/1/live" class="btn btn-success" style="margin-left:25px;">Live Tones</a><span style="float:right;font-size: 20px;">
                <a href="home" class="btn btn-success">Home</a>&nbsp;<a class="btn btn-danger" href="admin/logout">Log Out</a></span></h4>            

        <div class="main" style="margin-left: 5%;margin-right: 5%;margin-top: 10px;"><br>
            <h4 class="display-5 jumbotron shadow-sm p-3 mb-2 bg-light border" style="padding:10px; text-align: center;">Controls</h4>            
            <div class="container-fluid shadow p-3 mb-2 bg-white rounded border"> 

                <div class="row">
                    <div class="col">
                        <form method="get">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Category : </label>
                                <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                            </div>                    
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="get">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Delete Category : </label>
                                <select id="category" class="custom-select" name="cat_del">
                                    <option selected>Choose...</option>
                                    <?php
                                    $options_sql = "SELECT * FROM `selectoptions`";
                                    $options_res = mysqli_query($conn, $options_sql);

                                    while ($row = mysqli_fetch_array($options_res)) {
                                        echo '<option value="' . $row['options'] . '">' . $row['options'] . '</option>';
                                    }
                                    ?>                                                                               
                                </select>

                            </div>                    
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>
                </div>


            </div>

            <div style="margin-top: 20px;">
            </div>
        </div>
        <div class="main" style="margin-left: 5%;margin-right: 5%;margin-top: 5px;"><br>
            <h4 class="display-5 jumbotron shadow-sm p-3 mb-2 bg-light border" style="padding:10px; text-align: center;">Ringtone Uploaded By Various Users</h4>            
            <div class="container-fluid shadow p-3 mb-2 bg-white rounded border">  
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Play</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Uploader</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM data WHERE live = 0";
                        $sql_query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($sql_query)) {
                            echo ' <tr>
                                    <th scope="row">' . $row['id'] . '</th>
                                    <td><audio src=\'' . $row['path'] . '\' controls></audio></td>
                                    <td>' . $row['title'] . '</td>
                                    <td>' . $row['category'] . '</td>
                                    <td>' . $row['uploader'] . '</td>
                                    <td>' . $row['date'] . '</td>
                                    <td>
                                        <form method="get">
                                            <div class="input-group">
                                            <input type="hidden" value="' . $row['id'] . '" name="song_id">
                                             <select class="custom-select" id="inputGroupSelect04" name="action">
                                               <option selected>Choose...</option>
                                               <option value="1">Go Live</option>
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
                        
                        mysqli_close($conn);
                        ?>

                    </tbody>
                </table>
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
