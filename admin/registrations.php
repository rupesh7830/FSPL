<?php

require_once 'config/db_connect.php';

/* =========================================
   FETCH REGISTRATIONS
========================================= */

$query = "

    SELECT
        trial_registrations.*,
        trials.trial_title

    FROM trial_registrations

    LEFT JOIN trials
    ON trial_registrations.trial_id = trials.id

    ORDER BY trial_registrations.id DESC

";

$result = mysqli_query($conn, $query);

$total_registrations = mysqli_num_rows($result);

/* =========================================
   STATUS COUNTS
========================================= */

$approved_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trial_registrations WHERE status='Approved'"
);

$approved_data = mysqli_fetch_assoc($approved_query);

$approved_count = $approved_data['total'];

/* PENDING */

$pending_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trial_registrations WHERE status='Pending'"
);

$pending_data = mysqli_fetch_assoc($pending_query);

$pending_count = $pending_data['total'];

/* REJECTED */

$rejected_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM trial_registrations WHERE status='Rejected'"
);

$rejected_data = mysqli_fetch_assoc($rejected_query);

$rejected_count = $rejected_data['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registrations</title>

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
         HEADER
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
            text-[36px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Registrations

            </h1>

            <p
            class="mt-2
            text-white/40
            text-[14px]
            font-['Outfit']">

                Manage all registered players and approvals.

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
                placeholder="Search registrations..."
                class="w-full
                bg-transparent
                outline-none
                text-white
                text-[14px]
                placeholder:text-white/25
                font-['Outfit']">

            </div>

        </div>
        <!-- EXPORT CSV -->

<a
href="export-registrations-csv.php"
class="h-[54px]
px-6
rounded-2xl
border border-[#D4AF37]/20
bg-[#D4AF37]/10
text-[#F5D76E]
text-[11px]
uppercase
tracking-[2px]
font-bold
flex items-center justify-center
hover:bg-[#D4AF37]/20
transition-all duration-300
font-['Cinzel']">

    Export CSV

</a>

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
                    text-[13px]
                    font-['Outfit']">

                        Total Registrations

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $total_registrations; ?>

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-[#D4AF37]/10
                border border-[#D4AF37]/20
                flex items-center justify-center
                text-[24px]">

                    👨‍💼

                </div>

            </div>

        </div>

        <!-- APPROVED -->

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

                        Approved

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                    <?= $approved_count; ?>

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-emerald-500/10
                border border-emerald-500/20
                flex items-center justify-center
                text-[24px]">

                    ✅

                </div>

            </div>

        </div>

        <!-- PENDING -->

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

                        Pending

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $pending_count; ?>

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-yellow-500/10
                border border-yellow-500/20
                flex items-center justify-center
                text-[24px]">

                    ⏳

                </div>

            </div>

        </div>

        <!-- REJECTED -->

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

                        Rejected

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[34px]
                    font-bold
                    font-['Cinzel']">

                        <?= $rejected_count; ?>

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-red-500/10
                border border-red-500/20
                flex items-center justify-center
                text-[24px]">

                    ❌

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

                Registered Players

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

                    <?= $total_registrations; ?> Registrations

                </span>

            </div>

        </div>

        <!-- =====================================
             TABLE WRAPPER
        ====================================== -->

<div
class="overflow-x-auto
overflow-y-auto
custom-scrollbar
max-h-[300px]
pb-4">

            <div class="w-[1800px]">

                <table
                class="w-full
                border-separate
                border-spacing-y-2">

                    <!-- HEAD -->

                    <thead>

                        <tr>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Player
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Trial
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Age
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Role
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                City
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Phone
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Status
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Date
                            </th>

                            <th class="px-6 py-5 text-left text-white/35 text-[11px] uppercase tracking-[3px] font-medium">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->

                    <tbody>

                    <?php while($row = mysqli_fetch_assoc($result)): ?>

                        <tr
                        class="bg-white/[0.02]
                        hover:bg-white/[0.04]
                        transition-all duration-300">

                            <!-- PLAYER -->

                            <td class="px-6 py-6">

                                <div class="flex items-center gap-4">

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

                                            <?= strtoupper(substr($row['full_name'],0,1)); ?>

                                        </span>

                                    </div>

                                    <!-- INFO -->

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

                            <!-- TRIAL -->

                            <td class="px-6 py-6 text-white/60 text-[13px] whitespace-nowrap font-medium">
                                <?= htmlspecialchars($row['trial_title']); ?>
                            </td>

                            <!-- AGE -->

                            <td class="px-6 py-6 text-white/60 text-[13px] whitespace-nowrap font-medium">
                                <?= htmlspecialchars($row['age']); ?>
                            </td>

                            <!-- ROLE -->

                            <td class="px-6 py-6 text-white/60 text-[13px] whitespace-nowrap font-medium">
                                <?= htmlspecialchars($row['playing_role']); ?>
                            </td>

                            <!-- CITY -->

                            <td class="px-6 py-6 text-white/60 text-[13px] whitespace-nowrap font-medium">
                                <?= htmlspecialchars($row['city']); ?>
                            </td>

                            <!-- PHONE -->

                            <td class="px-6 py-6 text-white/60 text-[13px] whitespace-nowrap font-medium">
                                <?= htmlspecialchars($row['phone']); ?>
                            </td>

                            <!-- STATUS -->

                            <td class="px-6 py-6">

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

                            <!-- DATE -->

                            <td class="px-6 py-6 text-white/60 text-[13px] whitespace-nowrap font-medium">
                                <?= date("d M Y", strtotime($row['created_at'])); ?>
                            </td>

                            <!-- ACTIONS -->

                            <td class="px-6 py-6">

                                <div class="flex items-center gap-3">

                                    <!-- APPROVE -->

                                    <a
                                    href="update-registration-status.php?id=<?= $row['id']; ?>&status=Approved"
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
                                    bg-emerald-500/10
                                    border border-emerald-500/20
                                    text-emerald-300
                                    text-[12px]
                                    font-medium
                                    hover:bg-emerald-500/20
                                    transition-all duration-300
                                    whitespace-nowrap
                                    font-['Outfit']">

                                        Approve

                                    </a>

                                    <!-- REJECT -->

                                    <a
                                    href="update-registration-status.php?id=<?= $row['id']; ?>&status=Rejected"
                                    class="inline-flex items-center justify-center
                                    h-[40px]
                                    px-5
                                    rounded-xl
                                    bg-yellow-500/10
                                    border border-yellow-500/20
                                    text-yellow-300
                                    text-[12px]
                                    font-medium
                                    hover:bg-yellow-500/20
                                    transition-all duration-300
                                    whitespace-nowrap
                                    font-['Outfit']">

                                        Reject

                                    </a>

                                    <!-- DELETE -->

                                    <a
                                    href="delete-registration.php?id=<?= $row['id']; ?>"
                                    onclick="return confirm('Delete this registration?')"
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
                                    whitespace-nowrap
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