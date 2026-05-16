<?php

require_once 'config/db_connect.php';

/* =========================================
   TOTAL PLAYERS
========================================= */

$players_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trial_registrations"
);

$players_data = mysqli_fetch_assoc($players_query);

$total_players = $players_data['total'];

/* =========================================
   TOTAL TRIALS
========================================= */

$trials_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trials"
);

$trials_data = mysqli_fetch_assoc($trials_query);

$total_trials = $trials_data['total'];

/* =========================================
   APPROVED PLAYERS
========================================= */

$approved_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trial_registrations WHERE status='Approved'"
);

$approved_data = mysqli_fetch_assoc($approved_query);

$approved_players = $approved_data['total'];

/* =========================================
   PENDING PLAYERS
========================================= */

$pending_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trial_registrations WHERE status='Pending'"
);

$pending_data = mysqli_fetch_assoc($pending_query);

$pending_players = $pending_data['total'];

/* =========================================
   RECENT REGISTRATIONS
========================================= */

$recent_registrations = mysqli_query(

    $conn,

    "

    SELECT *
    FROM trial_registrations
    ORDER BY id DESC
    LIMIT 5

    "

);

/* =========================================
   RECENT TRIALS
========================================= */

$recent_trials = mysqli_query(

    $conn,

    "

    SELECT *
    FROM trials
    ORDER BY id DESC
    LIMIT 4

    "

);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<!-- TAILWIND -->

<script src="https://cdn.tailwindcss.com"></script>

<!-- GOOGLE FONTS -->

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

/* =========================================
   BODY
========================================= */

body{
    background:#050505;
    overflow-x:hidden;
}

/* =========================================
   CUSTOM SCROLLBAR
========================================= */

.custom-scrollbar::-webkit-scrollbar{
    height:8px;
}

