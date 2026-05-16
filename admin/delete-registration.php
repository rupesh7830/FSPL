<?php

session_start();

include 'config/db_connect.php';

/* =========================================
CHECK ADMIN LOGIN
========================================= */

if(!isset($_SESSION['admin_logged_in'])){

    header('location:index.php');
    exit();

}

/* =========================================
GET REGISTRATION ID
========================================= */

if(isset($_GET['id'])){

    $registration_id = (int)$_GET['id'];

    /* =====================================
    DELETE QUERY
    ===================================== */

    $sql = "DELETE FROM trial_registrations
            WHERE id = '$registration_id'";

    $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['success'] = "Registration deleted successfully";

    }else{

        $_SESSION['error'] = "Delete failed";

    }

}

/* =========================================
REDIRECT
========================================= */

header('location:registrations.php');
exit();

?>