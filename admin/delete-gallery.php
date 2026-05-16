<?php

require_once 'config/db_connect.php';

/* =========================================
   CHECK ID
========================================= */

if(!isset($_GET['id'])){

    header("Location: gallery.php");
    exit();

}

/* =========================================
   GET ID
========================================= */

$id = intval($_GET['id']);

/* =========================================
   FETCH IMAGE
========================================= */

$stmt = $conn->prepare("

    SELECT image
    FROM gallery
    WHERE id = ?

");

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

/* =========================================
   IMAGE NOT FOUND
========================================= */

if(!$row){

    header("Location: gallery.php");
    exit();

}

/* =========================================
   DELETE IMAGE FILE
========================================= */

$image_path = $row['image'];

if(

    !empty($image_path) &&

    file_exists($image_path)

){

    unlink($image_path);

}

/* =========================================
   DELETE DATABASE RECORD
========================================= */

$delete = $conn->prepare("

    DELETE FROM gallery
    WHERE id = ?

");

$delete->bind_param("i", $id);

/* =========================================
   EXECUTE
========================================= */

if($delete->execute()){

    header("Location: gallery.php?deleted=1");

    exit();

}else{

    echo "Delete Failed : " . $delete->error;

}

?>