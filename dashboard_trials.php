
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





$sql = "SELECT

trials_player.id AS registration_id,
trials_player.full_name,
trials_player.mobile,
trials_player.email,
trials_player.playing_role,
trials_player.application_status,
trials_player.payment_status,
trials_player.created_at,

trials.id,
trials.trial_title,
trials.trial_date,
trials.trial_time,
trials.state,
trials.city,
trials.ground_name,
trials.address,
trials.entry_fee,
trials.last_date,
trials.age_group,
trials.category,
trials.total_slots,
trials.registered_players,
trials.description,
trials.status

FROM trials_player

INNER JOIN trials
ON trials_player.trial_id = trials.id

WHERE trials_player.user_id = '$user_id'

ORDER BY trials_player.id DESC";

$result = mysqli_query($conn, $sql);
?>

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

            <!-- MENU -->

            <div class="mt-10 space-y-2">

                <!-- ITEM -->

                <a
                href="dashboard.php"
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
        <!-- TRIALS GRID -->

<div class="grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-3 gap-6 mt-14 mx-4 lg:mt-4">

<?php

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

    <!-- CARD -->

    <div
    class="group rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl overflow-hidden hover:border-[#D4AF37]/30 hover:-translate-y-1 transition duration-500">

        <!-- TOP -->

        <div
        class="relative p-5 border-b border-white/10 bg-gradient-to-br from-[#D4AF37]/10 via-transparent to-transparent">

            <!-- CATEGORY -->

            <div class="flex items-center justify-between gap-4">

                <div
                class="inline-flex items-center h-[32px] px-4 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37]/20">

                    <span
                    class="uppercase tracking-[2px] text-[9px] text-[#D4AF37] font-semibold">

                        <?php echo $row['category']; ?>

                    </span>

                </div>

                <!-- DATE -->

                <div
                class="w-[58px] h-[58px] rounded-[18px] bg-black/30 border border-white/10 backdrop-blur-xl flex flex-col items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel'] text-[#D4AF37] text-xl font-bold leading-none">

                        <?php echo date('d', strtotime($row['trial_date'])); ?>

                    </span>

                    <span
                    class="text-[8px] uppercase tracking-[2px] text-white/40 mt-1">

                        <?php echo date('M', strtotime($row['trial_date'])); ?>

                    </span>

                </div>

            </div>

            <!-- TITLE -->

            <h2
            class="mt-5 font-['Cinzel'] text-[24px] leading-[1.2] font-bold">

                <?php echo $row['trial_title']; ?>

            </h2>

            <!-- LOCATION -->

            <div
            class="mt-3 flex items-center gap-2 text-white/45 text-sm flex-wrap">

                <span>
                    <?php echo $row['city']; ?>
                </span>

                <span class="w-1 h-1 rounded-full bg-white/20"></span>

                <span>
                    <?php echo $row['state']; ?>
                </span>

            </div>

        </div>

        <!-- BODY -->

        <div class="p-5">

            <!-- INFO -->

            <div class="space-y-4">

                <!-- ROW -->

                <div
                class="flex items-center justify-between gap-3 pb-3 border-b border-white/5">

                    <span
                    class="text-white/40 uppercase tracking-[2px] text-[9px]">

                        Venue

                    </span>

                    <span class="text-sm text-right font-medium">

                        <?php echo $row['ground_name']; ?>

                    </span>

                </div>

                <!-- ROW -->

                <div
                class="flex items-center justify-between gap-3 pb-3 border-b border-white/5">

                    <span
                    class="text-white/40 uppercase tracking-[2px] text-[9px]">

                        Trial Time

                    </span>

                    <span class="text-sm font-medium">

                        <?php echo $row['trial_time']; ?>

                    </span>

                </div>

                <!-- ROW -->

                <div
                class="flex items-center justify-between gap-3 pb-3 border-b border-white/5">

                    <span
                    class="text-white/40 uppercase tracking-[2px] text-[9px]">

                        Age Group

                    </span>

                    <span class="text-sm font-medium">

                        <?php echo $row['age_group']; ?>

                    </span>

                </div>

                <!-- ROW -->

                <div
                class="flex items-center justify-between gap-3">

                    <span
                    class="text-white/40 uppercase tracking-[2px] text-[9px]">

                        Entry Fee

                    </span>

                    <span class="text-[#D4AF37] font-semibold text-lg">

                        ₹<?php echo $row['entry_fee']; ?>

                    </span>

                </div>

            </div>

            <!-- STATUS -->

            <div class="flex flex-wrap gap-3 mt-6">

                <!-- PAYMENT -->

                <div
                class="h-[38px] px-4 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center gap-2">

                    <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

                    <span
                    class="uppercase tracking-[2px] text-[9px] text-[#D4AF37] font-semibold">

                        <?php echo $row['payment_status']; ?>

                    </span>

                </div>

                <!-- APPLICATION -->

                <div
                class="h-[38px] px-4 rounded-full bg-green-500/10 border border-green-500/20 flex items-center gap-2">

                    <span class="w-2 h-2 rounded-full bg-green-400"></span>

                    <span
                    class="uppercase tracking-[2px] text-[9px] text-green-400 font-semibold">

                        <?php echo $row['application_status']; ?>

                    </span>

                </div>

            </div>

            <!-- BUTTONS -->

            <div class="grid grid-cols-2 gap-3 mt-7">

                <?php if(strtolower($row['payment_status']) == 'paid'){ ?>

                    <a
                    href="selection_status.php?id=<?php echo $row['registration_id']; ?>"
                    class="flex items-center justify-center h-[48px] rounded-xl bg-green-500 text-black uppercase tracking-[2px] text-[10px] font-bold hover:scale-[1.02] transition duration-300">

                        Status

                    </a>

                <?php } else { ?>

                    <a
                    href="pay.php?id=<?php echo $row['registration_id']; ?>"
                    class="flex items-center justify-center h-[48px] rounded-xl bg-[#D4AF37] text-black uppercase tracking-[2px] text-[10px] font-bold hover:scale-[1.02] transition duration-300">

                        Pay Now

                    </a>

                <?php } ?>

                <a
                href="trial_details.php?id=<?php echo $row['id']; ?>"
                class="flex items-center justify-center h-[48px] rounded-xl border border-white/10 bg-white/[0.03] uppercase tracking-[2px] text-[10px] font-bold hover:border-[#D4AF37]/20 transition duration-300">

                    Details

                </a>

            </div>

        </div>

    </div>

