<?php
session_start();
include '../db.php';
//include '../sitemapGen.php';

$category = $_POST['cat'];
$description = $_POST['desc'];
$tags = $_POST['tag'];
$ringtoneTmpLoc = $_FILES['ringtoneFile']['tmp_name'];

$r_base_tit = $_FILES['ringtoneFile']['name'];

//remove space
$titleWithoutspace = str_replace(" ", "-", $r_base_tit);


//renaming file

$r_tit = basename($_FILES['ringtoneFile']['name'],".mp3");
$uploader  = $_SESSION['username'];

$location1 = "user/".$uploader."/".$titleWithoutspace;
$path = "uploader/user/".$uploader."/".$titleWithoutspace;




if(move_uploaded_file($ringtoneTmpLoc, $location1)){
    $query = "INSERT INTO `data`(`title`, `tags`, `descp`, `category`, `uploader`, `path`, `date`, `downloadCount`, `live`) "
            . "VALUES ('$r_tit','$tags','$description','$category','$uploader','$path',now(),0,0)";
    $result = mysqli_query($conn,$query);
    echo 'Uploaded Successfully. Your Tone will go Live once the Admin Approve it.';    
}else{
    echo 'Something Went Wrong.';
}



