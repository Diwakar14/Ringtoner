<?php

// Ajax calls this NAME CHECK code to execute
    include_once("../db.php");

    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['u_name']);
	$sql = "SELECT id FROM user WHERE username='$username' LIMIT 1";
    $query = mysqli_query($conn, $sql); 
    $uname_check = mysqli_num_rows($query);
    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<small style="color:#F00;">3 - 16 characters please</small>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
    
?>

