<?php 
include "admin/config/db_connect.php";

$stmt= $conn->prepare("SELECT * FROM trials");
$stmt->execute();
$result = $stmt->get_result();

$stmt= $conn->prepare("SELECT * FROM trials_player");
$stmt->execute();
$player_result = $stmt->get_result();
$row = mysqli_fetch_assoc($player_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic SEO -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Future Star Premier League (FSPL) | Cricket Tournament & Player Registration</title>

    <!-- Meta Description -->
    <meta name="description" content="Join Future Star Premier League (FSPL), India's emerging cricket platform for young cricket talent. Register now for cricket tournaments, player trials, and league updates.">

    <!-- Keywords -->
    <meta name="keywords" content="FSPL, Future Star Premier League, cricket tournament, cricket registration, cricket league India, young cricketers, cricket trials, cricket academy, player registration">

    <!-- Author -->
    <meta name="author" content="Future Star Premier League">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://yourdomain.com/">

    <!-- Open Graph SEO -->
    <meta property="og:title" content="Future Star Premier League (FSPL)">
    <meta property="og:description" content="India's emerging cricket league platform for young players. Register now for tournaments and trials.">
    <meta property="og:image" content="https://yourdomain.com/assets/images/fspl-banner.jpg">
    <meta property="og:url" content="https://yourdomain.com/">
    <meta property="og:type" content="website">

    <!-- Twitter SEO -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Future Star Premier League (FSPL)">
    <meta name="twitter:description" content="Join FSPL and showcase your cricket talent.">
    <meta name="twitter:image" content="https://yourdomain.com/assets/images/fspl-banner.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Structured Data SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SportsOrganization",
      "name": "Future Star Premier League",
      "alternateName": "FSPL",
      "url": "https://yourdomain.com",
      "logo": "https://yourdomain.com/assets/images/logo.png",
      "sameAs": [
        "https://facebook.com/yourpage",
        "https://instagram.com/yourpage",
        "https://youtube.com/yourchannel"
      ],
      "description": "Future Star Premier League is a cricket platform for emerging cricket players in India.",
      "sport": "Cricket"
    }
    </script>
    <style>

/* PREMIUM GOLD BORDER FIX */

.border-white\/5{
    border-color:rgba(212,175,55,0.08)!important;
}

.border-white\/10{
    border-color:rgba(212,175,55,0.12)!important;
}

/* REMOVE UGLY WHITE LOOK */

img,
video,
div,
section{
    outline:none;
}

/* CLEAN UI */

body{
    background:#050505;
    overflow-x:hidden;
}

</style>

</head>
<body>
<?php include 'components/navbar.php'; ?>
<!-- HERO SECTION -->

<!-- =========================================
LUXURY BRAND HERO SECTION
========================================= -->

<!-- GOOGLE FONTS -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">


<section class="relative min-h-screen overflow-hidden bg-[#050505]">

    <!-- =========================================
         CINEMATIC BACKGROUND
    ========================================= -->

    <div class="absolute inset-0">

        <img
            src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1974&auto=format&fit=crop"
            alt=""
            class="w-full h-full object-cover scale-105 opacity-40">

        <!-- DARK OVERLAY -->

        <div class="absolute inset-0 bg-black/80"></div>

        <!-- GOLD LIGHT -->

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.14),transparent_45%)]">
        </div>

    </div>

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
        class="absolute top-[-250px] left-1/2 -translate-x-1/2 w-[750px] h-[750px] bg-[#D4AF37]/10 blur-[170px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div
        class="relative z-20 max-w-7xl mx-auto px-6 lg:px-10 min-h-screen flex items-center">

        <div class="grid lg:grid-cols-2 gap-20 items-center w-full">

            <!-- =========================================
                 LEFT CONTENT
            ========================================= -->

            <div class="lg:pt-28 pt-28 lg:pt-0">

                <!-- LABEL -->

                <div
                    class="inline-flex items-center gap-3 border border-[#D4AF37]/20 bg-white/[0.02] backdrop-blur-xl px-6 py-3 rounded-full">

                    <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

                    <span
                        class="font-['Outfit'] uppercase tracking-[4px] text-[11px] text-[#F5D76E]/90 font-medium">

                        Future Star Premier League

                    </span>

                </div>

                <!-- =========================================
                     MAIN HEADING
                ========================================= -->

                <h1
                    class="mt-10 font-['Cinzel'] text-white text-5xl sm:text-6xl lg:text-[60px] leading-[0.95] font-bold tracking-[-3px] max-w-[750px]">

                    Built For

                    <span class="block text-[#D4AF37]">

                        Future Icons

                    </span>

                </h1>

                <!-- DESCRIPTION -->

                <p
                    class="mt-10 max-w-[590px] text-white/55 font-['Outfit'] text-[18px] leading-[34px] font-light tracking-[0.3px]">

                    India’s luxury cricket platform crafted for elite talent, professional exposure, and the next generation of champions.

                </p>

                <!-- =========================================
                     ACTIONS
                ========================================= -->

                <div class="flex flex-wrap items-center gap-5 mt-14">
                <button
class="group relative overflow-hidden h-[66px] px-10 rounded-full border border-[#D4AF37]/20 bg-white/[0.03] backdrop-blur-2xl">

    <!-- GOLD HOVER LIGHT -->

    <div
    class="absolute inset-0 bg-gradient-to-r from-[#D4AF37]/0 via-[#D4AF37]/20 to-[#D4AF37]/0 opacity-0 group-hover:opacity-100 transition duration-500">
    </div>

    <!-- BUTTON CONTENT -->

    <div class="relative flex items-center gap-4">

