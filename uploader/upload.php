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
        <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <title>Upload Ringtone</title>
    </head>
    <body>
        <?php
        include '../db.php';
        //Staring Session for username...
        session_start();
        if (isset($_SESSION['username'])) {
            $uploader = $_SESSION['username'];
        } else {
            header("location: ../../home");
        }
        
                
        ?> 
        
        <style>
            #add_category{
                display: none;
            }
        </style>

        
        <div class="card shadow-lg p-3 mb-5 bg-white rounded container-fluid" style="width: 65%;margin-top:2%; ">
            <div class="card-body">
                <h5 class="card-title" style="text-align:center;">ZedegRingtone</h5>
                <h5 class="card-title">Upload Ringtone : <?php echo $uploader; ?><span style="float: right;"><small>
                            <a class="btn btn-success" href="../home">Home</a>&nbsp;<a class="btn btn-danger" href="log_out.php">Log Out</a></span></small></h5>
                                                
                                       
                    <div class="form-group" style="margin-bottom:  5px;">  
                        <label for="exampleInputEmail1" style="float: left;">Category :</label> 
                        <select id="category" class="custom-select">
                            <option selected>Choose...</option>
                            <?php
                            $options_sql = "SELECT * FROM `selectoptions`";
                            $options_res = mysqli_query($conn, $options_sql);

                            while ($row = mysqli_fetch_array($options_res)) {
                                echo '<option value="' . $row['options'] . '">' . $row['options'] . '</option>';
                            }
                            
                            
                            mysqli_close($conn);
                            ?>                                                                               
                        </select>
                        

                    </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" style="float: left;">Description :</label>
                    <textarea class="form-control" id="description" rows="3" ></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="float: left;">Tags(Enter tags with ',' between each tag. E.g: Song,Movie)</label>
                    <input type="text" class="form-control" id="tags" placeholder="Tags">
                </div> 
                <div class="form-group">
                    <label for="exampleFormControlFile1" style="float: left;">Ringtone File </label>
                    <input type="file" class="form-control-file" id="ringtone_file" onchange="display(this)">
                </div>
                <div class="progress">
                    <div id="progressID" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
                <div id="msg"></div>
                <br>
                <button type="submit" id="upload" class="btn btn-primary btn-lg btn-block" onclick="upload()" >UPLOAD</button>  
                <small style="float: right;padding: 5px;">*Now you can like Ringtones.</div>
        </div>
    </div>

    <script>
        function display(data) {
            //console.log(data.files[0]);
            if (data.files[0].size > 2000000) {
                alert("Size can't be greater than 2MB");
            }
            if (data.files[0].type != "audio/mp3") {
                alert("Only Music Files are allowed")
            }
        }
        function addCat(){
            add_category.style.display='block';
            
        }
        
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/myjs.js"></script>
    <script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