<?php

    }

}else{

?>

<!-- EMPTY STATE -->

<div class="col-span-3 text-center py-24">

    <h2
    class="font-['Cinzel'] text-4xl lg:text-5xl font-bold">

        No Trials Applied

    </h2>

    <p class="mt-5 text-white/40 text-lg">

        You haven't applied for any cricket trials yet.

    </p>

    <a
    href="trials.php"
    class="inline-flex items-center justify-center h-[54px] px-8 rounded-2xl bg-[#D4AF37] text-black uppercase tracking-[3px] text-[10px] font-bold mt-10 hover:scale-[1.03] transition duration-300">

        Explore Trials

    </a>

</div>

<?php } ?>

</div>

<!-- =========================================
UPCOMING TRIALS
========================================= -->

<section class="mt-24 mx-16">

    <!-- SECTION HEADER -->

    <div class="flex items-end justify-between gap-6 flex-wrap">

        <div>

            <div
            class="inline-flex items-center gap-2 border border-[#D4AF37]/15 bg-white/[0.03] px-5 py-3 rounded-full">

                <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

                <span
                class="uppercase tracking-[3px] text-[10px] text-[#F5D76E]">

                    Upcoming Trials

                </span>

            </div>

            <h2
            class="mt-6 font-['Cinzel']
            text-3xl lg:text-5xl
            leading-[1]
            font-bold">

                Explore New

                <span class="block text-[#D4AF37] mt-2">
                    Opportunities
                </span>

            </h2>

        </div>

        <!-- BUTTON -->

        <a
        href="trials.php"
        class="hidden md:flex items-center justify-center h-[52px] px-8 rounded-2xl border border-white/10 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-300 uppercase tracking-[3px] text-[10px] font-bold">

            View All Trials

        </a>

    </div>

    <?php

    /*
    =========================================
    UPCOMING TRIALS QUERY
    =========================================
    */

    $upcoming_query = mysqli_query($conn, "

    SELECT *
    
    FROM trials
    
    WHERE status = 'Open'
    
    ORDER BY trial_date ASC
    
    LIMIT 6
    
    ");
    ?>

    <!-- GRID -->

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6 mt-14">

    <?php

    if(mysqli_num_rows($upcoming_query) > 0){

        while($trial = mysqli_fetch_assoc($upcoming_query)){

    ?>

<!-- CARD -->

<div
class="group rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl hover:border-[#D4AF37]/20 transition duration-300 overflow-hidden">

    <!-- TOP -->

    <div
    class="flex items-start justify-between gap-4 p-5 border-b border-white/5">

        <div>

            <!-- CATEGORY -->

            <div
            class="inline-flex items-center h-[28px] px-3 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37]/20">

                <span
                class="uppercase tracking-[2px] text-[8px] text-[#D4AF37] font-semibold">

                    <?php echo $trial['category']; ?>

                </span>

            </div>

            <!-- TITLE -->

            <h2
            class="mt-4 font-['Cinzel'] text-[20px] leading-[1.2] font-bold">

                <?php echo $trial['trial_title']; ?>

            </h2>

            <!-- LOCATION -->

            <div
            class="mt-2 flex items-center gap-2 text-white/45 text-xs">

                <span>
                    <?php echo $trial['city']; ?>
                </span>

                <span class="w-1 h-1 rounded-full bg-white/20"></span>

                <span>
                    <?php echo $trial['state']; ?>
                </span>

            </div>

        </div>

        <!-- DATE -->

        <div
        class="w-[54px] h-[54px] rounded-[16px] bg-black/30 border border-white/10 flex flex-col items-center justify-center shrink-0">

            <span
            class="font-['Cinzel'] text-[#D4AF37] text-lg font-bold leading-none">

                <?php echo date('d', strtotime($trial['trial_date'])); ?>

            </span>

            <span
            class="text-[7px] uppercase tracking-[2px] text-white/40 mt-1">

                <?php echo date('M', strtotime($trial['trial_date'])); ?>

            </span>

        </div>

    </div>

    <!-- BODY -->

    <div class="p-5">

        <!-- INFO -->

        <div class="space-y-3">

            <!-- ROW -->

            <div class="flex items-center justify-between gap-3">

                <span
                class="text-white/35 uppercase tracking-[2px] text-[8px]">

                    Venue

                </span>

                <span class="text-xs font-medium text-right">

                    <?php echo $trial['ground_name']; ?>

                </span>

            </div>

            <!-- ROW -->

            <div class="flex items-center justify-between gap-3">

                <span
                class="text-white/35 uppercase tracking-[2px] text-[8px]">

                    Time

                </span>

                <span class="text-xs font-medium">

                    <?php echo $trial['trial_time']; ?>

                </span>

            </div>

            <!-- ROW -->

            <div class="flex items-center justify-between gap-3">

                <span
                class="text-white/35 uppercase tracking-[2px] text-[8px]">

                    Fee

                </span>

                <span class="text-[#D4AF37] font-semibold text-sm">

                    ₹<?php echo $trial['entry_fee']; ?>

                </span>

            </div>

        </div>

        <!-- FOOTER -->

        <div
        class="flex items-center justify-between gap-3 mt-6">

            <!-- SLOT -->

            <div
            class="h-[34px] px-3 rounded-full bg-white/[0.03] border border-white/10 flex items-center">

                <span
                class="text-[8px] uppercase tracking-[2px] text-white/45">

                    <?php echo $trial['registered_players']; ?>

                    /

                    <?php echo $trial['total_slots']; ?>

                    Slots

                </span>

            </div>

            <!-- BUTTON -->

            <a
            href="trial_apply.php?id=<?php echo $trial['id']; ?>"
            class="h-[40px] px-5 rounded-xl bg-[#D4AF37] text-black flex items-center justify-center uppercase tracking-[2px] text-[9px] font-bold hover:scale-[1.02] transition duration-300">

                Apply

            </a>

        </div>

    </div>

</div>

    <?php } } ?>

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




