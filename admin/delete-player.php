<?php

require_once 'config/db_connect.php';

/* =========================================
   CHECK ID
========================================= */

if(isset($_GET['id'])){

    $id = intval($_GET['id']);

    /* =====================================
       DELETE PLAYER
    ===================================== */

    $stmt = $conn->prepare("
        DELETE FROM trial_registrations
        WHERE id = ?
    ");

    $stmt->bind_param("i", $id);

    $stmt->execute();

}

/* =========================================
   REDIRECT
========================================= */

header("Location: players.php");

exit();

?>