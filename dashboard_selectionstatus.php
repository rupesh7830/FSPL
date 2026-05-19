<?php
session_start();
require_once 'admin/config/db_connect.php';

/*
=========================================
CHECK LOGIN
=========================================
*/

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

/*
=========================================
GET LOGGED IN USER ID
=========================================
*/

$user_id = $_SESSION['user_id'];

/*
=========================================
GET PLAYER DATA
=========================================
*/

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
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FSPL Selection Status</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

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

<body>

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

                    <a href="dashboard.php"
                    class="inline-flex items-center justify-center h-14 px-8 rounded-2xl bg-yellow-500 text-black font-semibold hover:scale-105 transition duration-300">

                        Back To Dashboard

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>