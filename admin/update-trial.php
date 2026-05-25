<?php

require_once 'config/db_connect.php';

/* =========================================
CHECK METHOD
========================================= */

if($_SERVER['REQUEST_METHOD'] == "POST"){

    /* =====================================
    GET FORM DATA
    ===================================== */

    $id                  = intval($_POST['id']);

    $trial_title         = trim($_POST['trial_title']);

    $trial_date          = trim($_POST['trial_date']);

    $trial_time          = trim($_POST['trial_time']);

    $state               = trim($_POST['state']);

    $city                = trim($_POST['city']);

    $ground_name         = trim($_POST['ground_name']);

    $address             = trim($_POST['address']);

    $registration_fee    = intval($_POST['registration_fee']);

    $batsman_fee         = intval($_POST['batsman_fee']);

    $bowler_fee          = intval($_POST['bowler_fee']);

    $keeper_fee          = intval($_POST['keeper_fee']);

    $allrounder_fee      = intval($_POST['allrounder_fee']);

    $last_date           = trim($_POST['last_date']);

    $age_group           = trim($_POST['age_group']);

    $category            = trim($_POST['category']);

    $total_slots         = intval($_POST['total_slots']);

    $registered_players  = intval($_POST['registered_players']);

    $description         = trim($_POST['description']);

    $status              = trim($_POST['status']);

    /* =====================================
    OLD IMAGE
    ===================================== */

    $old_image = "";

    $img_query = mysqli_query($conn,"
    SELECT banner_image
    FROM trials
    WHERE id='$id'
    ");

    if(mysqli_num_rows($img_query) > 0){

        $img_data = mysqli_fetch_assoc($img_query);

        $old_image = $img_data['banner_image'];

    }

    $banner_image = $old_image;

    /* =====================================
    IMAGE UPLOAD
    ===================================== */

    if(

        isset($_FILES['banner_image']) &&

        $_FILES['banner_image']['error'] == 0

    ){

        $upload_dir = "uploads/trials/";

        if(!is_dir($upload_dir)){

            mkdir($upload_dir,0777,true);

        }

        $file_name = $_FILES['banner_image']['name'];

        $tmp_name  = $_FILES['banner_image']['tmp_name'];

        $file_size = $_FILES['banner_image']['size'];

        $file_ext  = strtolower(

            pathinfo($file_name, PATHINFO_EXTENSION)

        );

        /* ALLOWED */

        $allowed = ['jpg','jpeg','png','webp'];

        if(in_array($file_ext, $allowed)){

            /* SIZE CHECK */

            if($file_size <= 5 * 1024 * 1024){

                /* HASH */

                $file_hash = md5_file($tmp_name);

                $new_name = $file_hash . "." . $file_ext;

                $destination = $upload_dir . $new_name;

                /* DUPLICATE CHECK */

                if(file_exists($destination)){

                    $banner_image = $destination;

                }else{

                    if(move_uploaded_file($tmp_name, $destination)){

                        $banner_image = $destination;

                    }

                }

            }

        }

    }

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
        address = ?,

        registration_fee = ?,
        batsman_fee = ?,
        bowler_fee = ?,
        keeper_fee = ?,
        allrounder_fee = ?,

        last_date = ?,
        age_group = ?,
        category = ?,

        total_slots = ?,
        registered_players = ?,

        description = ?,
        status = ?,
        banner_image = ?

        WHERE id = ?

    ");

    /* =====================================
    BIND PARAMS
    ===================================== */

    $stmt->bind_param(

        "sssssssiiiiisssiisssi",

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
        $banner_image,

        $id

    );

    /* =====================================
    EXECUTE
    ===================================== */

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