<?php
    $artist = $_POST ['artist_name'];
    $title = $_POST ['title'];
    $year = $_POST ['year_released'];
    $album = $_POST ['album'];
    $gender = $_POST ['gender'];
    $pdo = new PDO("mysql:host=localhost;dbname=music3","root","");
     
     $stmt = $pdo->prepare("SELECT * FROM artist WHERE artist_name = ? AND gender = ?");
     $stmt->bindValue(1, $artist, PDO::PARAM_STR);
     $stmt->bindValue(2, $gender, PDO::PARAM_STR);
     $stmt->execute();
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(isset($_POST['add'])){
     if( $row == 0){
     $stmt = $pdo->prepare("INSERT INTO artist (artist_name, gender) VALUES (?,?)"); 
     $stmt->bindValue(1, $artist, PDO::PARAM_STR);
     $stmt->bindValue(2, $gender, PDO::PARAM_STR);
     $stmt->execute();
     echo "New artist added <br>";
    
    $stmt = $pdo->prepare("SELECT * FROM artist WHERE artist_name = ?");
    $stmt->bindValue(1, $artist, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    } else {
        echo "Artist already exist! <br>";
    }
    
    $stmt2 = $pdo->prepare("SELECT * FROM songs WHERE title = ?");
    $stmt2->bindValue(1, $title, PDO::PARAM_STR);
    $stmt2->execute();
    $row_title = $stmt2->fetch(PDO::FETCH_ASSOC);
    
    if($row_title == 0){
    while($row){
        $artist_id = $row['artist_id'];
        break;
        }
    
     $stmt3 = $pdo->prepare("INSERT INTO songs (artist_id, title, year_released, album) VALUES (?,?,?,?)"); 
     $stmt3->bindValue(1, $artist_id, PDO::PARAM_STR);
     $stmt3->bindValue(2, $title, PDO::PARAM_STR);
     $stmt3->bindValue(3, $year, PDO::PARAM_STR);
     $stmt3->bindValue(4, $album, PDO::PARAM_STR);
     $stmt3->execute();
     echo "Added the new song of the artist <br>"; 
    }else{
        echo "Song already exist!";
    }
    
  }
 ?>
    