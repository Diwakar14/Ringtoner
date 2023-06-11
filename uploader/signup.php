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
        <base href="http://localhost/RingtoneProject/uploader/">
        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <title>ZedgeRingtone - SignUp</title>
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
    // Ajax calls this NAME CHECK code to execute
    session_start();
    
    
    ?>

    <center>
        <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 330px;margin-top:1%; ">
            <div class="card-body">
                <h5 class="card-title" style="text-align:center;">ZedegRingtone</h5>
                <h5 class="card-title">Signup: </h5>                
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="float: left;">User Name : </label>
                        <input type="text" name="username" class="form-control" id="username" onblur="usernameCk()" placeholder="Enter Username" required="true">
                        <span id="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="float: left;">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"  aria-describedby="emailHelp" placeholder="Enter Email" required="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="float: left;">Password</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter Password" required="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="float: left;">Confirm-Password</label>
                        <input type="password" class="form-control" id="con_pass" placeholder="Confirm - Password" required="true">
                    </div>  
                <div id="php_msg"></div><br>
                <button type="submit" id="sub_btn" class="btn btn-primary btn-lg btn-block" onclick="submitForm()">SIGNUP</button>  
                    <br><small style="float: right;"><a href="users/login/login">Login Here</a></small>
                
            </div>
        </div>
    </center>
    
    <script>
    function usernameCk(){
        console.log("Called");
        var msg = document.getElementById('error');
        var php_msg = document.getElementById('php_msg');

        var u_name = document.getElementById('username').value;       
        var formdata = new FormData();        
        formdata.append("u_name",u_name);        
        
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "process.php");
        ajax.send(formdata);
        function progressHandler(event) {
           msg.innerHTML = 'Checking...' 
            //console.log(percent);
        }
        function completeHandler(event) {
           msg.innerHTML = event.target.responseText;
        }
        function errorHandler(event) {
            
        }
        function abortHandler(event) {
            
        }   
    }
        
    function submitForm()
        {
            var msg = document.getElementById('error');
            var u_name = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var pass = document.getElementById('password').value;
            var con_pass = document.getElementById('con_pass').value;
            
            if(pass == con_pass){
            var formdata = new FormData();
            formdata.append("u_name",u_name);
            formdata.append("email",email);
            formdata.append("password",pass);
            
            
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "register.php");
            ajax.send(formdata);
            function progressHandler(event) {
               php_msg.innerHTML = 'Checking...' 
               sub_btn.style.display = 'none';
                //console.log(percent);
            }
            function completeHandler(event) {
               php_msg.innerHTML = event.target.responseText;
               if(event.target.responseText == "Sign Up Successfull."){
                   php_msg.innerHTML +='<br>Verification Email has been sent to you Inbox';
                   php_msg.innerHTML +='<br>Redirecting in 10 sec...</br>';
                   setTimeout(function () {                                               
                        window.location = 'users/login/login';
                     }, 10000);
                   
               }
            }
            function errorHandler(event) {

            }
            function abortHandler(event) {
            }
        }else{
            alert("Password Mismatched. !!");
        } 
        
        }
    
    </script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/bootstrap.min.js" ></script>
</body>
</html>