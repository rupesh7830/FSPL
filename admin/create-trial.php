<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Trial</title>

<!-- TAILWIND -->

<script src="https://cdn.tailwindcss.com"></script>

<!-- GOOGLE FONTS -->

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

                Create Trial

            </h1>

            <p
            class="mt-2
            text-white/40
            text-[14px]
            font-['Outfit']">

                Create and manage professional cricket trials.

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
        flex items-center">

            <h2
            class="text-white
            text-[24px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Trial Details

            </h2>

        </div>

        <!-- =================================
             FORM
        ================================== -->

        <form
        action="insert-trial.php"
        method="POST"
        enctype="multipart/form-data"
        class="p-6 lg:p-8">

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
                    font-medium
                    font-['Outfit']">

                        Trial Title

                    </label>

                    <input
                    type="text"
                    name="trial_title"
                    placeholder="FSPL Open Cricket Trials 2026"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    focus:bg-[#D4AF37]/[0.03]
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- TRIAL DATE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Trial Date

                    </label>

                    <input
                    type="date"
                    name="trial_date"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    font-['Outfit']">

                </div>

                <!-- TRIAL TIME -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Trial Time

                    </label>

                    <input
                    type="text"
                    name="trial_time"
                    placeholder="09:00 AM"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- STATE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        State

                    </label>

                    <input
                    type="text"
                    name="state"
                    placeholder="Uttar Pradesh"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- CITY -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        City

                    </label>

                    <input
                    type="text"
                    name="city"
                    placeholder="Aligarh"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- GROUND NAME -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Ground Name

                    </label>

                    <input
                    type="text"
                    name="ground_name"
                    placeholder="FSPL International Stadium"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- ENTRY FEE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Entry Fee

                    </label>

                    <input
                    type="text"
                    name="entry_fee"
                    placeholder="₹299"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- LAST DATE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Last Registration Date

                    </label>

                    <input
                    type="date"
                    name="last_date"
                    required
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    font-['Outfit']">

                </div>

                <!-- AGE GROUP -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

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
                    outline-none
                    focus:border-[#D4AF37]/40
                    font-['Outfit']">

                        <option>Under 14</option>
                        <option>Under 16</option>
                        <option>Under 19</option>
                        <option>Open</option>

                    </select>

                </div>

                <!-- CATEGORY -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

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
                    outline-none
                    focus:border-[#D4AF37]/40
                    font-['Outfit']">

                        <option>Professional</option>
                        <option>District</option>
                        <option>State</option>
                        <option>National</option>

                    </select>

                </div>

                <!-- TOTAL SLOTS -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Total Slots

                    </label>

                    <input
                    type="number"
                    name="total_slots"
                    placeholder="300"
                    class="w-full h-[58px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']">

                </div>

                <!-- STATUS -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

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
                    outline-none
                    focus:border-[#D4AF37]/40
                    font-['Outfit']">

                        <option>Upcoming</option>
                        <option>Open</option>
                        <option>Closed</option>

                    </select>

                </div>

                <!-- ADDRESS -->

                <div class="md:col-span-2">

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Address

                    </label>

                    <textarea
                    name="address"
                    rows="4"
                    placeholder="Enter complete address..."
                    class="w-full
                    p-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    resize-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']"></textarea>

                </div>

                <!-- DESCRIPTION -->

                <div class="md:col-span-2">

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Description

                    </label>

                    <textarea
                    name="description"
                    rows="5"
                    placeholder="Write trial description..."
                    class="w-full
                    p-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    outline-none
                    resize-none
                    transition-all duration-300
                    focus:border-[#D4AF37]/40
                    placeholder:text-white/20
                    font-['Outfit']"></textarea>

                </div>

                <!-- BANNER -->

                <div class="md:col-span-2">

                    <label
                    class="block mb-3
                    text-white/60
                    text-[12px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Trial Banner

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
                            font-semibold
                            font-['Outfit']">

                                Upload Trial Banner

                            </h4>

                            <p
                            class="mt-2
                            text-white/35
                            text-[13px]
                            font-['Outfit']">

                                PNG, JPG or WEBP Supported

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- =================================
                 BUTTONS
            ================================== -->

            <div
            class="flex flex-col sm:flex-row
            items-center justify-end
            gap-4
            mt-8">

                <!-- CANCEL -->

                <button
                type="button"
                class="w-full sm:w-auto
                h-[58px]
                px-8
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                text-white
                hover:bg-white/[0.05]
                transition-all duration-300
                font-medium
                font-['Outfit']">

                    Cancel

                </button>

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
                transition-all duration-300
                font-['Cinzel']">

                    Create Trial

                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>