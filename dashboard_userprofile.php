
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

$trial_sql = "

SELECT 
    trials.*

FROM trials_player

INNER JOIN trials
ON trials_player.trial_id = trials.id

WHERE trials_player.user_id='$user_id'

ORDER BY trials_player.id DESC

LIMIT 1

";

$trial_result = mysqli_query($conn,$trial_sql);

$trial_row = mysqli_fetch_assoc($trial_result);
$has_trial = $trial_row ? true : false;


$sql = "
SELECT *
FROM trial_registrations
WHERE user_id = '$user_id'
ORDER BY id DESC
LIMIT 1
";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    header('location:trial_registration.php');
    exit();
}

/* PROFILE COMPLETION */

$fields = [
    $row['profile_photo'],
    $row['aadhaar_card'],
    $row['address'],
    $row['phone'],
    $row['playing_role'],
    $row['batting_style'],
    $row['bowling_style'],
    $row['experience'],
    $row['achievements']
];

$filled = 0;

foreach($fields as $field){
    if(!empty($field)){
        $filled++;
    }
}

$profile_completion = round(($filled / count($fields)) * 100);
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
        
<section class="relative min-h-screen px-5 lg:px-8 py-10 lg:py-16 overflow-hidden">

    <!-- GLOW -->

    <div
    class="absolute top-[-250px] left-[-150px] w-[600px] h-[600px] bg-[#D4AF37]/10 blur-[180px] rounded-full">
    </div>

    <div
    class="absolute bottom-[-250px] right-[-150px] w-[600px] h-[600px] bg-[#D4AF37]/10 blur-[180px] rounded-full">
    </div>

    <div class="relative z-10 max-w-7xl mx-auto">

        <!-- HERO -->

        <div
        class="rounded-[32px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 lg:p-8 overflow-hidden relative">

            <div
            class="absolute top-[-120px] right-[-120px] w-[260px] h-[260px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
            </div>

            <div class="relative grid lg:grid-cols-[180px_1fr] gap-8 items-center">

                <!-- IMAGE -->

                <div class="flex justify-center lg:justify-start">

                    <?php if(!empty($row['profile_photo'])){ ?>

                        <img
                        src="uploads/profile/<?php echo $row['profile_photo']; ?>"
                        class="w-[170px] h-[170px] rounded-[30px] object-cover border border-[#D4AF37]/20">

                    <?php } else { ?>

                        <div
                        class="w-[170px] h-[170px] rounded-[30px] bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center text-6xl font-bold text-[#D4AF37]">

                            <?php echo strtoupper(substr($row['full_name'],0,1)); ?>

                        </div>

                    <?php } ?>

                </div>

                <!-- CONTENT -->

                <div>

                    <div
                    class="inline-flex items-center gap-2 border border-[#D4AF37]/15 bg-[#D4AF37]/10 px-4 py-2 rounded-full">

                        <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                        <span class="uppercase tracking-[3px] text-[9px] text-[#F5D76E]">
                            Elite FSPL Player
                        </span>

                    </div>

                    <h1
                    class="mt-6 font-['Cinzel'] text-4xl lg:text-6xl font-bold leading-[1] tracking-[-2px]">

                        <?php echo $row['full_name']; ?>

                    </h1>

                    <div class="flex flex-wrap items-center gap-3 mt-5">

                        <div class="px-4 py-2 rounded-full bg-white/[0.03] border border-white/10 text-sm text-white/70">
                            <?php echo $row['playing_role']; ?>
                        </div>

                        <div class="px-4 py-2 rounded-full bg-white/[0.03] border border-white/10 text-sm text-white/70">
                            <?php echo $row['city']; ?>, <?php echo $row['state']; ?>
                        </div>

                        <div class="px-4 py-2 rounded-full bg-[#D4AF37]/10 border border-[#D4AF37]/20 text-sm text-[#D4AF37] uppercase tracking-[2px]">
                            <?php echo $row['selection_status']; ?>
                        </div>

                    </div>

                    <!-- PROFILE COMPLETION -->

                    <div class="mt-8 max-w-[500px]">

                        <div class="flex items-center justify-between mb-3">

                            <p class="uppercase tracking-[2px] text-[10px] text-white/45">
                                Profile Completion
                            </p>

                            <span class="text-[#D4AF37] text-sm font-semibold">
                                <?php echo $profile_completion; ?>%
                            </span>

                        </div>

                        <div class="h-[10px] rounded-full bg-white/10 overflow-hidden">

                            <div
                            class="h-full bg-[#D4AF37] rounded-full"
                            style="width:<?php echo $profile_completion; ?>%">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- STATS -->

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mt-8">

            <div class="rounded-[24px] border border-white/10 bg-white/[0.03] p-5 backdrop-blur-3xl">

                <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                    Experience
                </p>

                <h3 class="mt-3 text-3xl font-bold text-[#D4AF37] font-['Cinzel']">
                    <?php echo $row['experience']; ?>+
                </h3>

                <p class="mt-2 text-white/40 text-xs">
                    Years
                </p>

            </div>