<a href="<?php echo isset($_SESSION['user_id']) ? 'dashboard.php' : 'register.php' ?>">

    <span
        class="font-['Cinzel']
        uppercase
        tracking-[3px]
        text-[12px]
        font-bold
        text-[#F5D76E]">

        <?php echo isset($_SESSION['user_id']) ? 'Go to Dashboard' : 'Register Now'; ?>

    </span>

</a>
   
        <!-- ICON -->

        <div
        class="w-8 h-8 rounded-full border border-[#D4AF37]/20 flex items-center justify-center group-hover:translate-x-1 transition duration-300">

            <svg xmlns="http://www.w3.org/2000/svg"
            class="w-3 h-3 text-[#F5D76E]"
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

</button>
                    <!-- WATCH FILM -->

                    <a href="#"
                        class="group flex items-center gap-4">

                        <div
                            class="w-14 h-14 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl flex items-center justify-center group-hover:border-[#D4AF37]/40 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 text-white"
                                fill="currentColor"
                                viewBox="0 0 16 16">

                                <path
                                    d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692c.541.313.541 1.08 0 1.393z" />

                            </svg>

                        </div>

                        <span
                            class="font-['Outfit'] uppercase tracking-[3px] text-[12px] text-white/55 group-hover:text-[#F5D76E] transition">

                            Watch Film

                        </span>

                    </a>

                </div>

            </div>

            <!-- =========================================
RIGHT VISUAL
========================================= -->

<div class="relative hidden lg:flex justify-end items-end pt-24">

    <!-- GOLD GLOW -->

    <div
    class="absolute w-[500px] h-[500px] bg-[#D4AF37]/10 blur-[140px] rounded-full">
    </div>

    <!-- VIDEO FRAME -->

    <div
    class="relative z-10 w-full max-w-[650px] rounded-[36px] overflow-hidden border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-2xl shadow-[0_40px_120px_rgba(0,0,0,0.9)]">

        <!-- TOP LIGHT -->

        <div
        class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_30%)] pointer-events-none z-20">
        </div>

        <!-- VIDEO -->

        <video
        autoplay
        muted
        loop
        playsinline
        class="w-full h-[520px] object-cover">

            <source
            src="assets/videos/cricket.mp4"
            type="video/mp4">

        </video>

        <!-- DARK FADE -->

        <div
        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
        </div>

        <!-- LIVE TAG -->

        <div
        class="absolute top-6 left-6 z-30 flex items-center gap-3 px-5 py-3 rounded-full border border-red-500/20 bg-black/40 backdrop-blur-xl">

            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>

            <span
            class="font-['Outfit'] uppercase tracking-[3px] text-[11px] text-white/80">

                Live Cricket Experience

            </span>

        </div>

    </div>

</section>

<!-- hero section close -->

<!-- =========================================
WHY FSPL SECTION
========================================= -->

