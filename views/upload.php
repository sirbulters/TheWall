<?php
/**
 * Created by PhpStorm.
 * User: jorisbulters
 * Date: 10-06-15
 * Time: 11:14
 */

if ($_SESSION['username'] && $_FILES['fileToUpload']) {
    $filename = $_FILES['fileToUpload']['tmp_name'];
    $destination = 'uploads/' . $_FILES['fileToUpload']['name'];
    //als het uploaden gelukt is zeg filenaam is uploaded, anders error

    if (move_uploaded_file($filename, $destination)) {
        echo "The file " . basename($_FILES["fileToUpload"] ["name"]) . " has been uploaded";
    } else {

        echo "Sorry there was an error uploading your file";
    }

    //insert in database
    $filename = $_FILES['fileToUpload']['name'];
    $username = $_SESSION["username"];
    $title = $_POST["titel"];
    $info = $_POST["informatie"];
    $query = "INSERT INTO pics (name, username, title, info) VALUES ('$filename', '$username', '$title', '$info');";
    $mysqli->query($query);

}

//meot terug naar ergens gaan.
header( "Location:./index.php" );
