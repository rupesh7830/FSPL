<?php
session_start();
include "admin/config/db_connect.php";
include 'mail_config.php';

/* =========================
CHECK LOGIN
========================= */

if(!isset($_SESSION['user_id'])){
    header("Location: login");
    exit();
}

$user_id  = $_SESSION['user_id'];
if(!isset($_GET['trial_id'])){

    die("Trial not found");

}

$trial_id = intval($_GET['trial_id']);

/* =========================
FETCH USER
========================= */

$user_stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();

$user_result = $user_stmt->get_result();

if($user_result->num_rows === 0){
    die("User not found");
}

$user = $user_result->fetch_assoc();

/* =========================
FETCH TRIAL
========================= */

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

/* =========================
CHECK APPLIED
========================= */

$check_stmt = $conn->prepare("
SELECT id FROM trials_player
WHERE trial_id = ?
AND user_id = ?
");

$check_stmt->bind_param("ii",$trial_id,$user_id);
$check_stmt->execute();

$already_applied = $check_stmt->get_result()->num_rows > 0;

/* =========================
FORM SUBMIT
========================= */

$success = false;
$error   = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($already_applied){

        $error = "You already applied for this trial.";

    }else{

        $playing_role = trim($_POST['playing_role']);

            $insert = $conn->prepare("
            INSERT INTO trials_player
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
                $user['full_name'],
                $user['mobile'],
                $user['email'],
                $playing_role
            );

            if($insert->execute()){

            // SEND EMAIL
        
            sendMail(
                $user['email'],
                $user['full_name'],
                $trial_id
            );
        
            // REDIRECT PAYMENT
        
            header("Location: pay?trial_id=".$trial_id);
        
            exit();
        
        }
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
<?php echo htmlspecialchars($trial['trial_title']); ?>
- FSPL Registration
</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:
    radial-gradient(circle at top left,#3b2c00 0%,transparent 25%),
    radial-gradient(circle at bottom right,#2a1d00 0%,transparent 25%),
    linear-gradient(135deg,#020202,#070707,#020202);

    font-family:'Outfit',sans-serif;

    color:white;

    overflow-x:hidden;
}

/* SCROLLBAR */

::-webkit-scrollbar{
    width:6px;
}

::-webkit-scrollbar-thumb{
    background:linear-gradient(#D4AF37,#F5D76E);
    border-radius:50px;
}

/* GLOW */

.glow{

    position:absolute;

    width:600px;
    height:600px;

    border-radius:50%;

    filter:blur(150px);

    opacity:.12;

    z-index:0;
}

.glow-1{
    background:#D4AF37;
    top:-250px;
    left:-180px;
}

.glow-2{
    background:#D4AF37;
    bottom:-300px;
    right:-200px;
}

/* GLASS */

.glass{

    position:relative;

    background:rgba(255,255,255,0.04);

    border:1px solid rgba(255,255,255,0.06);

    backdrop-filter:blur(24px);

    box-shadow:
    0 20px 60px rgba(0,0,0,0.5),
    inset 0 1px 0 rgba(255,255,255,0.04);

    overflow:hidden;
}

.glass::before{

    content:"";

    position:absolute;

    top:0;
    left:-120%;

    width:80%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.06),
        transparent
    );

    transform:skewX(-20deg);

    transition:1s;
}

.glass:hover::before{
    left:130%;
}

/* TITLE */

.main-title{

    font-family:'Cinzel',serif;

font-size:clamp(28px,4vw,56px);
line-height:1.1;
letter-spacing:-1px;
}

/* INFO CARD */

.info-card{

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(212,175,55,0.08);

    border-radius:28px;

    padding:28px;

    transition:.35s;
}

.info-card:hover{

    transform:translateY(-5px);

    border-color:rgba(212,175,55,0.35);

    box-shadow:
    0 10px 35px rgba(212,175,55,0.15);
}

/* LABEL */

.label{

    display:block;

    margin-bottom:12px;

    color:#F5D76E;

    font-size:11px;

    letter-spacing:3px;

    text-transform:uppercase;

    font-weight:700;
}

/* INPUT */

.input{

    width:100%;

    height:64px;

    border-radius:20px;

    border:1px solid rgba(255,255,255,0.08);

    background:rgba(255,255,255,0.04);

    padding:0 22px;

    color:white;

    font-size:15px;

    outline:none;

    transition:.3s;
}

.input:focus{

    border-color:#D4AF37;

    background:rgba(255,255,255,0.06);

    box-shadow:
    0 0 0 4px rgba(212,175,55,0.08),
    0 10px 30px rgba(212,175,55,0.10);
}

select.input{
    appearance:none;
    -webkit-appearance:none;
}

select.input option{
    background:#111;
}

/* BUTTON */

.primary-btn{

    width:100%;

    height:68px;

    border:none;

    border-radius:22px;

    background:
    linear-gradient(135deg,#D4AF37,#F5D76E);

    color:black;

    font-size:12px;

    letter-spacing:4px;

    text-transform:uppercase;

    font-weight:800;

    transition:.35s;

    cursor:pointer;
}

.primary-btn:hover{

    transform:translateY(-4px);

    box-shadow:
    0 15px 40px rgba(212,175,55,0.35);
}

/* ALERT */

.success-box{

    border:1px solid rgba(34,197,94,0.25);

    background:rgba(34,197,94,0.08);

    color:#86efac;

    padding:20px;

    border-radius:22px;
}

.error-box{

    border:1px solid rgba(239,68,68,0.25);

    background:rgba(239,68,68,0.08);

    color:#fca5a5;

    padding:20px;

    border-radius:22px;
}

</style>

</head>

<body>
<?php include "components/navbar.php"; ?>
<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

<section class="relative min-h-screen py-10 lg:py-0 px-4 sm:px-6 overflow-hidden">

<div class="relative z-10 max-w-7xl mx-auto">

<div class="relative text-center max-w-6xl mx-auto py-10">

    <!-- TOP BADGE -->

    <div class="inline-flex items-center gap-3 px-7 py-4 rounded-full border border-[#D4AF37]/20 bg-black/40 backdrop-blur-2xl shadow-[0_0_40px_rgba(212,175,55,0.08)]">

        <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

        <span class="uppercase tracking-[5px] text-[11px] text-[#F5D76E] font-semibold">

            FSPL Elite Registration

        </span>

        <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

    </div>

    <!-- BIG TITLE -->

    <div class="mt-10 relative">

        <h1 class="font-['Cinzel'] text-white text-[48px] sm:text-[72px] lg:text-[110px] leading-[0.9] font-black tracking-[-4px]">

            Trial

            <span class="block bg-gradient-to-b from-[#F5D76E] to-[#D4AF37] bg-clip-text text-transparent mt-2">

                Registration

            </span>

        </h1>

        <!-- GOLD LINE -->

        <div class="flex items-center justify-center gap-5 mt-8">

            <div class="w-28 h-[1px] bg-gradient-to-r from-transparent to-[#D4AF37]"></div>

            <div class="text-[#D4AF37] text-xl">

                👑

            </div>

            <div class="w-28 h-[1px] bg-gradient-to-l from-transparent to-[#D4AF37]"></div>

        </div>

        <!-- DESCRIPTION -->

        <p class="max-w-3xl mx-auto mt-8 text-white/60 text-[15px] sm:text-[17px] leading-[34px] font-light">

            Take the first step towards your professional cricket journey with
            Future Star Premier League and showcase your talent on a premium platform.

        </p>

    </div>

    <!-- FEATURE BOXES -->

    <div class="grid md:grid-cols-3 gap-5 mt-14">

        <!-- CARD -->

        <div class="group relative overflow-hidden rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-2xl p-6 hover:border-[#D4AF37]/30 transition duration-500">

            <div class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>

            <div class="relative">

                <div class="w-16 h-16 mx-auto rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center text-[#D4AF37] text-2xl">

                    🛡️

                </div>

                <h3 class="mt-5 font-semibold text-xl">

                    Verified Trials

                </h3>

                <p class="mt-3 text-white/45 leading-[28px] text-sm">

                    All cricket trials are verified and professionally managed by FSPL.

                </p>

            </div>

        </div>

        <!-- CARD -->

        <div class="group relative overflow-hidden rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-2xl p-6 hover:border-[#D4AF37]/30 transition duration-500">

            <div class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>

            <div class="relative">

                <div class="w-16 h-16 mx-auto rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center text-[#D4AF37] text-2xl">

                    🏏

                </div>

                <h3 class="mt-5 font-semibold text-xl">

                    Professional Platform

                </h3>

                <p class="mt-3 text-white/45 leading-[28px] text-sm">

                    Get opportunities to perform in front of selectors and coaches.

                </p>

            </div>

        </div>

        <!-- CARD -->

        <div class="group relative overflow-hidden rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-2xl p-6 hover:border-[#D4AF37]/30 transition duration-500">

            <div class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>

            <div class="relative">

                <div class="w-16 h-16 mx-auto rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center text-[#D4AF37] text-2xl">

                    🏆

                </div>

                <h3 class="mt-5 font-semibold text-xl">

                    Build Your Career

                </h3>

                <p class="mt-3 text-white/45 leading-[28px] text-sm">

                    Showcase your cricket skills and grow your professional journey.

                </p>

            </div>

        </div>

    </div>

</div>

<div class="grid xl:grid-cols-[1.15fr_.85fr] gap-8 mt-14">

<!-- LEFT -->

<div class="glass rounded-[36px] overflow-hidden">

<div class="relative h-[300px] lg:h-[420px] overflow-hidden">

<img
src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1800&auto=format&fit=crop"
class="w-full h-full object-cover scale-105">

<div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>

<div class="absolute bottom-8 left-8">

<h2 class="font-['Cinzel'] text-3xl lg:text-5xl font-bold leading-tight tracking-[-1px]">

<?php echo htmlspecialchars($trial['trial_title']); ?>

</h2>

</div>

</div>

<div class="p-6 sm:p-8 lg:p-10">

<div class="grid sm:grid-cols-2 gap-5">

<div class="info-card">

<span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
Trial Date
</span>

<h3 class="mt-4 text-2xl font-semibold">

<?php echo htmlspecialchars($trial['trial_date']); ?>

</h3>

</div>

<div class="info-card">

<span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
    Entry Fee
</span>

<h3 id="entryFee"
class="mt-4 text-[#F5D76E] text-4xl font-bold">

    ₹<?php echo htmlspecialchars($trial['registration_fee']); ?>

</h3>

</div>

<div class="info-card">

<span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
Venue
</span>

<h3 class="mt-4 text-xl">

<?php echo htmlspecialchars($trial['ground_name']); ?>

</h3>

</div>

<div class="info-card">

<span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
Location
</span>

<h3 class="mt-4 text-xl">

<?php echo htmlspecialchars($trial['city']); ?>,

<?php echo htmlspecialchars($trial['state']); ?>

</h3>

</div>

</div>

<div class="info-card mt-6">

<span class="text-[#D4AF37] uppercase tracking-[3px] text-[10px]">
About Trial
</span>

<p class="mt-5 text-white/70 leading-[34px]">

<?php echo nl2br(htmlspecialchars($trial['description'])); ?>

</p>

</div>

</div>

</div>

<!-- RIGHT -->

<div class="glass rounded-[36px] p-6 sm:p-8 lg:p-10 h-fit sticky top-6">

<div class="flex items-center gap-5 pb-8 border-b border-[#D4AF37]/10">

<div class="w-20 h-20 rounded-3xl bg-gradient-to-br from-[#D4AF37] to-[#F5D76E] flex items-center justify-center text-black text-2xl font-bold">

<?php echo strtoupper(substr($user['full_name'],0,1)); ?>

</div>

<div>

<h2 class="font-['Cinzel'] text-3xl font-bold">

<?php echo htmlspecialchars($user['full_name']); ?>

</h2>

<p class="mt-2 text-[#F5D76E] uppercase tracking-[3px] text-[10px]">

Verified FSPL Player

</p>

</div>

</div>

<?php if($success): ?>

<div class="success-box mt-8">

Registration submitted successfully.

</div>

<?php endif; ?>

<?php if(!empty($error)): ?>

<div class="error-box mt-8">

<?php echo $error; ?>

</div>

<?php endif; ?>

<form method="POST" class="mt-8 space-y-6">

<div>

<label class="label">
Full Name
</label>

<input
type="text"
class="input"
value="<?php echo htmlspecialchars($user['full_name']); ?>"
readonly>

</div>

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

<div>

<label class="label">
Playing Role
</label>

<div class="relative">
<select
id="playingRole"
name="playing_role"
class="input pr-14">

    <option value="General Registration" selected>
        General Registration
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

<div class="absolute right-5 top-1/2 -translate-y-1/2 text-[#D4AF37]">

▼

</div>

</div>

</div>

<?php if($already_applied): ?>

<button
type="button"
class="w-full h-[68px] rounded-[22px] bg-white/10 text-white/40 uppercase tracking-[4px] text-[11px] font-bold cursor-not-allowed">

Already Applied

</button>

<?php else: ?>

<button
type="submit"
class="primary-btn">

Apply For Trial

</button>

<?php endif; ?>

</form>

</div>

</div>

</div>

</section>
<script>

const roleSelect = document.getElementById("playingRole");

const feeBox = document.getElementById("entryFee");

const roleFees = {

    "General Registration": <?php echo (int)$trial['registration_fee']; ?>,

    "Batsman": <?php echo (int)$trial['batsman_fee']; ?>,

    "Bowler": <?php echo (int)$trial['bowler_fee']; ?>,

    "All-Rounder": <?php echo (int)$trial['allrounder_fee']; ?>,

    "Wicket Keeper": <?php echo (int)$trial['keeper_fee']; ?>

};

/*
    DEFAULT
*/

feeBox.innerHTML = "₹" + roleFees["General Registration"];

/*
    CHANGE
*/

roleSelect.addEventListener("change", function(){

    const selectedRole = this.value;

    feeBox.innerHTML = "₹" + roleFees[selectedRole];

});

</script>

<?php include "components/footer.php"; ?>
</body>
</html>
