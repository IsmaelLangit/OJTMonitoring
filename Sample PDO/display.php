<?php

    $pdo = new PDO("mysql:host=localhost;dbname=music3","root","");
    
    if (isset($_POST['search'])){
    $artist =$_POST['artist'];
    $songs =$_POST['songs'];
    
    $stmt = $pdo->prepare("SELECT artist.artist_name, artist.artist_id, artist.gender, songs.title, songs.year_released, songs.album FROM artist JOIN songs ON artist.artist_id = songs.artist_id WHERE artist.artist_name = ? AND songs.year_released = ?");
    $stmt->bindValue(1, $artist, PDO::PARAM_STR);
    $stmt->bindValue(2, $songs, PDO::PARAM_STR);
    $stmt->execute();
    $counter= $stmt->rowCount();
    
    echo "<table><tr>";
    echo "<td>", 'Artist Name', "<td>";
    echo "<td>", 'Title', "<td>";
    echo "<td>", 'Year Released', "<td>";
    echo "<td>", 'Album', "<td>";
    echo "<td>", 'Gender', "<td>";
    echo "</tr>";
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $art_name = $row['artist_name'];
        $title = $row['title'];
        $yreleased = $row['year_released'];
        $album = $row['album'];
        $gender = $row['gender'];
        
        echo "<tr>";
        echo "<td>", $art_name, "<td>";
        echo "<td>", $title, "<td>";
        echo "<td>", $yreleased, "<td>";
        echo "<td>", $album, "<td>";
        echo "<td>", $gender, "<td>";

        
     }
     
    }
    
?>