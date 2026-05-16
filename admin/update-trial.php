<?php

require_once 'config/db_connect.php';

/* =========================================
   CHECK METHOD
========================================= */

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id           = intval($_POST['id']);
    $trial_title  = trim($_POST['trial_title']);
    $trial_date   = trim($_POST['trial_date']);
    $trial_time   = trim($_POST['trial_time']);
    $state        = trim($_POST['state']);
    $city         = trim($_POST['city']);
    $ground_name  = trim($_POST['ground_name']);
    $entry_fee    = trim($_POST['entry_fee']);
    $status       = trim($_POST['status']);

    /* =====================================
       UPDATE QUERY
    ===================================== */

    $stmt = $conn->prepare("

        UPDATE trials SET

        trial_title = ?,
        trial_date = ?,
        trial_time = ?,
        state = ?,
        city = ?,
        ground_name = ?,
        entry_fee = ?,
        status = ?

        WHERE id = ?

    ");

    $stmt->bind_param(

        "ssssssssi",

        $trial_title,
        $trial_date,
        $trial_time,
        $state,
        $city,
        $ground_name,
        $entry_fee,
        $status,
        $id

    );

    if($stmt->execute()){

        header("Location: trials.php?updated=1");
        exit();

    }else{

        echo "Database Error : " . $stmt->error;

    }

}else{

    header("Location: trials.php");
    exit();

}
?>