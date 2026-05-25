<?php

require_once 'config/db_connect.php';

/* =========================================
SEARCH
========================================= */

$search = $_GET['search'] ?? '';

$where = "";

if(!empty($search)){

    $search = mysqli_real_escape_string($conn, $search);

    $where = "

    WHERE

    trial_title LIKE '%$search%'

    OR city LIKE '%$search%'

    OR state LIKE '%$search%'

    OR category LIKE '%$search%'

    ";

}

/* =========================================
FETCH TRIALS
========================================= */

$query = "

SELECT
*,

(total_slots - registered_players) AS remaining_slots

FROM trials

$where

ORDER BY id DESC

";

$result = mysqli_query($conn, $query);

/* =========================================
COUNTS
========================================= */

$total_trials = mysqli_num_rows($result);

/* OPEN TRIALS */

$open_trials = mysqli_num_rows(

    mysqli_query($conn,"
    SELECT id
    FROM trials
    WHERE status='Open'
    ")

);

/* CLOSED TRIALS */

$closed_trials = mysqli_num_rows(

    mysqli_query($conn,"
    SELECT id
    FROM trials
    WHERE status='Closed'
    ")

);

/* TOTAL SLOTS */

$slot_query = mysqli_query($conn,"
SELECT SUM(total_slots) AS total
FROM trials
");

$slot_data = mysqli_fetch_assoc($slot_query);

$total_slots_count = $slot_data['total'];

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

<link
href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

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

                Manage all cricket trials, registrations and pricing systems.

            </p>

        </div>

        <!-- RIGHT -->

        <div
        class="flex flex-col sm:flex-row
        items-center gap-4">

            <!-- SEARCH -->

            <form method="GET">

                <div
                class="w-full sm:w-[320px]
                h-[54px]
                px-5
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                flex items-center">

                    <input
                    type="text"
                    name="search"
                    value="<?= htmlspecialchars($search); ?>"
                    placeholder="Search trials..."
                    class="w-full
                    bg-transparent
                    outline-none
                    text-white
                    text-[14px]
                    placeholder:text-white/25
                    font-['Outfit']">

                </div>

            </form>

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

        <!-- TOTAL -->

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
                    text-[13px]">

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

        <!-- OPEN -->

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
                    text-[13px]">

                        Open Trials

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $open_trials; ?>

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

        <!-- CLOSED -->

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
                    text-[13px]">

                        Closed Trials

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $closed_trials; ?>

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

        <!-- TOTAL SLOTS -->

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
                    text-[13px]">

                        Total Slots

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $total_slots_count; ?>

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
                font-medium">

                    <?= $total_trials; ?> Trials

                </span>

            </div>

        </div>

        <!-- TABLE -->

        <div class="p-4">

        <div class="custom-scrollbar overflow-x-auto">
            <table
            class="w-full
            min-w-[1400px]
            border-separate
            border-spacing-y-3">

                    <!-- HEAD -->

                    <thead>

                        <tr>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Trial
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Date
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Time
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Location
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Registration
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Players
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
                                Status
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] whitespace-nowrap">
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

                                    <?php

                                    /* INITIALS */

                                    $words = explode(' ', $trial['trial_title']);

                                    $initials = '';

                                    foreach($words as $word){

                                        $initials .= strtoupper(substr($word,0,1));

                                        if(strlen($initials) >= 2){

                                            break;

                                        }

                                    }

                                    ?>

                                    <div
                                    class="w-16 h-16
                                    rounded-2xl
                                    bg-[#D4AF37]/10
                                    border border-[#D4AF37]/20
                                    flex items-center justify-center
                                    shrink-0">

                                        <span
                                        class="text-[#F5D76E]
                                        text-[18px]
                                        font-bold
                                        tracking-[1px]
                                        font-['Cinzel']">

                                            <?= $initials; ?>

                                        </span>

                                    </div>

                                    <!-- INFO -->

                                    <div>

                                        <h4
                                        class="text-white
                                        text-[14px]
                                        font-medium
                                        whitespace-nowrap">

                                            <?= htmlspecialchars($trial['trial_title']); ?>

                                        </h4>

                                        <p
                                        class="mt-1
                                        text-white/35
                                        text-[12px]
                                        whitespace-nowrap">

                                            <?= htmlspecialchars($trial['category']); ?>

                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- DATE -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px]">
                                <?= htmlspecialchars($trial['trial_date']); ?>
                            </td>

                            <!-- TIME -->

                            <td class="px-6 py-6 text-white/60 whitespace-nowrap text-[13px]">
                                <?= htmlspecialchars($trial['trial_time']); ?>
                            </td>

                            <!-- LOCATION -->

                            <td class="px-6 py-6">

                                <div>

                                    <p class="text-white text-[13px]">
                                        <?= htmlspecialchars($trial['city']); ?>
                                    </p>

                                    <p class="text-white/35 text-[12px] mt-1">
                                        <?= htmlspecialchars($trial['ground_name']); ?>
                                    </p>

                                </div>

                            </td>

                            <!-- REGISTRATION -->

                            <td class="px-6 py-6 text-white whitespace-nowrap text-[13px]">
                                ₹<?= htmlspecialchars($trial['registration_fee']); ?>
                            </td>

                            <!-- PLAYERS -->

                            <td class="px-6 py-6">

                                <div>

                                    <p class="text-white text-[13px] font-medium">

                                        <?= $trial['registered_players']; ?>

                                        /

                                        <?= $trial['total_slots']; ?>

                                    </p>

                                    <!-- BAR -->

                                    <div
                                    class="w-[130px]
                                    h-[7px]
                                    rounded-full
                                    bg-white/5
                                    overflow-hidden
                                    mt-2">

                                        <div
                                        class="h-full
                                        bg-[#D4AF37]
                                        rounded-full"
                                        style="width:<?= ($trial['total_slots'] > 0)? ($trial['registered_players'] / $trial['total_slots']) * 100: 0; ?>%">
                                        

                                    </div>

                                </div>

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

                                if($status == "Completed"){

                                    $statusClass = "bg-blue-500/10 border-blue-500/20 text-blue-300";

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

                                    <!-- PLAYERS -->

                                    <a
                                    href="trial_players.php?trial_id=<?= $trial['id']; ?>"
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
                                    whitespace-nowrap
                                    bg-blue-500/10
                                    border border-blue-500/20
                                    text-blue-300
                                    text-[12px]
                                    font-medium
                                    hover:bg-blue-500/20
                                    transition-all duration-300">

                                        Players

                                    </a>

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
                                    transition-all duration-300">

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
                                    transition-all duration-300">

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