<div class="rounded-[24px] border border-white/10 bg-white/[0.03] p-5 backdrop-blur-3xl relative overflow-hidden">

    <!-- PAY NOW BUTTON -->

<?php if($row['payment_status'] != 'paid'){ ?>

<a
href="pay.php?id=<?php echo $row['id']; ?>"
class="absolute top-2 right-4 bg-red-500 hover:bg-red-600 transition px-4 py-2 rounded-full text-white text-[10px] uppercase tracking-[2px] font-semibold">

    Pay Now

</a>

<?php } ?>

    <!-- TITLE -->

    <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
        Payment Status
    </p>

    <!-- STATUS -->

    <h3 class="mt-3 text-3xl font-bold text-[#D4AF37] font-['Cinzel']">

        <?php echo ucfirst($row['payment_status']); ?>

    </h3>

</div>

            <div class="rounded-[24px] border border-white/10 bg-white/[0.03] p-5 backdrop-blur-3xl">

                <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                    Registration
                </p>

                <h3 class="mt-3 text-3xl font-bold text-[#D4AF37] font-['Cinzel']">
                    <?php echo $row['registration_status']; ?>
                </h3>

            </div>

            <div class="rounded-[24px] border border-white/10 bg-white/[0.03] p-5 backdrop-blur-3xl">

                <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                    Player ID
                </p>

                <h3 class="mt-3 text-xl font-bold text-[#D4AF37] font-['Cinzel']">
                    FSPL-<?php echo $row['user_id']; ?>
                </h3>

            </div>

        </div>

        <!-- MAIN GRID -->

        <div class="grid lg:grid-cols-3 gap-8 mt-8">

            <!-- LEFT -->

            <div class="lg:col-span-2 space-y-8">

                <!-- PERSONAL INFO -->

                <div class="rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 lg:p-8">

                    <div class="flex items-center justify-between gap-4 flex-wrap">

                        <div>

                            <p class="text-[#D4AF37] uppercase tracking-[3px] text-[8px]">
                                Personal Information
                            </p>

                            <h2 class="mt-2 font-['Cinzel'] text-3xl font-bold">
                                Basic Details
                            </h2>

                        </div>

                        <a
                        href="edit_profile.php"
                        class="h-[42px] px-5 rounded-full bg-[#D4AF37] flex items-center justify-center text-black uppercase tracking-[2px] text-[9px] font-bold">

                            Edit Profile

                        </a>

                    </div>

                    <div class="grid sm:grid-cols-2 gap-5 mt-8">

                        <div>
                            <p class="text-white/40 text-sm">Father Name</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['father_name']; ?></h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">Date Of Birth</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['dob']; ?></h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">Age</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['age']; ?> Years</h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">Gender</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['gender']; ?></h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">Email</p>
                            <h3 class="mt-2 text-lg font-medium break-all"><?php echo $row['email']; ?></h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">Phone</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['phone']; ?></h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">State</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['state']; ?></h3>
                        </div>

                        <div>
                            <p class="text-white/40 text-sm">District</p>
                            <h3 class="mt-2 text-lg font-medium"><?php echo $row['district']; ?></h3>
                        </div>

                    </div>

                    <div class="mt-8">

                        <p class="text-white/40 text-sm">Address</p>

                        <div class="mt-3 rounded-2xl border border-white/10 bg-black/20 p-5 text-white/70 leading-[30px]">
                            <?php echo $row['address']; ?>
                        </div>

                    </div>

                </div>

                <!-- CRICKET INFO -->

                <div class="rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 lg:p-8">

                    <p class="text-[#D4AF37] uppercase tracking-[3px] text-[8px]">
                        Cricket Information
                    </p>

                    <h2 class="mt-2 font-['Cinzel'] text-3xl font-bold">
                        Player Details
                    </h2>

                    <div class="grid sm:grid-cols-2 gap-5 mt-8">

                        <div class="rounded-2xl border border-white/10 bg-black/20 p-5">

                            <p class="text-white/40 text-sm">
                                Playing Role
                            </p>

                            <h3 class="mt-3 text-xl font-semibold text-[#D4AF37]">
                                <?php echo $row['playing_role']; ?>
                            </h3>

                        </div>

                        <div class="rounded-2xl border border-white/10 bg-black/20 p-5">

                            <p class="text-white/40 text-sm">
                                Batting Style
                            </p>

                            <h3 class="mt-3 text-xl font-semibold text-[#D4AF37]">
                                <?php echo $row['batting_style']; ?>
                            </h3>

                        </div>

                        <div class="rounded-2xl border border-white/10 bg-black/20 p-5">

                            <p class="text-white/40 text-sm">
                                Bowling Style
                            </p>

                            <h3 class="mt-3 text-xl font-semibold text-[#D4AF37]">
                                <?php echo $row['bowling_style']; ?>
                            </h3>

                        </div>

                        <div class="rounded-2xl border border-white/10 bg-black/20 p-5">

                            <p class="text-white/40 text-sm">
                                Experience
                            </p>

                            <h3 class="mt-3 text-xl font-semibold text-[#D4AF37]">
                                <?php echo $row['experience']; ?> Years
                            </h3>

                        </div>

                    </div>

                    <div class="mt-8">

                        <p class="text-white/40 text-sm">
                            Achievements
                        </p>

                        <div class="mt-4 rounded-2xl border border-white/10 bg-black/20 p-5 text-white/70 leading-[32px]">
                            <?php echo $row['achievements']; ?>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="space-y-8">

                <!-- TRIAL INFO -->

                <div class="rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6">

                    <p class="text-[#D4AF37] uppercase tracking-[3px] text-[8px]">
                        Trial Information
                    </p>

                    <h2 class="mt-2 font-['Cinzel'] text-2xl font-bold">
                        Current Trial
                    </h2>

                    <div class="space-y-5 mt-8">

                    <?php if($has_trial){ ?>

<div>
    <p class="text-white/40 text-sm">Trial Name</p>

    <h3 class="mt-2 text-lg font-medium">
        <?php echo $trial_row['trial_title']; ?>
    </h3>
</div>

<div>
    <p class="text-white/40 text-sm">Venue</p>

    <h3 class="mt-2 text-lg font-medium">
        <?php echo $trial_row['ground_name']; ?>
    </h3>
</div>

<div>
    <p class="text-white/40 text-sm">Trial Date</p>

    <h3 class="mt-2 text-lg font-medium">
        <?php echo $trial_row['trial_date']; ?>
    </h3>
</div>

<div>
    <p class="text-white/40 text-sm">Fee</p>

    <h3 class="mt-2 text-lg font-medium text-[#D4AF37]">
        ₹<?php echo $trial_row['entry_fee']; ?>
    </h3>
</div>

<?php }else{ ?>

<div class="rounded-2xl border border-dashed border-[#D4AF37]/20 bg-[#D4AF37]/5 p-6 text-center">

    <h3 class="text-xl font-bold text-[#D4AF37]">
        No Trial Registered
    </h3>

    <p class="mt-3 text-white/50">
        You have not joined any trial yet.
    </p>

    <a
    href="trials.php"
    class="mt-5 inline-flex items-center justify-center h-[46px] px-6 rounded-xl bg-[#D4AF37] text-black uppercase tracking-[2px] text-[10px] font-bold">

        Register Now

    </a>

</div>

<?php } ?>

                    </div>

                </div>

                <!-- DOCUMENTS -->

                <div class="rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6">

                    <p class="text-[#D4AF37] uppercase tracking-[3px] text-[8px]">
                        Documents
                    </p>

                    <h2 class="mt-2 font-['Cinzel'] text-2xl font-bold">
                        Verification
                    </h2>

                    <div class="space-y-4 mt-8">

                        <div class="rounded-2xl border border-white/10 bg-black/20 p-5 flex items-center justify-between gap-4">

                            <div>

                                <p class="text-white font-medium">
                                    Aadhaar Card
                                </p>

                                <span class="text-white/40 text-sm">
                                    Government Verification
                                </span>

                            </div>

                            <?php if(!empty($row['aadhaar_card'])){ ?>

                                <span class="text-green-400 text-sm font-medium">
                                    Uploaded
                                </span>

                            <?php } else { ?>

                                <span class="text-red-400 text-sm font-medium">
                                    Missing
                                </span>

                            <?php } ?>

                        </div>

                        <div class="rounded-2xl border border-white/10 bg-black/20 p-5 flex items-center justify-between gap-4">

                            <div>

                                <p class="text-white font-medium">
                                    Profile Photo
                                </p>

                                <span class="text-white/40 text-sm">
                                    Player Identity
                                </span>

                            </div>

                            <?php if(!empty($row['profile_photo'])){ ?>

                                <span class="text-green-400 text-sm font-medium">
                                    Uploaded
                                </span>

                            <?php } else { ?>

                                <span class="text-red-400 text-sm font-medium">
                                    Missing
                                </span>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

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

