<?php
session_start();
if(isset($_POST['email'])){
            if($_POST['email']=='' || $_POST['pass']==''){
                header("location:users/login/Fill-in-both-Fields");
            }else{
            include '../db.php';              
            $pass = md5($_POST['pass']);
            
            $actn_sql = "SELECT * FROM user WHERE email='".$_POST['email']."' and password='".$pass."'";
            $actn_sql_res = mysqli_query($conn, $actn_sql);
            $activated = mysqli_fetch_array($actn_sql_res);
            if($activated['activated']==0){
                header("location:users/login/Your-Account-is-not-Activated");
            }else{                                    
            $login_sql = "SELECT * FROM user WHERE email='".$_POST['email']."' and password='".$pass."'";
            $log_result = mysqli_query($conn, $login_sql);
            $username = mysqli_fetch_array($log_result);
            $log_d = mysqli_num_rows($log_result);
            if($log_d > 0){
                $r  ='Login-Success';
                header("location:users/login/".$r);              
                header("Location: upload/");
                $_SESSION['username'] = $username[1];
            }else{
                $r  ='Email-or-Password-Incorrect';
                header("location:users/login/".$r);
                
            }
        }
    }
}

