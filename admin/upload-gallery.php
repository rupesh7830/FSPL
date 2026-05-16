<?php

require_once 'config/db_connect.php';

/* =========================================
   CHECK REQUEST
========================================= */

if($_SERVER['REQUEST_METHOD'] == "POST"){

    /* =====================================
       GET FORM DATA
    ===================================== */

    $title = trim($_POST['title']);

    $category = trim($_POST['category']);

    /* =====================================
       IMAGE UPLOAD
    ===================================== */

    $image = "";

    if(

        isset($_FILES['image']) &&

        $_FILES['image']['error'] == 0

    ){

        /* =================================
           UPLOAD DIRECTORY
        ================================= */

        $upload_dir = "uploads/gallery/";

        /* CREATE FOLDER */

        if(!is_dir($upload_dir)){

            mkdir($upload_dir, 0777, true);

        }

        /* =================================
           FILE DETAILS
        ================================= */

        $file_name = $_FILES['image']['name'];

        $tmp_name  = $_FILES['image']['tmp_name'];

        $file_size = $_FILES['image']['size'];

        $file_ext = strtolower(

            pathinfo(
                $file_name,
                PATHINFO_EXTENSION
            )

        );

        /* =================================
           ALLOWED TYPES
        ================================= */

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if(!in_array($file_ext, $allowed)){

            die("Only JPG, PNG & WEBP files allowed.");

        }

        /* =================================
           FILE SIZE LIMIT
        ================================= */

        if($file_size > 5 * 1024 * 1024){

            die("Image size must be less than 5MB.");

        }

        /* =================================
           UNIQUE FILE NAME
        ================================= */

        $new_name = time() . "_" . rand(1000,9999) . "." . $file_ext;

        $destination = $upload_dir . $new_name;

        /* =================================
           MOVE FILE
        ================================= */

        if(move_uploaded_file($tmp_name, $destination)){

            $image = $destination;

        }else{

            die("Image upload failed.");

        }

    }else{

        die("Please select an image.");

    }

    /* =====================================
       INSERT QUERY
    ===================================== */

    $stmt = $conn->prepare("

        INSERT INTO gallery (

            title,
            category,
            image

        ) VALUES (

            ?, ?, ?

        )

    ");

    /* =====================================
       BIND PARAMS
    ===================================== */

    $stmt->bind_param(

        "sss",

        $title,
        $category,
        $image

    );

    /* =====================================
       EXECUTE
    ===================================== */

    if($stmt->execute()){

        header("Location: gallery.php?uploaded=1");

        exit();

    }else{

        echo "Database Error : " . $stmt->error;

    }

}else{

    header("Location: gallery.php");

    exit();

}

?>