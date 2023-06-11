<?php
include 'db.php';

function getLikes($music_id){
    global $conn;
    $sql = "SELECT count(*) from rating WHERE music_id=$music_id and liked=1";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
    
}
function getdisLikes($music_id){
    global $conn;
    $sql = "SELECT count(*) from rating WHERE music_id=$music_id and disliked=1";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
    
}

