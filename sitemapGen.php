<?php

  
include 'db.php';
$base_url = "http://localhost/RingtoneProject/";
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '
        . 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" '
        . 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;


$all_sql = "SELECT * FROM data";
$all_sql_res = mysqli_query($conn, $all_sql);

    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url.'instrumental</loc>' . PHP_EOL;   
    echo '</url>' . PHP_EOL;

    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url.'ringtones/popular/1/</loc>' . PHP_EOL;   
    echo '</url>' . PHP_EOL;

    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url.'ringtones/download/1/</loc>' . PHP_EOL;   
    echo '</url>' . PHP_EOL;
    
    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url.'ringtones/newest/1/</loc>' . PHP_EOL;   
    echo '</url>' . PHP_EOL;

//title
while($row = mysqli_fetch_array($all_sql_res))
{
    //title
    $tit_link = str_replace(" ", "-", $row['title']);
    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url.'ringtone/'.$row['id'].'/'. strtolower($tit_link) .'</loc>' . PHP_EOL;   
    echo '</url>' . PHP_EOL;
    
    //tags
    $tags = $row['tags'];
    $tag_list = explode(",", $tags);       
    foreach($tag_list as $x)
    {   
        echo '<url>' . PHP_EOL;
        echo '<loc>'.$base_url.'tags/'.strtolower($x).'</loc>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
    
    //category
    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url.'category/'.strtolower($row['category']).'/</loc>' . PHP_EOL;   
    echo '</url>' . PHP_EOL;
    
    
}

echo '</urlset>' . PHP_EOL;


mysqli_close($conn);


?>


