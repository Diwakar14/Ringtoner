<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <base href="http://localhost/RingtoneProject/admin/">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>ZedgeRingtone - SignIn</title>
    </head>
    <body>
        <style type="text/css">
            html body{
                background:  #0069d9;
            }
            
            @media (max-width: 767.98px) {
                .card{
                    width: 10%;
                    transition: all ease .2s;
                }
            
            }
        
        </style>
    <?php
        include_once 'check_login_status.php';
        
        if($user_ok ==TRUE){
            header("location: admin/dashboard");
            exit();
        }else{
            
        }
        
        if(isset($_POST["login_id"])){
	// CONNECT TO THE DATABASE
	include_once("../db.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$u_id = mysqli_real_escape_string($conn, $_POST['login_id']);
	$u_pass = md5($_POST['pass']);
        
        
	// GET USER IP ADDRESS
        $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if($u_id == "" || $u_pass == ""){
		$msg = "It can't be blank";
        
	} else {
	// END FORM DATA ERROR HANDLING
		$sql = "SELECT id, username, password FROM admin WHERE username='$u_id' AND password='$u_pass' LIMIT 1";
        $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
                $db_pass_str = $row[2];
                
		if($u_pass != $db_pass_str){
			$msg =  "Login_Failed";
                        
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
                        setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE admin SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
                         $query = mysqli_query($conn, $sql);
                         header("location: admin/dashboard");
		    exit();
		}
	}
	
}
      
     ?>

        <div class="card shadow-lg p-3 mb-5 bg-white rounded container-fluid" style="width: 300px;margin-top:8%; ">
            <div class="card-body">
                <h4 class="card-title" style="text-align:center;">ZedegRingtone</h4>
                <h5 class="card-title" style="text-align:center;">Admin Login: </h5>

                <form method="POST" action="../adminLogin">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="float: left;">Login ID</label>
                        <input type="text" name="login_id" class="form-control" id="login_id" aria-describedby="emailHelp" placeholder="Enter Login ID">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="float: left;">Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    </div>  
                    <div id="error" style="padding: 5px;text-align: center;">
                <?php                 
                     if(isset($msg)){
                         echo $msg;
                     }
                     mysqli_close($conn);
                ?></div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>  
                    
                </form>
            </div>
        </div>
</body>
</html>
