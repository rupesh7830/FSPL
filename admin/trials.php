<?php

require_once 'config/db_connect.php';

/* =========================================
   FETCH TRIALS
========================================= */

$query = "
    SELECT *
    FROM trials
    ORDER BY id DESC
";

$result = mysqli_query($conn, $query);

/* =========================================
   COUNTS
========================================= */

$total_trials = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Trials Management</title>

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
   SCROLLBAR
========================================= */

.custom-scrollbar{
    width:100%;
    overflow-x:auto;
    overflow-y:hidden;
    padding-bottom:12px;
}

.custom-scrollbar::-webkit-scrollbar{
    height:14px;
}

.custom-scrollbar::-webkit-scrollbar-track{
    background:#111111;
    border-radius:50px;
}

.custom-scrollbar::-webkit-scrollbar-thumb{
    background:#D4AF37;
    border-radius:50px;
    border:3px solid #111111;
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
    class="flex flex-col xl:flex-row
    xl:items-center
    justify-between
    gap-5">

        <!-- LEFT -->

        <div>

            <h1
            class="text-white
            text-[36px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Trials Management

            </h1>

            <p
            class="mt-2
            text-white/40
            text-[14px]
            font-['Outfit']">

                Manage all upcoming and active cricket trials.

            </p>

        </div>

        <!-- RIGHT -->

        <div
        class="flex flex-col sm:flex-row
        items-center gap-4">

            <!-- SEARCH -->

            <div
            class="w-full sm:w-[300px]
            h-[54px]
            px-5
            rounded-2xl
            border border-white/10
            bg-white/[0.03]
            flex items-center">

                <input
                type="text"
                placeholder="Search trials..."
                class="w-full
                bg-transparent
                outline-none
                text-white
                text-[14px]
                placeholder:text-white/25
                font-['Outfit']">

            </div>

            <!-- BUTTON -->

            <a
            href="create-trial.php"
            class="w-full sm:w-auto
            h-[54px]
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
         STATS
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
        class="rounded-[30px]
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
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $total_trials; ?>

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-[#D4AF37]/10
                border border-[#D4AF37]/20
                flex items-center justify-center
                text-[24px]">

                    🏏

                </div>

            </div>

        </div>

        <!-- CARD -->

        <div
        class="rounded-[30px]
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

                        Open Trials

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        08

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-emerald-500/10
                border border-emerald-500/20
                flex items-center justify-center
                text-[24px]">

                    🔓

                </div>

            </div>

        </div>

        <!-- CARD -->

        <div
        class="rounded-[30px]
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

                        Closed Trials

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        04

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-red-500/10
                border border-red-500/20
                flex items-center justify-center
                text-[24px]">

                    🔒

                </div>

            </div>

        </div>

        <!-- CARD -->

        <div
        class="rounded-[30px]
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

                        Total Slots

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        1200

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-blue-500/10
                border border-blue-500/20
                flex items-center justify-center
                text-[24px]">

                    👨‍💼

                </div>

            </div>

        </div>

    </div>

    <!-- =====================================
         TABLE CARD
    ====================================== -->

    <div
    class="mt-8
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

                All Trials

            </h2>

            <div
            class="hidden sm:flex
            items-center justify-center
            h-[42px]
            px-5
            rounded-full
            border border-[#D4AF37]/20
            bg-[#D4AF37]/10">

                <span
                class="text-[#F5D76E]
                text-[12px]
                uppercase
                tracking-[2px]
                font-medium
                font-['Outfit']">

                    <?= $total_trials; ?> Trials

                </span>

            </div>

        </div>

        <!-- =================================
             TABLE WRAPPER
        ================================== -->

        <div class="p-4">

            <div class="custom-scrollbar">

                <!-- TABLE -->

                <table
                class="min-w-[1700px]
                w-full
                border-separate
                border-spacing-y-2">

                    <!-- HEAD -->

                    <thead>

                        <tr>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Trial
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Date
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Time
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                State
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                City
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Ground
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Fee
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Slots
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Status
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap font-medium font-['Outfit']">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->

                    <tbody>

                    <?php while($trial = mysqli_fetch_assoc($result)): ?>

                        <tr
                        class="bg-white/[0.02]
                        hover:bg-white/[0.04]
                        transition-all duration-300">

                            <!-- TRIAL -->

                            <td class="px-6 py-6">

                                <div class="flex items-center gap-4">

                                    <!-- IMAGE -->

                                    <div
                                    class="w-14 h-14
                                    rounded-2xl
                                    overflow-hidden
                                    border border-white/10
                                    shrink-0">

                                        <img
                                        src="<?= $trial['banner_image']; ?>"
                                        alt=""
                                        class="w-full h-full object-cover">

                                    </div>

                                    <!-- INFO -->

                                    <div>

                                        <h4
                                        class="text-white
                                        text-[14px]
                                        font-medium
                                        whitespace-nowrap
                                        font-['Outfit']">

                                            <?= htmlspecialchars($trial['trial_title']); ?>

                                        </h4>

                                        <p
                                        class="mt-1
                                        text-white/35
                                        text-[12px]
                                        whitespace-nowrap
                                        font-['Outfit']">

                                            <?= htmlspecialchars($trial['category']); ?>

                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- DATE -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['trial_date']); ?>
                            </td>

                            <!-- TIME -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['trial_time']); ?>
                            </td>

                            <!-- STATE -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['state']); ?>
                            </td>

                            <!-- CITY -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['city']); ?>
                            </td>

                            <!-- GROUND -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['ground_name']); ?>
                            </td>

                            <!-- FEE -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['entry_fee']); ?>
                            </td>

                            <!-- SLOTS -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px] font-medium font-['Outfit']">
                                <?= htmlspecialchars($trial['total_slots']); ?>
                            </td>

                            <!-- STATUS -->

                            <td class="px-6 py-6">

                                <?php
                                    $status = $trial['status'];

                                    $statusClass = "bg-emerald-500/10 border-emerald-500/20 text-emerald-300";

                                    if($status == "Closed"){
                                        $statusClass = "bg-red-500/10 border-red-500/20 text-red-300";
                                    }

                                    if($status == "Upcoming"){
                                        $statusClass = "bg-yellow-500/10 border-yellow-500/20 text-yellow-300";
                                    }
                                ?>

                                <span
                                class="inline-flex items-center gap-2
                                px-4 h-[38px]
                                rounded-full
                                border
                                text-[11px]
                                whitespace-nowrap
                                font-medium
                                font-['Outfit']
                                <?= $statusClass; ?>">

                                    <span
                                    class="w-2 h-2
                                    rounded-full
                                    bg-current">
                                    </span>

                                    <?= htmlspecialchars($status); ?>

                                </span>

                            </td>

                            <!-- ACTIONS -->

                            <td class="px-6 py-6">

                                <div class="flex items-center gap-3">

                                    <!-- EDIT -->

                                    <a
                                    href="edit-trial.php?id=<?= $trial['id']; ?>"
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
                                    whitespace-nowrap
                                    bg-[#D4AF37]/10
                                    border border-[#D4AF37]/20
                                    text-[#F5D76E]
                                    text-[12px]
                                    font-medium
                                    hover:bg-[#D4AF37]/20
                                    transition-all duration-300
                                    font-['Outfit']">

                                        Edit

                                    </a>

                                    <!-- DELETE -->

                                    <a
                                    href="delete-trial.php?id=<?= $trial['id']; ?>"
                                    onclick="return confirm('Delete this trial?')"
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
                                    whitespace-nowrap
                                    bg-red-500/10
                                    border border-red-500/20
                                    text-red-300
                                    text-[12px]
                                    font-medium
                                    hover:bg-red-500/20
                                    hover:border-red-500/40
                                    transition-all duration-300
                                    font-['Outfit']">

                                        Delete

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>

</body>

</html>