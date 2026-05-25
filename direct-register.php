<?php

declare(strict_types=1);

session_start();

require_once "admin/config/db_connect.php";

/*
|--------------------------------------------------------------------------
| LOGIN CHECK
|--------------------------------------------------------------------------
*/

if(!isset($_SESSION['user_id'])){

    header("Location: register");
    exit();

}

/*
|--------------------------------------------------------------------------
| VALIDATE GET DATA
|--------------------------------------------------------------------------
*/

if(

    !isset($_GET['trial_id']) ||

    !isset($_GET['role'])

){

    header("Location: trials");
    exit();

}

/*
|--------------------------------------------------------------------------
| GET VALUES
|--------------------------------------------------------------------------
*/

$user_id = (int) $_SESSION['user_id'];

$trial_id = (int) $_GET['trial_id'];

$playing_role = trim($_GET['role']);

/*
|--------------------------------------------------------------------------
| ALLOWED ROLES
|--------------------------------------------------------------------------
*/

$allowed_roles = [

    'Batsman',
    'Bowler',
    'Wicket Keeper',
    'All-Rounder'

];

/*
|--------------------------------------------------------------------------
| VALIDATE ROLE
|--------------------------------------------------------------------------
*/

if(!in_array($playing_role, $allowed_roles)){

    header("Location: trials");
    exit();

}

/*
|--------------------------------------------------------------------------
| FETCH USER
|--------------------------------------------------------------------------
*/

$stmtUser = $conn->prepare("
SELECT
    id,
    full_name,
    mobile,
    email
FROM users
WHERE id = ?
LIMIT 1
");

$stmtUser->bind_param("i", $user_id);

$stmtUser->execute();

$user_result = $stmtUser->get_result();

/*
|--------------------------------------------------------------------------
| USER NOT FOUND
|--------------------------------------------------------------------------
*/

if($user_result->num_rows === 0){

    session_destroy();

    header("Location: login or register");
    exit();

}

$user = $user_result->fetch_assoc();

/*
|--------------------------------------------------------------------------
| USER DATA
|--------------------------------------------------------------------------
*/

$full_name = trim($user['full_name']);

$mobile = trim($user['mobile']);

$email = trim($user['email']);

/*
|--------------------------------------------------------------------------
| FETCH TRIAL
|--------------------------------------------------------------------------
*/

$stmtTrial = $conn->prepare("
SELECT
    id,
    registration_fee,
    batsman_fee,
    bowler_fee,
    keeper_fee,
    allrounder_fee,
    status
FROM trials
WHERE id = ?
LIMIT 1
");

$stmtTrial->bind_param("i", $trial_id);

$stmtTrial->execute();

$trial_result = $stmtTrial->get_result();

/*
|--------------------------------------------------------------------------
| TRIAL NOT FOUND
|--------------------------------------------------------------------------
*/

if($trial_result->num_rows === 0){

    header("Location: trials");
    exit();

}

$trial = $trial_result->fetch_assoc();

/*
|--------------------------------------------------------------------------
| CHECK STATUS
|--------------------------------------------------------------------------
*/

if($trial['status'] !== 'Upcoming'){

    header("Location: trials");
    exit();

}

/*
|--------------------------------------------------------------------------
| ROLE BASED ENTRY FEE
|--------------------------------------------------------------------------
*/

$entry_fee = (float) $trial['registration_fee'];

switch($playing_role){

    case 'Batsman':

        $entry_fee = (float) $trial['batsman_fee'];

    break;

    case 'Bowler':

        $entry_fee = (float) $trial['bowler_fee'];

    break;

    case 'Wicket Keeper':

        $entry_fee = (float) $trial['keeper_fee'];

    break;

    case 'All-Rounder':

        $entry_fee = (float) $trial['allrounder_fee'];

    break;

}

/*
|--------------------------------------------------------------------------
| CHECK ALREADY APPLIED
|--------------------------------------------------------------------------
*/

$stmtCheck = $conn->prepare("
SELECT id
FROM trials_player
WHERE user_id = ?
AND trial_id = ?
AND playing_role = ?
LIMIT 1
");

$stmtCheck->bind_param(

    "iis",

    $user_id,
    $trial_id,
    $playing_role

);

$stmtCheck->execute();

$check_result = $stmtCheck->get_result();

if($check_result->num_rows > 0){

    $existing = $check_result->fetch_assoc();

    header("Location: pay?id=".$existing['id']);
    exit();

}

/*
|--------------------------------------------------------------------------
| DEFAULT STATUS
|--------------------------------------------------------------------------
*/

$payment_status = "Pending";

$application_status = "Pending";

/*
|--------------------------------------------------------------------------
| INSERT PLAYER
|--------------------------------------------------------------------------
*/

$stmtInsert = $conn->prepare("
INSERT INTO trials_player(

    trial_id,
    user_id,
    full_name,
    mobile,
    email,
    playing_role,
    entry_fee,
    application_status,
    payment_status

)

VALUES(

    ?, ?, ?, ?, ?, ?, ?, ?, ?

)
");

$stmtInsert->bind_param(

    "iissssdss",

    $trial_id,
    $user_id,
    $full_name,
    $mobile,
    $email,
    $playing_role,
    $entry_fee,
    $application_status,
    $payment_status

);

if(!$stmtInsert->execute()){

    die("Something went wrong.");

}

/*
|--------------------------------------------------------------------------
| PLAYER ID
|--------------------------------------------------------------------------
*/

$player_id = $conn->insert_id;

/*
|--------------------------------------------------------------------------
| REDIRECT PAYMENT PAGE
|--------------------------------------------------------------------------
*/

header("Location: pay?id=".$player_id);

exit();

?>