<?php

require_once 'config/db_connect.php';

/* =========================================
CHECK ID
========================================= */

if(!isset($_GET['id'])){

    header("Location: trials.php");

    exit();

}

$id = intval($_GET['id']);

/* =========================================
FETCH IMAGE
========================================= */

$stmt = $conn->prepare("

    SELECT banner_image
    FROM trials
    WHERE id = ?

");

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$trial = $result->fetch_assoc();

/* =========================================
NOT FOUND
========================================= */

if(!$trial){

    header("Location: trials.php");

    exit();

}

/* =========================================
GET IMAGE PATH
========================================= */

$banner_image = $trial['banner_image'];

/* =========================================
DELETE QUERY
========================================= */

$delete_stmt = $conn->prepare("

    DELETE FROM trials
    WHERE id = ?

");

$delete_stmt->bind_param("i", $id);

/* =========================================
EXECUTE DELETE
========================================= */

if($delete_stmt->execute()){

    /* =====================================
    DELETE IMAGE
    ===================================== */

    if(

        !empty($banner_image) &&

        file_exists($banner_image)

    ){

        unlink($banner_image);

    }

    /* SUCCESS */

    header("Location: trials.php?deleted=1");

    exit();

}else{

    echo "Delete Failed : " . $delete_stmt->error;

}

?>