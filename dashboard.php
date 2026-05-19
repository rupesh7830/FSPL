
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
?>

<?php
if(isset($_POST['apply_trial'])){

    $trial_id = $_POST['trial_id'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $playing_role = $_POST['playing_role'];

    // CHECK ALREADY APPLIED

    $check = mysqli_query($conn,"
    SELECT * FROM trials_player
    WHERE trial_id='$trial_id'
    AND user_id='$user_id'
    ");

    if(mysqli_num_rows($check) > 0){

        echo "<script>alert('You already applied for this trial');</script>";

    }else{

        // INSERT

        mysqli_query($conn,"
        INSERT INTO trials_player
        (
            trial_id,
            user_id,
            full_name,
            mobile,
            email,
            playing_role
        )
        VALUES
        (
            '$trial_id',
            '$user_id',
            '$full_name',
            '$phone',
            '$email',
            '$playing_role'
        )
        ");

        // UPDATE REGISTERED PLAYERS

        mysqli_query($conn,"
        UPDATE trials
        SET registered_players = registered_players + 1
        WHERE id='$trial_id'
        ");

        header("Location:pay.php");

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

        <div class="px-5 lg:px-8 py-8">

            <!-- HERO CARD -->

            <div
            data-aos="fade-up"
            class="relative overflow-hidden rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 lg:p-8">

                <!-- GLOW -->

                <div
                class="absolute top-[-100px] right-[-100px] w-[260px] h-[260px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
                </div>

                <div class="relative grid lg:grid-cols-[1fr_280px] gap-8 items-center">

                    <!-- LEFT -->

                    <div>

                        <div
                        class="inline-flex items-center gap-2 border border-[#D4AF37]/15 bg-black/20 px-4 py-2 rounded-full">

                            <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                            <span class="uppercase tracking-[3px] text-[9px] text-[#F5D76E]">
                                Future Star Player
                            </span>

                        </div>

                        <h2
                        class="mt-6 font-['Cinzel'] text-3xl lg:text-[54px] leading-[0.95] font-bold tracking-[-2px]">

                            Your Cricket

                            <span class="block text-[#D4AF37] mt-2">
                                Journey Starts Here
                            </span>

                        </h2>

                        <p
                        class="mt-6 max-w-[650px] text-white/55 text-[14px] leading-[30px] font-light">

                            Track your player profile, upcoming trials, selection status and professional opportunities directly from your FSPL dashboard.

                        </p>

                        <!-- BUTTONS -->

                        <div class="flex flex-wrap gap-3 mt-8">

                            <a
                            href="#"
                            class="group relative overflow-hidden h-[46px] px-7 rounded-full bg-[#D4AF37] shadow-[0_0_30px_rgba(212,175,55,0.18)] hover:scale-105 transition duration-500">

                                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000"></div>

                                <div class="relative flex items-center h-full">

                                    <span class="uppercase tracking-[2px] text-[9px] font-bold text-black">
                                        Complete Profile
                                    </span>

                                </div>

                            </a>

                            <a
                            href="trials.php"
                            class="flex items-center justify-center h-[46px] px-7 rounded-full border border-white/10 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500 uppercase tracking-[2px] text-[9px] text-[#F5D76E] font-bold">

                                View Trials

                            </a>

                        </div>

                    </div>

                    <!-- RIGHT CARD -->

                    <div
                    class="relative overflow-hidden rounded-[28px] border border-white/10 bg-black/20 p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                                    Player Rating
                                </p>

                                <h3 class="mt-3 font-['Cinzel'] text-[#D4AF37] text-5xl font-bold">
                                    92
                                </h3>

                            </div>

                            <div
                            class="w-16 h-16 rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-[#D4AF37]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-2.688-1.49-2.91.975.975-2.91L2.887 12.75l2.846-.813.813-2.846 2.535 1.49 2.535-1.49.813 2.846 2.846.813-1.49 2.535.975 2.91-2.91-.975L15 18.75l-.813-2.846L12 14.414l-2.187 1.49z" />
                                </svg>

                            </div>

                        </div>

                        <!-- STATS -->

                        <div class="grid grid-cols-2 gap-3 mt-6">

                            <div class="rounded-2xl border border-white/5 bg-white/[0.03] p-4 text-center">
                                <h4 class="font-['Cinzel'] text-[#D4AF37] text-2xl font-bold">28</h4>
                                <p class="mt-1 text-white/40 uppercase tracking-[2px] text-[7px]">Matches</p>
                            </div>

                            <div class="rounded-2xl border border-white/5 bg-white/[0.03] p-4 text-center">
                                <h4 class="font-['Cinzel'] text-[#D4AF37] text-2xl font-bold">145</h4>
                                <p class="mt-1 text-white/40 uppercase tracking-[2px] text-[7px]">Strike Rate</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- LEAGUE SECTION -->

            <div
            data-aos="fade-up"
            class="mt-8 relative overflow-hidden rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 lg:p-8">

                <!-- GLOW -->

                <div
                class="absolute top-[-120px] left-[-120px] w-[260px] h-[260px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
                </div>

                <div class="relative grid lg:grid-cols-[1fr_320px] gap-8 items-center">

                    <!-- LEFT -->

                    <div>

                        <div
                        class="inline-flex items-center gap-2 border border-[#D4AF37]/15 bg-black/20 px-4 py-2 rounded-full">

                            <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                            <span class="uppercase tracking-[3px] text-[8px] text-[#F5D76E]">
                                FSPL Premier League
                            </span>

                        </div>

                        <h2
                        class="mt-6 font-['Cinzel'] text-3xl lg:text-[48px] leading-[0.95] font-bold tracking-[-2px]">

                            Play In India's

                            <span class="block text-[#D4AF37] mt-2">
                                Premium Cricket League
                            </span>

                        </h2>

                        <p
                        class="mt-6 max-w-[650px] text-white/55 text-[14px] leading-[30px] font-light">

                            FSPL not only conducts professional cricket trials but also organizes elite league tournaments where selected players compete in front of coaches, selectors and cricket scouts.

                        </p>

                        <!-- FEATURES -->

                        <div class="grid sm:grid-cols-3 gap-3 mt-8">

                            <div class="rounded-2xl border border-white/5 bg-black/20 p-4">

                                <h3 class="font-['Cinzel'] text-[#D4AF37] text-2xl font-bold">
                                    16
                                </h3>

                                <p class="mt-2 text-white/40 uppercase tracking-[2px] text-[7px]">
                                    Franchise Teams
                                </p>

                            </div>

                            <div class="rounded-2xl border border-white/5 bg-black/20 p-4">

                                <h3 class="font-['Cinzel'] text-[#D4AF37] text-2xl font-bold">
                                    50+
                                </h3>

                                <p class="mt-2 text-white/40 uppercase tracking-[2px] text-[7px]">
                                    League Matches
                                </p>

                            </div>

                            <div class="rounded-2xl border border-white/5 bg-black/20 p-4">

                                <h3 class="font-['Cinzel'] text-[#D4AF37] text-2xl font-bold">
                                    ₹5L+
                                </h3>

                                <p class="mt-2 text-white/40 uppercase tracking-[2px] text-[7px]">
                                    Prize Pool
                                </p>

                            </div>

                        </div>

                        <!-- BUTTONS -->

                        <div class="flex flex-wrap gap-3 mt-8">

                            <a
                            href="#"
                            class="group relative overflow-hidden h-[46px] px-7 rounded-full bg-[#D4AF37] shadow-[0_0_30px_rgba(212,175,55,0.18)] hover:scale-105 transition duration-500">

                                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000"></div>

                                <div class="relative flex items-center h-full">

                                    <span class="uppercase tracking-[2px] text-[9px] font-bold text-black">
                                        Join League
                                    </span>

                                </div>

                            </a>

                            <a
                            href="players.php"
                            class="flex items-center justify-center h-[46px] px-7 rounded-full border border-white/10 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500 uppercase tracking-[2px] text-[9px] text-[#F5D76E] font-bold">

                                View Teams

                            </a>

                        </div>

                    </div>

                    <!-- RIGHT -->

                    <div
                    class="relative overflow-hidden rounded-[28px] border border-white/10 bg-black/20 p-5">

                        <!-- IMAGE -->

                        <div class="relative overflow-hidden rounded-[22px]">

                            <img
                            src="https://images.unsplash.com/photo-1624526267942-ab0ff8a3e972?q=80&w=1200&auto=format&fit=crop"
                            alt=""
                            class="w-full h-[320px] object-cover">

                            <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/10 to-transparent">
                            </div>

                            <!-- CONTENT -->

                            <div class="absolute bottom-0 left-0 p-5">

                                <span
                                class="text-[#D4AF37]/80 uppercase tracking-[2px] text-[8px]">
                                    Upcoming League
                                </span>

                                <h3
                                class="mt-2 font-['Cinzel'] text-3xl font-bold">
                                    FSPL 2026
                                </h3>

                                <p class="mt-2 text-white/45 text-sm">
                                    Registration Starts Soon
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- STATS -->

            <div class="grid grid-cols-2 xl:grid-co

                <!-- CARD -->

                <div
                data-aos="fade-up"
                class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5 hover:border-[#D4AF37]/20 hover:-translate-y-1 transition duration-500">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                                Upcoming Trials
                            </p>

                            <h3 class="mt-3 font-['Cinzel'] text-4xl font-bold text-[#D4AF37]">
                                03
                            </h3>

                        </div>

                    </div>

                </div>

                <!-- CARD -->

                <div
                data-aos="fade-up"
                data-aos-delay="100"
                class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5 hover:border-[#D4AF37]/20 hover:-translate-y-1 transition duration-500">

                    <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                        Selection Status
                    </p>

                    <h3 class="mt-3 font-['Cinzel'] text-4xl font-bold text-[#D4AF37]">
                        02
                    </h3>

                </div>

                <!-- CARD -->

                <div
                data-aos="fade-up"
                data-aos-delay="200"
                class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5 hover:border-[#D4AF37]/20 hover:-translate-y-1 transition duration-500">

                    <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                        Matches Played
                    </p>

                    <h3 class="mt-3 font-['Cinzel'] text-4xl font-bold text-[#D4AF37]">
                        28
                    </h3>

                </div>

                <!-- CARD -->

                <div
                data-aos="fade-up"
                data-aos-delay="300"
                class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5 hover:border-[#D4AF37]/20 hover:-translate-y-1 transition duration-500">

                    <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                        Performance Rating
                    </p>

                    <h3 class="mt-3 font-['Cinzel'] text-4xl font-bold text-[#D4AF37]">
                        92%
                    </h3>

                </div>

            </div>

<?php

$trial_query = mysqli_query($conn,"
SELECT * FROM trials
ORDER BY id DESC
");

if(!$trial_query){

    die(mysqli_error($conn));

}

?>

<!-- UPCOMING TRIALS -->

<div class="p-5 lg:p-6 grid grid-cols-1 xl:grid-cols-2 gap-5">

<?php

if(mysqli_num_rows($trial_query) > 0){

    while($row = mysqli_fetch_assoc($trial_query)){

?>

    <!-- CARD -->

    <div
    class="group relative overflow-hidden rounded-[26px] border border-white/10 bg-black/20 p-5 hover:border-[#D4AF37]/25 hover:-translate-y-1 transition duration-500">

        <!-- GLOW -->

        <div
        class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
        </div>

        <div class="relative">

            <!-- TOP -->

            <div class="flex items-start justify-between gap-4">

                <div>

                    <span
                    class="text-[#D4AF37]/80 uppercase tracking-[2px] text-[8px]">

                        <?php echo $row['category']; ?>

                    </span>

                    <h3
                    class="mt-2 font-['Cinzel'] text-3xl font-bold">

                        <?php echo $row['trial_title']; ?>

                    </h3>

                    <p class="mt-2 text-white/45 text-sm">

                        <?php echo $row['ground_name']; ?>

                    </p>

                </div>

                <!-- DATE -->

                <div
                class="w-[74px] h-[74px] rounded-[22px] border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex flex-col items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel'] text-[#D4AF37] text-2xl font-bold">

                        <?php echo date('d',strtotime($row['trial_date'])); ?>

                    </span>

                    <span
                    class="mt-1 text-white/45 text-[8px] uppercase tracking-[2px]">

                        <?php echo date('M',strtotime($row['trial_date'])); ?>

                    </span>

                </div>

            </div>

            <!-- DETAILS -->

            <div class="grid grid-cols-2 gap-3 mt-6">

                <div
                class="rounded-2xl border border-white/5 bg-white/[0.03] p-4">

                    <p class="text-white/35 uppercase tracking-[2px] text-[7px]">
                        Entry Fee
                    </p>

                    <h4 class="mt-2 text-[#D4AF37] font-semibold">

                        ₹<?php echo $row['entry_fee']; ?>

                    </h4>

                </div>

                <div
                class="rounded-2xl border border-white/5 bg-white/[0.03] p-4">

                    <p class="text-white/35 uppercase tracking-[2px] text-[7px]">
                        Slots Left
                    </p>

                    <h4 class="mt-2 text-[#D4AF37] font-semibold">

                        <?php

                        $slots_left = $row['total_slots'] - $row['registered_players'];

                        echo $slots_left;

                        ?> Players

                    </h4>

                </div>

            </div>

            <!-- EXTRA DETAILS -->

            <div class="space-y-3 mt-5">

                <div class="flex items-center justify-between">

                    <span class="text-white/35 uppercase tracking-[2px] text-[7px]">
                        State
                    </span>

                    <span class="text-sm text-white">
                        <?php echo $row['state']; ?>
                    </span>

                </div>

                <div class="flex items-center justify-between">

                    <span class="text-white/35 uppercase tracking-[2px] text-[7px]">
                        City
                    </span>

                    <span class="text-sm text-white">
                        <?php echo $row['city']; ?>
                    </span>

                </div>

                <div class="flex items-center justify-between">

                    <span class="text-white/35 uppercase tracking-[2px] text-[7px]">
                        Time
                    </span>

                    <span class="text-sm text-white">
                        <?php echo $row['trial_time']; ?>
                    </span>

                </div>

            </div>

            <!-- BUTTON -->

            <button
            onclick="openTrialModal(
            '<?php echo $row['id']; ?>',
            '<?php echo $row['trial_title']; ?>',
            '<?php echo date('d M Y',strtotime($row['trial_date'])); ?>'
            )"
            class="group relative overflow-hidden flex items-center justify-center w-full h-[48px] rounded-2xl bg-[#D4AF37] mt-6 shadow-[0_0_30px_rgba(212,175,55,0.18)] hover:scale-[1.02] transition duration-500">

                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000"></div>

                <span
                class="relative uppercase tracking-[2px] text-[9px] font-bold text-black">

                    Apply Now

                </span>

            </button>

        </div>

    </div>

<?php

    }

}else{

?>

    <div class="col-span-2 text-center py-20">

        <h2 class="font-['Cinzel'] text-4xl font-bold">
            No Trials Available
        </h2>

        <p class="mt-4 text-white/45">
            Upcoming cricket trials will appear here.
        </p>

    </div>

<?php } ?>

</div>

<!-- MODAL -->

<div
id="trialModal"
class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/70 backdrop-blur-sm p-4">

    <div
    class="relative w-full max-w-[460px] overflow-hidden rounded-[30px] border border-white/10 bg-[#0B0B0B] p-6">

        <!-- CLOSE -->

        <button
        type="button"
        onclick="closeTrialModal()"
        class="absolute top-5 right-5 w-10 h-10 rounded-full border border-white/10 bg-white/[0.03] flex items-center justify-center">

            ✕

        </button>

        <!-- CONTENT -->

        <div>

            <span
            class="text-[#D4AF37]/80 uppercase tracking-[3px] text-[8px]">

                Trial Registration

            </span>

            <h2
            id="trialTitle"
            class="mt-4 font-['Cinzel'] text-3xl font-bold">

                Trial Form

            </h2>

            <p
            id="trialDate"
            class="mt-2 text-white/45 text-sm">
            </p>

            <!-- FORM -->

            <form method="POST" class="mt-6 space-y-3">

                <input
                type="hidden"
                name="trial_id"
                id="modalTrialId">

                <input
                    type="text"
                    name="full_name"
                    value="<?php echo $user_data['full_name']; ?>"
                    placeholder="Player Full Name"
                    class="w-full h-[48px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">
                <input
                    type="text"
                    name="phone"
                    value="<?php echo $user_data['mobile']; ?>"
                    placeholder="Mobile Number"
                    class="w-full h-[48px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

                <input
                    type="email"
                    name="email"
                    value="<?php echo $user_data['email']; ?>"
                    placeholder="Email Address"
                    class="w-full h-[48px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

                <select
name="playing_role"
required
class="w-full h-[48px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

    <option value="" class="bg-[#111111] text-white">
        Select Role
    </option>

    <option value="Batsman" class="bg-[#111111] text-white">
        Batsman
    </option>

    <option value="Bowler" class="bg-[#111111] text-white">
        Bowler
    </option>

    <option value="All-Rounder" class="bg-[#111111] text-white">
        All-Rounder
    </option>

    <option value="Wicket Keeper" class="bg-[#111111] text-white">
        Wicket Keeper
    </option>

</select>

                <button
                type="submit"
                name="apply_trial"
                class="w-full h-[50px] rounded-2xl bg-[#D4AF37] uppercase tracking-[2px] text-[9px] font-bold text-black">

                    Submit Application

                </button>

            </form>

        </div>

    </div>

</div>

<!-- SCRIPT -->

<script>

function openTrialModal(id,title,date){

    document.getElementById('trialModal').classList.remove('hidden');

    document.getElementById('trialModal').classList.add('flex');

    document.getElementById('trialTitle').innerText = title;

    document.getElementById('trialDate').innerText = date;

    document.getElementById('modalTrialId').value = id;

}

function closeTrialModal(){

    document.getElementById('trialModal').classList.add('hidden');

    document.getElementById('trialModal').classList.remove('flex');

}

</script>
        </div>

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

