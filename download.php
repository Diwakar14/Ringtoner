<?php

    include 'db.php';

    $idOfRingtone = $_GET['id'];
    
    $dsql = "SELECT * FROM data WHERE id=".$idOfRingtone; 
    $download_result = mysqli_query($conn, $dsql);
    $downloadC = mysqli_fetch_array($download_result);
    $downloadCount = $downloadC['downloadCount'] + 1;
    
    $d_count = "UPDATE  `ringtone`.`data` SET  `downloadCount`='".$downloadCount."' WHERE  `data`.`id` =".$idOfRingtone;
    $d_result = mysqli_query($conn, $d_count);
    
    $downloadsql = "SELECT * FROM data WHERE id=".$idOfRingtone; 
    $result = mysqli_query($conn, $downloadsql);
    while ($row = mysqli_fetch_array($result)){
        $path = $row['path'];
        $title = $row['title'];
        //$downloadDC = $row['downloadCount'];
    }
    
    $basename = basename($path);
    
    header("Content-type: audio/mp3");
    header("Content-Disposition: attachment; filename=\"".$basename."\"");
    readfile($path)or die('error!');
    
    

    
    

