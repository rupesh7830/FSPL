<?php
session_start();
include "admin/config/db_connect.php";

/* =========================================
CHECK LOGIN
========================================= */

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

/* =========================================
CHECK TRIAL ID
========================================= */

if(!isset($_GET['trial_id'])){
    header("Location: index.php");
    exit();
}

$user_id  = intval($_SESSION['user_id']);
$trial_id = intval($_GET['trial_id']);

/* =========================================
FETCH USER
========================================= */

$user_stmt = $conn->prepare("
SELECT * FROM trial_registrations WHERE id = ?
");

$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();

$user_result = $user_stmt->get_result();

if($user_result->num_rows === 0){
    die("User not found");
}

$user = $user_result->fetch_assoc();

/* =========================================
FETCH TRIAL
========================================= */

$trial_stmt = $conn->prepare("
SELECT * FROM trials WHERE id = ? LIMIT 1
");

$trial_stmt->bind_param("i", $trial_id);
$trial_stmt->execute();

$trial_result = $trial_stmt->get_result();

if($trial_result->num_rows === 0){
    die("Trial not found");
}

$trial = $trial_result->fetch_assoc();

/* =========================================
CHECK ALREADY APPLIED
========================================= */

$check_stmt = $conn->prepare("
SELECT id FROM trial_registrations
WHERE trial_id = ?
AND user_id = ?
");

$check_stmt->bind_param("ii", $trial_id, $user_id);
$check_stmt->execute();

$already_applied = $check_stmt->get_result()->num_rows > 0;

/* =========================================
FORM SUBMIT
========================================= */

$success = false;
$error   = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($already_applied){

        $error = "You already applied for this trial.";

    }else{

        $playing_role = trim($_POST['playing_role']);

        $insert = $conn->prepare("
        INSERT INTO trial_registrations
        (
            trial_id,
            user_id,
            full_name,
            mobile,
            email,
            playing_role,
            application_status,
            payment_status,
            created_at
        )
        VALUES
        (
            ?, ?, ?, ?, ?, ?, 'Pending', 'Pending', NOW()
        )
        ");

        $insert->bind_param(
            "iissss",
            $trial_id,
            $user_id,
            $user['name'],
            $user['mobile'],
            $user['email'],
            $playing_role
        );

        if($insert->execute()){

            $success = true;

        }else{

            $error = "Something went wrong.";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FSPL Trial Registration</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#050505;
    font-family:'Outfit',sans-serif;
    overflow-x:hidden;
}

/* SCROLLBAR */

::-webkit-scrollbar{
    width:6px;
}

::-webkit-scrollbar-thumb{
    background:#D4AF37;
}

/* INPUT */

.input{

    width:100%;
    height:62px;

    border-radius:22px;

    border:1px solid rgba(212,175,55,0.08);

    background:rgba(255,255,255,0.03);

    backdrop-filter:blur(20px);

    padding:0 22px;

    color:white;

    outline:none;

    transition:.3s;
}

.input:focus{

    border-color:rgba(212,175,55,0.4);

    box-shadow:0 0 0 4px rgba(212,175,55,0.05);
}

.label{

    display:block;

    margin-bottom:14px;

    color:#F5D76E;

    font-size:10px;

    letter-spacing:3px;

    text-transform:uppercase;
}

</style>

</head>
<body>

<section class="relative min-h-screen overflow-hidden py-14 lg:py-20 px-5">

    <!-- BG -->

    <div class="absolute inset-0">

        <img
        src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1800&auto=format&fit=crop"
        class="w-full h-full object-cover opacity-[0.10]">

        <div class="absolute inset-0 bg-black/85"></div>

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.10),transparent_45%)]"></div>

    </div>

    <!-- GOLD GLOW -->

    <div class="absolute top-[-250px] left-1/2 -translate-x-1/2 w-[750px] h-[750px] bg-[#D4AF37]/10 blur-[170px] rounded-full"></div>

    <!-- MAIN -->

    <div class="relative z-10 max-w-7xl mx-auto">

        <!-- TOP -->

        <div class="text-center">

            <span class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl px-6 py-3 rounded-full">

                <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                <span class="uppercase tracking-[4px] text-[11px] text-[#F5D76E]">
                    FSPL Elite Registration
                </span>

            </span>

            <h1 class="mt-8 font-['Cinzel'] text-white text-5xl lg:text-7xl font-bold leading-[0.95]">

                Trial

                <span class="block text-[#D4AF37]">
                    Registration
                </span>

            </h1>

        </div>

        <!-- GRID -->

        <div class="grid lg:grid-cols-[1.1fr_.9fr] gap-8 mt-16">

            <!-- LEFT -->

            <div class="relative overflow-hidden rounded-[40px] border border-[#D4AF37]/10 bg-white/[0.03] backdrop-blur-2xl">

                <!-- IMAGE -->

                <div class="relative h-[320px] overflow-hidden">

                    <img
                    src="https://images.unsplash.com/photo-1624526267942-ab0ff8a3e972?q=80&w=1600&auto=format&fit=crop"
                    class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>

                    <!-- LIVE -->

                    <div class="absolute top-6 left-6">

                        <span class="inline-flex items-center gap-3 px-5 py-3 rounded-full border border-red-500/20 bg-black/40 backdrop-blur-xl">

                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>

                            <span class="uppercase tracking-[3px] text-[10px] text-white/80">
                                Live Trial Registration
                            </span>

                        </span>

                    </div>

                    <!-- TITLE -->

                    <div class="absolute bottom-8 left-8">

                        <h2 class="font-['Cinzel'] text-white text-4xl lg:text-5xl font-bold leading-[1]">

                            <?php echo htmlspecialchars($trial['trial_title']); ?>

                        </h2>

                    </div>

                </div>

                <!-- DETAILS -->

                <div class="p-8 lg:p-10">

                    <div class="grid sm:grid-cols-2 gap-6">

                        <!-- CARD -->

                        <div class="rounded-[26px] border border-[#D4AF37]/10 bg-black/30 p-6">

                            <span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
                                Trial Date
                            </span>

                            <h3 class="mt-4 text-white text-2xl font-semibold">
                                <?php echo htmlspecialchars($trial['trial_date']); ?>
                            </h3>

                        </div>

                        <!-- CARD -->

                        <div class="rounded-[26px] border border-[#D4AF37]/10 bg-black/30 p-6">

                            <span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
                                Entry Fee
                            </span>

                            <h3 class="mt-4 text-[#F5D76E] text-3xl font-bold">
                                ₹<?php echo htmlspecialchars($trial['entry_fee']); ?>
                            </h3>

                        </div>

                        <!-- CARD -->

                        <div class="rounded-[26px] border border-[#D4AF37]/10 bg-black/30 p-6">

                            <span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
                                Venue
                            </span>

                            <h3 class="mt-4 text-white text-xl leading-[1.5]">
                                <?php echo htmlspecialchars($trial['ground_name']); ?>
                            </h3>

                        </div>

                        <!-- CARD -->

                        <div class="rounded-[26px] border border-[#D4AF37]/10 bg-black/30 p-6">

                            <span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
                                Location
                            </span>

                            <h3 class="mt-4 text-white text-xl">
                                <?php echo htmlspecialchars($trial['city']); ?>,
                                <?php echo htmlspecialchars($trial['state']); ?>
                            </h3>

                        </div>

                    </div>

                    <!-- DESCRIPTION -->

                    <div class="mt-8 rounded-[30px] border border-[#D4AF37]/10 bg-black/30 p-7">

                        <span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
                            About Trial
                        </span>

                        <p class="mt-5 text-white/60 leading-[34px]">

                            <?php echo htmlspecialchars($trial['description']); ?>

                        </p>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="relative overflow-hidden rounded-[40px] border border-[#D4AF37]/10 bg-white/[0.03] backdrop-blur-2xl p-8 lg:p-10">

                <div class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_40%)]"></div>

                <div class="relative z-10">

                    <!-- PROFILE -->

                    <div class="flex items-center gap-5 pb-8 border-b border-[#D4AF37]/10">

                        <!-- IMAGE -->

                        <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-[#D4AF37]/20">

                            <img
                            src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&background=000000&color=D4AF37&size=200"
                            class="w-full h-full object-cover">

                        </div>

                        <!-- INFO -->

                        <div>

                            <h2 class="font-['Cinzel'] text-white text-2xl font-bold">

                                <?php echo htmlspecialchars($user['name']); ?>

                            </h2>

                            <p class="mt-2 text-[#F5D76E] uppercase tracking-[3px] text-[10px]">

                                Verified FSPL Player

                            </p>

                        </div>

                    </div>

                    <!-- ALERT -->

                    <?php if($success): ?>

                        <div class="mt-8 rounded-[24px] border border-green-500/20 bg-green-500/10 p-5">

                            <p class="text-green-300 leading-[30px]">

                                Your registration has been submitted successfully.

                            </p>

                        </div>

                    <?php endif; ?>

                    <?php if(!empty($error)): ?>

                        <div class="mt-8 rounded-[24px] border border-red-500/20 bg-red-500/10 p-5">

                            <p class="text-red-300 leading-[30px]">

                                <?php echo $error; ?>

                            </p>

                        </div>

                    <?php endif; ?>

                    <!-- FORM -->

                    <form method="POST" class="mt-10 space-y-7">

                        <!-- NAME -->

                        <div>

                            <label class="label">
                                Full Name
                            </label>

                            <input
                            type="text"
                            class="input"
                            value="<?php echo htmlspecialchars($user['name']); ?>"
                            readonly>

                        </div>

                        <!-- MOBILE -->

                        <div>

                            <label class="label">
                                Mobile Number
                            </label>

                            <input
                            type="text"
                            class="input"
                            value="<?php echo htmlspecialchars($user['mobile']); ?>"
                            readonly>

                        </div>

                        <!-- EMAIL -->

                        <div>

                            <label class="label">
                                Email Address
                            </label>

                            <input
                            type="email"
                            class="input"
                            value="<?php echo htmlspecialchars($user['email']); ?>"
                            readonly>

                        </div>

                        <!-- ROLE -->

                        <div>

                            <label class="label">
                                Playing Role
                            </label>

                            <select
                            name="playing_role"
                            required
                            class="input">

                                <option value="">
                                    Select Playing Role
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

                        <!-- BUTTON -->

                        <?php if($already_applied): ?>

                            <button
                            type="button"
                            class="w-full h-[64px] rounded-full bg-white/10 text-white/50 uppercase tracking-[4px] text-[11px] font-bold cursor-not-allowed">

                                Already Applied

                            </button>

                        <?php else: ?>

                            <button
                            type="submit"
                            class="group relative overflow-hidden w-full h-[64px] rounded-full bg-[#D4AF37] text-black uppercase tracking-[4px] text-[11px] font-bold transition duration-500 hover:scale-[1.02]">

                                <span class="relative z-10">

                                    Apply For Trial

                                </span>

                            </button>

                        <?php endif; ?>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

</body>
</html>