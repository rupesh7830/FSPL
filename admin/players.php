<?php

require_once 'config/db_connect.php';

/* =========================================
   FETCH PLAYERS
========================================= */

$query = "
    SELECT *
    FROM trial_registrations
    ORDER BY id DESC
";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Players</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

.custom-scrollbar{
    overflow-x:auto;
    scrollbar-width:thin;
    scrollbar-color:rgba(212,175,55,0.35) transparent;
}

.custom-scrollbar::-webkit-scrollbar{
    height:10px;
}

.custom-scrollbar::-webkit-scrollbar-track{
    background:rgba(255,255,255,0.03);
    border-radius:50px;
}

.custom-scrollbar::-webkit-scrollbar-thumb{
    background:rgba(212,175,55,0.35);
    border-radius:50px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover{
    background:rgba(212,175,55,0.55);
}
/* =========================================
   VERTICAL SCROLLBAR
========================================= */

.custom-scrollbar::-webkit-scrollbar{
    width:8px;
    height:10px;
}

.custom-scrollbar::-webkit-scrollbar-track{
    background:rgba(255,255,255,0.03);
    border-radius:50px;
}

.custom-scrollbar::-webkit-scrollbar-thumb{
    background:rgba(212,175,55,0.35);
    border-radius:50px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover{
    background:rgba(212,175,55,0.55);
}

</style>

</head>

<body class="bg-[#050505] overflow-x-hidden">

<!-- SIDEBAR -->

<?php include 'includes/sidebar.php'; ?>


<!-- =====================================================
     MAIN
===================================================== -->
<main
class="lg:ml-[280px]
h-screen
overflow-hidden
pt-[50px]
p-5 lg:p-8 lg:pt-[0px]">

   
    <!-- =================================================
         TABLE WRAPPER
    ================================================== -->

    <div
    class="mt-8
    rounded-[32px]
    border border-white/10
    bg-white/[0.03]
    backdrop-blur-3xl lg:mt-8">

        <!-- =================================================
             TOP
        ================================================== -->

        <div
        class="h-[78px]
        px-6
        border-b border-white/10
        flex items-center justify-between">

            <div>

                <h3
                class="text-white
                text-[24px]
                font-bold
                tracking-[-1px]
                font-['Cinzel']">

                    Registered Players

                </h3>

            </div>

            <!-- COUNT -->

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

                    <?= mysqli_num_rows($result); ?> Players

                </span>

            </div>

        </div>

        <!-- =================================================
             TABLE
        ================================================== -->

        <div
class="overflow-x-auto
overflow-y-auto
custom-scrollbar
max-h-[500px]
pb-4">
            <div class="w-[1200px]">
<div class="w-[1200px]">

                <table
                class="min-w-full
border-separate
border-spacing-y-2">

                    <!-- HEAD -->

                    <thead
class="sticky top-0 z-20
bg-[#0A0A0A]
backdrop-blur-xl">

                        <tr>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                Player

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                Age

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                State

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                District

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                Role

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                Phone

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                Status

                            </th>

                            <th
                            class="px-6 py-5
                            text-left
                            text-white/35
                            text-[11px]
                            uppercase
                            tracking-[3px]
                            font-medium
                            font-['Outfit']">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->

                    <tbody>

                    <?php while($player = mysqli_fetch_assoc($result)): ?>

                        <tr
                        class="bg-white/[0.02]
                        hover:bg-white/[0.04]
                        transition-all duration-300">

                            <!-- PLAYER -->

                            <td
                            class="px-6 py-6">

                                <div
                                class="flex items-center gap-4">

                                    <!-- AVATAR -->

                                    <div
                                    class="w-12 h-12
                                    rounded-2xl
                                    bg-[#D4AF37]/10
                                    border border-[#D4AF37]/20
                                    flex items-center justify-center
                                    shrink-0">

                                        <span
                                        class="text-[#D4AF37]
                                        text-sm
                                        font-bold
                                        font-['Cinzel']">

                                            <?= strtoupper(substr($player['full_name'],0,1)); ?>

                                        </span>

                                    </div>

                                    <!-- INFO -->

                                    <div>

                                        <h4
                                        class="text-white
                                        text-[14px]
                                        font-medium
                                        font-['Outfit']">

                                            <?= htmlspecialchars($player['full_name']); ?>

                                        </h4>

                                        <p
                                        class="mt-1
                                        text-white/35
                                        text-[12px]
                                        font-['Outfit']">

                                            <?= htmlspecialchars($player['email']); ?>

                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- AGE -->

                            <td
                            class="px-6 py-6
                            text-white/60
                            text-[13px]
                            font-medium
                            font-['Outfit']">

                                <?= $player['age']; ?>

                            </td>

                            <!-- STATE -->

                            <td
                            class="px-6 py-6
                            text-white/60
                            text-[13px]
                            font-medium
                            font-['Outfit']">

                                <?= htmlspecialchars($player['state']); ?>

                            </td>

                            <!-- DISTRICT -->

                            <td
                            class="px-6 py-6
                            text-white/60
                            text-[13px]
                            font-medium
                            font-['Outfit']">

                                <?= htmlspecialchars($player['district']); ?>

                            </td>

                            <!-- ROLE -->

                            <td
                            class="px-6 py-6
                            text-white/60
                            text-[13px]
                            font-medium
                            font-['Outfit']">

                                <?= htmlspecialchars($player['playing_role']); ?>

                            </td>

                            <!-- PHONE -->

                            <td
                            class="px-6 py-6
                            text-white/60
                            text-[13px]
                            font-medium
                            font-['Outfit']">

                                <?= htmlspecialchars($player['phone']); ?>

                            </td>

                            <!-- STATUS -->

                            <td
                            class="px-6 py-6">

                                <span
                                class="inline-flex items-center gap-2
                                px-4 h-[38px]
                                rounded-full
                                bg-emerald-500/10
                                border border-emerald-500/20
                                text-emerald-300
                                text-[11px]
                                font-medium
                                font-['Outfit']">

                                    <span
                                    class="w-2 h-2
                                    rounded-full
                                    bg-emerald-400">
                                    </span>

                                    <?= htmlspecialchars($player['status']); ?>

                                </span>

                            </td>

                            <!-- ACTION -->

                            <td
                            class="px-6 py-6">

                                <div class="flex items-center gap-3">

                                    <!-- VIEW -->

                                    <button
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
                                    bg-[#D4AF37]/10
                                    border border-[#D4AF37]/20
                                    text-[#F5D76E]
                                    text-[12px]
                                    font-medium
                                    hover:bg-[#D4AF37]/20
                                    transition-all duration-300
                                    font-['Outfit']">

                                        View

                                    </button>

                                    <!-- DELETE -->

                                    <a
                                    href="delete-player.php?id=<?= $player['id']; ?>"
                                    onclick="return confirm('Delete this player?')"
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
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