.custom-scrollbar::-webkit-scrollbar-track{
    background:transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb{
    background:rgba(212,175,55,0.25);
    border-radius:50px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover{
    background:rgba(212,175,55,0.45);
}

</style>

</head>

<body>

<!-- =========================================
     SIDEBAR
========================================= -->

<?php include 'includes/sidebar.php'; ?>

<!-- =========================================
     NAVBAR
========================================= -->

<?php include 'includes/navbar.php'; ?>

<!-- =========================================
     MAIN
========================================= -->

<main
class="lg:ml-[280px]
pt-[100px]
p-5 lg:p-8">

    <!-- =====================================
         PAGE HEADER
    ====================================== -->

    <div
    class="flex flex-col lg:flex-row
    lg:items-center
    justify-between
    gap-5">

        <!-- LEFT -->

        <div>

            <h1
            class="text-white
            text-[38px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Dashboard

            </h1>

            <p
            class="mt-2
            text-white/40
            text-[14px]
            font-['Outfit']">

                Welcome back to FSPL Admin Panel.

            </p>

        </div>

        <!-- RIGHT -->

        <div
        class="flex items-center gap-4">

            <a
            href="create-trial.php"
            class="h-[54px]
            px-8
            rounded-2xl
            bg-[#D4AF37]
            text-black
            text-[12px]
            uppercase
            tracking-[2px]
            font-bold
            flex items-center justify-center
            shadow-[0_0_35px_rgba(212,175,55,0.25)]
            hover:scale-[1.02]
            transition-all duration-300
            font-['Cinzel']">

                Create Trial

            </a>

        </div>

    </div>

    <!-- =====================================
         STATS CARDS
    ====================================== -->

    <div
    class="grid
    grid-cols-1
    sm:grid-cols-2
    xl:grid-cols-4
    gap-5
    mt-8">

        <!-- CARD -->

        <div
        class="rounded-[32px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p
                    class="text-white/40
                    text-[13px]
                    font-['Outfit']">

                        Total Players

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[38px]
                    font-bold
                    font-['Cinzel']">

                        <?= $total_players; ?>

                    </h2>

                </div>

                <div
                class="w-16 h-16
                rounded-3xl
                bg-[#D4AF37]/10
                border border-[#D4AF37]/20
                flex items-center justify-center
                text-[28px]">

                    👨‍💼

                </div>

            </div>

        </div>

        <!-- CARD -->

        <div
        class="rounded-[32px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p
                    class="text-white/40
                    text-[13px]
                    font-['Outfit']">

                        Total Trials

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[38px]
                    font-bold
                    font-['Cinzel']">

                        <?= $total_trials; ?>

                    </h2>

                </div>

                <div
                class="w-16 h-16
                rounded-3xl
                bg-blue-500/10
                border border-blue-500/20
                flex items-center justify-center
                text-[28px]">

                    🏏

                </div>

            </div>

        </div>

        <!-- CARD -->

        <div
        class="rounded-[32px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p
                    class="text-white/40
                    text-[13px]
                    font-['Outfit']">

                        Approved

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[38px]
                    font-bold
                    font-['Cinzel']">

                        <?= $approved_players; ?>

                    </h2>

                </div>

                <div
                class="w-16 h-16
                rounded-3xl
                bg-emerald-500/10
                border border-emerald-500/20
                flex items-center justify-center
                text-[28px]">

                    ✅

                </div>

            </div>

        </div>

        <!-- CARD -->

        <div
        class="rounded-[32px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p
                    class="text-white/40
                    text-[13px]
                    font-['Outfit']">

                        Pending

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[38px]
                    font-bold
                    font-['Cinzel']">

                        <?= $pending_players; ?>

                    </h2>

                </div>

                <div
                class="w-16 h-16
                rounded-3xl
                bg-yellow-500/10
                border border-yellow-500/20
                flex items-center justify-center
                text-[28px]">

                    ⏳

                </div>

            </div>

        </div>

    </div>

    <!-- =====================================
         GRID SECTION
    ====================================== -->

    <div
    class="grid
    grid-cols-1
    xl:grid-cols-3
    gap-6
    mt-8">

        <!-- =================================
             RECENT REGISTRATIONS
        ================================== -->

        <div
        class="xl:col-span-2
        rounded-[32px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl">

            <!-- TOP -->

            <div
            class="h-[80px]
            px-6
            border-b border-white/10
            flex items-center justify-between">

                <h2
                class="text-white
                text-[24px]
                font-bold
                tracking-[-1px]
                font-['Cinzel']">

                    Recent Registrations

                </h2>

                <a
                href="registrations.php"
                class="text-[#D4AF37]
                text-[13px]
                font-medium
                font-['Outfit']">

                    View All

                </a>

            </div>

            <!-- TABLE -->

            <div
            class="overflow-x-auto
            custom-scrollbar">

                <div class="min-w-[900px]">

                    <table class="w-full">

                        <thead>

                            <tr>

                                <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px]">
                                    Player
                                </th>

                                <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px]">
                                    Phone
                                </th>

                                <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px]">
                                    City
                                </th>

                                <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px]">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php while($row = mysqli_fetch_assoc($recent_registrations)): ?>

                            <tr
                            class="border-t border-white/5">

                                <!-- PLAYER -->

                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        <div
                                        class="w-12 h-12
                                        rounded-2xl
                                        bg-[#D4AF37]/10
                                        border border-[#D4AF37]/20
                                        flex items-center justify-center">

                                            <span
                                            class="text-[#D4AF37]
                                            text-sm
                                            font-bold
                                            font-['Cinzel']">

                                                <?= strtoupper(substr($row['full_name'],0,1)); ?>

                                            </span>

                                        </div>

                                        <div>

                                            <h4
                                            class="text-white
                                            text-[14px]
                                            font-medium
                                            whitespace-nowrap
                                            font-['Outfit']">

                                                <?= htmlspecialchars($row['full_name']); ?>

                                            </h4>

                                            <p
                                            class="mt-1
                                            text-white/35
                                            text-[12px]
                                            whitespace-nowrap
                                            font-['Outfit']">

                                                <?= htmlspecialchars($row['email']); ?>

                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- PHONE -->

                                <td class="px-6 py-5 text-white/60 text-[13px] whitespace-nowrap">
                                    <?= htmlspecialchars($row['phone']); ?>
                                </td>

                                <!-- CITY -->

                                <td class="px-6 py-5 text-white/60 text-[13px] whitespace-nowrap">
                                    <?= htmlspecialchars($row['city']); ?>
                                </td>

                                <!-- STATUS -->

                                <td class="px-6 py-5">

                                    <?php

                                    $status = $row['status'];

                                    $statusClass = "bg-yellow-500/10 border-yellow-500/20 text-yellow-300";

                                    if($status == "Approved"){
                                        $statusClass = "bg-emerald-500/10 border-emerald-500/20 text-emerald-300";
                                    }

                                    if($status == "Rejected"){
                                        $statusClass = "bg-red-500/10 border-red-500/20 text-red-300";
                                    }

                                    ?>

                                    <span
                                    class="inline-flex items-center gap-2
                                    px-4 h-[36px]
                                    rounded-full
                                    border
                                    text-[11px]
                                    whitespace-nowrap
                                    font-medium
                                    <?= $statusClass; ?>">

                                        <span
                                        class="w-2 h-2
                                        rounded-full
                                        bg-current">
                                        </span>

                                        <?= htmlspecialchars($status); ?>

                                    </span>

                                </td>

                            </tr>

                        <?php endwhile; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- =================================
             QUICK ACTIONS
        ================================== -->

        <div
        class="rounded-[32px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        p-6">

            <!-- TITLE -->

            <h2
            class="text-white
            text-[24px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Quick Actions

            </h2>

            <!-- BUTTONS -->

            <div class="space-y-4 mt-6">

                <!-- BTN -->

                <a
                href="create-trial.php"
                class="flex items-center justify-between
                h-[72px]
                px-5
                rounded-3xl
                border border-white/10
                bg-white/[0.03]
                hover:bg-white/[0.05]
                transition-all duration-300">

                    <div class="flex items-center gap-4">

                        <div
                        class="w-12 h-12
                        rounded-2xl
                        bg-[#D4AF37]/10
                        border border-[#D4AF37]/20
                        flex items-center justify-center
                        text-[20px]">

                            ➕

                        </div>

                        <div>

                            <h4
                            class="text-white
                            text-[14px]
                            font-medium
                            font-['Outfit']">

                                Create Trial

                            </h4>

                            <p
                            class="mt-1
                            text-white/35
                            text-[12px]
                            font-['Outfit']">

                                Add new cricket trials

                            </p>

                        </div>

                    </div>

                </a>

                <!-- BTN -->

                <a
                href="registrations.php"
                class="flex items-center justify-between
                h-[72px]
                px-5
                rounded-3xl
                border border-white/10
                bg-white/[0.03]
                hover:bg-white/[0.05]
                transition-all duration-300">

                    <div class="flex items-center gap-4">

                        <div
                        class="w-12 h-12
                        rounded-2xl
                        bg-blue-500/10
                        border border-blue-500/20
                        flex items-center justify-center
                        text-[20px]">

                            📋

                        </div>

                        <div>

                            <h4
                            class="text-white
                            text-[14px]
                            font-medium
                            font-['Outfit']">

                                Registrations

                            </h4>

                            <p
                            class="mt-1
                            text-white/35
                            text-[12px]
                            font-['Outfit']">

                                Manage player approvals

                            </p>

                        </div>

                    </div>

                </a>

                <!-- BTN -->

                <a
                href="players.php"
                class="flex items-center justify-between
                h-[72px]
                px-5
                rounded-3xl
                border border-white/10
                bg-white/[0.03]
                hover:bg-white/[0.05]
                transition-all duration-300">

                    <div class="flex items-center gap-4">

                        <div
                        class="w-12 h-12
                        rounded-2xl
                        bg-emerald-500/10
                        border border-emerald-500/20
                        flex items-center justify-center
                        text-[20px]">

                            👨‍💼

                        </div>

                        <div>

                            <h4
                            class="text-white
                            text-[14px]
                            font-medium
                            font-['Outfit']">

                                Players

                            </h4>

                            <p
                            class="mt-1
                            text-white/35
                            text-[12px]
                            font-['Outfit']">

                                View all players

                            </p>

                        </div>

                    </div>

                </a>

            </div>

        </div>

    </div>

    <!-- =====================================
         RECENT TRIALS
    ====================================== -->

    <div
    class="mt-8
    grid
    grid-cols-1
    md:grid-cols-2
    xl:grid-cols-4
    gap-5">

        <?php while($trial = mysqli_fetch_assoc($recent_trials)): ?>

        <!-- CARD -->

        <div
        class="rounded-[32px]
        overflow-hidden
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl">

            <!-- IMAGE -->

            <div
            class="h-[220px]
            overflow-hidden">

                <img
                src="<?= $trial['banner_image']; ?>"
                alt=""
                class="w-full h-full object-cover">

            </div>

            <!-- CONTENT -->

            <div class="p-5">

                <h3
                class="text-white
                text-[18px]
                font-bold
                leading-[28px]
                font-['Cinzel']">

                    <?= htmlspecialchars($trial['trial_title']); ?>

                </h3>

                <div
                class="mt-4
                space-y-3">

                    <!-- ITEM -->

                    <div
                    class="flex items-center justify-between">

                        <span
                        class="text-white/35
                        text-[12px]
                        uppercase
                        tracking-[2px]
                        font-medium
                        font-['Outfit']">

                            Location

                        </span>

                        <span
                        class="text-white
                        text-[13px]
                        font-medium
                        font-['Outfit']">

                            <?= htmlspecialchars($trial['city']); ?>

                        </span>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="flex items-center justify-between">

                        <span
                        class="text-white/35
                        text-[12px]
                        uppercase
                        tracking-[2px]
                        font-medium
                        font-['Outfit']">

                            Date

                        </span>

                        <span
                        class="text-white
                        text-[13px]
                        font-medium
                        font-['Outfit']">

                            <?= date("d M Y", strtotime($trial['trial_date'])); ?>

                        </span>

                    </div>

                </div>

                <!-- BUTTON -->

                <a
                href="edit-trial.php?id=<?= $trial['id']; ?>"
                class="mt-6
                h-[52px]
                rounded-2xl
                border border-[#D4AF37]/20
                bg-[#D4AF37]/10
                text-[#F5D76E]
                text-[12px]
                uppercase
                tracking-[2px]
                font-bold
                flex items-center justify-center
                hover:bg-[#D4AF37]/20
                transition-all duration-300
                font-['Cinzel']">

                    Manage Trial

                </a>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</main>

</body>

</html>