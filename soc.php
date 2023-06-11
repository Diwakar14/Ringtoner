<?php

include 'db.php';
$user = $_POST['user'];
$song_id = $_POST['song_id'];

        
if (isset($_POST['like'])) {
    $likedislike = $_POST['like'];
}
if (isset($_POST['dislike'])) {
    $likedislike = $_POST['dislike'];
}

if($likedislike == 1)
{
    $check_data = "SELECT * FROM `rating` WHERE `music_id` = $song_id and `user`='$user'";
    $sql_res = mysqli_query($conn, $check_data);
    $num = mysqli_num_rows($sql_res);
    $check_row = mysqli_fetch_array($sql_res);
    if($num == 0){
        //echo 'Insert';
        $ins_lik = "INSERT INTO `rating`(`music_id`, `user`, `liked`, `disliked`)"
                . " VALUES ('$song_id','$user',1,0)";
        $ins_lik_res = mysqli_query($conn, $ins_lik);
        
        //Displaying results...
        echo getLikes($song_id);
    }else{
        //check for like or dislike
        $ck_lk_sql = "Select * from rating WHERE `music_id` = $song_id and `user`='$user'";
        $ck_res = mysqli_query($conn, $ck_lk_sql);
        
        
        while($rate = mysqli_fetch_array($ck_res)){
            $liked_music = $rate['liked'];
            $disliked_music = $rate['disliked'];
            $id = $rate['id'];
        }
        
        if($liked_music == 1 && $disliked_music == 0){
            //delete the row';
            $del_row = "DELETE FROM `rating` WHERE `music_id` = $song_id and `user`='$user'";
            $del_row_res = mysqli_query($conn, $del_row);
            //display...
            echo getLikes($song_id);
        }else if($liked_music == 0 && $disliked_music == 1){
            //update the row with 1,0
            $updt_rat = "UPDATE `rating` SET `liked`=1,`disliked`=0 WHERE music_id=$song_id and user='$user'";
            mysqli_query($conn, $updt_rat) or die(mysql_error());                        				 
            //display result...
            echo getLikes($song_id);
        } 
        
    }
    
}else if($likedislike == 0){
    $check_data = "SELECT * FROM `rating` WHERE `music_id` = $song_id and `user`='$user'";
    $sql_res = mysqli_query($conn, $check_data);
    $num = mysqli_num_rows($sql_res);
    $check_row = mysqli_fetch_array($sql_res);
    
    if($num == 0){
        //echo 'Insert';
        $ins_lik = "INSERT INTO `rating`(`music_id`, `user`, `liked`, `disliked`)"
                . " VALUES ('$song_id','$user',0,1)";
        $ins_lik_res = mysqli_query($conn, $ins_lik);
        echo getdisLikes($song_id);
    }else{
        //check for like or dislike
        $ck_lk_sql = "Select * from rating WHERE `music_id` = $song_id and `user`='$user'";
        $ck_res = mysqli_query($conn, $ck_lk_sql);
        
        
        while($rate = mysqli_fetch_array($ck_res)){
            $liked_music = $rate['liked'];
            $disliked_music = $rate['disliked'];
        }
        
        if($liked_music == 1 && $disliked_music == 0){
            //update the row with 0,1
            $updt_rat = "UPDATE `rating` SET `liked`=0,`disliked`=1 WHERE music_id=$song_id and user='$user'";
            $updt_rat_res = mysqli_query($conn, $updt_rat);
            //echo 'dd';
            //display result...
            echo getdisLikes($song_id);
            
        }else if($liked_music == 0 && $disliked_music == 1){
            //delete the row';
            $del_row = "DELETE FROM `rating` WHERE `music_id` = $song_id and `user`='$user'";
            $del_row_res = mysqli_query($conn, $del_row);
            //display...
            echo getdisLikes($song_id);
        } 
        
    }
    
}

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


