<?php

session_start();

include "config/db_connect.php";

/* =========================================
APPROVE APPLICATION
========================================= */

if(isset($_GET['approve_application'])){

    $id = intval($_GET['approve_application']);

    mysqli_query($conn,"
    UPDATE trials_player
    SET application_status='Approved'
    WHERE id='$id'
    ");

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();

}

/* =========================================
APPROVE PROFILE
========================================= */

if(isset($_GET['approve_profile'])){

    $id = intval($_GET['approve_profile']);

    mysqli_query($conn,"
    UPDATE trials_player
    SET profile_approved='Approved'
    WHERE id='$id'
    ");

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();

}

/* =========================================
FILTERS
========================================= */

$city = $_GET['city'] ?? '';

$state = $_GET['state'] ?? '';

/* =========================================
CSV DOWNLOAD
========================================= */

if(isset($_GET['download'])){

    header('Content-Type: text/csv');

    header('Content-Disposition: attachment; filename="fspl_players.csv"');

    $output = fopen("php://output","w");

    fputcsv($output,[

        'ID',
        'Trial Name',
        'City',
        'State',
        'Trial Date',
        'Full Name',
        'Mobile',
        'Email',
        'Playing Role',
        'Application Status',
        'Payment Status',
        'Profile Approved',
        'Created At'

    ]);

    $sql = "
    SELECT
    trials_player.*,
    trials.trial_title,
    trials.city,
    trials.state,
    trials.trial_date

    FROM trials_player

    INNER JOIN trials
    ON trials_player.trial_id = trials.id

    WHERE 1
    ";

    if(!empty($city)){

        $sql .= " AND trials.city='$city' ";

    }

    if(!empty($state)){

        $sql .= " AND trials.state='$state' ";

    }

    $sql .= " ORDER BY trials_player.id DESC ";

    $query = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($query)){

        fputcsv($output,[

            $row['id'],
            $row['trial_title'],
            $row['city'],
            $row['state'],
            $row['trial_date'],
            $row['full_name'],
            $row['mobile'],
            $row['email'],
            $row['playing_role'],
            $row['application_status'],
            $row['payment_status'],
            $row['profile_approved'],
            $row['created_at']

        ]);

    }

    fclose($output);

    exit();

}

/* =========================================
FETCH PLAYERS
========================================= */

$sql = "
SELECT
trials_player.*,
trials.trial_title,
trials.city,
trials.state,
trials.trial_date,
trials.category

FROM trials_player

INNER JOIN trials
ON trials_player.trial_id = trials.id

WHERE 1
";

if(!empty($city)){

    $sql .= " AND trials.city='$city' ";

}

if(!empty($state)){

    $sql .= " AND trials.state='$state' ";

}

$sql .= " ORDER BY trials_player.id DESC ";

$players = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FSPL Players Management</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link
href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

body{

    font-family:'Outfit',sans-serif;
    background:#050505;

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

    <!-- PAGE -->

<div class="min-h-screen p-6 lg:p-10">

    <!-- HEADER -->

    <div
    class="relative overflow-hidden rounded-[32px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-8">

        <!-- GLOW -->

        <div
        class="absolute top-[-120px] right-[-120px] w-[320px] h-[320px] bg-[#D4AF37]/10 blur-[140px] rounded-full">
        </div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <!-- LEFT -->

            <div>

                <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[#D4AF37]/20 bg-black/20 text-[#F5D76E] uppercase tracking-[3px] text-[9px]">

                    <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                    FSPL Admin Panel

                </span>

                <h1
class="mt-6 text-white font-['Cinzel'] text-4xl lg:text-6xl font-bold leading-[1]">

                    Players

                    <span class="block text-[#D4AF37] mt-2">

                        Management

                    </span>

                </h1>

                <p
                class="mt-5 text-white/50 max-w-[700px] leading-[30px]">

                    Manage player applications, approvals and export filtered trial records instantly.

                </p>

            </div>

            <!-- STATS -->

            <div class="grid grid-cols-2 gap-4">

                <div
                class="rounded-[24px] border border-white/10 bg-black/20 p-5 min-w-[150px]">

                    <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                        Total Players
                    </p>

                    <h3
                    class="mt-3 font-['Cinzel'] text-4xl text-[#D4AF37] font-bold">

                        <?php echo mysqli_num_rows($players); ?>

                    </h3>

                </div>

                <div
                class="rounded-[24px] border border-white/10 bg-black/20 p-5 min-w-[150px]">

                    <p class="text-white/40 uppercase tracking-[2px] text-[8px]">
                        Export
                    </p>

                    <h3
                    class="mt-3 font-['Cinzel'] text-4xl text-[#D4AF37] font-bold">

                        CSV

                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- FILTERS -->

    <form
    method="GET"
    class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-5">

        <!-- CITY -->

        <div
        class="rounded-[24px] border border-white/10 bg-white/[0.03] p-5">

            <label
            class="text-white/40 uppercase tracking-[2px] text-[9px]">

                City

            </label>

            <input
            type="text"
            name="city"
            value="<?php echo $city; ?>"
            placeholder="Enter city"
            class="mt-3 w-full h-[54px] rounded-2xl border border-white/10 bg-black/30 px-5 outline-none focus:border-[#D4AF37]/30 transition duration-300">

        </div>

        <!-- STATE -->

        <div
        class="rounded-[24px] border border-white/10 bg-white/[0.03] p-5">

            <label
            class="text-white/40 uppercase tracking-[2px] text-[9px]">

                State

            </label>

            <input
            type="text"
            name="state"
            value="<?php echo $state; ?>"
            placeholder="Enter state"
            class="mt-3 w-full h-[54px] rounded-2xl border border-white/10 bg-black/30 px-5 outline-none focus:border-[#D4AF37]/30 transition duration-300">

        </div>

        <!-- BUTTON -->

        <div class="flex items-end">

            <button
            type="submit"
            class="w-full h-[54px] rounded-2xl bg-[#D4AF37] text-black uppercase tracking-[2px] text-[10px] font-bold hover:scale-[1.02] transition duration-500">

                Filter Players

            </button>

        </div>

        <!-- DOWNLOAD -->

        <div class="flex items-end">

            <a
            href="?city=<?php echo $city; ?>&state=<?php echo $state; ?>&download=1"
            class="flex items-center justify-center w-full h-[54px] rounded-2xl border border-white/10 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500 uppercase tracking-[2px] text-[10px] text-[#F5D76E] font-bold">

                Download CSV

            </a>

        </div>

    </form>

    <!-- TABLE -->

    <div
    class="mt-8 overflow-hidden rounded-[30px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1700px]">

                <thead>

                    <tr class="border-b border-white/10 bg-black/20">

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Player
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Trial
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Mobile
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Role
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Application
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Payment
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Profile
                        </th>

                        <th class="px-6 py-5 text-left text-[10px] uppercase tracking-[2px] text-white/40">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php

                if(mysqli_num_rows($players) > 0){

                    while($row = mysqli_fetch_assoc($players)){

                ?>

                    <tr class="border-b border-white/5 hover:bg-white/[0.02] transition duration-300">

                        <!-- PLAYER -->

                        <td class="px-6 py-5">

                            <div class="flex items-center gap-4">

                                <div
                                class="w-12 h-12 rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 flex items-center justify-center font-bold text-[#D4AF37] uppercase">

                                    <?php echo strtoupper(substr($row['full_name'],0,1)); ?>

                                </div>

                                <div>

                                <h3 class="font-medium text-white">
                                        <?php echo $row['full_name']; ?>
                                    </h3>

                                    <p class="text-white/35 text-xs mt-1">
                                        <?php echo $row['email']; ?>
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- TRIAL -->

                        <td class="px-6 py-5">

                            <div>

                                <h3 class="font-medium text-white">
                                    <?php echo $row['trial_title']; ?>
                                </h3>

                                <p class="text-white/35 text-xs mt-1">

                                    <?php echo $row['city']; ?> •
                                    <?php echo date('d M Y',strtotime($row['trial_date'])); ?>

                                </p>

                            </div>

                        </td>

                        <!-- MOBILE -->

                        <td class="px-6 py-5 text-white">
                            <?php echo $row['mobile']; ?>
                        </td>

                        <!-- ROLE -->

                        <td class="px-6 py-5">

                            <span
                            class="px-4 py-2 rounded-full border border-[#D4AF37]/20 bg-[#D4AF37]/10 text-[#F5D76E] text-[10px] uppercase tracking-[2px]">

                                <?php echo $row['playing_role']; ?>

                            </span>

                        </td>

                        <!-- APPLICATION -->

                        <td class="px-6 py-5">

                            <span
                            class="px-4 py-2 rounded-full bg-green-500/10 border border-green-500/20 text-green-400 text-[10px] uppercase tracking-[2px]">

                                <?php echo $row['application_status']; ?>

                            </span>

                        </td>

                        <!-- PAYMENT -->

                        <td class="px-6 py-5">

                            <span
                            class="px-4 py-2 rounded-full bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 text-[10px] uppercase tracking-[2px]">

                                <?php echo $row['payment_status']; ?>

                            </span>

                        </td>

                        <!-- PROFILE -->

                        <td class="px-6 py-5">

                            <span
                            class="px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] uppercase tracking-[2px]">

                                <?php echo $row['profile_approved']; ?>

                            </span>

                        </td>

                        <!-- ACTIONS -->

                        <td class="px-6 py-5">

                            <div class="flex items-center gap-3">

                                <!-- APPLICATION -->

                                <a
                                href="?approve_application=<?php echo $row['id']; ?>"
                                class="flex items-center justify-center h-[42px] px-5 rounded-xl bg-[#D4AF37] text-black uppercase tracking-[2px] text-[9px] font-bold hover:scale-[1.02] transition duration-500">

                                    Approve App

                                </a>

                                <!-- PROFILE -->

                                <a
                                href="?approve_profile=<?php echo $row['id']; ?>"
                                class="flex items-center justify-center h-[42px] px-5 rounded-xl border border-white/10 bg-white/[0.03] hover:border-[#D4AF37]/20 transition duration-500 uppercase tracking-[2px] text-[9px] text-[#F5D76E] font-bold">

                                    Approve Profile

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php

                    }

                }else{

                ?>

                    <tr>

                        <td colspan="8" class="py-20 text-center">

                            <h2
                            class="font-['Cinzel'] text-4xl font-bold">

                                No Players Found

                            </h2>

                            <p class="mt-4 text-white/45">
                                No player records match your filters.
                            </p>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

    

</main>

</body>
</html>
