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
   DELETE QUERY
========================================= */

$stmt = $conn->prepare("
    DELETE FROM trials
    WHERE id = ?
");

$stmt->bind_param("i", $id);

/* =========================================
   EXECUTE
========================================= */

if($stmt->execute()){

    header("Location: trials.php?deleted=1");
    exit();

}else{

    echo "Delete Failed : " . $stmt->error;

}

?>