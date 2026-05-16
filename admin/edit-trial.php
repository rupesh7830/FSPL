<?php

require_once 'config/db_connect.php';

/* =========================================
   GET ID
========================================= */

if(!isset($_GET['id'])){

    header("Location: trials.php");
    exit();

}

$id = intval($_GET['id']);

/* =========================================
   FETCH TRIAL
========================================= */

$stmt = $conn->prepare("
    SELECT *
    FROM trials
    WHERE id = ?
");

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$trial = $result->fetch_assoc();

/* =========================================
   NOT FOUND
========================================= */

if(!$trial){

    header("Location: trials.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Trial</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-[#050505] overflow-x-hidden">

<!-- SIDEBAR -->

<?php include 'includes/sidebar.php'; ?>

<!-- NAVBAR -->

<?php include 'includes/navbar.php'; ?>

<!-- MAIN -->

<main
class="lg:ml-[280px]
pt-[100px]
p-5 lg:p-8">

    <!-- HEADER -->

    <div>

        <h1
        class="text-white
        text-[36px]
        font-bold
        tracking-[-1px]
        font-['Cinzel']">

            Edit Trial

        </h1>

        <p
        class="mt-2
        text-white/40
        text-[14px]
        font-['Outfit']">

            Update trial information and settings.

        </p>

    </div>

    <!-- FORM CARD -->

    <div
    class="mt-8
    rounded-[32px]
    border border-white/10
    bg-white/[0.03]
    backdrop-blur-3xl">

        <form
        action="update-trial.php"
        method="POST"
        enctype="multipart/form-data"
        class="p-6 lg:p-8">

            <!-- ID -->

            <input
            type="hidden"
            name="id"
            value="<?= $trial['id']; ?>">

            <!-- GRID -->

            <div
            class="grid
            grid-cols-1
            md:grid-cols-2
            gap-6">

                <!-- TITLE -->

                <div class="md:col-span-2">

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium">

                        Trial Title

                    </label>

                    <input
                    type="text"
                    name="trial_title"
                    value="<?= htmlspecialchars($trial['trial_title']); ?>"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- DATE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Trial Date

                    </label>

                    <input
                    type="date"
                    name="trial_date"
                    value="<?= $trial['trial_date']; ?>"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- TIME -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Trial Time

                    </label>

                    <input
                    type="text"
                    name="trial_time"
                    value="<?= htmlspecialchars($trial['trial_time']); ?>"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- STATE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        State

                    </label>

                    <input
                    type="text"
                    name="state"
                    value="<?= htmlspecialchars($trial['state']); ?>"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- CITY -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        City

                    </label>

                    <input
                    type="text"
                    name="city"
                    value="<?= htmlspecialchars($trial['city']); ?>"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- GROUND -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Ground Name

                    </label>

                    <input
                    type="text"
                    name="ground_name"
                    value="<?= htmlspecialchars($trial['ground_name']); ?>"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- FEE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Entry Fee

                    </label>

                    <input
                    type="text"
                    name="entry_fee"
                    value="<?= htmlspecialchars($trial['entry_fee']); ?>"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- STATUS -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Status

                    </label>

                    <select
                    name="status"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-[#0B0B0B]
                    text-white
                    outline-none">

                        <option <?= $trial['status']=="Upcoming" ? 'selected' : ''; ?>>
                            Upcoming
                        </option>

                        <option <?= $trial['status']=="Open" ? 'selected' : ''; ?>>
                            Open
                        </option>

                        <option <?= $trial['status']=="Closed" ? 'selected' : ''; ?>>
                            Closed
                        </option>

                    </select>

                </div>

            </div>

            <!-- BUTTONS -->

            <div
            class="flex justify-end gap-4
            mt-8">

                <a
                href="trials.php"
                class="h-[56px]
                px-8
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                text-white
                flex items-center justify-center">

                    Cancel

                </a>

                <button
                type="submit"
                class="h-[56px]
                px-10
                rounded-2xl
                bg-[#D4AF37]
                text-black
                font-bold
                uppercase
                tracking-[2px]">

                    Update Trial

                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>