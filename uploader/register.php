<?php
include '../db.php';
include 'activation_mail.php';

$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u_name']);
$e = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

    
    	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$sql = "SELECT id FROM user WHERE username='$u' LIMIT 1";
    $query = mysqli_query($conn, $sql); 
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$sql = "SELECT id FROM user WHERE email='$e' LIMIT 1";
    $query = mysqli_query($conn, $sql); 
	$e_check = mysqli_num_rows($query);
                        
        if($u == "" || $e == "" || $password == "" ){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){ 
        echo "The username you entered is alreay taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 && strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
        } else if (is_numeric($u[0])) {
            echo 'Username cannot begin with a number';
            exit();
        } else {
            
                $p_hash = md5($password);
                $sql = "INSERT INTO user (username, email, password, ip, signup, lastlogin, activated)       
		        VALUES('$u','$e','$p_hash','$ip',now(),now(),0)";
		$query = mysqli_query($conn, $sql); 
                $uid = mysqli_insert_id($conn);
                $sql = "INSERT INTO activation (user_id, user_name) VALUES ('$uid','$u')";
		$query = mysqli_query($conn, $sql);
		if (!file_exists("user/$u")) {
			mkdir("user/$u", 0755);
		}
                // Email the user their activation link
		activation_email($uid, $u, $e);				
                exit();
        }
        
        






 

