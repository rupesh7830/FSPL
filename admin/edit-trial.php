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

<!-- TAILWIND -->

<script src="https://cdn.tailwindcss.com"></script>

<!-- GOOGLE FONTS -->

<link
href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

</head>

<body class="bg-[#050505] overflow-x-hidden">

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

                Update professional cricket trial information.

            </p>

        </div>

    </div>

    <!-- =====================================
    FORM CARD
    ====================================== -->

    <div
    class="mt-8
    rounded-[32px]
    border border-white/10
    bg-white/[0.03]
    backdrop-blur-3xl
    overflow-hidden">

        <!-- TOP -->

        <div
        class="h-[80px]
        px-6
        border-b border-white/10
        flex items-center justify-between">

            <div>

                <h2
                class="text-white
                text-[24px]
                font-bold
                tracking-[-1px]
                font-['Cinzel']">

                    Trial Details

                </h2>

            </div>

            <!-- STATUS -->

            <span
            class="px-5 py-2
            rounded-full
            border border-[#D4AF37]/20
            bg-[#D4AF37]/10
            text-[#F5D76E]
            text-[10px]
            uppercase
            tracking-[2px]
            font-bold">

                <?= $trial['status']; ?>

            </span>

        </div>

        <!-- =================================
        FORM
        ================================== -->

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

                <!-- TRIAL TITLE -->

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
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40">

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

                <!-- TOTAL SLOTS -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Total Slots

                    </label>

                    <input
                    type="number"
                    name="total_slots"
                    value="<?= $trial['total_slots']; ?>"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

            </div>

            <!-- =====================================
            PRICING SECTION
            ====================================== -->

            <div
            class="mt-8
            rounded-[30px]
            border border-[#D4AF37]/10
            bg-[#D4AF37]/[0.03]
            p-6 lg:p-7">

                <!-- HEADER -->

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <h3
                        class="text-white
                        text-[22px]
                        font-bold
                        font-['Cinzel']">

                            Trial Pricing

                        </h3>

                        <p
                        class="mt-2
                        text-white/40
                        text-[13px]">

                            Update dynamic role based pricing.

                        </p>

                    </div>

                    <!-- ICON -->

                    <div
                    class="w-16 h-16
                    rounded-3xl
                    bg-[#D4AF37]/10
                    border border-[#D4AF37]/20
                    flex items-center justify-center">

                        <span class="text-2xl">

                            💳

                        </span>

                    </div>

                </div>

                <!-- GRID -->

                <div
                class="grid
                grid-cols-1
                md:grid-cols-2
                lg:grid-cols-5
                gap-5
                mt-8">

                    <!-- REGISTRATION -->

                    <div>

                        <label
                        class="block mb-3
                        text-white/60
                        text-[11px]
                        uppercase
                        tracking-[2px]">

                            Registration Fee

                        </label>

                        <input
                        type="number"
                        name="registration_fee"
                        value="<?= $trial['registration_fee']; ?>"
                        required
                        class="w-full h-[58px]
                        px-5
                        rounded-2xl
                        border border-white/10
                        bg-[#0B0B0B]
                        text-white
                        outline-none">

                    </div>

                    <!-- BATSMAN -->

                    <div>

                        <label
                        class="block mb-3
                        text-white/60
                        text-[11px]
                        uppercase
                        tracking-[2px]">

                            Batsman Fee

                        </label>

                        <input
                        type="number"
                        name="batsman_fee"
                        value="<?= $trial['batsman_fee']; ?>"
                        required
                        class="w-full h-[58px]
                        px-5
                        rounded-2xl
                        border border-white/10
                        bg-[#0B0B0B]
                        text-white
                        outline-none">

                    </div>

                    <!-- BOWLER -->

                    <div>

                        <label
                        class="block mb-3
                        text-white/60
                        text-[11px]
                        uppercase
                        tracking-[2px]">

                            Bowler Fee

                        </label>

                        <input
                        type="number"
                        name="bowler_fee"
                        value="<?= $trial['bowler_fee']; ?>"
                        required
                        class="w-full h-[58px]
                        px-5
                        rounded-2xl
                        border border-white/10
                        bg-[#0B0B0B]
                        text-white
                        outline-none">

                    </div>

                    <!-- KEEPER -->

                    <div>

                        <label
                        class="block mb-3
                        text-white/60
                        text-[11px]
                        uppercase
                        tracking-[2px]">

                            Keeper Fee

                        </label>

                        <input
                        type="number"
                        name="keeper_fee"
                        value="<?= $trial['keeper_fee']; ?>"
                        required
                        class="w-full h-[58px]
                        px-5
                        rounded-2xl
                        border border-white/10
                        bg-[#0B0B0B]
                        text-white
                        outline-none">

                    </div>

                    <!-- ALL ROUNDER -->

                    <div>

                        <label
                        class="block mb-3
                        text-white/60
                        text-[11px]
                        uppercase
                        tracking-[2px]">

                            All Rounder Fee

                        </label>

                        <input
                        type="number"
                        name="allrounder_fee"
                        value="<?= $trial['allrounder_fee']; ?>"
                        required
                        class="w-full h-[58px]
                        px-5
                        rounded-2xl
                        border border-white/10
                        bg-[#0B0B0B]
                        text-white
                        outline-none">

                    </div>

                </div>

            </div>

            <!-- =====================================
            EXTRA DETAILS
            ====================================== -->

            <div
            class="grid
            grid-cols-1
            md:grid-cols-2
            gap-6
            mt-8">

                <!-- LAST DATE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Last Registration Date

                    </label>

                    <input
                    type="date"
                    name="last_date"
                    value="<?= $trial['last_date']; ?>"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

                <!-- AGE GROUP -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Age Group

                    </label>

                    <select
                    name="age_group"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-[#0B0B0B]
                    text-white
                    outline-none">

                        <option <?= $trial['age_group']=="Under 14" ? 'selected' : ''; ?>>
                            Under 14
                        </option>

                        <option <?= $trial['age_group']=="Under 16" ? 'selected' : ''; ?>>
                            Under 16
                        </option>

                        <option <?= $trial['age_group']=="Under 19" ? 'selected' : ''; ?>>
                            Under 19
                        </option>

                        <option <?= $trial['age_group']=="Open" ? 'selected' : ''; ?>>
                            Open
                        </option>

                    </select>

                </div>

                <!-- CATEGORY -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Category

                    </label>

                    <select
                    name="category"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-[#0B0B0B]
                    text-white
                    outline-none">

                        <option <?= $trial['category']=="Professional" ? 'selected' : ''; ?>>
                            Professional
                        </option>

                        <option <?= $trial['category']=="District" ? 'selected' : ''; ?>>
                            District
                        </option>

                        <option <?= $trial['category']=="State" ? 'selected' : ''; ?>>
                            State
                        </option>

                        <option <?= $trial['category']=="National" ? 'selected' : ''; ?>>
                            National
                        </option>

                    </select>

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

                        <option <?= $trial['status']=="Completed" ? 'selected' : ''; ?>>
                            Completed
                        </option>

                        <option <?= $trial['status']=="Cancelled" ? 'selected' : ''; ?>>
                            Cancelled
                        </option>

                    </select>

                </div>

                <!-- REGISTERED PLAYERS -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]">

                        Registered Players

                    </label>

                    <input
                    type="number"
                    name="registered_players"
                    value="<?= $trial['registered_players']; ?>"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none">

                </div>

            </div>

            <!-- ADDRESS -->

            <div class="mt-8">

                <label
                class="block mb-3
                text-white/60
                text-[12px]
                uppercase
                tracking-[2px]">

                    Address

                </label>

                <textarea
                name="address"
                rows="4"
                class="w-full
                p-5
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                text-white
                outline-none
                resize-none"><?= htmlspecialchars($trial['address']); ?></textarea>

            </div>

            <!-- DESCRIPTION -->

            <div class="mt-8">

                <label
                class="block mb-3
                text-white/60
                text-[12px]
                uppercase
                tracking-[2px]">

                    Description

                </label>

                <textarea
                name="description"
                rows="5"
                class="w-full
                p-5
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                text-white
                outline-none
                resize-none"><?= htmlspecialchars($trial['description']); ?></textarea>

            </div>

            <!-- CURRENT BANNER -->

            <?php if(!empty($trial['banner_image'])){ ?>

            <div class="mt-8">

                <label
                class="block mb-4
                text-white/60
                text-[12px]
                uppercase
                tracking-[2px]">

                    Current Banner

                </label>

                <img
                src="<?= $trial['banner_image']; ?>"
                class="w-full max-w-[500px]
                rounded-3xl
                border border-white/10">

            </div>

            <?php } ?>

            <!-- NEW BANNER -->

            <div class="mt-8">

                <label
                class="block mb-4
                text-white/60
                text-[12px]
                uppercase
                tracking-[2px]">

                    Update Banner

                </label>

                <div
                class="relative
                border-2 border-dashed border-white/10
                rounded-3xl
                p-10
                text-center
                bg-white/[0.02]">

                    <input
                    type="file"
                    name="banner_image"
                    class="absolute inset-0
                    opacity-0
                    cursor-pointer">

                    <div>

                        <div
                        class="w-20 h-20
                        mx-auto
                        rounded-3xl
                        bg-[#D4AF37]/10
                        border border-[#D4AF37]/20
                        flex items-center justify-center">

                            <span class="text-3xl">

                                📤

                            </span>

                        </div>

                        <h4
                        class="mt-5
                        text-white
                        text-[18px]
                        font-semibold">

                            Upload New Banner

                        </h4>

                        <p
                        class="mt-2
                        text-white/35
                        text-[13px]">

                            PNG, JPG or WEBP Supported

                        </p>

                    </div>

                </div>

            </div>

            <!-- BUTTONS -->

            <div
            class="flex flex-col sm:flex-row
            items-center justify-end
            gap-4
            mt-10">

                <!-- CANCEL -->

                <a
                href="trials.php"
                class="w-full sm:w-auto
                h-[58px]
                px-8
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                text-white
                hover:bg-white/[0.05]
                transition-all duration-300
                flex items-center justify-center">

                    Cancel

                </a>

                <!-- SUBMIT -->

                <button
                type="submit"
                class="w-full sm:w-auto
                h-[58px]
                px-10
                rounded-2xl
                bg-[#D4AF37]
                text-black
                text-[13px]
                uppercase
                tracking-[2px]
                font-bold
                shadow-[0_0_35px_rgba(212,175,55,0.25)]
                hover:scale-[1.02]
                transition-all duration-300">

                    Update Trial

                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>