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

    background:rgba(255,255,255,0.03);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,0.07);
}

.input{

    width:100%;
    height:46px;
    background:#0f0f0f;
    border:1px solid rgba(255,255,255,0.06);
    border-radius:12px;
    padding:0 14px;
    color:white;
    outline:none;
    transition:0.3s;
    font-size:13px;
}

.input:focus{

    border-color:#D4AF37;
    box-shadow:0 0 0 4px rgba(212,175,55,0.10);
}

.textarea{

    width:100%;
    background:#0f0f0f;
    border:1px solid rgba(255,255,255,0.06);
    border-radius:12px;
    padding:14px;
    color:white;
    outline:none;
    font-size:13px;
}

.textarea:focus{

    border-color:#D4AF37;
    box-shadow:0 0 0 4px rgba(212,175,55,0.10);
}

.label{

    display:block;
    margin-bottom:7px;
    color:rgba(255,255,255,0.55);
    font-size:10px;
    font-weight:500;
    letter-spacing:1px;
    text-transform:uppercase;
}

</style>

</head>

<body class="min-h-screen text-white overflow-x-hidden">

<?php include 'components/navbar.php'; ?>

<section class="max-w-[1200px] mx-auto px-3 lg:px-5 py-3 lg:py-5 mt-3 lg:mt-10">

    <!-- HEADER -->

    <div class="mb-5">

        <h1 class="text-2xl lg:text-4xl font-bold">

            Complete Your

            <span class="text-[#D4AF37]">

                Cricket Profile

            </span>

        </h1>

        <p class="text-white/40 mt-2 text-sm max-w-xl leading-7">

            Complete your FSPL player registration profile with professional cricket details.

        </p>

    </div>

    <!-- GRID -->

    <div class="grid grid-cols-1 xl:grid-cols-[250px_1fr] gap-3 items-start">

        <!-- SIDEBAR -->

        <div class="glass rounded-[22px] p-3 h-fit sticky top-3">

            <!-- PROFILE -->

            <div class="flex flex-col items-center text-center">

                <div class="relative">

                    <img
                    src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                    class="w-16 h-16 rounded-full object-cover border-2 border-[#D4AF37]/30">

                    <label class="absolute bottom-0 right-0 w-5 h-5 rounded-full bg-[#D4AF37] flex items-center justify-center cursor-pointer text-black text-xs font-bold">

                        +

                        <input
                        type="file"
                        id="profile_photo"
                        class="hidden">

                    </label>

                </div>

                <h2 class="mt-3 text-lg font-semibold">

                    <?php echo $user['full_name']; ?>

                </h2>

                <p class="text-white/40 text-sm">

                    Registered Player

                </p>

            </div>

            <!-- INFO -->

            <div class="mt-5 space-y-3">

                <div class="bg-black/40 rounded-xl p-3">

                    <p class="text-white/35 text-xs">

                        Email

                    </p>

                    <h3 class="mt-1 text-sm break-all">

                        <?php echo $user['email']; ?>

                    </h3>

                </div>

                <div class="bg-black/40 rounded-xl p-3">

                    <p class="text-white/35 text-xs">

                        Mobile

                    </p>

                    <h3 class="mt-1 text-sm">

                        <?php echo $user['mobile']; ?>

                    </h3>

                </div>

            </div>

            <!-- PROGRESS -->

            <div class="mt-5">

                <div class="flex items-center justify-between mb-2">

                    <span class="text-xs text-white/50">

                        Completion

                    </span>

                    <span class="text-xs text-[#D4AF37]">

                        40%

                    </span>

                </div>

                <div class="w-full h-2 rounded-full bg-white/10 overflow-hidden">

                    <div class="w-[40%] h-full bg-[#D4AF37] rounded-full"></div>

                </div>

            </div>

        </div>

        <!-- FORM -->

        <form
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