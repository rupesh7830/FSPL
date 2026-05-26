<?php 
session_start();
include "admin/config/db_connect.php";

$stmt= $conn->prepare("SELECT * FROM trials");
$stmt->execute();
$result = $stmt->get_result();

$img=$conn->prepare("SELECT * FROM gallery");
$img->execute();
$img_result=$img->get_result();
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

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

html,body{
    width:100%;
    overflow-x:hidden;
}

body{
    background:#050505;
    font-family:'Outfit',sans-serif;
    -webkit-font-smoothing:antialiased;
    text-rendering:optimizeLegibility;
}

img,
video{
    max-width:100%;
    display:block;
}

.glass{
    background:rgba(255,255,255,0.03);
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
}

.gpu{
    transform:translateZ(0);
    will-change:transform;
}

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


<!-- =========================================
PREMIUM CINEMATIC HERO SECTION
OPTIMIZED PERFECT RESPONSIVE VERSION
========================================= -->

<section class="relative overflow-hidden bg-[#050505]">

    <!-- =========================================
         CINEMATIC BACKGROUND
    ========================================= -->

    <!-- SECTION -->
<section class="relative overflow-hidden bg-[#050505]">

    <!-- PREMIUM GOLD + BLACK BACKGROUND -->
    <div class="absolute inset-0">

        <!-- GRADIENT BASE -->
        <div class="absolute inset-0 bg-[linear-gradient(135deg,#050505_0%,#0d0d0d_35%,#111111_100%)]"></div>

        <!-- GOLD LIGHT -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.16),transparent_45%)]"></div>

        <!-- SIDE LIGHT -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_right,rgba(212,175,55,0.08),transparent_35%)]"></div>

        <!-- GRID EFFECT -->
        <div class="absolute inset-0 opacity-[0.04]"
            style="background-image:linear-gradient(rgba(255,255,255,0.08)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.08)_1px,transparent_1px);background-size:80px 80px;">
        </div>

    </div>

    <!-- TOP GLOW -->
    <div
    class="absolute top-[-180px] left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
    </div>

    <!-- LEFT GLOW -->
    <div
    class="absolute top-[25%] left-[-120px] w-[280px] h-[280px] bg-[#D4AF37]/10 blur-[100px] rounded-full">
    </div>

    <!-- RIGHT GLOW -->
    <div
    class="absolute bottom-[-120px] right-[-80px] w-[320px] h-[320px] bg-[#D4AF37]/10 blur-[110px] rounded-full">
    </div>

    <!-- =========================================
         SOFT GLOWS
    ========================================= -->

    <!-- TOP GLOW -->

    <div
    class="absolute top-[-180px] left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
    </div>

    <!-- LEFT GLOW -->

    <div
    class="absolute top-[25%] left-[-120px] w-[280px] h-[280px] bg-[#D4AF37]/10 blur-[100px] rounded-full">
    </div>

    <!-- RIGHT GLOW -->

    <div
    class="absolute bottom-[-120px] right-[-80px] w-[320px] h-[320px] bg-[#D4AF37]/10 blur-[110px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div
    class="relative z-20 max-w-[1350px] mx-auto px-5 sm:px-6 lg:px-8 py-24 lg:py-14 lg:mt-10">

        <div class="grid lg:grid-cols-2 gap-12 xl:gap-16 items-center">

            <!-- =========================================
                 LEFT CONTENT
            ========================================= -->

            <div>

                <!-- LABEL -->

                <div
                class="inline-flex items-center gap-3 border border-[#D4AF37]/20 bg-white/[0.03] backdrop-blur-xl px-5 py-2.5 rounded-full animate-[fadeUp_1s_ease]">

                    <span class="w-2 h-2 rounded-full bg-[#D4AF37] animate-pulse"></span>

                    <span
                    class="font-['Outfit']
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    sm:text-[11px]
                    text-[#F5D76E]/90
                    font-medium">

                        Future Star Premier League

                    </span>

                </div>

                <!-- =========================================
                     MAIN HEADING
                ========================================= -->

                <h1
                class="mt-8 font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[58px]
                xl:text-[64px]
                leading-[0.96]
                font-bold
                tracking-[-2px]
                max-w-[700px]
                animate-[fadeUp_1.2s_ease]">

                    Built For

                    <span class="block text-[#D4AF37] mt-2">

                        Future Icons

                    </span>

                </h1>

                <!-- DESCRIPTION -->

                <p
                class="mt-6 max-w-[540px]
                text-white/60
                font-['Outfit']
                text-[16px]
                lg:text-[17px]
                leading-[30px]
                font-light
                tracking-[0.2px]
                animate-[fadeUp_1.4s_ease]">

                    India’s luxury cricket platform crafted for elite talent,
                    professional exposure, and the next generation of champions.

                </p>

                <!-- =========================================
                     ACTIONS
                ========================================= -->

                <div
                class="flex flex-wrap items-center gap-5 mt-10 animate-[fadeUp_1.6s_ease]">

                    <!-- REGISTER BUTTON -->

                    <a
                    href="<?php echo isset($_SESSION['user_id']) ? 'dashboard' : 'register' ?>"
                    class="group relative overflow-hidden h-[58px] px-8 rounded-full border border-[#D4AF37]/20 bg-white/[0.04] backdrop-blur-2xl hover:scale-105 transition duration-500 flex items-center">

                        <!-- GOLD HOVER -->

                        <div
                        class="absolute inset-0 bg-gradient-to-r from-[#D4AF37]/0 via-[#D4AF37]/20 to-[#D4AF37]/0 opacity-0 group-hover:opacity-100 transition duration-500">
                        </div>

                        <!-- CONTENT -->

                        <div class="relative flex items-center gap-4">

                            <span
                            class="font-['Cinzel']
                            uppercase
                            tracking-[2px]
                            text-[11px]
                            sm:text-[12px]
                            font-bold
                            text-[#F5D76E]">

                                <?php echo isset($_SESSION['user_id']) ? 'Go to Dashboard' : 'Register Now'; ?>

                            </span>

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

                    </a>

                    <!-- WATCH FILM -->

                    <a href="#"
                    class="group flex items-center gap-4">

                        <!-- PLAY BUTTON -->

                        <div
                        class="relative w-12 h-12 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-xl flex items-center justify-center group-hover:border-[#D4AF37]/40 transition duration-500 group-hover:scale-110">

                            <!-- PULSE -->

                            <div
                            class="absolute inset-0 rounded-full border border-[#D4AF37]/20 animate-ping">
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 text-white relative z-10"
                            fill="currentColor"
                            viewBox="0 0 16 16">

                                <path
                                d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692c.541.313.541 1.08 0 1.393z"/>

                            </svg>

                        </div>

                        <span
                        class="font-['Outfit']
                        uppercase
                        tracking-[2px]
                        text-[11px]
                        text-white/55
                        group-hover:text-[#F5D76E]
                        transition">

                            Watch Film

                        </span>

                    </a>

                </div>

                <!-- =========================================
                     STATS
                ========================================= -->

                <div
                class="grid grid-cols-3 gap-4 mt-10 animate-[fadeUp_1.8s_ease]">

                    <!-- ITEM -->

                    <div
                    class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-2xl p-5 hover:border-[#D4AF37]/20 transition duration-500">

                        <h3
                        class="text-[#D4AF37] text-2xl sm:text-3xl font-black">

                            12K+

                        </h3>

                        <p
                        class="mt-2 text-white/45 uppercase tracking-[1.5px] text-[9px] sm:text-[10px] leading-[18px]">

                            Registered Players

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-2xl p-5 hover:border-[#D4AF37]/20 transition duration-500">

                        <h3
                        class="text-[#D4AF37] text-2xl sm:text-3xl font-black">

                            25+

                        </h3>

                        <p
                        class="mt-2 text-white/45 uppercase tracking-[1.5px] text-[9px] sm:text-[10px] leading-[18px]">

                            Trial Cities

                        </p>

                    </div>

                    <!-- ITEM -->

                    <div
                    class="rounded-[24px] border border-white/10 bg-white/[0.03] backdrop-blur-2xl p-5 hover:border-[#D4AF37]/20 transition duration-500">

                        <h3
                        class="text-[#D4AF37] text-2xl sm:text-3xl font-black">

                            ₹80K

                        </h3>

                        <p
                        class="mt-2 text-white/45 uppercase tracking-[1.5px] text-[9px] sm:text-[10px] leading-[18px]">

                            Prize Pool

                        </p>

                    </div>

                </div>

            </div>

            <!-- =========================================
                 RIGHT VISUAL
            ========================================= -->

            <div class="relative hidden lg:flex justify-end">

                <!-- GOLD GLOW -->

                <div
                class="absolute w-[400px] h-[400px] bg-[#D4AF37]/10 blur-[120px] rounded-full">
                </div>

                <!-- VIDEO FRAME -->

                <div
                class="group relative z-10 w-full max-w-[560px] xl:max-w-[620px]
                rounded-[34px]
                overflow-hidden
                border border-[#D4AF37]/15
                bg-white/[0.03]
                backdrop-blur-2xl
                shadow-[0_30px_90px_rgba(0,0,0,0.8)]
                hover:-translate-y-2
                transition duration-700">

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
                    class="w-full h-[420px] xl:h-[480px] object-cover group-hover:scale-105 transition duration-700 animate-[slowZoom_12s_linear_infinite_alternate]">

                        <source
                        src="assets/videos/cricket.mp4"
                        type="video/mp4">

                    </video>

                    <!-- DARK FADE -->

                    <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20">
                    </div>

                    <!-- LIVE TAG -->

                    <div
                    class="absolute top-5 left-5 z-30 flex items-center gap-3 px-4 py-2.5 rounded-full border border-red-500/20 bg-black/40 backdrop-blur-xl">

                        <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>

                        <span
                        class="font-['Outfit']
                        uppercase
                        tracking-[2px]
                        text-[10px]
                        text-white/80">

                            Live Cricket Experience

                        </span>

                    </div>

                    <!-- BOTTOM CONTENT -->

                    <div class="absolute bottom-0 left-0 w-full p-7 z-30">

                        <h3
                        class="text-white font-['Cinzel']
                        text-3xl xl:text-4xl leading-[1]
                        font-bold">

                            EXPERIENCE

                            <span class="block text-[#D4AF37] mt-2">

                                FSPL TRIALS

                            </span>

                        </h3>

                        <p
                        class="mt-4 text-white/55 text-[14px] leading-[26px] max-w-[400px]">

                            Showcase your talent in front of elite selectors
                            and professional franchise scouts.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
ANIMATIONS
========================================= -->

<style>

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(35px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

@keyframes slowZoom{

    from{
        transform:scale(1);
    }

    to{
        transform:scale(1.06);
    }

}

</style>

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

<section class="relative py-20 lg:py-28 overflow-hidden bg-[#050505]" id="trials">

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
                <a href="register?redirect=apply?trial_id=<?php echo $row['id']; ?>">
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
        <div class="flex justify-center mt-14 lg:mt-16">

    <a
    href="trials"
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

                View More Trials

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
                    src="assets/images/teams/mp.webp"
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

                        MP Royals

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

                        Madhya Pradesh

                    </p>

                </div>

            </div>

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
                    src="assets/images/teams/uk.webp"
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

                        Uttarakhand

                        <span class="block text-[#D4AF37] mt-1">

                            Titans

                        </span>

                    </h3>

                    <p
                    class="mt-4
                    text-white/45
                    font-['Outfit']
                    text-[11px]
                    uppercase
                    tracking-[4px]">

                    UTTARAKHAND

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

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 auto-rows-[250px] gap-5 mt-20">

<?php 
$count = 0;
while ($img = mysqli_fetch_assoc($img_result)) { 

    $large = ($count % 5 == 0) ? 'lg:col-span-2 lg:row-span-2' : '';

?>

    <div
    class="group relative overflow-hidden rounded-[34px]
    border border-white/5
    bg-white/[0.03]
    backdrop-blur-2xl
    <?php echo $large; ?>">

        <!-- IMAGE -->

        <img
        src="admin/<?php echo $img['image']; ?>"
        alt="<?php echo $img['title']; ?>"
        class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1">

        <!-- DARK OVERLAY -->

        <div
        class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent">
        </div>

        <!-- GOLD LIGHT -->

        <div
        class="absolute inset-0 bg-gradient-to-t from-[#D4AF37]/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
        </div>

        <!-- CONTENT -->

        <div
        class="absolute bottom-0 left-0 w-full p-5 lg:p-6">

            <!-- CATEGORY -->

            <span
            class="inline-block px-4 py-2 rounded-full
            border border-[#D4AF37]/20
            bg-black/40
            backdrop-blur-xl
            text-[#F5D76E]
            text-[10px]
            uppercase
            tracking-[3px]
            font-semibold">

                <?php echo $img['category']; ?>

            </span>

            <!-- TITLE -->

            <h3
            class="mt-4 text-white
            font-['Cinzel']
            text-[20px]
            lg:text-[26px]
            leading-[1.2]
            font-bold">

                <?php echo $img['title']; ?>

            </h3>

        </div>

        <!-- HOVER ICON -->

        <div
        class="absolute top-5 right-5 w-12 h-12 rounded-full
        border border-[#D4AF37]/20
        bg-black/40
        backdrop-blur-xl
        flex items-center justify-center
        opacity-0 group-hover:opacity-100
        translate-y-5 group-hover:translate-y-0
        transition duration-500">

            <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 text-[#F5D76E]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M14 3h7m0 0v7m0-7L10 14"/>

            </svg>

        </div>

    </div>

<?php 
$count++;
} 
?>

</div>
</div>
    <!-- =========================================
VIEW MORE BUTTON
========================================= -->

<div class="flex justify-center mt-14 lg:mt-16">

    <a
    href="gallery"
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
                    href="register"
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
                    href="trials"
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


<!-- PREMIUM FLOATING TRIAL BUTTON -->

<!-- =========================================
PREMIUM VERTICAL TRIAL BUTTON
========================================= -->
<a href="#trials"
class="fixed right-[20px] top-1/2 -translate-y-1/2 z-[9999] group">

    <!-- MAIN WRAPPER -->

    <div
    class="relative w-[45px] h-[150px]
    rounded-[40px]

    border border-[#D4AF37]/25

    bg-[linear-gradient(180deg,#0b0b0b_0%,#111111_45%,#050505_100%)]

    backdrop-blur-2xl

    shadow-[0_0_25px_rgba(212,175,55,0.18)]

    overflow-hidden

    hover:translate-x-[-5px]
    transition duration-500">

        <!-- GOLD SIDE LINE -->

        <div
        class="absolute left-0 top-0 w-[1px] h-full
        bg-gradient-to-b
        from-transparent
        via-[#D4AF37]
        to-transparent">
        </div>

        <!-- GOLD GLOW -->

        <div
        class="absolute inset-0
        bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.12),transparent_40%)]">
        </div>

        <!-- SMALL PARTICLES -->

        <div
        class="absolute inset-0 opacity-20
        bg-[radial-gradient(#D4AF37_0.8px,transparent_0.8px)]
        [background-size:14px_14px]">
        </div>

        <!-- TOP ICON -->



        <!-- VERTICAL TEXT -->

        <div
        class="absolute inset-0 flex items-center justify-center">

            <span
            class="rotate-[-90deg]

            text-[#F5D76E]

            text-[10px]
            font-bold

            uppercase
            tracking-[2px]

            font-['Cinzel']

            whitespace-nowrap">

                Go To Trials

            </span>

        </div>

        <!-- BOTTOM LIGHT -->

        <div
        class="absolute bottom-3 left-1/2 -translate-x-1/2">

            <div
            class="w-2 h-2 rounded-full
            bg-[#F5D76E]

            shadow-[0_0_12px_rgba(212,175,55,0.8)]

            animate-pulse">
            </div>

        </div>

    </div>

</a>

<style>

@keyframes arrowMove{

    0%{
        transform:translateX(0);
    }

    50%{
        transform:translateX(4px);
    }

    100%{
        transform:translateX(0);
    }

}

html{
    scroll-behavior:smooth;
}

</style>


<!-- WHATSAPP FLOATING BUTTON START -->

<a href="https://wa.link/pmiklt"
   class="whatsapp-float"
   target="_blank">

    <i class="fab fa-whatsapp"></i>

</a>

<!-- FONT AWESOME -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>

.whatsapp-float{

    position: fixed;

    width: 60px;
    height: 60px;

    bottom: 25px;
    right: 25px;

    background: linear-gradient(135deg,#25D366,#128C7E);

    color: #fff;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 30px;

    text-decoration: none;

    box-shadow: 0 10px 25px rgba(37,211,102,0.4);

    z-index: 99999;

    transition: 0.4s ease;

    border: 2px solid rgba(255,255,255,0.1);

    animation: whatsappPulse 2s infinite;

}

.whatsapp-float:hover{

    transform: translateY(-6px) scale(1.08);

    box-shadow: 0 15px 35px rgba(37,211,102,0.6);

}

@keyframes whatsappPulse{

    0%{

        box-shadow: 0 0 0 0 rgba(37,211,102,0.5);

    }

    70%{

        box-shadow: 0 0 0 18px rgba(37,211,102,0);

    }

    100%{

        box-shadow: 0 0 0 0 rgba(37,211,102,0);

    }

}

/* MOBILE */

@media(max-width:768px){

    .whatsapp-float{

        width: 55px;
        height: 55px;

        font-size: 28px;

        bottom: 20px;
        right: 20px;

    }

}

</style>

<!-- WHATSAPP FLOATING BUTTON END -->
<?php include 'components/footer.php'; ?>

</body>
</html>