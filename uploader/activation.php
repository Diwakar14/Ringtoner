<?php
if(isset($_GET['id']) && isset($_GET['u'])){
    include '../db.php';
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
    $u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
    
    $sql = "SELECT * FROM activation WHERE user_id='$id' AND user_name='$u'";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    
    // Evaluate for a match in the system (0 = no match, 1 = match)
    if($numrows == 0){
            // Log this potential hack attempt to text file and email details to yourself
            echo '<div style="padding:20px;text-align:center;"><h3>Your credentials are not matching.</h3></div>';
            exit();
    }
    
    // Match was found, you can activate them
    $sql = "UPDATE user SET activated='1' WHERE id='$id' LIMIT 1";
    $query = mysqli_query($conn, $sql);

    //Delete the temp values
    $sql = "DELETE FROM `activation` WHERE user_id='$id' AND user_name='$u'";
    $query = mysqli_query($conn, $sql);
    
    // Optional double check to see if activated in fact now = 1
    $sql = "SELECT * FROM user WHERE id='$id' AND activated='1' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    // Evaluate the double check
   
    if($numrows == 0){
		// Log this issue of no switch of activation field to 1
        echo '<div style="padding:20px;text-align:center;"><h3>Activation Failed.</h3></div>';
    	exit();
    } else if($numrows == 1) {
		// Great everything went fine with activation!
        echo '<div style="padding:20px;text-align:center;"><h3>Account Activated Successfully.<br>Redirecting in 5 sec...</h3></div>';
        sleep(5000);
        header("location:users/login/login");
        
    	exit();
    }
    
}else{
    echo 'Missing Variables.';
}

