<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <base href="http://localhost/RingtoneProject/uploader/">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>ZedgeRingtone - SignIn</title>
    </head>
    <body>
        <style type="text/css">
            @media (max-width: 767.98px) {
                .card{
                    width: 10%;
                    transition: all ease .2s;
                }
            
            }
        
        </style>
    <?php
        session_start();
        // If user is logged in, header them away
        include '../db.php';        
        if(isset($_SESSION['username'])){
            $check = "SELECT * FROM user WHERE username='".$_SESSION['username']."'";
        $check_sql = mysqli_query($conn, $check);
        
        $row = mysqli_num_rows($check_sql);
            if($row > 0){
                header("location: ../../upload/");
            }
        }  
     ?>

        <div class="card shadow-lg p-3 mb-5 bg-white rounded container-fluid" style="width: 300px;margin-top:8%; ">
            <div class="card-body">
                <h5 class="card-title" style="text-align:center;">ZedegRingtone</h5>
                <h5 class="card-title" style="text-align:center;">Login: </h5>

                <form action="log_pro.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="float: left;">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="float: left;">Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    </div>  
                    <div id="error" style="padding: 5px;">
                <?php 
                
                    if(isset($_GET['r'])){
                        if($_GET['r'] == 'Fill-in-both-Fields' || $_GET['r'] =='Your-Account-is-not-Activated' || $_GET['r'] == 'Login-Success' || $_GET['r'] == 'Email-or-Password-Incorrect'){
                            $message = str_replace("-", " ", $_GET['r']);
                            echo '<center>'.$message.'</center>';    
                        }
                        
                    }      
                ?></div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>  
                    <br><small style="float: right;"><a href="users/signup">Signup Here</a></small>
                </form>
            </div>
        </div>
 
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
