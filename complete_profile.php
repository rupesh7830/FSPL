<?php

session_start();
include 'admin/config/db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("location:login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$user_query = "SELECT * FROM users WHERE id='$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

$message = "";

if(isset($_POST['complete_profile'])){

    // =========================
    // GET FORM DATA
    // =========================

    $trial_id = mysqli_real_escape_string($conn,$_POST['trial_id']);
    $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $age = mysqli_real_escape_string($conn,$_POST['age']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $state = mysqli_real_escape_string($conn,$_POST['state']);
    $district = mysqli_real_escape_string($conn,$_POST['district']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $playing_role = mysqli_real_escape_string($conn,$_POST['playing_role']);
    $batting_style = mysqli_real_escape_string($conn,$_POST['batting_style']);
    $bowling_style = mysqli_real_escape_string($conn,$_POST['bowling_style']);
    $experience = mysqli_real_escape_string($conn,$_POST['experience']);
    $achievements = mysqli_real_escape_string($conn,$_POST['achievements']);

    // =========================
    // FILE UPLOAD SETTINGS
    // =========================

    $allowed_types = ['jpg','jpeg','png','pdf'];

    $max_size = 2 * 1024 * 1024;

    // =========================
    // PROFILE PHOTO
    // =========================

    $profile_photo = "";

    if(!empty($_FILES['profile_photo']['name'])){

        $photo_name = $_FILES['profile_photo']['name'];
        $photo_tmp = $_FILES['profile_photo']['tmp_name'];
        $photo_size = $_FILES['profile_photo']['size'];

        $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

        if(in_array($photo_ext, ['jpg','jpeg','png'])){

            if($photo_size <= $max_size){

                $profile_photo = time().'_'.$photo_name;

                move_uploaded_file(
                    $photo_tmp,
                    "uploads/profile/".$profile_photo
                );

            }else{

                $message = "Profile photo size must be less than 2MB";

            }

        }else{

            $message = "Only JPG PNG allowed in profile photo";

        }

    }

    // =========================
    // AADHAAR CARD
    // =========================

    $aadhaar_card = "";

    if(!empty($_FILES['aadhaar_card']['name'])){

        $aadhaar_name = $_FILES['aadhaar_card']['name'];
        $aadhaar_tmp = $_FILES['aadhaar_card']['tmp_name'];
        $aadhaar_size = $_FILES['aadhaar_card']['size'];

        $aadhaar_ext = strtolower(pathinfo($aadhaar_name, PATHINFO_EXTENSION));

        if(in_array($aadhaar_ext, $allowed_types)){

            if($aadhaar_size <= $max_size){

                $aadhaar_card = time().'_'.$aadhaar_name;

                move_uploaded_file(
                    $aadhaar_tmp,
                    "uploads/aadhaar/".$aadhaar_card
                );

            }else{

                $message = "Aadhaar file too large";

            }

        }else{

            $message = "Invalid Aadhaar file type";

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

        $doc_ext = strtolower(pathinfo($doc_name, PATHINFO_EXTENSION));

        if(in_array($doc_ext, $allowed_types)){

            if($doc_size <= $max_size){

                $support_document = time().'_'.$doc_name;

                move_uploaded_file(
                    $doc_tmp,
                    "uploads/documents/".$support_document
                );

            }else{

                $message = "Document size too large";

            }

        }else{

            $message = "Invalid document file type";

        }

    }

    // =========================
    // INSERT QUERY
    // =========================

    if(empty($message)){

        $insert = "INSERT INTO trial_registration(

            user_id,
            trial_id,
            full_name,
            father_name,
            dob,
            age,
            gender,
            state,
            district,
            address,
            email,
            phone,
            playing_role,
            batting_style,
            bowling_style,
            city,
            achievements,
            profile_photo,
            aadhaar_card,
            experience

        ) VALUES(

            '$user_id',
            '$trial_id',
            '$full_name',
            '$father_name',
            '$dob',
            '$age',
            '$gender',
            '$state',
            '$district',
            '$address',
            '$email',
            '$phone',
            '$playing_role',
            '$batting_style',
            '$bowling_style',
            '$city',
            '$achievements',
            '$profile_photo',
            '$aadhaar_card',
            '$experience'

        )";

        if(mysqli_query($conn,$insert)){

            $message = "Profile completed successfully";

        }else{

            $message = "Database error";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FSPL Complete Profile</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

<body class="min-h-screen text-white overflow-x-hidden">

<div class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(212,175,55,0.15),transparent_30%),radial-gradient(circle_at_bottom_left,rgba(255,255,255,0.04),transparent_20%)]"></div>

<?php include 'components/navbar.php'; ?>

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
                        placeholder="Enter father name"
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Email

                        </label>

                        <input
                        type="email"
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
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            Gender

                        </label>

                        <select
                        id="gender"
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
                        id="state"
                        placeholder="Enter state"
                        class="input">

                    </div>

                    <div>

                        <label class="label">

                            District

                        </label>

                        <input
                        type="text"
                        id="district"
                        placeholder="Enter district"
                        class="input">

                    </div>

                </div>

                <div class="mt-3">

                    <label class="label">

                        Address

                    </label>

                    <textarea
                    id="address"
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

                        <select class="input">

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

                        <select class="input">

                            <option>Select Style</option>
                            <option>Right Handed</option>
                            <option>Left Handed</option>

                        </select>

                    </div>

                    <div>

                        <label class="label">

                            Bowling Style

                        </label>

                        <select class="input">

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
                        class="mt-5 text-xs">

                    </div>

                    <div class="border border-dashed border-white/10 rounded-2xl p-5 text-center bg-black/20">

                        <h3 class="font-medium text-sm">

                            Supporting Document

                        </h3>

                        <p class="text-white/35 text-xs mt-2">

                            Cricket certificate (optional)

                        </p>

                        <input
                        type="file"
                        class="mt-5 text-xs">

                    </div>

                </div>

            </div>

            <!-- BUTTON -->

            <button
            type="submit"
            class="mt-7 w-full h-[48px] rounded-xl bg-[#D4AF37] text-black text-xs font-semibold tracking-[2px] uppercase hover:opacity-90 transition">

                Complete Registration

            </button>

        </form>

    </div>

</section>

<?php include 'components/footer.php'; ?>

</body>
</html>