<?php

require_once 'config/db_connect.php';

/* =========================================
   CHECK ID & STATUS
========================================= */

if(

    !isset($_GET['id']) ||

    !isset($_GET['status'])

){

    header("Location: registrations.php");
    exit();

}

/* =========================================
   GET VALUES
========================================= */

$id = intval($_GET['id']);

$status = trim($_GET['status']);

/* =========================================
   ALLOWED STATUS
========================================= */

$allowed = ['Pending', 'Approved', 'Rejected'];

if(!in_array($status, $allowed)){

    header("Location: registrations.php");
    exit();

}

/* =========================================
   UPDATE QUERY
========================================= */

$stmt = $conn->prepare("

    UPDATE trial_registrations

    SET registration_status = ?

    WHERE id = ?

");

/* =========================================
   BIND PARAMS
========================================= */

$stmt->bind_param(

    "si",

    $status,
    $id

);

/* =========================================
   EXECUTE
========================================= */

if($stmt->execute()){

    header("Location: registrations.php?updated=1");
    exit();

}else{

    echo "Update Failed : " . $stmt->error;

}

/* =========================================
   CLOSE
========================================= */

$stmt->close();

$conn->close();

?>