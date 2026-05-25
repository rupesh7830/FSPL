<?php

require_once 'config/db_connect.php';

/* =========================================
CHECK REQUEST
========================================= */

if($_SERVER['REQUEST_METHOD'] == "POST"){

    /* =====================================
    GET FORM DATA
    ===================================== */

    $trial_title       = trim($_POST['trial_title']);

    $trial_date        = trim($_POST['trial_date']);

    $trial_time        = trim($_POST['trial_time']);

    $state             = trim($_POST['state']);

    $city              = trim($_POST['city']);

    $ground_name       = trim($_POST['ground_name']);

    $address           = trim($_POST['address']);

    $registration_fee  = intval($_POST['registration_fee']);

    $batsman_fee       = intval($_POST['batsman_fee']);

    $bowler_fee        = intval($_POST['bowler_fee']);

    $keeper_fee        = intval($_POST['keeper_fee']);

    $allrounder_fee    = intval($_POST['allrounder_fee']);

    $last_date         = trim($_POST['last_date']);

    $age_group         = trim($_POST['age_group']);

    $category          = trim($_POST['category']);

    $total_slots       = intval($_POST['total_slots']);

    $description       = trim($_POST['description']);

    $status            = trim($_POST['status']);

    /* =====================================
    DEFAULTS
    ===================================== */

    $registered_players = 0;

    $banner_image = "";

    /* =====================================
    IMAGE UPLOAD
    ===================================== */

    if(

        isset($_FILES['banner_image']) &&

        $_FILES['banner_image']['error'] == 0

    ){

        $upload_dir = "uploads/trials/";

        /* CREATE DIRECTORY */

        if(!is_dir($upload_dir)){

            mkdir($upload_dir, 0777, true);

        }

        /* FILE DETAILS */

        $file_name = $_FILES['banner_image']['name'];

        $tmp_name  = $_FILES['banner_image']['tmp_name'];

        $file_size = $_FILES['banner_image']['size'];

        $file_ext  = strtolower(

            pathinfo($file_name, PATHINFO_EXTENSION)

        );

        /* ALLOWED TYPES */

        $allowed = ['jpg','jpeg','png','webp'];

        if(in_array($file_ext, $allowed)){

            /* CHECK FILE SIZE */

            if($file_size <= 5 * 1024 * 1024){

                /* FILE HASH */

                $file_hash = md5_file($tmp_name);

                /* UNIQUE FILE NAME */

                $new_name = $file_hash . "." . $file_ext;

                $destination = $upload_dir . $new_name;

                /* CHECK DUPLICATE */

                if(file_exists($destination)){

                    $banner_image = $destination;

                }else{

                    /* MOVE FILE */

                    if(move_uploaded_file($tmp_name, $destination)){

                        $banner_image = $destination;

                    }

                }

            }else{

                die("Image size should be less than 5MB");

            }

        }else{

            die("Only JPG, JPEG, PNG & WEBP files allowed");

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

            registration_fee,
            batsman_fee,
            bowler_fee,
            keeper_fee,
            allrounder_fee,

            last_date,
            age_group,
            category,

            total_slots,
            registered_players,

            description,
            status,
            banner_image

        ) VALUES (

            ?, ?, ?, ?, ?, ?, ?,

            ?, ?, ?, ?, ?,

            ?, ?, ?,

            ?, ?,

            ?, ?, ?

        )

    ");

    /* =====================================
    BIND PARAMS
    ===================================== */

    $stmt->bind_param(

        "sssssssiiiiisssiisss",

        $trial_title,
        $trial_date,
        $trial_time,
        $state,
        $city,
        $ground_name,
        $address,

        $registration_fee,
        $batsman_fee,
        $bowler_fee,
        $keeper_fee,
        $allrounder_fee,

        $last_date,
        $age_group,
        $category,

        $total_slots,
        $registered_players,

        $description,
        $status,
        $banner_image

    );

    /* =====================================
    EXECUTE
    ===================================== */

    if($stmt->execute()){

        header("Location: trials.php?success=1");

        exit();

    }else{

        echo "Database Error : " . $stmt->error;

    }

    /* =====================================
    CLOSE
    ===================================== */

    $stmt->close();

    $conn->close();

}else{

    header("Location: create-trial.php");

    exit();

}

?>