<?php

session_start();

include "admin/config/db_connect.php";

/* =========================================
LOGIN CHECK
========================================= */

if(!isset($_SESSION['user_id'])){

    header("Location: login");
    exit();

}

/* =========================================
USER DATA
========================================= */

$user_id = $_SESSION['user_id'];

$user_name  = '';
$user_email = '';
$user_mobile = '';

/* FETCH USER */

$user_query = mysqli_query($conn,"
SELECT full_name, email, mobile
FROM users
WHERE id='$user_id'
LIMIT 1
");

if($user_query && mysqli_num_rows($user_query) > 0){

    $user = mysqli_fetch_assoc($user_query);

    $user_name   = $user['full_name'];
    $user_email  = $user['email'];
    $user_mobile = $user['mobile'];
}

/* =========================================
PROFILE CHECK
========================================= */

$is_profile_complete = false;

$profile_check = mysqli_query($conn,"
SELECT id
FROM trial_registrations
WHERE user_id='$user_id'
");

if($profile_check && mysqli_num_rows($profile_check) > 0){

    $is_profile_complete = true;

}


/* =========================================
PROFILE APPROVAL CHECK
========================================= */

$profile_approved = 'Pending';

$approval_query = mysqli_query($conn,"
SELECT profile_approved
FROM trials_player
WHERE user_id='$user_id'
AND profile_approved='Approved'
LIMIT 1
");

if($approval_query && mysqli_num_rows($approval_query) > 0){

    $profile_approved = 'Approved';

}else{

    $profile_approved = 'Pending';

}

$stmt = $conn->prepare("
    SELECT *
    FROM trials_player
    WHERE user_id = ?
    LIMIT 1
");

$stmt->bind_param("i", $user_id);
$stmt->execute();

$user_result = $stmt->get_result();

/*
=========================================
CHECK PLAYER RECORD
=========================================
*/

if ($user_result->num_rows == 0) {
    die("Player record not found.");
}

$user = $user_result->fetch_assoc();

$user_phone = trim($user['mobile']);

/*
=========================================
GET SELECTION STATUS
=========================================
*/

$status_stmt = $conn->prepare("
    SELECT *
    FROM trials_player
    WHERE user_id = ?
    LIMIT 1
");

$status_stmt->bind_param("i", $user_id);
$status_stmt->execute();

$result = $status_stmt->get_result();

$player = null;

if ($result->num_rows > 0) {
    $player = $result->fetch_assoc();
}

/*
=========================================
STATUS DESIGN
=========================================
*/

$status = "No Record Found";
$status_color = "#666";
$status_bg = "rgba(255,255,255,0.05)";
$status_border = "rgba(255,255,255,0.08)";
$status_icon = "✖";

if ($player) {

    switch ($player['application_status']) {

        case 'selected':
            $status = "Congratulations! You Are Selected";
            $status_color = "#d4af37";
            $status_bg = "rgba(212,175,55,0.12)";
            $status_border = "rgba(212,175,55,0.25)";
            $status_icon = "🏆";
            break;

        case 'pending':
            $status = "Your Application Is Under Review";
            $status_color = "#facc15";
            $status_bg = "rgba(250,204,21,0.10)";
            $status_border = "rgba(250,204,21,0.20)";
            $status_icon = "⌛";
            break;

        case 'rejected':
            $status = "Sorry! You Are Not Selected";
            $status_color = "#ef4444";
            $status_bg = "rgba(239,68,68,0.10)";
            $status_border = "rgba(239,68,68,0.20)";
            $status_icon = "✖";
            break;
    }
}

$trial_query = mysqli_query($conn,"
SELECT *
FROM trials
ORDER BY id DESC
");

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

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#000;
    color:white;
    font-family:'Inter',sans-serif;
}

.main-box{
    background:linear-gradient(
        135deg,
        rgba(15,15,15,0.98),
        rgba(0,0,0,0.95)
    );

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 0 40px rgba(0,0,0,0.5);

    backdrop-filter:blur(12px);
}

.gold-text{
    color:#d4af37;
}

.heading-font{
    font-family:'Cinzel',serif;
}

.info-card{
    background:rgba(255,255,255,0.03);
    border:1px solid rgba(255,255,255,0.06);
    transition:.3s;
}

.info-card:hover{
    border-color:rgba(212,175,55,0.3);
    transform:translateY(-2px);
}

.status-box{
    animation:fadeUp .6s ease;
}

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

.glow{
    box-shadow:
    0 0 20px rgba(212,175,55,0.15);
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
            <a href="index">
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
                href="dashboard"
                class="flex items-center gap-4 h-[52px] px-5 rounded-2xl bg-[#D4AF37] text-black font-medium shadow-[0_0_30px_rgba(212,175,55,0.18)]">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h12M3.75 3h16.5v16.5H6A2.25 2.25 0 013.75 17.25V3z" />
                    </svg>

                    Dashboard

                </a>

                <a
                href="<?php echo $profile_approved == 'Approved'
                ? ($is_profile_complete ? 'dashboard_userprofile' : 'complete_profile')
                : 'javascript:void(0)'; ?>"

                class="group flex items-center justify-between h-[52px] px-5 rounded-2xl border border-white/5 transition duration-500

                <?php echo $profile_approved == 'Approved'
                ? 'bg-white/[0.03] hover:border-[#D4AF37]/20'
                : 'bg-white/[0.02] opacity-60 cursor-not-allowed'; ?>
                ">

                    <!-- LEFT -->

                    <div class="flex items-center gap-4">

                        <!-- ICON -->

                        <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-5 h-5 text-[#D4AF37]">

                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275" />

                        </svg>

                        <!-- TEXT -->

                        <span class="text-sm">

                            <?php echo $is_profile_complete ? 'My Profile' : 'Complete Profile'; ?>

                        </span>

                    </div>

                    <!-- LOCK -->

                    <?php if($profile_approved != 'Approved'){ ?>

                        <span
                        class="text-[9px] text-[#D4AF37] uppercase tracking-[2px]">

                            Locked

                        </span>

                    <?php } ?>

                </a>
                <!-- ITEM -->

                <a
                href="dashboard_trials"
                class="group flex items-center gap-4 h-[52px] px-5 rounded-2xl border border-white/5 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-[#D4AF37]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 18.75A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75M3 18.75v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>

                    Trials

                </a>

                <!-- ITEM -->

                <a
                href="dashboard_selectionstatus"
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
            href="logout"
            class="mt-5 flex items-center justify-center h-[46px] rounded-xl bg-[#D4AF37] text-black uppercase tracking-[2px] text-[10px] font-bold hover:scale-[1.02] transition duration-500">

                Logout

            </a>

        </div>

    </aside>

    <!-- =========================================
    MAIN CONTENT
    ========================================= -->

    <main class="flex-1 lg:ml-[280px]">

    <div class="min-h-screen py-10 px-4">

    <div class="max-w-6xl mx-auto">

        <!-- HERO SECTION -->

        <div class="main-box rounded-[35px] p-10 md:p-16 mb-10">

            <div class="inline-flex items-center gap-2 border border-yellow-600/20 rounded-full px-5 py-2 text-xs tracking-[4px] uppercase gold-text mb-8">

                <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>

                FSPL Selection Portal

            </div>

            <h1 class="heading-font text-5xl md:text-7xl leading-tight font-bold mb-6">

                YOUR SELECTION <br>

                <span class="gold-text">
                    STATUS
                </span>

            </h1>

            <p class="text-gray-400 text-lg max-w-2xl leading-8">

                Track your cricket trial application and check your official FSPL player selection status directly from your dashboard.

            </p>

        </div>

        <!-- PLAYER CARD -->

        <div class="grid lg:grid-cols-2 gap-8">

            <!-- LEFT -->

            <div class="main-box rounded-[30px] p-8">

                <div class="flex items-start justify-between mb-8">

                    <div>

                        <p class="uppercase text-[11px] tracking-[4px] text-yellow-500 mb-4">

                            Trial Application

                        </p>

                        <h2 class="heading-font text-4xl font-bold mb-3">

                            <?php echo htmlspecialchars($user['full_name']); ?>

                        </h2>

                        <p class="gold-text uppercase tracking-[3px] text-sm">

                            <?php echo htmlspecialchars($user['playing_role']); ?>

                        </p>

                    </div>

                    <div class="w-16 h-16 rounded-2xl border border-yellow-600/30 bg-yellow-500/10 flex items-center justify-center text-2xl glow">

                        🏏

                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-5">

                    <div class="info-card rounded-2xl p-5">

                        <p class="text-gray-500 uppercase text-[10px] tracking-[3px] mb-3">

                            Mobile Number

                        </p>

                        <h3 class="text-xl font-semibold">

                            <?php echo htmlspecialchars($user_phone); ?>

                        </h3>

                    </div>

                    <div class="info-card rounded-2xl p-5">

                        <p class="text-gray-500 uppercase text-[10px] tracking-[3px] mb-3">

                            Application Status

                        </p>

                        <h3 class="text-xl font-semibold gold-text">

                            <?php echo ucfirst(htmlspecialchars($player['application_status'])); ?>

                        </h3>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div
            class="status-box rounded-[30px] p-8 border glow"
            style="
            background: <?php echo $status_bg; ?>;
            border-color: <?php echo $status_border; ?>;
            ">

                <div class="text-6xl mb-6">

                    <?php echo $status_icon; ?>

                </div>

                <p class="uppercase text-[11px] tracking-[4px] text-gray-400 mb-4">

                    Selection Result

                </p>

                <h2
                class="heading-font text-4xl leading-tight font-bold mb-6"
                style="color: <?php echo $status_color; ?>;">

                    <?php echo $status; ?>

                </h2>

                <?php if($player): ?>

                    <p class="text-gray-300 leading-8 text-lg">

                        Your application has been successfully processed by the FSPL selection committee.

                    </p>

                <?php else: ?>

                    <p class="text-gray-400 leading-8 text-lg">

                        No registration record found for your account.

                    </p>

                <?php endif; ?>

                <div class="mt-10">

                    <a href="dashboard"
                    class="inline-flex items-center justify-center h-14 px-8 rounded-2xl bg-yellow-500 text-black font-semibold hover:scale-105 transition duration-300">

                        Back To Dashboard

                        </a>

                    </div>

                </div>

            </div>

        </div>

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





