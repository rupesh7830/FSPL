
<?php
include "admin/config/db_connect.php";
session_start();


if(!isset($_SESSION['user_id'])){

    header('location:login.php');
    exit();

}


$user_id = $_SESSION['user_id'];

$user_name = $_SESSION['user_name'];

$user_email = $_SESSION['user_email'];


$sql = "SELECT * FROM trial_registrations WHERE user_id ='$user_id'";

$profile_check = mysqli_query($conn, $sql);

$is_profile_complete = mysqli_num_rows($profile_check) > 0;

$user_query = mysqli_query($conn,"
SELECT full_name, mobile, email 
FROM users 
WHERE id='$user_id'
");

$user_data = mysqli_fetch_assoc($user_query);



// =========================
// GET USER DATA
// =========================

$user_query = mysqli_prepare($conn,"SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($user_query,"i",$user_id);
mysqli_stmt_execute($user_query);
$result = mysqli_stmt_get_result($user_query);
$user = mysqli_fetch_assoc($result);

$message = "";
$message_type = "";

// =========================
// CREATE UPLOAD FOLDERS
// =========================

$folders = [
    'uploads/profile/',
    'uploads/aadhaar/',
    'uploads/documents/'
];

foreach($folders as $folder){
    if(!file_exists($folder)){
        mkdir($folder,0777,true);
    }
}

// =========================
// FORM SUBMIT
// =========================

if(isset($_POST['complete_profile'])){

    // =========================
    // GET FORM DATA
    // =========================

    $trial_id = trim($_POST['trial_id']);
    $full_name = trim($_POST['full_name']);
    $father_name = trim($_POST['father_name']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $state = trim($_POST['state']);
    $city = trim($_POST['city']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $playing_role = trim($_POST['playing_role']);
    $batting_style = trim($_POST['batting_style']);
    $bowling_style = trim($_POST['bowling_style']);
    $experience = trim($_POST['experience']);

    // =========================
    // VALIDATION
    // =========================

    if(empty($father_name) || empty($dob) || empty($gender) || empty($state) || empty($city) || empty($address) || empty($playing_role)){

        $message = "Please fill all required fields";
        $message_type = "error";
    }

    // =========================
    // AGE CALCULATION
    // =========================

    $age = "";

    if(!empty($dob)){

        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
    }

    // =========================
    // FILE SETTINGS
    // =========================

    $allowed_image_types = ['image/jpeg','image/jpg','image/png'];
    $allowed_document_types = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'application/pdf'
    ];

    $max_size = 2 * 1024 * 1024;

    // =========================
    // PROFILE PHOTO UPLOAD
    // =========================

    $profile_photo = "";

    if(!empty($_FILES['profile_photo']['name'])){

        $photo_name = $_FILES['profile_photo']['name'];
        $photo_tmp = $_FILES['profile_photo']['tmp_name'];
        $photo_size = $_FILES['profile_photo']['size'];

        $photo_type = mime_content_type($photo_tmp);

        if(in_array($photo_type,$allowed_image_types)){

            if($photo_size <= $max_size){

                $photo_ext = pathinfo($photo_name,PATHINFO_EXTENSION);

                $profile_photo = uniqid().'_'.time().'.'.$photo_ext;

                move_uploaded_file(
                    $photo_tmp,
                    'uploads/profile/'.$profile_photo
                );

            }else{

                $message = "Profile photo size must be less than 2MB";
                $message_type = "error";
            }

        }else{

            $message = "Invalid profile photo format";
            $message_type = "error";
        }
    }

    // =========================
    // AADHAAR UPLOAD
    // =========================

    $aadhaar_card = "";

    if(!empty($_FILES['aadhaar_card']['name'])){

        $aadhaar_name = $_FILES['aadhaar_card']['name'];
        $aadhaar_tmp = $_FILES['aadhaar_card']['tmp_name'];
        $aadhaar_size = $_FILES['aadhaar_card']['size'];

        $aadhaar_type = mime_content_type($aadhaar_tmp);

        if(in_array($aadhaar_type,$allowed_document_types)){

            if($aadhaar_size <= $max_size){

                $aadhaar_ext = pathinfo($aadhaar_name,PATHINFO_EXTENSION);

                $aadhaar_card = uniqid().'_'.time().'.'.$aadhaar_ext;

                move_uploaded_file(
                    $aadhaar_tmp,
                    'uploads/aadhaar/'.$aadhaar_card
                );

            }else{

                $message = "Aadhaar file size must be less than 2MB";
                $message_type = "error";
            }

        }else{

            $message = "Invalid Aadhaar file format";
            $message_type = "error";
        }
    }

    // =========================
    // SUPPORT DOCUMENT
    // =========================

    $support_document = "";

    if(!empty($_FILES['support_document']['name'])){

        $doc_name = $_FILES['support_document']['name'];
        $doc_tmp = $_FILES['support_document']['tmp_name'];
        $doc_size = $_FILES['support_document']['size'];

        $doc_type = mime_content_type($doc_tmp);

        if(in_array($doc_type,$allowed_document_types)){

            if($doc_size <= $max_size){

                $doc_ext = pathinfo($doc_name,PATHINFO_EXTENSION);

                $support_document = uniqid().'_'.time().'.'.$doc_ext;

                move_uploaded_file(
                    $doc_tmp,
                    'uploads/documents/'.$support_document
                );

            }else{

                $message = "Support document size must be less than 2MB";
                $message_type = "error";
            }

        }else{

            $message = "Invalid support document format";
            $message_type = "error";
        }
    }

    $check_query = mysqli_prepare(
$conn,
"SELECT id FROM trial_registrations 
WHERE user_id=? AND trial_id=?"
);

mysqli_stmt_bind_param(
$check_query,
"ii",
$user_id,
$trial_id
);

mysqli_stmt_execute($check_query);

$check_result = mysqli_stmt_get_result($check_query);

if(mysqli_num_rows($check_result) > 0){

    $message = "You already registered for this trial";
    $message_type = "error";

}else{

  

    if(empty($message)){
        $insert = mysqli_prepare($conn,
        "INSERT INTO trial_registrations(
        
            user_id,
            trial_id,
            full_name,
            father_name,
            dob,
            age,
            gender,
            state,
            city,
            address,
            email,
            phone,
            playing_role,
            batting_style,
            bowling_style,
            experience,
            profile_photo,
            aadhaar_card
        
        ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

mysqli_stmt_bind_param(
    $insert,
    "iisssissssssssssss",

    $user_id,
    $trial_id,
    $full_name,
    $father_name,
    $dob,
    $age,
    $gender,
    $state,
    $city,
    $address,
    $email,
    $phone,
    $playing_role,
    $batting_style,
    $bowling_style,
    $experience,
    $profile_photo,
    $aadhaar_card
);
            if(mysqli_stmt_execute($insert)){

                $_SESSION['success'] = "Profile completed successfully";

                header("location:dashboard_userprofile.php");
                exit();

            }else{

                $message = "Database error";
                $message_type = "error";
            }
    }
}
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FSPL Dashboard</title>

<!-- TAILWIND -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- GOOGLE FONTS -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800&family=Outfit:wght@200;300;400;500;600;700&display=swap"
rel="stylesheet">

<!-- AOS -->
<link
rel="stylesheet"
href="https://unpkg.com/aos@2.3.4/dist/aos.css"/>

<style>

body{
    font-family:'Outfit',sans-serif;
    background:#050505;
}

.glass{
    background:rgba(255,255,255,0.04);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,0.08);
    box-shadow:0 10px 40px rgba(0,0,0,0.35);
}

.input{
    width:100%;
    height:54px;
    background:#0f0f0f;
    border:1px solid rgba(255,255,255,0.08);
    border-radius:16px;
    padding:0 18px;
    color:white;
    outline:none;
    transition:0.3s;
    font-size:14px;
}

.input:focus{
    border-color:#D4AF37;
    box-shadow:0 0 0 4px rgba(212,175,55,0.12);
}

.textarea{
    width:100%;
    background:#0f0f0f;
    border:1px solid rgba(255,255,255,0.08);
    border-radius:16px;
    padding:18px;
    color:white;
    outline:none;
    font-size:14px;
}

.textarea:focus{
    border-color:#D4AF37;
    box-shadow:0 0 0 4px rgba(212,175,55,0.12);
}

.label{
    display:block;
    margin-bottom:10px;
    color:rgba(255,255,255,0.60);
    font-size:11px;
    font-weight:600;
    letter-spacing:2px;
    text-transform:uppercase;
}
</style>

</head>

<body class="bg-[#050505] overflow-x-hidden text-white">

<!-- =========================================
SIDEBAR
========================================= -->

<div class="flex min-h-screen">

    <!-- SIDEBAR -->

    <aside
    class="hidden lg:flex flex-col justify-between w-[280px] border-r border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 fixed left-0 top-0 bottom-0 z-50">

        <div>

            <!-- LOGO -->
            <a href="index.php">
            <div class="flex items-center gap-3">

                <div
                class="w-11 h-11 rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center">

                    <span
                    class="font-['Cinzel'] text-[#D4AF37] font-bold text-lg">

                        F

                    </span>

                </div>

                <div>

                    <h2
                    class="font-['Cinzel'] text-xl font-bold">

                        FSPL

                    </h2>

                    <p class="text-white/40 text-[11px] tracking-[2px] uppercase">
                        Player Dashboard
                    </p>

                </div>

            </div>
            </a>

            <!-- MENU -->

            <div class="mt-10 space-y-2">

                <!-- ITEM -->

                <a
                href="#"
                class="flex items-center gap-4 h-[52px] px-5 rounded-2xl bg-[#D4AF37] text-black font-medium shadow-[0_0_30px_rgba(212,175,55,0.18)]">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h12M3.75 3h16.5v16.5H6A2.25 2.25 0 013.75 17.25V3z" />
                    </svg>

                    Dashboard

                </a>

                <!-- ITEM -->
<a
href="<?php echo $is_profile_complete ? 'dashboard_userprofile.php' : 'complete_profile.php'; ?>"
class="group flex items-center gap-4 h-[52px] px-5 rounded-2xl border border-white/5 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500">

    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-[#D4AF37]">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275" />
    </svg>

    <?php echo $is_profile_complete ? 'My Profile' : 'Complete Profile'; ?>

</a>

                <!-- ITEM -->

                <a
                href="dashboard_trials.php"
                class="group flex items-center gap-4 h-[52px] px-5 rounded-2xl border border-white/5 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-[#D4AF37]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 18.75A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75M3 18.75v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>

                    Trials

                </a>

                <!-- ITEM -->

                <a
                href="dashboard_selectionstatus.php"
                class="group flex items-center gap-4 h-[52px] px-5 rounded-2xl border border-white/5 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-[#D4AF37]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    Selection Status

                </a>

            </div>

        </div>

        <!-- USER -->

        <div
        class="rounded-[24px] border border-white/10 bg-black/20 p-5">

            <p class="text-white/40 text-[11px] uppercase tracking-[2px]">
                Logged In As
            </p>

            <h3 class="mt-3 font-semibold text-lg">
                <?php echo $user_name; ?>
            </h3>

            <p class="mt-1 text-white/45 text-sm break-all">
                <?php echo $user_email; ?>
            </p>

            <a
            href="logout.php"
            class="mt-5 flex items-center justify-center h-[46px] rounded-xl bg-[#D4AF37] text-black uppercase tracking-[2px] text-[10px] font-bold hover:scale-[1.02] transition duration-500">

                Logout

            </a>

        </div>

    </aside>

    <!-- =========================================
    MAIN CONTENT
    ========================================= -->

    <main class="flex-1 lg:ml-[280px]">

        <!-- TOPBAR -->

        <div
        class="sticky top-0 z-40 border-b border-white/10 bg-[#050505]/70 backdrop-blur-3xl px-5 lg:px-8 py-5">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <p class="text-[#D4AF37] uppercase tracking-[3px] text-[9px]">
                        Welcome Back
                    </p>

                    <h1 class="mt-2 font-['Cinzel'] text-2xl lg:text-4xl font-bold">
                        Hello, <?php echo $user_name; ?>
                    </h1>

                </div>

                <!-- PROFILE -->

                <div
                class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3">

                    <div
                    class="w-11 h-11 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center font-bold text-[#D4AF37] uppercase">

                        <?php echo substr($user_name,0,1); ?>

                    </div>

                    <div class="hidden sm:block">

                        <h3 class="font-medium text-sm">
                            <?php echo $user_name; ?>
                        </h3>

                        <p class="text-white/40 text-xs">
                            Premium Player
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->

<div class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(212,175,55,0.15),transparent_30%),radial-gradient(circle_at_bottom_left,rgba(255,255,255,0.04),transparent_20%)]"></div>

<section class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-10">

    <!-- TOP HEADER -->

    <div class="relative overflow-hidden rounded-[30px] border border-white/10 bg-gradient-to-r from-[#0f0f0f] via-[#111] to-[#1b1b1b] p-6 lg:p-10 mb-6">

        <div class="absolute top-0 right-0 w-72 h-72 bg-[#D4AF37]/10 blur-3xl rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>

                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37]/20 text-[#D4AF37] text-xs tracking-[2px] uppercase">
                    FSPL Registration
                </span>

                <h1 class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">
                    Complete Your
                    <span class="text-[#D4AF37]">
                        Cricket Profile
                    </span>
                </h1>

                <p class="mt-4 text-white/55 text-sm sm:text-base leading-7 max-w-2xl">
                    Fill in your professional cricket details to complete your Future Star Premier League registration.
                </p>

            </div>

            <div class="hidden lg:flex items-center justify-center w-[130px] h-[130px] rounded-[30px] bg-[#D4AF37]/10 border border-[#D4AF37]/20">

                <span class="text-5xl">🏏</span>

            </div>

        </div>

    </div>

    <!-- MAIN GRID -->

    <div class="grid grid-cols-1 xl:grid-cols-[320px_1fr] gap-5">

        <!-- SIDEBAR -->

        <aside class="xl:sticky xl:top-5 h-fit">

            <div class="glass rounded-[28px] overflow-hidden">

                <!-- COVER -->

                <div class="h-28 bg-gradient-to-r from-[#D4AF37]/30 to-transparent"></div>

                <div class="px-5 pb-5 -mt-12">

                    <div class="relative w-fit mx-auto">

                        <img
                        src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                        class="w-24 h-24 rounded-[24px] border-4 border-[#0a0a0a] object-cover shadow-2xl">

                        <label class="absolute -bottom-2 -right-2 w-9 h-9 rounded-xl bg-[#D4AF37] text-black flex items-center justify-center cursor-pointer font-bold shadow-lg">
                            +
                            <input type="file" class="hidden">
                        </label>

                    </div>

                    <div class="text-center mt-4">

                        <h2 class="text-xl font-semibold">
                            <?php echo $user['full_name']; ?>
                        </h2>

                        <p class="text-sm text-white/40 mt-1">
                            Registered FSPL Player
                        </p>

                    </div>

                    <!-- INFO BOXES -->

                    <div class="mt-6 space-y-3">

                        <div class="rounded-2xl bg-white/[0.03] border border-white/5 p-4">
                            <p class="text-xs text-white/40 uppercase tracking-[2px]">
                                Email
                            </p>
                            <h3 class="mt-2 text-sm break-all">
                                <?php echo $user['email']; ?>
                            </h3>
                        </div>

                        <div class="rounded-2xl bg-white/[0.03] border border-white/5 p-4">
                            <p class="text-xs text-white/40 uppercase tracking-[2px]">
                                Mobile
                            </p>
                            <h3 class="mt-2 text-sm">
                                <?php echo $user['mobile']; ?>
                            </h3>
                        </div>

                    </div>

                    <!-- PROGRESS -->

                    <div class="mt-6">

                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs text-white/50">
                                Profile Completion
                            </span>

                            <span class="text-xs font-semibold text-[#D4AF37]">
                                40%
                            </span>
                        </div>

                        <div class="w-full h-3 rounded-full bg-white/10 overflow-hidden">
                            <div class="h-full w-[40%] rounded-full bg-gradient-to-r from-[#D4AF37] to-[#f5d76e]"></div>
                        </div>

                    </div>

                </div>

            </div>

        </aside>



        <!-- FORM -->

        <form
            method="POST"
            id="playerForm"
            enctype="multipart/form-data"
            class="glass rounded-[22px] p-4 lg:p-5">

                <input type="hidden" name="trial_id" value="1">

            <!-- PERSONAL -->

            <div>

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-lg lg:text-[20px] font-semibold">

                        Personal Information

                    </h2>

                    <div class="w-8 h-8 rounded-lg bg-[#D4AF37]/10 flex items-center justify-center text-[#D4AF37] text-sm">

                        01

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                    <div>

                        <label class="label">

                            Full Name

                        </label>

                        <input
                        type="text"
                        name="full_name"
                        value="<?php echo $user['full_name']; ?>"
                        readonly
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Father Name

                        </label>

                        <input
                        type="text"
                        id="father_name"
                        name="father_name"
                        placeholder="Enter father name"
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Email

                        </label>

                        <input
                        type="email"
                        name="email"
                        value="<?php echo $user['email']; ?>"
                        readonly
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Mobile

                        </label>

                        <input
                        type="text"
                        name="phone"
                        value="<?php echo $user['mobile']; ?>"
                        readonly
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Date Of Birth

                        </label>

                        <input
                        type="date"
                        id="dob"
                        name="dob"
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Gender

                        </label>

                        <select
                        id="gender"
                        name="gender"
                        class="input">

                            <option>Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- ADDRESS -->

            <div class="mt-7">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-lg lg:text-[20px] font-semibold">

                        Address Information

                    </h2>

                    <div class="w-8 h-8 rounded-lg bg-[#D4AF37]/10 flex items-center justify-center text-[#D4AF37] text-sm">

                        02

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                    <div>

                        <label class="label">

                            State

                        </label>

                        <input
                        type="text"
                        name="state"
                        id="state"
                        placeholder="Enter state"
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            City

                        </label>

                        <input
                        type="text"
                        id="city"
                        name="city"
                        placeholder="Enter city"
                        class="input">

                    </div>

                </div>

                <div class="mt-3">

                    <label class="label">

                        Address

                    </label>

                    <textarea
                    id="address"
                    name="address"
                    rows="4"
                    class="textarea"
                    placeholder="Enter full address"></textarea>

                </div>

            </div>

            <!-- CRICKET -->

            <div class="mt-7">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-lg lg:text-[20px] font-semibold">

                        Cricket Details

                    </h2>

                    <div class="w-8 h-8 rounded-lg bg-[#D4AF37]/10 flex items-center justify-center text-[#D4AF37] text-sm">

                        03

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                    <div>

                        <label class="label">

                            Playing Role

                        </label>

                        <select class="input" name="playing_role">

                            <option>Select Role</option>
                            <option>Batsman</option>
                            <option>Bowler</option>
                            <option>All Rounder</option>
                            <option>Wicket Keeper</option>

                        </select>

                    </div>

                    <div>

                        <label class="label">

                            Batting Style

                        </label>

                        <select class="input" name="batting_style">

                            <option>Select Style</option>
                            <option>Right Handed</option>
                            <option>Left Handed</option>

                        </select>

                    </div>

                    <div>

                        <label class="label">

                            Bowling Style

                        </label>

                        <select class="input" name="bowling_style">

                            <option>Select Style</option>
                            <option>Fast</option>
                            <option>Medium</option>
                            <option>Spin</option>

                        </select>

                    </div>

                </div>

                <div class="mt-3">

                    <label class="label">

                        Experience

                    </label>

                    <input
                    type="number"
                    name="experience"
                    class="input"
                    placeholder="Years of experience">

                </div>

            </div>

            <!-- DOCUMENT -->

            <div class="mt-7">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-lg lg:text-[20px] font-semibold">

                        Documents

                    </h2>

                    <div class="w-8 h-8 rounded-lg bg-[#D4AF37]/10 flex items-center justify-center text-[#D4AF37] text-sm">

                        04

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                    <div class="border border-dashed border-white/10 rounded-2xl p-5 text-center bg-black/20">

                        <h3 class="font-medium text-sm">

                            Aadhaar Card

                        </h3>

                        <p class="text-white/35 text-xs mt-2">

                            JPG, PNG or PDF

                        </p>

                        <input
                        type="file"
                        name="aadhaar_card"
                        class="mt-5 text-xs">

                    </div>
                    <div class="mt-5">

    <label class="label">

        Profile Photo

    </label>

    <input
    type="file"
    name="profile_photo"
    accept=".jpg,.jpeg,.png"
    class="w-full p-4 rounded-2xl bg-black/20 border border-white/10">

</div>



                </div>

            </div>

            <!-- BUTTON -->

            <button
            type="submit"
            name="complete_profile"
            class="mt-7 w-full h-[48px] rounded-xl bg-[#D4AF37] text-black text-xs font-semibold tracking-[2px] uppercase hover:opacity-90 transition">

                Complete Registration

            </button>

        </form>

    </div>

</section>


    </main>

</div>

<!-- AOS -->

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>

AOS.init({

    duration:1000,
    once:true

});

</script>

</body>
</html>