<section class="relative py-32 overflow-hidden bg-[#050505]">

    <!-- =========================================
         BACKGROUND GLOW
    ========================================= -->

    <div
    class="absolute top-[-200px] left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-[#D4AF37]/5 blur-[150px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">

        <!-- =========================================
             TOP LABEL
        ========================================= -->

        <div
        class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.02] backdrop-blur-xl px-6 py-3 rounded-full">

            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

            <span
            class="font-['Outfit']
            uppercase
            tracking-[4px]
            text-[11px]
            text-[#F5D76E]/90
            font-medium">

                Why Players Choose FSPL

            </span>

        </div>

        <!-- =========================================
             HEADING ROW
        ========================================= -->

        <div
        class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10 mt-10">

            <!-- LEFT -->

            <div>

                <h2
                class="font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[50px]
                leading-[1]
                font-bold
                tracking-[-2px]
                max-w-[800px]">

                    Built For The

                    <span class="block text-[#D4AF37]">

                        Next Generation

                    </span>

                </h2>

            </div>

            <!-- RIGHT -->

            <div>

                <p
                class="max-w-[500px]
                text-white/50
                font-['Outfit']
                text-[17px]
                leading-[34px]
                font-light">

                    FSPL creates a premium pathway for talented cricketers through elite trials, professional exposure, and verified scouting opportunities.

                </p>

            </div>

        </div>

        <!-- =========================================
             PREMIUM CARDS
        ========================================= -->

        <div
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7 mt-24">

            <!-- =========================================
                 CARD 1
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-[#D4AF37]/10 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- TOP LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- ICON -->

                <div
                class="relative z-10 w-16 h-16 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-[#D4AF37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                    </svg>

                </div>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-10 font-['Cinzel'] text-white text-[28px] leading-[1.2] font-bold">

                    Elite

                    <span class="block text-[#D4AF37]">

                        Trials

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[32px] text-[16px] font-light">

                    Participate in professionally managed cricket trials designed to discover exceptional talent across India.

                </p>

            </div>

            <!-- =========================================
                 CARD 2
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-[#D4AF37]/10 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- TOP LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- ICON -->

                <div
                class="relative z-10 w-16 h-16 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-[#D4AF37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 2h.01M7 16h.01M5 16h.01M9 12h.01M7 12h.01M5 12h.01M9 8h.01M7 8h.01M5 8h.01M9 16h.01"/>

                    </svg>

                </div>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-10 font-['Cinzel'] text-white text-[28px] leading-[1.2] font-bold">

                    Professional

                    <span class="block text-[#D4AF37]">

                        Exposure

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[32px] text-[16px] font-light">

                    Gain visibility through cinematic match coverage, premium tournaments, and performance highlights.

                </p>

            </div>

            <!-- =========================================
                 CARD 3
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-[#D4AF37]/10 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- TOP LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- ICON -->

                <div
                class="relative z-10 w-16 h-16 rounded-2xl border border-[#D4AF37]/15 bg-[#D4AF37]/5 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-[#D4AF37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M17 20h5V4H2v16h5m10 0v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6m10 0H7"/>

                    </svg>

                </div>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-10 font-['Cinzel'] text-white text-[28px] leading-[1.2] font-bold">

                    Verified

                    <span class="block text-[#D4AF37]">

                        Scouting

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[32px] text-[16px] font-light">

                    Connect talented players with trusted cricket scouts and real professional opportunities.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
ELITE SELECTION PROCESS
========================================= -->

<section class="relative py-32 overflow-hidden bg-[#050505]">

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
    class="absolute top-[-250px] left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-10">

        <!-- =========================================
             TOP LABEL
        ========================================= -->

        <div
        class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.02] backdrop-blur-xl px-6 py-3 rounded-full">

            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

            <span
            class="font-['Outfit']
            uppercase
            tracking-[4px]
            text-[11px]
            text-[#F5D76E]/90
            font-medium">

                Elite Selection Process

            </span>

        </div>

        <!-- =========================================
             HEADING
        ========================================= -->

        <div
        class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10 mt-10">

            <!-- LEFT -->

            <div>

                <h2
                class="font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[50px]
                leading-[1]
                font-bold
                tracking-[-2px]
                max-w-[850px]">

                    Your Cricket

                    <span class="block text-[#D4AF37]">

                        Journey Begins

                    </span>

                </h2>

            </div>

            <!-- RIGHT -->

            <div>

                <p
                class="max-w-[520px]
                text-white/50
                font-['Outfit']
                text-[17px]
                leading-[34px]
                font-light">

                    FSPL provides a structured pathway for talented cricketers through elite trials, professional mentorship, and official selection opportunities.

                </p>

            </div>

        </div>

        <!-- =========================================
             PROCESS CARDS
        ========================================= -->

        <div
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-7 mt-24">

            <!-- =========================================
                 CARD 1
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- NUMBER -->

                <span
                class="relative z-10 font-['Cinzel'] text-[#D4AF37]/25 text-7xl font-bold">

                    01

                </span>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-8 font-['Cinzel'] text-white text-[30px] leading-[1.1] font-bold">

                    Who Can

                    <span class="block text-[#D4AF37]">

                        Register

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[34px] text-[16px] font-light">

                    Players aged 12 years and above can register for official FSPL cricket trials and begin their professional journey.

                </p>

            </div>

            <!-- =========================================
                 CARD 2
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- NUMBER -->

                <span
                class="relative z-10 font-['Cinzel'] text-[#D4AF37]/25 text-7xl font-bold">

                    02

                </span>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-8 font-['Cinzel'] text-white text-[30px] leading-[1.1] font-bold">

                    Selection

                    <span class="block text-[#D4AF37]">

                        Process

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[34px] text-[16px] font-light">

                    Registered players participate in official trial matches where selectors evaluate performance and shortlist top talent.

                </p>

            </div>

            <!-- =========================================
                 CARD 3
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- NUMBER -->

                <span
                class="relative z-10 font-['Cinzel'] text-[#D4AF37]/25 text-7xl font-bold">

                    03

                </span>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-8 font-['Cinzel'] text-white text-[30px] leading-[1.1] font-bold">

                    Mentors &

                    <span class="block text-[#D4AF37]">

                        Experts

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[34px] text-[16px] font-light">

                    Experienced coaches and cricket experts guide players throughout the trials with professional mentoring.

                </p>

            </div>

            <!-- =========================================
                 CARD 4
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[36px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-10 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- NUMBER -->

                <span
                class="relative z-10 font-['Cinzel'] text-[#D4AF37]/25 text-7xl font-bold">

                    04

                </span>

                <!-- TITLE -->

                <h3
                class="relative z-10 mt-8 font-['Cinzel'] text-white text-[30px] leading-[1.1] font-bold">

                    Professional

                    <span class="block text-[#D4AF37]">

                        Exposure

                    </span>

                </h3>

                <!-- DESC -->

                <p
                class="relative z-10 mt-6 text-white/45 font-['Outfit'] leading-[34px] text-[16px] font-light">

                    Selected players receive opportunities for advanced tournaments, visibility, and professional cricket pathways.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
UPCOMING TRIALS
========================================= -->

<section class="relative py-20 lg:py-28 overflow-hidden bg-[#050505]">

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
    class="absolute top-[-250px] right-[-150px] w-[700px] h-[700px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-10">

        <!-- =========================================
             TOP LABEL
        ========================================= -->

        <div
        class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.02] backdrop-blur-xl px-5 py-3 rounded-full">

            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

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

        <!-- =========================================
             HEADING ROW
        ========================================= -->

        <div
        class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-8 mt-8">

            <!-- LEFT -->

            <div>

                <h2
                class="font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[52px]
                leading-[1]
                font-bold
                tracking-[-2px]
                max-w-[850px]">

                    Upcoming

                    <span class="block text-[#D4AF37]">

                        Cricket Trials

                    </span>

                </h2>

            </div>

            <!-- RIGHT -->

            <div>

                <p
                class="max-w-[520px]
                text-white/50
                font-['Outfit']
                text-[15px]
                lg:text-[17px]
                leading-[30px]
                lg:leading-[34px]
                font-light">

                    Register for upcoming FSPL cricket trials and showcase your talent in front of professional selectors and mentors.

                </p>

            </div>

        </div>

        <!-- =========================================
             TRIAL CARDS
        ========================================= -->


        <div
        class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5 lg:gap-6 mt-16 lg:mt-20">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <!-- =========================================
                 CARD 1
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[30px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-5 lg:p-6 hover:border-[#D4AF37]/20 transition duration-500">

                <!-- LIGHT -->

                <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.08),transparent_35%)] opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- CITY -->

                <h3
                class="relative z-10 font-['Cinzel']
                text-white
                text-[28px]
                lg:text-[32px]
                leading-[1]
                font-bold">

                    <?php echo $row['trial_title'] ?>

                </h3>

                <!-- INFO -->

                <div
                class="relative z-10 mt-6 space-y-4">

                    <!-- DATE -->

                    <div>

                        <span
                        class="text-[#D4AF37]
                        uppercase
                        tracking-[3px]
                        text-[10px]
                        font-['Outfit']">

                            Trial Date

                        </span>

                        <p
                        class="mt-1 text-white/75 font-['Outfit'] text-[14px] lg:text-[15px]">

                        <?php echo $row['trial_date'] ?>

                        </p>

                    </div>

                    <!-- CATEGORY -->

                    <div>

                        <span
                        class="text-[#D4AF37]
                        uppercase
                        tracking-[3px]
                        text-[10px]
                        font-['Outfit']">

                            Category

                        </span>

                        <p
                        class="mt-1 text-white/75 font-['Outfit'] text-[14px] lg:text-[15px]">

                            <?php echo $row['age_group'] ?>

                        </p>

                    </div>

                    <!-- SLOTS -->

                    <div>

                        <span
                        class="text-[#D4AF37]
                        uppercase
                        tracking-[3px]
                        text-[10px]
                        font-['Outfit']">

                            Limited Slots

                        </span>

                        <p
                        class="mt-1 text-white/75 font-['Outfit'] text-[14px] lg:text-[15px]">

                            <?php echo $row['total_slots'] ?> Players

                        </p>

                    </div>

                </div>

                <!-- BUTTON -->
                <a href="apply.php?user_id=<?php echo $row['user_id']; ?>">
                <button
                class="relative z-10 mt-6 w-full h-[46px] lg:h-[50px]
                rounded-full border border-[#D4AF37]/15
                bg-[#D4AF37]/5
                text-[#F5D76E]
                font-['Cinzel']
                uppercase
                tracking-[2px]
                text-[10px]
                lg:text-[11px]
                font-bold
                transition duration-300
                hover:bg-[#D4AF37]
                hover:text-black">

                    Register Now

                </button>
                </a>

            </div>
            <?php } ?>

        </div>

    </div>

</section>
<!-- =========================================
FSPL TEAMS SECTION
========================================= -->

<section class="relative py-24 lg:py-32 overflow-hidden bg-[#050505]">

    <!-- PREMIUM GLOW -->

    <div
    class="absolute top-[-250px] right-[-120px] w-[650px] h-[650px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <div
    class="absolute bottom-[-250px] left-[-120px] w-[650px] h-[650px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <!-- WRAPPER -->

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-10">

        <!-- TOP TAG -->

        <div
        class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl px-5 py-3 rounded-full">

            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

            <span
            class="font-['Outfit']
            uppercase
            tracking-[4px]
            text-[10px]
            lg:text-[11px]
            text-[#F5D76E]/90
            font-medium">

                Elite Franchise Teams

            </span>

        </div>

        <!-- HEADER -->

        <div
        class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-8 mt-8">

            <!-- LEFT -->

            <div>

                <h2
                class="font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[58px]
                leading-[1]
                font-bold
                tracking-[-2px]
                max-w-[780px]">

                    Meet The

                    <span class="block text-[#D4AF37] mt-2">

                        FSPL Warriors

                    </span>

                </h2>

            </div>

            <!-- RIGHT -->

            <div>

                <p
                class="max-w-[520px]
                text-white/50
                font-['Outfit']
                text-[15px]
                lg:text-[17px]
                leading-[30px]
                lg:leading-[34px]
                font-light">

                    Discover the powerhouse franchise teams competing in FSPL with elite talent, fierce competition, and championship ambitions.

                </p>

            </div>

        </div>

        <!-- TEAMS GRID -->

        <div
        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 lg:gap-7 mt-16 lg:mt-20">

            <!-- TEAM 1 -->

            <div
            class="group relative overflow-hidden rounded-[34px]
            border border-white/5
            bg-white/[0.03]
            backdrop-blur-2xl
            hover:border-[#D4AF37]/20
            transition duration-500
            hover:-translate-y-3">

                <!-- BG OVERLAY -->

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/0 via-[#D4AF37]/0 to-[#D4AF37]/5 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- IMAGE -->

                <div
                class="relative overflow-hidden p-5 lg:p-6">

                    <img
                    src="assets/images/teams/maharashtra.webp"
                    alt=""
                    class="w-full aspect-square object-contain transition duration-700 group-hover:scale-105">

                </div>

                <!-- CONTENT -->

                <div class="pb-6 px-5 text-center">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    lg:text-[22px]
                    leading-[1.2]
                    font-bold">

                        Mumbai

                        <span class="block text-[#D4AF37] mt-1">

                            Thunderbolts

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                        Maharashtra

                    </p>

                </div>

            </div>

            <!-- TEAM 2 -->

            <div
            class="group relative overflow-hidden rounded-[34px]
            border border-white/5
            bg-white/[0.03]
            backdrop-blur-2xl
            hover:border-[#D4AF37]/20
            transition duration-500
            hover:-translate-y-3">

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/0 via-[#D4AF37]/0 to-[#D4AF37]/5 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="relative overflow-hidden p-5 lg:p-6">

                    <img
                    src="assets/images/teams/delhi.webp"
                    alt=""
                    class="w-full aspect-square object-contain transition duration-700 group-hover:scale-105">

                </div>

                <div class="pb-6 px-5 text-center">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    lg:text-[22px]
                    leading-[1.2]
                    font-bold">

                        Delhi

                        <span class="block text-[#D4AF37] mt-1">

                            Warriors

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                        Delhi NCR

                    </p>

                </div>

            </div>

            <!-- TEAM 3 -->

            <div
            class="group relative overflow-hidden rounded-[34px]
            border border-white/5
            bg-white/[0.03]
            backdrop-blur-2xl
            hover:border-[#D4AF37]/20
            transition duration-500
            hover:-translate-y-3">

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/0 via-[#D4AF37]/0 to-[#D4AF37]/5 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="relative overflow-hidden p-5 lg:p-6">

                    <img
                    src="assets/images/teams/banglore.webp"
                    alt=""
                    class="w-full aspect-square object-contain transition duration-700 group-hover:scale-105">

                </div>

                <div class="pb-6 px-5 text-center">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    lg:text-[22px]
                    leading-[1.2]
                    font-bold">

                        Bangalore

                        <span class="block text-[#D4AF37] mt-1">

                            Strikers

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                        Karnataka

                    </p>

                </div>

            </div>

            <!-- TEAM 4 -->

            <div
            class="group relative overflow-hidden rounded-[34px]
            border border-white/5
            bg-white/[0.03]
            backdrop-blur-2xl
            hover:border-[#D4AF37]/20
            transition duration-500
            hover:-translate-y-3">

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/0 via-[#D4AF37]/0 to-[#D4AF37]/5 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="relative overflow-hidden p-5 lg:p-6">

                    <img
                    src="assets/images/teams/pj.webp"
                    alt=""
                    class="w-full aspect-square object-contain transition duration-700 group-hover:scale-105">

                </div>

                <div class="pb-6 px-5 text-center">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    lg:text-[22px]
                    leading-[1.2]
                    font-bold">

                        Punjab

                        <span class="block text-[#D4AF37] mt-1">

                            Crushers

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                        Punjab

                    </p>

                </div>

            </div>

            <!-- EXTRA TEAM 5 -->

            <div
            class="team-card hidden extra-team
            group relative overflow-hidden rounded-[34px]
            border border-white/5
            bg-white/[0.03]
            backdrop-blur-2xl
            hover:border-[#D4AF37]/20
            transition duration-500
            hover:-translate-y-3">

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/0 via-[#D4AF37]/0 to-[#D4AF37]/5 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="relative overflow-hidden p-5 lg:p-6">

                    <img
                    src="assets/images/teams/rj.webp"
                    alt=""
                    class="w-full aspect-square object-contain transition duration-700 group-hover:scale-105">

                </div>

                <div class="pb-6 px-5 text-center">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    lg:text-[22px]
                    leading-[1.2]
                    font-bold">

                        Rajasthan

                        <span class="block text-[#D4AF37] mt-1">

                            Kings

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                        Rajasthan

                    </p>

                </div>

            </div>

            <!-- EXTRA TEAM 6 -->

            <div
            class="team-card hidden extra-team
            group relative overflow-hidden rounded-[34px]
            border border-white/5
            bg-white/[0.03]
            backdrop-blur-2xl
            hover:border-[#D4AF37]/20
            transition duration-500
            hover:-translate-y-3">

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/0 via-[#D4AF37]/0 to-[#D4AF37]/5 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="relative overflow-hidden p-5 lg:p-6">

                    <img
                    src="assets/images/teams/up.webp"
                    alt=""
                    class="w-full aspect-square object-contain transition duration-700 group-hover:scale-105">

                </div>

                <div class="pb-6 px-5 text-center">

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    lg:text-[22px]
                    leading-[1.2]
                    font-bold">

                        UP Storme

                        <span class="block text-[#D4AF37] mt-1">

                            Warriors

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                        Uttar Pradesh

                    </p>

                </div>

            </div>

        </div>

        <!-- BUTTON -->

        <div class="flex justify-center mt-16">

            <button
            id="viewMoreTeams"
            class="group relative overflow-hidden h-[56px]
            px-12
            rounded-full
            border border-[#D4AF37]/15
            bg-[#D4AF37]/5
            backdrop-blur-xl
            text-[#F5D76E]
            font-['Cinzel']
            uppercase
            tracking-[3px]
            text-[11px]
            font-bold
            transition duration-500
            hover:bg-[#D4AF37]
            hover:text-black">

                <span class="relative z-10">

                    View More Teams

                </span>

            </button>

        </div>

    </div>

</section>

<!-- VIEW MORE JS -->

<script>

const viewBtn = document.getElementById('viewMoreTeams');

const extraTeams = document.querySelectorAll('.extra-team');

let expanded = false;

viewBtn.addEventListener('click', () => {

    expanded = !expanded;

    extraTeams.forEach(team => {

        team.classList.toggle('hidden');

    });

    viewBtn.innerHTML = expanded
    ? 'Show Less'
    : 'View More Teams';

});

</script>
<!-- =========================================
MATCH GALLERY
========================================= -->

<section class="relative py-20 lg:py-28 overflow-hidden bg-[#050505]">

    <!-- GOLD GLOW -->

    <div
    class="absolute top-[-250px] left-[-150px] w-[700px] h-[700px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <!-- MAIN WRAPPER -->

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-10">

        <!-- TOP LABEL -->

        <div
        class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.02] backdrop-blur-xl px-5 py-3 rounded-full">

            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

            <span
            class="font-['Outfit']
            uppercase
            tracking-[4px]
            text-[10px]
            lg:text-[11px]
            text-[#F5D76E]/90
            font-medium">

                Match Gallery

            </span>

        </div>

        <!-- HEADING -->

        <div
        class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-8 mt-8">

            <!-- LEFT -->

            <div>

                <h2
                class="font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[52px]
                leading-[1]
                font-bold
                tracking-[-2px]
                max-w-[850px]">

                    Capturing

                    <span class="block text-[#D4AF37]">

                        Elite Moments

                    </span>

                </h2>

            </div>

            <!-- RIGHT -->

            <div>

                <p
                class="max-w-[520px]
                text-white/50
                font-['Outfit']
                text-[15px]
                lg:text-[17px]
                leading-[30px]
                lg:leading-[34px]
                font-light">

                    Explore cinematic moments from FSPL trials, elite performances, passionate crowds, and unforgettable cricket experiences.

                </p>

            </div>

        </div>

        <!-- GALLERY GRID -->

        <div
        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-5 mt-16 lg:mt-20">

            <!-- IMAGE 1 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] col-span-1 row-span-2 h-[320px] lg:h-[420px]">

                <img
                src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <!-- OVERLAY -->

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <!-- LABEL -->

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Stadium Atmosphere

                    </span>

                </div>

            </div>

            <!-- IMAGE 2 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] h-[150px] lg:h-[200px]">

                <img
                src="https://images.unsplash.com/photo-1517649763962-0c623066013b?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Match Action

                    </span>

                </div>

            </div>

            <!-- IMAGE 3 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] h-[150px] lg:h-[200px]">

                <img
                src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Team Spirit

                    </span>

                </div>

            </div>

            <!-- IMAGE 4 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] col-span-2 h-[150px] lg:h-[200px]">

                <img
                src="https://images.unsplash.com/photo-1628890923662-2cb23c2e7d8b?q=80&w=1400&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Elite Trials

                    </span>

                </div>

            </div>

            <!-- IMAGE 5 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] h-[150px] lg:h-[200px]">

                <img
                src="https://images.unsplash.com/photo-1593766827228-8737b4534aa6?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Victory Moments

                    </span>

                </div>

            </div>

            <!-- IMAGE 6 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] h-[150px] lg:h-[200px]">

                <img
                src="https://images.unsplash.com/photo-1624526267942-ab0ff8a3e972?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Crowd Energy

                    </span>

                </div>

            </div>

            <!-- IMAGE 7 -->

            <div
            class="group relative overflow-hidden rounded-[26px] lg:rounded-[30px] col-span-2 h-[180px] lg:h-[220px]">

                <img
                src="https://images.unsplash.com/photo-1486286701208-1d58e9338013?q=80&w=1400&auto=format&fit=crop"
                alt=""
                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                </div>

                <div
                class="absolute bottom-5 left-5">

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    text-[#F5D76E]">

                        Premium Experience

                    </span>

                </div>

            </div>
            

        </div>
    </div>
    <!-- =========================================
VIEW MORE BUTTON
========================================= -->

<div class="flex justify-center mt-14 lg:mt-16">

    <a
    href="gallery.php"
    class="group relative overflow-hidden h-[50px] lg:h-[56px] px-8 lg:px-10 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-2xl">

        <!-- HOVER LIGHT -->

        <div
        class="absolute inset-0 bg-gradient-to-r from-[#D4AF37]/0 via-[#D4AF37]/20 to-[#D4AF37]/0 opacity-0 group-hover:opacity-100 transition duration-500">
        </div>

        <!-- CONTENT -->

        <div class="relative flex items-center gap-4 h-full">

            <!-- TEXT -->

            <span
            class="font-['Cinzel']
            uppercase
            tracking-[3px]
            text-[10px]
            lg:text-[11px]
            font-bold
            text-[#F5D76E]">

                View More Moments

            </span>

            <!-- ICON -->

            <div
            class="w-7 h-7 rounded-full border border-[#D4AF37]/20 flex items-center justify-center transition duration-300 group-hover:translate-x-1">

                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-3 h-3 text-[#F5D76E]"
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

</section>

<!-- =========================================
INFINITE TESTIMONIAL MARQUEE
========================================= -->

<section class="relative py-20 lg:py-28 overflow-hidden bg-[#050505]">

    <!-- GOLD GLOW -->

    <div
    class="absolute top-[-250px] right-[-150px] w-[700px] h-[700px] bg-[#D4AF37]/5 blur-[160px] rounded-full">
    </div>

    <!-- MAIN WRAPPER -->

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-10">

        <!-- TOP LABEL -->

        <div
        class="inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-white/[0.02] backdrop-blur-xl px-5 py-3 rounded-full">

            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>

            <span
            class="font-['Outfit']
            uppercase
            tracking-[4px]
            text-[10px]
            lg:text-[11px]
            text-[#F5D76E]/90
            font-medium">

                Testimonials

            </span>

        </div>

        <!-- HEADING -->

        <div
        class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-8 mt-8">

            <div>

                <h2
                class="font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[52px]
                leading-[1]
                font-bold
                tracking-[-2px]
                max-w-[850px]">

                    Voices Of

                    <span class="block text-[#D4AF37]">

                        Future Champions

                    </span>

                </h2>

            </div>

            <div>

                <p
                class="max-w-[520px]
                text-white/50
                font-['Outfit']
                text-[15px]
                lg:text-[17px]
                leading-[30px]
                lg:leading-[34px]
                font-light">

                    Hear the experiences of talented cricketers who stepped into the elite world of FSPL.

                </p>

            </div>

        </div>

        <!-- =========================================
             SLIDER WRAPPER
        ========================================= -->

        <div class="relative mt-16 lg:mt-20 overflow-hidden">

            <!-- LEFT FADE -->

            <div
            class="absolute left-0 top-0 w-20 lg:w-40 h-full z-20 bg-gradient-to-r from-[#050505] to-transparent">
            </div>

            <!-- RIGHT FADE -->

            <div
            class="absolute right-0 top-0 w-20 lg:w-40 h-full z-20 bg-gradient-to-l from-[#050505] to-transparent">
            </div>

            <!-- TRACK -->

            <div class="testimonial-marquee flex items-stretch gap-4 lg:gap-5">

                <!-- =========================================
                     CARD 1
                ========================================= -->

                <div
                class="shrink-0 w-[270px] lg:w-[300px] rounded-[28px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-5 lg:p-6">

                    <!-- TOP -->

                    <div class="flex items-center gap-3">

                        <!-- IMAGE -->

                        <img
                        src="https://randomuser.me/api/portraits/men/32.jpg"
                        alt=""
                        class="w-12 h-12 rounded-full object-cover border border-[#D4AF37]/20">

                        <!-- INFO -->

                        <div>

                            <h4
                            class="font-['Cinzel']
                            text-white
                            text-[16px]
                            font-bold">

                                Aarav Sharma

                            </h4>

                            <p
                            class="mt-1 text-white/40 text-[10px] uppercase tracking-[2px] font-['Outfit']">

                                Delhi • Batsman

                            </p>

                        </div>

                    </div>

                    <!-- REVIEW -->

                    <p
                    class="mt-6 text-white/60 font-['Outfit'] text-[14px] leading-[28px] font-light">

                        FSPL gave me real exposure and confidence. The environment felt elite and professionally managed.

                    </p>

                    <!-- RATING -->

                    <div
                    class="flex items-center gap-1 mt-6 text-[#D4AF37] text-[15px]">

                        ★ ★ ★ ★ ★

                    </div>

                </div>

                <!-- CARD 2 -->

                <div
                class="shrink-0 w-[270px] lg:w-[300px] rounded-[28px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-5 lg:p-6">

                    <div class="flex items-center gap-3">

                        <img
                        src="https://randomuser.me/api/portraits/men/45.jpg"
                        alt=""
                        class="w-12 h-12 rounded-full object-cover border border-[#D4AF37]/20">

                        <div>

                            <h4
                            class="font-['Cinzel']
                            text-white
                            text-[16px]
                            font-bold">

                                Kabir Verma

                            </h4>

                            <p
                            class="mt-1 text-white/40 text-[10px] uppercase tracking-[2px] font-['Outfit']">

                                Mumbai • Bowler

                            </p>

                        </div>

                    </div>

                    <p
                    class="mt-6 text-white/60 font-['Outfit'] text-[14px] leading-[28px] font-light">

                        Premium facilities and professional selectors made the trials feel truly next level.

                    </p>

                    <div
                    class="flex items-center gap-1 mt-6 text-[#D4AF37] text-[15px]">

                        ★ ★ ★ ★ ★

                    </div>

                </div>

                <!-- CARD 3 -->

                <div
                class="shrink-0 w-[270px] lg:w-[300px] rounded-[28px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-5 lg:p-6">

                    <div class="flex items-center gap-3">

                        <img
                        src="https://randomuser.me/api/portraits/men/61.jpg"
                        alt=""
                        class="w-12 h-12 rounded-full object-cover border border-[#D4AF37]/20">

                        <div>

                            <h4
                            class="font-['Cinzel']
                            text-white
                            text-[16px]
                            font-bold">

                                Reyansh Singh

                            </h4>

                            <p
                            class="mt-1 text-white/40 text-[10px] uppercase tracking-[2px] font-['Outfit']">

                                Lucknow • All Rounder

                            </p>

                        </div>

                    </div>

                    <p
                    class="mt-6 text-white/60 font-['Outfit'] text-[14px] leading-[28px] font-light">

                        The atmosphere, crowd, and management felt like a real professional cricket league.

                    </p>

                    <div
                    class="flex items-center gap-1 mt-6 text-[#D4AF37] text-[15px]">

                        ★ ★ ★ ★ ★

                    </div>

                </div>

                <!-- CARD 4 -->

                <div
                class="shrink-0 w-[270px] lg:w-[300px] rounded-[28px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-5 lg:p-6">

                    <div class="flex items-center gap-3">

                        <img
                        src="https://randomuser.me/api/portraits/men/72.jpg"
                        alt=""
                        class="w-12 h-12 rounded-full object-cover border border-[#D4AF37]/20">

                        <div>

                            <h4
                            class="font-['Cinzel']
                            text-white
                            text-[16px]
                            font-bold">

                                Vihaan Mehta

                            </h4>

                            <p
                            class="mt-1 text-white/40 text-[10px] uppercase tracking-[2px] font-['Outfit']">

                                Jaipur • Keeper

                            </p>

                        </div>

                    </div>

                    <p
                    class="mt-6 text-white/60 font-['Outfit'] text-[14px] leading-[28px] font-light">

                        FSPL created an unforgettable experience with elite trials and amazing opportunities.

                    </p>

                    <div
                    class="flex items-center gap-1 mt-6 text-[#D4AF37] text-[15px]">

                        ★ ★ ★ ★ ★

                    </div>

                </div>

                <!-- DUPLICATE FOR INFINITE LOOP -->

                <div
                class="shrink-0 w-[270px] lg:w-[300px] rounded-[28px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl p-5 lg:p-6">

                    <div class="flex items-center gap-3">

                        <img
                        src="https://randomuser.me/api/portraits/men/32.jpg"
                        alt=""
                        class="w-12 h-12 rounded-full object-cover border border-[#D4AF37]/20">

                        <div>

                            <h4
                            class="font-['Cinzel']
                            text-white
                            text-[16px]
                            font-bold">

                                Aarav Sharma

                            </h4>

                            <p
                            class="mt-1 text-white/40 text-[10px] uppercase tracking-[2px] font-['Outfit']">

                                Delhi • Batsman

                            </p>

                        </div>

                    </div>

                    <p
                    class="mt-6 text-white/60 font-['Outfit'] text-[14px] leading-[28px] font-light">

                        FSPL gave me real exposure and confidence. The environment felt elite and professionally managed.

                    </p>

                    <div
                    class="flex items-center gap-1 mt-6 text-[#D4AF37] text-[15px]">

                        ★ ★ ★ ★ ★

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
INFINITE MARQUEE CSS
========================================= -->

<style>

.testimonial-marquee{

    width: max-content;
    animation: marqueeMove 30s linear infinite;
}

.testimonial-marquee:hover{

    animation-play-state: paused;
}

@keyframes marqueeMove{

    0%{

        transform: translateX(0);
    }

    100%{

        transform: translateX(-50%);
    }
}

</style>

<!-- =========================================
ULTRA PREMIUM CTA SECTION
========================================= -->

<!-- =========================================
MODERN FSPL CTA SECTION
========================================= -->

<section class="relative overflow-hidden py-16 lg:py-24 bg-[#050505]">

    <!-- =========================================
    BACKGROUND
    ========================================= -->

    <div class="absolute inset-0">

        <!-- IMAGE -->

        <img
        src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1800&auto=format&fit=crop"
        alt=""
        class="w-full h-full object-cover opacity-[0.08] scale-105">

        <!-- DARK OVERLAY -->

        <div
        class="absolute inset-0 bg-black/85">
        </div>

        <!-- GOLD RADIAL -->

        <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(212,175,55,0.08),transparent_60%)]">
        </div>

    </div>

    <!-- =========================================
    GOLD GLOW
    ========================================= -->

    <div
    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#D4AF37]/10 blur-[150px] rounded-full">
    </div>

    <!-- =========================================
    MAIN CONTAINER
    ========================================= -->

    <div
    class="relative z-10 max-w-6xl mx-auto px-5 lg:px-8">

        <!-- =========================================
        PREMIUM BOX
        ========================================= -->

        <div
        class="relative overflow-hidden rounded-[28px] lg:rounded-[34px]
        border border-[#D4AF37]/15
        bg-white/[0.03]
        backdrop-blur-3xl
        px-5 sm:px-8 lg:px-12
        py-10 lg:py-14">

            <!-- TOP LIGHT -->

            <div
            class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(212,175,55,0.05),transparent_40%)]">
            </div>

            <!-- =========================================
            LABEL
            ========================================= -->

            <div
            class="relative inline-flex items-center gap-3 border border-[#D4AF37]/15 bg-black/20 backdrop-blur-xl px-4 py-2.5 rounded-full">

                <span
                class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse">
                </span>

                <span
                class="font-['Outfit']
                uppercase
                tracking-[3px]
                text-[10px]
                text-[#F5D76E]/90
                font-medium">

                    The Future Starts Here

                </span>

            </div>

            <!-- =========================================
            CONTENT
            ========================================= -->

            <div
            class="relative flex flex-col items-center text-center">

                <!-- HEADING -->

                <h2
                class="mt-7 font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[58px]
                leading-[1]
                font-bold
                tracking-[-1px]
                max-w-[760px]">

                    Step Into The

                    <span
                    class="block text-[#D4AF37] mt-3">

                        Elite World Of Cricket

                    </span>

                </h2>

                <!-- DESCRIPTION -->

                <p
                class="mt-7 max-w-[620px]
                text-white/55
                font-['Outfit']
                text-[15px]
                lg:text-[16px]
                leading-[28px]
                lg:leading-[32px]
                font-light">

                    Join FSPL and unlock elite opportunities, professional exposure, premium tournaments, and a pathway designed for future cricket stars.

                </p>

                <!-- =========================================
                BUTTONS
                ========================================= -->

                <div
                class="flex flex-col sm:flex-row items-center gap-4 mt-10">

                    <!-- PRIMARY -->

                    <a
                    href="register.php"
                    class="group relative overflow-hidden h-[50px] lg:h-[54px] px-6 lg:px-8 rounded-full bg-[#D4AF37] shadow-[0_0_35px_rgba(212,175,55,0.16)]">

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
                            tracking-[3px]
                            text-[10px]
                            font-bold
                            text-black">

                                Register Now

                            </span>

                            <!-- ICON -->

                            <div
                            class="w-7 h-7 rounded-full bg-black/10 flex items-center justify-center">

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3.5 h-3.5 text-black"
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

                    <!-- SECONDARY -->

                    <a
                    href="trials.php"
                    class="group relative overflow-hidden h-[50px] lg:h-[54px] px-6 lg:px-8 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-2xl">

                        <!-- HOVER -->

                        <div
                        class="absolute inset-0 bg-gradient-to-r from-[#D4AF37]/0 via-[#D4AF37]/20 to-[#D4AF37]/0 opacity-0 group-hover:opacity-100 transition duration-500">
                        </div>

                        <!-- CONTENT -->

                        <div
                        class="relative flex items-center gap-3 h-full">

                            <span
                            class="font-['Cinzel']
                            uppercase
                            tracking-[3px]
                            text-[10px]
                            font-bold
                            text-[#F5D76E]">

                                Explore Trials

                            </span>

                            <!-- ICON -->

                            <div
                            class="w-7 h-7 rounded-full border border-[#D4AF37]/20 flex items-center justify-center transition duration-300 group-hover:translate-x-1">

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
                STATS
                ========================================= -->

                <div
                class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5 mt-12 w-full">

                    <!-- ITEM -->

                    <div
                    class="rounded-[18px] border border-white/5 bg-black/20 backdrop-blur-2xl py-5 px-4">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        lg:text-3xl
                        font-bold">

                            12K+

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[10px] uppercase tracking-[3px] font-['Outfit']">

                            Registered Players

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="rounded-[18px] border border-white/5 bg-black/20 backdrop-blur-2xl py-5 px-4">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        lg:text-3xl
                        font-bold">

                            35+

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[10px] uppercase tracking-[3px] font-['Outfit']">

                            Elite Trials

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="rounded-[18px] border border-white/5 bg-black/20 backdrop-blur-2xl py-5 px-4">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        lg:text-3xl
                        font-bold">

                            150+

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[10px] uppercase tracking-[3px] font-['Outfit']">

                            Selected Players

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="rounded-[18px] border border-white/5 bg-black/20 backdrop-blur-2xl py-5 px-4">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-2xl
                        lg:text-3xl
                        font-bold">

                            20+

                        </h3>

                        <p
                        class="mt-2 text-white/45 text-[10px] uppercase tracking-[3px] font-['Outfit']">

                            Professional Mentors

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'components/footer.php'; ?>

</body>
</html>