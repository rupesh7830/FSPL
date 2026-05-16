<?php

require_once 'config/db_connect.php';

/* =========================================
   CHECK REQUEST
========================================= */

if($_SERVER['REQUEST_METHOD'] == "POST"){

    /* =====================================
       GET FORM DATA
    ===================================== */

    $trial_title  = trim($_POST['trial_title']);
    $trial_date   = trim($_POST['trial_date']);
    $trial_time   = trim($_POST['trial_time']);
    $state        = trim($_POST['state']);
    $city         = trim($_POST['city']);
    $ground_name  = trim($_POST['ground_name']);
    $address      = trim($_POST['address']);
    $entry_fee    = trim($_POST['entry_fee']);
    $last_date    = trim($_POST['last_date']);
    $age_group    = trim($_POST['age_group']);
    $category     = trim($_POST['category']);
    $total_slots  = trim($_POST['total_slots']);
    $description  = trim($_POST['description']);
    $status       = trim($_POST['status']);

    /* =====================================
       IMAGE UPLOAD
    ===================================== */

    $banner_image = "";

    if(isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] == 0){

        $upload_dir = "uploads/trials/";

        /* CREATE FOLDER */

        if(!is_dir($upload_dir)){

            mkdir($upload_dir, 0777, true);

        }

        /* FILE DETAILS */

        $file_name = $_FILES['banner_image']['name'];

        $tmp_name  = $_FILES['banner_image']['tmp_name'];

        $file_size = $_FILES['banner_image']['size'];

        $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        /* ALLOWED TYPES */

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if(in_array($file_ext, $allowed)){

            /* UNIQUE FILE NAME */

            $new_name = time() . "_" . rand(1000,9999) . "." . $file_ext;

            $destination = $upload_dir . $new_name;

            /* MOVE FILE */

            if(move_uploaded_file($tmp_name, $destination)){

                $banner_image = $destination;

            }

        }

    }

    /* =====================================
       INSERT QUERY
    ===================================== */

    $stmt = $conn->prepare("

        INSERT INTO trials (

            trial_title,
            trial_date,
            trial_time,
            state,
            city,
            ground_name,
            address,
            entry_fee,
            last_date,
            age_group,
            category,
            total_slots,
            description,
            status,
            banner_image

        ) VALUES (

            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?

        )

    ");

    /* =====================================
       BIND PARAMS
    ===================================== */

    $stmt->bind_param(

        "sssssssssssisss",

        $trial_title,
        $trial_date,
        $trial_time,
        $state,
        $city,
        $ground_name,
        $address,
        $entry_fee,
        $last_date,
        $age_group,
        $category,
        $total_slots,
        $description,
        $status,
        $banner_image

    );

    /* =====================================
       EXECUTE
    ===================================== */

    if($stmt->execute()){

        /* SUCCESS */

        header("Location: trials.php?success=1");

        exit();

    }else{

        echo "Database Error : " . $stmt->error;

    }

}else{

    header("Location: create-trial.php");

    exit();

}

?>