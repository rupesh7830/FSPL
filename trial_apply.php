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

$trial_id = $_GET['id'];

/*
=========================================
USER DATA
=========================================
*/

$user_query = mysqli_query($conn,"
SELECT full_name,mobile,email
FROM users
WHERE id='$user_id'
");

$user_data = mysqli_fetch_assoc($user_query);

/*
=========================================
TRIAL DATA
=========================================
*/

$trial_query = mysqli_query($conn,"
SELECT *
FROM trials
WHERE id='$trial_id'
");

$trial = mysqli_fetch_assoc($trial_query);

/*
=========================================
FORM SUBMIT
=========================================
*/

if(isset($_POST['apply_trial'])){

    $trial_id = $_POST['trial_id'];

    $full_name = $_POST['full_name'];

    $phone = $_POST['phone'];

    $email = $_POST['email'];

    $playing_role = $_POST['playing_role'];

    /*
    =========================================
    CHECK ALREADY APPLIED
    =========================================
    */

    $check = mysqli_query($conn,"
    SELECT *
    FROM trials_player
    WHERE trial_id='$trial_id'
    AND user_id='$user_id'
    ");

    if(mysqli_num_rows($check) > 0){

        echo "<script>alert('You already applied for this trial');</script>";

    }else{

        /*
        =========================================
        INSERT
        =========================================
        */

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

        /*
        =========================================
        UPDATE PLAYERS
        =========================================
        */

        mysqli_query($conn,"
        UPDATE trials
        SET registered_players = registered_players + 1
        WHERE id='$trial_id'
        ");

        header("location:pay.php");

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Apply Trial - FSPL</title>

<!-- TAILWIND -->

<script src="https://cdn.tailwindcss.com"></script>

<!-- GOOGLE FONTS -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800&family=Outfit:wght@200;300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

body{
    font-family:'Outfit',sans-serif;
    background:#050505;
}

</style>

</head>

<body class="bg-[#050505] overflow-x-hidden text-white">

<!-- MAIN -->

<div class="min-h-screen flex items-center justify-center px-4 py-10">

    <!-- CARD -->

    <div
    class="relative w-full max-w-5xl overflow-hidden rounded-[36px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl">

        <!-- GLOW -->

        <div
        class="absolute top-[-120px] right-[-120px] w-[260px] h-[260px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
        </div>

        <!-- GRID -->

        <div class="relative grid lg:grid-cols-[340px_1fr]">

            <!-- LEFT -->

            <div
            class="relative border-b lg:border-b-0 lg:border-r border-white/10 bg-gradient-to-br from-[#D4AF37]/10 via-transparent to-transparent p-6 lg:p-7">

                <!-- BADGE -->

                <div
                class="inline-flex items-center gap-2 border border-[#D4AF37]/20 bg-[#D4AF37]/10 px-4 py-2 rounded-full">

                    <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

                    <span
                    class="uppercase tracking-[3px] text-[8px] text-[#D4AF37]">

                        Trial Registration

                    </span>

                </div>

                <!-- TITLE -->

                <h1
                class="mt-7 font-['Cinzel']
                text-3xl lg:text-5xl
                leading-[1]
                font-bold">

                    Apply For

                    <span class="block text-[#D4AF37] mt-3">

                        <?php echo $trial['trial_title']; ?>

                    </span>

                </h1>

                <!-- LOCATION -->

                <div
                class="mt-6 flex items-center gap-2 text-white/45 text-sm flex-wrap">

                    <span>
                        <?php echo $trial['city']; ?>
                    </span>

                    <span class="w-1 h-1 rounded-full bg-white/20"></span>

                    <span>
                        <?php echo $trial['state']; ?>
                    </span>

                </div>

                <!-- DETAILS -->

                <div class="space-y-4 mt-8">

                    <!-- ROW -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/35 uppercase tracking-[2px] text-[8px]">

                            Ground

                        </span>

                        <span class="text-sm font-medium text-right">

                            <?php echo $trial['ground_name']; ?>

                        </span>

                    </div>

                    <!-- ROW -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/35 uppercase tracking-[2px] text-[8px]">

                            Trial Date

                        </span>

                        <span class="text-sm font-medium">

                            <?php echo date('d M Y',strtotime($trial['trial_date'])); ?>

                        </span>

                    </div>

                    <!-- ROW -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/35 uppercase tracking-[2px] text-[8px]">

                            Trial Time

                        </span>

                        <span class="text-sm font-medium">

                            <?php echo $trial['trial_time']; ?>

                        </span>

                    </div>

                    <!-- ROW -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/35 uppercase tracking-[2px] text-[8px]">

                            Entry Fee

                        </span>

                        <span
                        class="text-[#D4AF37] text-lg font-semibold">

                            ₹<?php echo $trial['entry_fee']; ?>

                        </span>

                    </div>

                    <!-- ROW -->

                    <div
                    class="flex items-center justify-between">

                        <span
                        class="text-white/35 uppercase tracking-[2px] text-[8px]">

                            Age Group

                        </span>

                        <span class="text-sm font-medium">

                            <?php echo $trial['age_group']; ?>

                        </span>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="p-6 lg:p-7">

                <!-- HEADER -->

                <div>

                    <span
                    class="uppercase tracking-[3px] text-[8px] text-[#D4AF37]">

                        Player Information

                    </span>

                    <h2
                    class="mt-3 font-['Cinzel']
                    text-2xl lg:text-4xl
                    font-bold">

                        Complete Your

                        <span class="block text-[#D4AF37] mt-2">
                            Application
                        </span>

                    </h2>

                </div>

                <!-- FORM -->

                <form method="POST" class="mt-8 space-y-4">

                    <!-- HIDDEN -->

                    <input
                    type="hidden"
                    name="trial_id"
                    value="<?php echo $trial['id']; ?>">

                    <!-- NAME -->

                    <div>

                        <label
                        class="block text-white/40 uppercase tracking-[2px] text-[8px] mb-3">

                            Full Name

                        </label>

                        <input
                        type="text"
                        name="full_name"
                        required
                        value="<?php echo $user_data['full_name']; ?>"
                        class="w-full h-[50px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

                    </div>

                    <!-- PHONE -->

                    <div>

                        <label
                        class="block text-white/40 uppercase tracking-[2px] text-[8px] mb-3">

                            Mobile Number

                        </label>

                        <input
                        type="text"
                        name="phone"
                        required
                        value="<?php echo $user_data['mobile']; ?>"
                        class="w-full h-[50px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

                    </div>

                    <!-- EMAIL -->

                    <div>

                        <label
                        class="block text-white/40 uppercase tracking-[2px] text-[8px] mb-3">

                            Email Address

                        </label>

                        <input
                        type="email"
                        name="email"
                        required
                        value="<?php echo $user_data['email']; ?>"
                        class="w-full h-[50px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

                    </div>

                    <!-- ROLE -->

                    <div>

                        <label
                        class="block text-white/40 uppercase tracking-[2px] text-[8px] mb-3">

                            Playing Role

                        </label>

                        <select
                        name="playing_role"
                        required
                        class="w-full h-[50px] rounded-2xl border border-white/10 bg-[#111111] text-white px-5 text-sm outline-none focus:border-[#D4AF37]/30 transition duration-300">

                            <option value="">
                                Select Role
                            </option>

                            <option value="Batsman">
                                Batsman
                            </option>

                            <option value="Bowler">
                                Bowler
                            </option>

                            <option value="All-Rounder">
                                All-Rounder
                            </option>

                            <option value="Wicket Keeper">
                                Wicket Keeper
                            </option>

                        </select>

                    </div>

                    <!-- BUTTONS -->

                    <div class="grid sm:grid-cols-2 gap-3 pt-3">

                        <a
                        href="dashboard_trials.php"
                        class="flex items-center justify-center h-[50px] rounded-2xl border border-white/10 bg-white/[0.03] uppercase tracking-[2px] text-[9px] font-bold hover:border-[#D4AF37]/20 transition duration-300">

                            Cancel

                        </a>

                        <button
                        type="submit"
                        name="apply_trial"
                        class="group relative overflow-hidden h-[50px] rounded-2xl bg-[#D4AF37] shadow-[0_0_30px_rgba(212,175,55,0.18)] hover:scale-[1.02] transition duration-500">

                            <div
                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000">
                            </div>

                            <span
                            class="relative uppercase tracking-[2px] text-[9px] font-bold text-black">

                                Submit Application

                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>