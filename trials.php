<?php 

session_start();

include "admin/config/db_connect.php";

/* =========================================
   UPCOMING TRIAL
========================================= */

$status = "Upcoming";

$stmt = $conn->prepare("
SELECT *
FROM trials
WHERE status = ?
LIMIT 1
");

$stmt->bind_param("s", $status);

$stmt->execute();

$result = $stmt->get_result();

$trial = $result->fetch_assoc();

/* =========================================
   TRIALS LIST
========================================= */

$page = 1;

$limit = 3;

$offset = ($page - 1) * $limit;

$stmt2 = $conn->prepare("
SELECT *
FROM trials
LIMIT ?, ?
");

$stmt2->bind_param("ii", $offset, $limit);

$stmt2->execute();

$result = $stmt2->get_result();

?>

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- =========================================
    PAGE TITLE
    ========================================= -->

    <title>
        FSPL Cricket Trials 2026 | Future Star Premier League Registration
    </title>

    <!-- =========================================
    META DESCRIPTION
    ========================================= -->

    <meta
    name="description"
    content="Register for official FSPL Cricket Trials 2026 and showcase your talent in front of professional selectors, coaches, and franchise teams across India.">

    <!-- =========================================
    META KEYWORDS
    ========================================= -->

    <meta
    name="keywords"
    content="FSPL trials, cricket trials India, cricket registration, cricket tournament, cricket selection, Future Star Premier League, cricket academy India, cricket talent hunt">

    <!-- =========================================
    AUTHOR
    ========================================= -->

    <meta
    name="author"
    content="Future Star Premier League">

    <!-- =========================================
    ROBOTS
    ========================================= -->

    <meta
    name="robots"
    content="index, follow">

    <!-- =========================================
    THEME COLOR
    ========================================= -->

    <meta
    name="theme-color"
    content="#050505">

    <!-- =========================================
    CANONICAL URL
    ========================================= -->

    <link
    rel="canonical"
    href="https://yourdomain.com/trials">

    <!-- =========================================
    OPEN GRAPH SEO
    ========================================= -->

    <meta
    property="og:title"
    content="FSPL Cricket Trials 2026">

    <meta
    property="og:description"
    content="Join FSPL Cricket Trials and get selected by elite cricket scouts and professional franchise teams.">

    <meta
    property="og:image"
    content="https://yourdomain.com/assets/images/trial-banner.webp">

    <meta
    property="og:url"
    content="https://yourdomain.com/trials">

    <meta
    property="og:type"
    content="website">

    <!-- =========================================
    TWITTER SEO
    ========================================= -->

    <meta
    name="twitter:card"
    content="summary_large_image">

    <meta
    name="twitter:title"
    content="FSPL Cricket Trials 2026">

    <meta
    name="twitter:description"
    content="Participate in FSPL Trials and showcase your cricket talent professionally.">

    <meta
    name="twitter:image"
    content="https://yourdomain.com/assets/images/trial-banner.webp">

    <!-- =========================================
    FAVICON
    ========================================= -->

    <link
    rel="icon"
    type="image/png"
    href="assets/images/favicon.png">

    <!-- =========================================
    GOOGLE FONTS
    ========================================= -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
    href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600&display=swap"
    rel="stylesheet">

    <!-- =========================================
    TAILWIND CSS
    ========================================= -->

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- =========================================
    SCHEMA MARKUP SEO
    ========================================= -->

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SportsEvent",
      "name": "FSPL Cricket Trials 2026",
      "description": "Official cricket trials organized by Future Star Premier League for emerging cricket talent in India.",
      "sport": "Cricket",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "organizer": {
        "@type": "SportsOrganization",
        "name": "Future Star Premier League",
        "url": "https://yourdomain.com"
      }
    }
    </script>
    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
html,
body{
    margin:0;
    padding:0;
    overflow-x:hidden;
    background:#050505;
}
</style>

</head>
<body>

<?php include "components/navbar.php"; ?>

<section class="relative overflow-hidden min-h-[100svh] bg-[#050505] flex items-center pt-20 lg:pt-0 px-4 sm:px-5">

    <div class="absolute inset-0">

        <img
        src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1800&auto=format&fit=crop"
        alt=""
        class="w-full h-full object-cover opacity-[0.05] scale-105">

        <!-- OVERLAY -->

        <div class="absolute inset-0 bg-black/90"></div>

        <!-- GOLD LIGHT -->

        <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(212,175,55,0.08),transparent_60%)]">
        </div>

    </div>

    <!-- GLOW -->

    <div
    class="absolute top-[-250px] left-[-150px] w-[550px] h-[550px] bg-[#D4AF37]/10 blur-[160px] rounded-full animate-pulse">
    </div>

    <div
    class="absolute bottom-[-250px] right-[-150px] w-[550px] h-[550px] bg-[#D4AF37]/5 blur-[160px] rounded-full animate-pulse">
    </div>

    <!-- MAIN -->

    <div
    class="relative z-10 max-w-6xl mx-auto lg:px-8 w-full">

        <div
        class="grid grid-cols-1 xl:grid-cols-[1fr_340px] gap-10 items-center">

            <!-- =========================================
                 LEFT CONTENT
            ========================================= -->

            <div
                data-aos="fade-right"
                class="px-1 sm:px-0 pt-4 sm:pt-0">

                <!-- LABEL -->

                <div
                class="inline-flex items-center gap-2 border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl px-3 sm:px-4 py-2 rounded-full">

                    <span
                    class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse">
                    </span>

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[2px] sm:tracking-[3px]
                    text-[9px]
                    text-[#F5D76E]/90
                    font-medium">

                        Future Star Premier League

                    </span>

                </div>

                <!-- HEADING -->

                <h1
                class="mt-6 font-['Cinzel']
                text-white
                text-[42px]
                sm:text-[48px]
                lg:text-[58px]
                leading-[1.05]
                font-bold
                tracking-[-1px]
                max-w-[700px]">

                    Elite Cricket

                    <span class="block text-[#D4AF37] mt-2">

                        Trials 2026

                    </span>

                </h1>

                <!-- DESCRIPTION -->

                <p
                    class="mt-5 max-w-[560px]
                    text-white/60
                    font-['Outfit']
                    text-[15px]
                    sm:text-[16px]
                    leading-[28px]
                    sm:leading-[32px]
                    font-light">

                    Step into India’s premium cricket scouting platform and showcase your talent in front of professional selectors and elite mentors.

                </p>

                <!-- BUTTONS -->

                <div
                class="flex flex-col sm:flex-row items-start gap-3 mt-8">

                    <!-- BUTTON -->

                    <a
                    href="register"
                    class="group relative overflow-hidden h-[46px] px-7 rounded-full bg-[#D4AF37] shadow-[0_0_30px_rgba(212,175,55,0.18)] hover:scale-105 transition duration-500">

                        <!-- SHINE -->

                        <div
                        class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000">
                        </div>

                        <!-- CONTENT -->

                        <div
                        class="relative flex items-center gap-3 h-full">

                            <span
                            class="font-['Cinzel']
                            uppercase
                            tracking-[2px]
                            text-[9px]
                            font-bold
                            text-black">

                                Register Now

                            </span>

                            <!-- ICON -->

                            <div
                            class="w-7 h-7 rounded-full bg-black/10 flex items-center justify-center">

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="w-3 h-3 text-black">

                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"/>

                                </svg>

                            </div>

                        </div>

                    </a>

                    <!-- BUTTON -->

                    <a
                    href="#upcoming-trials"
                    class="group relative overflow-hidden h-[46px] px-7 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-2xl hover:border-[#D4AF37]/40 transition duration-500">

                        <!-- CONTENT -->

                        <div
                        class="relative flex items-center gap-3 h-full">

                            <span
                            class="font-['Cinzel']
                            uppercase
                            tracking-[2px]
                            text-[9px]
                            font-bold
                            text-[#F5D76E]">

                                View Schedule

                            </span>

                            <!-- ICON -->

                            <div
                            class="w-7 h-7 rounded-full border border-[#D4AF37]/20 flex items-center justify-center transition duration-300 group-hover:translate-x-1">

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="w-3 h-3 text-[#F5D76E]">

                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"/>

                                </svg>

                            </div>

                        </div>

                    </a>

                </div>

                <!-- STATS -->

                <div
                class="grid grid-cols-2 lg:grid-cols-4 gap-3 mt-10">

                    <!-- ITEM -->

                    <div
                    class="group rounded-[20px]
                    border border-white/5
                    bg-white/[0.03]
                    backdrop-blur-2xl
                    py-5 px-4
                    hover:border-[#D4AF37]/20
                    hover:-translate-y-1
                    transition duration-500">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl lg:text-3xl
                        font-bold">

                            25+

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[8px] uppercase tracking-[2px] font-['Outfit']">

                            Trial Cities

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="group rounded-[20px]
                    border border-white/5
                    bg-white/[0.03]
                    backdrop-blur-2xl
                    py-5 px-4
                    hover:border-[#D4AF37]/20
                    hover:-translate-y-1
                    transition duration-500">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl lg:text-3xl
                        font-bold">

                            12K+

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[8px] uppercase tracking-[2px] font-['Outfit']">

                            Registered Players

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="group rounded-[20px]
                    border border-white/5
                    bg-white/[0.03]
                    backdrop-blur-2xl
                    py-5 px-4
                    hover:border-[#D4AF37]/20
                    hover:-translate-y-1
                    transition duration-500">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl lg:text-3xl
                        font-bold">

                            100%

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[8px] uppercase tracking-[2px] font-['Outfit']">

                            Fair Selection

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="group rounded-[20px]
                    border border-white/5
                    bg-white/[0.03]
                    backdrop-blur-2xl
                    py-5 px-4
                    hover:border-[#D4AF37]/20
                    hover:-translate-y-1
                    transition duration-500">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl lg:text-3xl
                        font-bold">

                            ₹80K

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[8px] uppercase tracking-[2px] font-['Outfit']">

                            Winning Prize

                        </p>

                    </div>

                </div>

            </div>

            <!-- =========================================
                 RIGHT FLOATING CARD
            ========================================= -->
            <div
            class="hidden xl:block"
            data-aos="fade-left">

                <!-- CARD -->

                <div
                class="group relative overflow-hidden rounded-[28px]
                border border-white/10
                bg-white/[0.03]
                backdrop-blur-3xl
                p-5
                hover:-translate-y-2
                hover:border-[#D4AF37]/30
                transition duration-700">

                    <!-- GOLD LIGHT --> 


                    <div
                    class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/10 to-transparent">
                    </div>

                    <!-- CONTENT -->

                    <div class="relative">

                        <!-- TOP -->

                        <div
                        class="flex items-center justify-between">

                            <div>

                                <span
                                class="text-[#D4AF37]/80 uppercase tracking-[2px] text-[8px] font-['Outfit']">

                                    Upcoming Trials

                                </span>

                                <h3
                                class="mt-2 font-['Cinzel']
                                text-white
                                text-[28px]
                                leading-[1.1]
                                font-bold">

                                        <?php echo $trial['trial_title']; ?>

                                </h3>

                            </div>

                            <!-- DATE -->

                            <div
                            class="w-[72px] h-[72px] rounded-[22px] border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex flex-col items-center justify-center">

                                <span
                                class="font-['Cinzel']
                                text-[#D4AF37]
                                text-2xl
                                font-bold">

                                    <?php echo date('d', strtotime($trial['trial_date'])); ?>

                                </span>

                                <span
                                class="mt-1 text-white/45 text-[8px] uppercase tracking-[2px]">

                                    <?php echo date('M', strtotime($trial['trial_date'])); ?>

                                </span>

                            </div>

                        </div>

                        <!-- DETAILS -->

                        <div class="space-y-4 mt-7">

                            <!-- ITEM -->

                            <div
                            class="flex items-center justify-between border-b border-white/5 pb-3">

                                <span
                                class="text-white/45 uppercase tracking-[2px] text-[8px]">

                                    Venue

                                </span>

                                <span
                                class="text-white text-[12px]">

                                    <?php echo $trial['ground_name']; ?>

                                </span>

                            </div>

                            <!-- ITEM -->

                            <div
                            class="flex items-center justify-between border-b border-white/5 pb-3">

                                <span
                                class="text-white/45 uppercase tracking-[2px] text-[8px]">

                                    Slots Left

                                </span>

                                <span
                                class="text-[#D4AF37] text-[12px] font-medium">

                                    <?php echo $trial['total_slots']; ?> Remaining

                                </span>

                            </div>

                            <!-- ITEM -->

                            <div
                            class="flex items-center justify-between border-b border-white/5 pb-3">

                                <span
                                class="text-white/45 uppercase tracking-[2px] text-[8px]">

                                    Trial Type

                                </span>

                                <span
                                class="text-white text-[12px]">

                                    Open Selection

                                </span>

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <a href="register?redirect=apply?trial_id=<?php echo $trial['id']; ?>"
                        class="group relative overflow-hidden flex items-center justify-center w-full h-[46px] rounded-xl bg-[#D4AF37] mt-7 shadow-[0_0_30px_rgba(212,175,55,0.18)] hover:scale-[1.02] transition duration-500">

                            <!-- SHINE -->

                            <div
                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000">
                            </div>

                            <!-- TEXT -->

                            <span
                            class="relative font-['Cinzel']
                            uppercase
                            tracking-[2px]
                            text-[8px]
                            font-bold
                            text-black">

                                Book Trial Slot

                            </span>

                        </a>

                    </div>

                </div>          

            </div>

        </div>

    </div>

</section>

<!-- AOS -->

<link
rel="stylesheet"
href="https://unpkg.com/aos@2.3.4/dist/aos.css"/>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>

AOS.init({

    duration: 1000,
    once: true

});

</script>
<!-- =========================================
UPCOMING TRIALS SECTION
========================================= -->

<section
id="upcoming-trials"
class="relative overflow-hidden py-20 lg:py-32 bg-[#050505]">

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
    class="absolute top-[-200px] right-[-150px] w-[600px] h-[600px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div
    class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">

        <!-- =========================================
             SECTION HEADER
        ========================================= -->

        <div
        class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10 top-10">

            <!-- LEFT -->

            <div class="max-w-3xl">

                <!-- LABEL -->

                <div
                class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl px-5 py-3 rounded-full">

                    <span
                    class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse">
                    </span>

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[4px]
                    text-[10px]
                    lg:text-[11px]
                    text-[#F5D76E]/90
                    font-medium">

                        Upcoming Trials

                    </span>

                </div>

                <!-- HEADING -->

                <h2
                class="mt-8 font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[55px]
                leading-[0.95]
                font-bold
                tracking-[-3px]">

                    Choose Your

                    <span class="block text-[#D4AF37] mt-3">

                        Trial Location

                    </span>

                </h2>

                <!-- DESC -->

                <p
                class="mt-8 max-w-[750px]
                text-white/50
                font-['Outfit']
                text-[15px]
                lg:text-[17px]
                leading-[34px]
                lg:leading-[38px]
                font-light">

                    Select your nearest city and secure your spot before registrations close. Limited trial slots are available for each location.

                </p>

            </div>

            <!-- RIGHT -->

            <a
            href="trials"
            class="group relative overflow-hidden w-fit h-[54px] lg:h-[58px] px-8 lg:px-10 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-2xl">

                <!-- HOVER -->

                <div
                class="absolute inset-0 bg-gradient-to-r from-[#D4AF37]/0 via-[#D4AF37]/20 to-[#D4AF37]/0 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- CONTENT -->

                <div
                class="relative flex items-center gap-4 h-full">

                    <span
                    class="font-['Cinzel']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    lg:text-[11px]
                    font-bold
                    text-[#F5D76E]">

                        View All Trials

                    </span>

                    <div
                    class="w-8 h-8 rounded-full border border-[#D4AF37]/20 flex items-center justify-center transition duration-300 group-hover:translate-x-1">

                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-3.5 h-3.5 text-[#F5D76E]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"/>

                        </svg>

                    </div>

                </div>

            </a>

        </div>


        <!-- =========================================
             TRIALS GRID
        ========================================= -->

        <div
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-7 mt-16 lg:mt-20">

            <!-- =========================================
                 CARD 1
            ========================================= -->

             <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <div
            class="group relative overflow-hidden rounded-[32px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 lg:p-7 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- LIGHT -->

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- TOP -->

                <div
                class="relative flex items-start justify-between gap-5">

                    <!-- INFO -->

                    <div>

                        <span
                        class="text-[#D4AF37]/80 uppercase tracking-[3px] text-[10px] font-['Outfit']">

                         <?php echo $row['trial_title'] ?>

                        </span>

                        <h3
                        class="mt-3 font-['Cinzel']
                        text-white
                        text-3xl
                        leading-[1.1]
                        font-bold">

                            <?php echo $row['state'] ?>

                        </h3>

                    </div>

                    <!-- DATE -->

                    <div
                    class="w-[88px] h-[88px] rounded-3xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex flex-col items-center justify-center shrink-0">

                        <span
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-3xl
                        font-bold">

                            <?php echo date('d', strtotime($row['trial_date'])); ?>

                        </span>

                        <span
                        class="mt-1 text-white/45 text-[10px] uppercase tracking-[3px]">

                            <?php echo date('M', strtotime($row['trial_date'])); ?>

                        </span>

                    </div>

                </div>

                <!-- DETAILS -->

                <div class="relative space-y-5 mt-10">

                    <!-- ITEM -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/45 uppercase tracking-[2px] text-[10px]">

                            Venue

                        </span>

                        <span
                        class="text-white text-[14px]">

                            <?php echo $row['ground_name'] ?>

                        </span>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/45 uppercase tracking-[2px] text-[10px]">

                            Registration Fee

                        </span>

                        <span
                        class="text-[#D4AF37] text-[14px] font-medium">

                            ₹<?php echo $row['registration_fee'] ?>

                        </span>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="flex items-center justify-between border-b border-white/5 pb-4">

                        <span
                        class="text-white/45 uppercase tracking-[2px] text-[10px]">

                            Slots Left

                        </span>

                        <span
                        class="text-white text-[14px]">

                            <?php echo $row['total_slots'] ?> Remaining

                        </span>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="flex items-center justify-between">

                        <span
                        class="text-white/45 uppercase tracking-[2px] text-[10px]">

                            Trial Type

                        </span>

                        <span
                        class="text-white text-[14px]">

                            <?php echo $row['status'] ?> Selection

                        </span>

                    </div>

                </div>

                <!-- BUTTON -->

                <a href="register?redirect=apply?trial_id=<?php echo $row['id']; ?>"
                class="group/btn relative overflow-hidden flex items-center justify-center w-full h-[56px] rounded-2xl bg-[#D4AF37] mt-10 shadow-[0_0_35px_rgba(212,175,55,0.18)]">

                    <!-- SHINE -->

                    <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover/btn:translate-x-full transition duration-1000">
                    </div>

                    <!-- TEXT -->

                    <span
                    class="relative font-['Cinzel']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-bold
                    text-black">

                        Reserve Slot

                    </span>

                </a>

            </div>

            <?php } ?>

        </div>

    </div>

</section>

<!-- =========================================
TRIAL CATEGORIES SECTION
CLEAN PREMIUM 4 CARDS UI
========================================= -->
<section class="relative overflow-hidden py-16 lg:py-0 bg-[#050505]">

    <!-- PREMIUM GLOW -->

    <div class="absolute bottom-[-250px] left-[-150px] w-[650px] h-[650px] bg-[#D4AF37]/5 blur-[180px] rounded-full"></div>

    <div class="absolute top-[-250px] right-[-120px] w-[500px] h-[500px] bg-[#D4AF37]/5 blur-[160px] rounded-full"></div>

    <!-- MAIN CONTAINER -->

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->

        <div class="text-center max-w-3xl mx-auto">

            <!-- LABEL -->

            <div class="inline-flex items-center gap-3 px-5 py-3 rounded-full
            border border-[#D4AF37]/20
            bg-white/[0.03]
            backdrop-blur-xl">

                <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                <span class="uppercase tracking-[4px] text-[10px] sm:text-[11px]
                text-[#F5D76E]/90 font-semibold">

                    Trial Categories

                </span>

            </div>

            <!-- HEADING -->
                <h2 class="mt-7 text-white font-bold leading-none
                text-[36px]
                sm:text-[48px]
                lg:text-[64px]
                tracking-[-2px]">

                    Unlock Your

                    <span class="block text-[#D4AF37] mt-2">
                        Cricket Potential
                    </span>

                </h2>

            <!-- DESCRIPTION -->

            <p class="mt-6 text-white/55 text-[14px] sm:text-[16px]
            leading-[28px] max-w-[760px] mx-auto">

                Select the category that best represents your cricketing strengths,
                skills and playing style during the trials.

            </p>

        </div>


<?php

$roles = [

    [
        'number' => '01',
        'title'  => 'Batsman',
        'fee'    => $trial['batsman_fee'],
        'icon'   => '🏏',
        'desc'   => 'Showcase timing, clean hitting and elite footwork under pressure.',
        'tags'   => ['Timing','Power','Footwork']
    ],

    [
        'number' => '02',
        'title'  => 'Bowler',
        'fee'    => $trial['bowler_fee'],
        'icon'   => '⚡',
        'desc'   => 'Dominate with pace, swing and perfect bowling accuracy.',
        'tags'   => ['Speed','Swing','Accuracy']
    ],

    [
        'number' => '03',
        'title'  => 'Wicket Keeper',
        'fee'    => $trial['keeper_fee'],
        'icon'   => '🧤',
        'desc'   => 'Display quick reflexes, catching and sharp stumpings.',
        'tags'   => ['Reflex','Catching','Stumping']
    ],

    [
        'number' => '04',
        'title'  => 'All-Rounder',
        'fee'    => $trial['allrounder_fee'],
        'icon'   => '🔥',
        'desc'   => 'Prove your complete cricket skills in every department.',
        'tags'   => ['Batting','Bowling','Fitness']
    ]

];

?>

<div class="grid 
grid-cols-1 
md:grid-cols-2 
xl:grid-cols-4 
gap-5 lg:gap-6 
mt-14">

<?php foreach($roles as $role){ ?>

<div class="group relative overflow-hidden rounded-[28px]
bg-white/[0.04]
border border-white/10
backdrop-blur-2xl
p-5
transition-all duration-500
hover:-translate-y-2
hover:border-[#D4AF37]/40
hover:shadow-[0_20px_70px_rgba(212,175,55,0.16)]">

    <!-- HOVER GLOW -->

    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 pointer-events-none">
        <div class="absolute -top-20 right-[-40px]
        w-[180px] h-[180px]
        bg-[#D4AF37]/20
        blur-[90px]
        rounded-full"></div>

    </div>

    <!-- TOP -->

    <div class="relative flex items-center justify-between">

        <span class="text-[#D4AF37]/70 text-[11px]
        tracking-[3px] uppercase font-semibold">

            <?php echo $role['number']; ?>

        </span>

        <!-- ICON -->

        <div class="w-14 h-14 rounded-2xl
        bg-gradient-to-br from-[#D4AF37]/20 to-[#D4AF37]/5
        border border-[#D4AF37]/20
        flex items-center justify-center
        text-[26px]
        shadow-[0_0_30px_rgba(212,175,55,0.15)]">

            <?php echo $role['icon']; ?>

        </div>

    </div>

    <!-- TITLE -->

    <h3 class="mt-5 text-white text-[24px]
    font-bold tracking-[-1px]">

        <?php echo $role['title']; ?>

    </h3>

    <!-- DESCRIPTION -->

    <p class="mt-3 text-white/50 text-[13px]
    leading-[24px]">

        <?php echo $role['desc']; ?>

    </p>

    <!-- TAGS -->

    <div class="flex flex-wrap gap-2 mt-5">

        <?php foreach($role['tags'] as $tag){ ?>

        <span class="px-3 py-1 rounded-full
        bg-white/[0.05]
        border border-white/10
        text-[11px] text-white/70">

            <?php echo $tag; ?>

        </span>

        <?php } ?>

    </div>

    <!-- FOOTER -->

    <div class="mt-6 flex items-end justify-between">

        <!-- PRICE -->

        <div>

            <p class="text-white/35 uppercase
            tracking-[2px] text-[9px]">

                Registration

            </p>

            <h4 class="text-[#D4AF37]
            text-[30px]
            font-bold mt-1">

                ₹<?php echo $role['fee']; ?>

            </h4>

        </div>

        <!-- BUTTON -->

        <a
        href="direct-register?trial_id=<?php echo $trial['id']; ?>&role=<?php echo urlencode($role['title']); ?>"
        class="relative z-20 h-[46px] px-6 rounded-xl
        bg-[#D4AF37]
        text-black
        text-[11px]
        font-bold
        uppercase tracking-[2px]
        flex items-center justify-center
        transition duration-300
        hover:scale-105 cursor-pointer">

            Register

        </a>

    </div>

</div>

<?php } ?>

</div>

    </div>

</section>

<!-- =========================================
SELECTION PROCESS SECTION
========================================= -->

<section
class="relative overflow-hidden py-20 lg:py-32 bg-[#050505]">

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
    class="absolute top-[-250px] right-[-150px] w-[650px] h-[650px] bg-[#D4AF37]/5 blur-[180px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div
    class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8">

        <!-- =========================================
             HEADER
        ========================================= -->

        <div
        class="text-center max-w-4xl mx-auto">

            <!-- LABEL -->

            <div
            class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl px-5 py-3 rounded-full">

                <span
                class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse">
                </span>

                <span
                class="font-['Outfit']
                uppercase
                tracking-[4px]
                text-[10px]
                lg:text-[11px]
                text-[#F5D76E]/90
                font-medium">

                    Selection Process

                </span>

            </div>

            <!-- HEADING -->

            <h2
            class="mt-8 font-['Cinzel']
            text-white
            text-4xl
            sm:text-5xl
            lg:text-[55px]
            leading-[0.95]
            font-bold
            tracking-[-3px]">

                Transparent &

                <span class="block text-[#D4AF37] mt-3">

                    Performance Based

                </span>

            </h2>

            <!-- DESC -->

            <p
            class="mt-8 max-w-[760px] mx-auto
            text-white/50
            font-['Outfit']
            text-[15px]
            lg:text-[17px]
            leading-[34px]
            lg:leading-[38px]
            font-light">

                Every player is evaluated through a professional and transparent scouting process designed to identify true cricketing talent.

            </p>

        </div>


        <!-- =========================================
             DESKTOP TIMELINE
        ========================================= -->

        <div class="hidden xl:block relative mt-24">

            <!-- LINE -->

            <div
            class="absolute top-[42px] left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent">
            </div>

            <!-- GRID -->

            <div
            class="grid grid-cols-5 gap-6">

                <!-- =========================================
                     STEP 1
                ========================================= -->

                <div
                class="group relative">

                    <!-- DOT -->

                    <div
                    class="relative z-10 w-20 h-20 mx-auto rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shadow-[0_0_40px_rgba(212,175,55,0.08)]">

                        <span
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        font-bold">

                            01

                        </span>

                    </div>

                    <!-- CARD -->

                    <div
                    class="relative mt-10 rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 hover:border-[#D4AF37]/20 transition duration-500">

                        <!-- ICON -->

                        <div
                        class="w-14 h-14 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center text-2xl">

                            📝

                        </div>

                        <!-- TITLE -->

                        <h3
                        class="mt-6 font-['Cinzel']
                        text-white
                        text-2xl
                        leading-[1.1]
                        font-bold">

                            Registration

                        </h3>

                        <!-- DESC -->

                        <p
                        class="mt-4 text-white/45 text-[13px] leading-[28px]">

                            Players complete the online registration and select their trial category.

                        </p>

                    </div>

                </div>


                <!-- =========================================
                     STEP 2
                ========================================= -->

                <div
                class="group relative">

                    <div
                    class="relative z-10 w-20 h-20 mx-auto rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shadow-[0_0_40px_rgba(212,175,55,0.08)]">

                        <span
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        font-bold">

                            02

                        </span>

                    </div>

                    <div
                    class="relative mt-10 rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 hover:border-[#D4AF37]/20 transition duration-500">

                        <div
                        class="w-14 h-14 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center text-2xl">

                            🏏

                        </div>

                        <h3
                        class="mt-6 font-['Cinzel']
                        text-white
                        text-2xl
                        leading-[1.1]
                        font-bold">

                            Trial Session

                        </h3>

                        <p
                        class="mt-4 text-white/45 text-[13px] leading-[28px]">

                            Players showcase their batting, bowling and fielding skills in trials.

                        </p>

                    </div>

                </div>


                <!-- =========================================
                     STEP 3
                ========================================= -->

                <div
                class="group relative">

                    <div
                    class="relative z-10 w-20 h-20 mx-auto rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shadow-[0_0_40px_rgba(212,175,55,0.08)]">

                        <span
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        font-bold">

                            03

                        </span>

                    </div>

                    <div
                    class="relative mt-10 rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 hover:border-[#D4AF37]/20 transition duration-500">

                        <div
                        class="w-14 h-14 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center text-2xl">

                            📊

                        </div>

                        <h3
                        class="mt-6 font-['Cinzel']
                        text-white
                        text-2xl
                        leading-[1.1]
                        font-bold">

                            Match Assessment

                        </h3>

                        <p
                        class="mt-4 text-white/45 text-[13px] leading-[28px]">

                            Match temperament, decision making and consistency are evaluated.

                        </p>

                    </div>

                </div>


                <!-- =========================================
                     STEP 4
                ========================================= -->

                <div
                class="group relative">

                    <div
                    class="relative z-10 w-20 h-20 mx-auto rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shadow-[0_0_40px_rgba(212,175,55,0.08)]">

                        <span
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        font-bold">

                            04

                        </span>

                    </div>

                    <div
                    class="relative mt-10 rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 hover:border-[#D4AF37]/20 transition duration-500">

                        <div
                        class="w-14 h-14 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center text-2xl">

                            🔍

                        </div>

                        <h3
                        class="mt-6 font-['Cinzel']
                        text-white
                        text-2xl
                        leading-[1.1]
                        font-bold">

                            Analysis

                        </h3>

                        <p
                        class="mt-4 text-white/45 text-[13px] leading-[28px]">

                            Coaches and analysts review player performance and statistics.

                        </p>

                    </div>

                </div>


                <!-- =========================================
                     STEP 5
                ========================================= -->

                <div
                class="group relative">

                    <div
                    class="relative z-10 w-20 h-20 mx-auto rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shadow-[0_0_40px_rgba(212,175,55,0.08)]">

                        <span
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        font-bold">

                            05

                        </span>

                    </div>

                    <div
                    class="relative mt-10 rounded-[28px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-6 hover:border-[#D4AF37]/20 transition duration-500">

                        <div
                        class="w-14 h-14 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center text-2xl">

                            🏆

                        </div>

                        <h3
                        class="mt-6 font-['Cinzel']
                        text-white
                        text-2xl
                        leading-[1.1]
                        font-bold">

                            Final Selection

                        </h3>

                        <p
                        class="mt-4 text-white/45 text-[13px] leading-[28px]">

                            Top performers are selected for elite FSPL league opportunities.

                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================================
             MOBILE TIMELINE
        ========================================= -->

        <div
        class="xl:hidden relative mt-16 space-y-6">

            <!-- LINE -->

            <div
            class="absolute left-[34px] top-0 bottom-0 w-[2px] bg-gradient-to-b from-[#D4AF37]/40 to-transparent">
            </div>

            <!-- ITEM -->

            <div
            class="relative flex gap-5">

                <!-- NUMBER -->

                <div
                class="relative z-10 w-[70px] h-[70px] rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel']
                    text-[#D4AF37]
                    text-2xl
                    font-bold">

                        01

                    </span>

                </div>

                <!-- CARD -->

                <div
                class="flex-1 rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-2xl
                    font-bold">

                        Registration

                    </h3>

                    <p
                    class="mt-3 text-white/45 text-[13px] leading-[28px]">

                        Players complete the online registration and select their trial category.

                    </p>

                </div>

            </div>

            <!-- ITEM -->

            <div
            class="relative flex gap-5">

                <div
                class="relative z-10 w-[70px] h-[70px] rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel']
                    text-[#D4AF37]
                    text-2xl
                    font-bold">

                        02

                    </span>

                </div>

                <div
                class="flex-1 rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-2xl
                    font-bold">

                        Trial Session

                    </h3>

                    <p
                    class="mt-3 text-white/45 text-[13px] leading-[28px]">

                        Players showcase batting, bowling and fielding skills during trials.

                    </p>

                </div>

            </div>

            <!-- ITEM -->

            <div
            class="relative flex gap-5">

                <div
                class="relative z-10 w-[70px] h-[70px] rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel']
                    text-[#D4AF37]
                    text-2xl
                    font-bold">

                        03

                    </span>

                </div>

                <div
                class="flex-1 rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-2xl
                    font-bold">

                        Match Assessment

                    </h3>

                    <p
                    class="mt-3 text-white/45 text-[13px] leading-[28px]">

                        Match awareness and overall game impact are professionally evaluated.

                    </p>

                </div>

            </div>

            <!-- ITEM -->

            <div
            class="relative flex gap-5">

                <div
                class="relative z-10 w-[70px] h-[70px] rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel']
                    text-[#D4AF37]
                    text-2xl
                    font-bold">

                        04

                    </span>

                </div>

                <div
                class="flex-1 rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-2xl
                    font-bold">

                        Analysis

                    </h3>

                    <p
                    class="mt-3 text-white/45 text-[13px] leading-[28px]">

                        Analysts and selectors review statistics and performance reports.

                    </p>

                </div>

            </div>

            <!-- ITEM -->

            <div
            class="relative flex gap-5">

                <div
                class="relative z-10 w-[70px] h-[70px] rounded-full border border-[#D4AF37]/20 bg-[#0b0b0b] flex items-center justify-center shrink-0">

                    <span
                    class="font-['Cinzel']
                    text-[#D4AF37]
                    text-2xl
                    font-bold">

                        05

                    </span>

                </div>

                <div
                class="flex-1 rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-3xl p-5">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-2xl
                    font-bold">

                        Final Selection

                    </h3>

                    <p
                    class="mt-3 text-white/45 text-[13px] leading-[28px]">

                        Elite performers receive opportunities to play in the FSPL league.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- =========================================
TAG STYLE
========================================= -->

<style>

.clean-tag{

    padding:8px 12px;
    border-radius:999px;
    border:1px solid rgba(255,255,255,0.08);
    background:rgba(255,255,255,0.03);
    color:rgba(255,255,255,0.5);
    font-size:10px;
    letter-spacing:1px;
    text-transform:uppercase;
}

</style>

<?php include 'components/footer.php'; ?>
</body>
</html>