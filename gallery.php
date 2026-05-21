<head>

    <!-- =========================================
    BASIC SEO
    ========================================= -->

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- =========================================
    PAGE TITLE
    ========================================= -->

    <title>
        FSPL Gallery | Cricket Match Photos & Tournament Moments
    </title>

    <!-- =========================================
    META DESCRIPTION
    ========================================= -->

    <meta
    name="description"
    content="Explore the official FSPL Gallery featuring cricket trials, match highlights, player moments, team celebrations, and premium tournament experiences across India.">

    <!-- =========================================
    META KEYWORDS
    ========================================= -->

    <meta
    name="keywords"
    content="FSPL Gallery, cricket gallery, cricket tournament photos, cricket match highlights, FSPL moments, cricket trials India, cricket images">

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
    href="https://yourdomain.com/gallery.php">

    <!-- =========================================
    OPEN GRAPH SEO
    ========================================= -->

    <meta
    property="og:title"
    content="FSPL Gallery | Match Moments & Cricket Highlights">

    <meta
    property="og:description"
    content="Discover premium cricket moments, player highlights, and official FSPL tournament gallery images.">

    <meta
    property="og:image"
    content="https://yourdomain.com/assets/images/gallery-banner.webp">

    <meta
    property="og:url"
    content="https://yourdomain.com/gallery.php">

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
    content="FSPL Gallery">

    <meta
    name="twitter:description"
    content="Explore official FSPL cricket gallery moments and highlights.">

    <meta
    name="twitter:image"
    content="https://yourdomain.com/assets/images/gallery-banner.webp">

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
      "@type": "ImageGallery",
      "name": "FSPL Gallery",
      "description": "Official gallery of Future Star Premier League cricket tournaments and match moments.",
      "url": "https://yourdomain.com/gallery.php",
      "publisher": {
        "@type": "SportsOrganization",
        "name": "Future Star Premier League",
        "url": "https://yourdomain.com"
      }
    }
    </script>

    <!-- =========================================
    GLOBAL STYLE
    ========================================= -->

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            background:#050505;
            overflow-x:hidden;
            font-family:'Outfit', sans-serif;
        }

        img{
            image-rendering:auto;
        }

    </style>

</head>
<body>
<?php include 'components/navbar.php'; ?>
<section
class="relative overflow-hidden bg-[#050505] min-h-screen flex items-center ">

    <!-- =========================================
         BACKGROUND IMAGE
    ========================================= -->

    <div class="absolute inset-0">

        <img
        src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=1800&auto=format&fit=crop"
        alt=""
        class="w-full h-full object-cover opacity-[0.10]">

        <!-- DARK OVERLAY -->

        <div
        class="absolute inset-0 bg-black/85">
        </div>

        <!-- GOLD OVERLAY -->

        <div
        class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/10 via-transparent to-transparent">
        </div>

    </div>

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
    class="absolute top-[-250px] left-[-150px] w-[650px] h-[650px] bg-[#D4AF37]/10 blur-[180px] rounded-full">
    </div>

    <!-- =========================================
         MAIN WRAPPER
    ========================================= -->

    <div
    class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 w-full pt-24 pb-20 lg:py-24">

        <!-- =========================================
             GRID
        ========================================= -->

        <div
        class="grid grid-cols-1 xl:grid-cols-2 gap-12 xl:gap-20 items-center">

            <!-- =========================================
                 LEFT CONTENT
            ========================================= -->

            <div>

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

                        Future Star Premier League

                    </span>

                </div>

                <!-- HEADING -->

                <h1
                class="mt-10 font-['Cinzel']
                text-white
                text-4xl
                sm:text-5xl
                lg:text-[55px]
                leading-[0.92]
                font-bold
                tracking-[-3px]
                max-w-[900px]">

                    Capturing

                    <span class="block text-[#D4AF37] mt-3">

                        Future Legends

                    </span>

                </h1>

                <!-- DESC -->

                <p
                class="mt-8 max-w-[720px]
                text-white/55
                font-['Outfit']
                text-[15px]
                lg:text-[18px]
                leading-[34px]
                lg:leading-[40px]
                font-light">

                    Explore unforgettable FSPL moments, elite cricket trials, championship battles, player celebrations and the journey of future stars rising through the league.

                </p>

                <!-- BUTTONS -->

                <div
                class="flex flex-col sm:flex-row items-start gap-4 lg:gap-5 mt-12">

                    <!-- BUTTON -->

                    <a
                    href="#gallery-grid"
                    class="group relative overflow-hidden h-[54px] lg:h-[60px] px-8 lg:px-10 rounded-full bg-[#D4AF37] shadow-[0_0_40px_rgba(212,175,55,0.18)]">

                        <!-- SHINE -->

                        <div
                        class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000">
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
                            text-black">

                                Explore Gallery

                            </span>

                            <!-- ICON -->

                            <div
                            class="w-8 h-8 rounded-full bg-black/10 flex items-center justify-center">

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

                    <!-- BUTTON -->

                    <a
                    href="#video-highlights"
                    class="group relative overflow-hidden h-[54px] lg:h-[60px] px-8 lg:px-10 rounded-full border border-[#D4AF37]/15 bg-white/[0.03] backdrop-blur-2xl">

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

                                Watch Highlights

                            </span>

                            <!-- ICON -->

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
                                    d="M14.752 11.168l-5.197-3.03A1 1 0 008 9.03v6.06a1 1 0 001.555.832l5.197-3.03a1 1 0 000-1.664z"/>

                                </svg>

                            </div>

                        </div>

                    </a>

                </div>

                <!-- STATS -->

                <div
                class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5 mt-16">

                    <!-- CARD -->

                    <div
                    class="rounded-[24px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl py-6 px-5">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-3xl
                        lg:text-4xl
                        font-bold">

                            15K+

                        </h3>

                        <p
                        class="mt-3 text-white/45 text-[11px] uppercase tracking-[3px] font-['Outfit']">

                            Gallery Shots

                        </p>

                    </div>

                    <!-- CARD -->

                    <div
                    class="rounded-[24px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl py-6 px-5">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-3xl
                        lg:text-4xl
                        font-bold">

                            120+

                        </h3>

                        <p
                        class="mt-3 text-white/45 text-[11px] uppercase tracking-[3px] font-['Outfit']">

                            Match Moments

                        </p>

                    </div>

                    <!-- CARD -->

                    <div
                    class="rounded-[24px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl py-6 px-5">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-3xl
                        lg:text-4xl
                        font-bold">

                            25+

                        </h3>

                        <p
                        class="mt-3 text-white/45 text-[11px] uppercase tracking-[3px] font-['Outfit']">

                            Trial Cities

                        </p>

                    </div>

                    <!-- CARD -->

                    <div
                    class="rounded-[24px] border border-white/5 bg-white/[0.03] backdrop-blur-2xl py-6 px-5">

                        <h3
                        class="font-['Cinzel']
                        text-[#D4AF37]
                        text-3xl
                        lg:text-4xl
                        font-bold">

                            4K+

                        </h3>

                        <p
                        class="mt-3 text-white/45 text-[11px] uppercase tracking-[3px] font-['Outfit']">

                            Highlights

                        </p>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 RIGHT SHOWCASE GRID
            ========================================= -->

            <div
            class="hidden xl:grid grid-cols-2 gap-5">

                <!-- LARGE CARD -->

                <div
                class="relative overflow-hidden rounded-[34px] h-[520px]">

                    <img
                    src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=1200&auto=format&fit=crop"
                    alt=""
                    class="w-full h-full object-cover transition duration-700 hover:scale-110">

                    <!-- OVERLAY -->

                    <div
                    class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                    </div>

                    <!-- CONTENT -->

                    <div
                    class="absolute bottom-0 left-0 p-7">

                        <span
                        class="text-[#D4AF37]
                        uppercase
                        tracking-[3px]
                        text-[10px]
                        font-medium">

                            Championship

                        </span>

                        <h3
                        class="mt-3 font-['Cinzel']
                        text-white
                        text-3xl
                        leading-[1.1]
                        font-bold">

                            Elite Match Moments

                        </h3>

                    </div>

                </div>

                <!-- SMALL GRID -->

                <div
                class="flex flex-col gap-5">

                    <!-- CARD -->

                    <div
                    class="relative overflow-hidden rounded-[30px] h-[250px]">

                        <img
                        src="https://images.unsplash.com/photo-1624880357913-a8539238245b?q=80&w=1200&auto=format&fit=crop"
                        alt=""
                        class="w-full h-full object-cover transition duration-700 hover:scale-110">

                        <!-- OVERLAY -->

                        <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                        </div>

                        <!-- CONTENT -->

                        <div
                        class="absolute bottom-0 left-0 p-6">

                            <span
                            class="text-[#D4AF37]
                            uppercase
                            tracking-[3px]
                            text-[10px]
                            font-medium">

                                Trials

                            </span>

                            <h3
                            class="mt-2 font-['Cinzel']
                            text-white
                            text-2xl
                            leading-[1.1]
                            font-bold">

                                Selection Camp

                            </h3>

                        </div>

                    </div>

                    <!-- CARD -->

                    <div
                    class="relative overflow-hidden rounded-[30px] h-[250px]">

                        <img
                        src="https://images.unsplash.com/photo-1512719994953-eabf50895df7?q=80&w=1200&auto=format&fit=crop"
                        alt=""
                        class="w-full h-full object-cover transition duration-700 hover:scale-110">

                        <!-- OVERLAY -->

                        <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                        </div>

                        <!-- CONTENT -->

                        <div
                        class="absolute bottom-0 left-0 p-6">

                            <span
                            class="text-[#D4AF37]
                            uppercase
                            tracking-[3px]
                            text-[10px]
                            font-medium">

                                Celebration

                            </span>

                            <h3
                            class="mt-2 font-['Cinzel']
                            text-white
                            text-2xl
                            leading-[1.1]
                            font-bold">

                                Victory Nights

                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
FSPL MASONRY GALLERY SECTION
========================================= -->

<section
id="gallery-grid"
class="relative overflow-hidden py-20 lg:py-32 bg-[#050505]">

    <!-- =========================================
         GOLD GLOW
    ========================================= -->

    <div
    class="absolute bottom-[-250px] right-[-150px] w-[650px] h-[650px] bg-[#D4AF37]/5 blur-[180px] rounded-full">
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

                    FSPL Moments

                </span>

            </div>

            <!-- HEADING -->

            <h2
            class="mt-8 font-['Cinzel']
            text-white
            text-4xl
            sm:text-5xl
            lg:text-[60px]
            leading-[0.95]
            font-bold
            tracking-[-3px]">

                Relive The

                <span class="block text-[#D4AF37] mt-3">

                    Championship Energy

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

                Explore unforgettable moments from FSPL trials, league matches, player celebrations and elite cricket experiences.

            </p>

        </div>


        <!-- =========================================
             MASONRY GRID
        ========================================= -->

        <div
        class="columns-1 sm:columns-2 xl:columns-4 gap-5 space-y-5 mt-16 lg:mt-20">

            <!-- =========================================
                 IMAGE 1
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[520px] object-cover transition duration-700 group-hover:scale-110">

                <!-- OVERLAY -->

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <!-- GOLD LIGHT -->

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <!-- CONTENT -->

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Championship

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-3xl
                    leading-[1.1]
                    font-bold">

                        Match Victory

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 2
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1624880357913-a8539238245b?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[340px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Trials

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-2xl
                    leading-[1.1]
                    font-bold">

                        Selection Camp

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 3
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[460px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Batting

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-2xl
                    leading-[1.1]
                    font-bold">

                        Power Shots

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 4
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1512719994953-eabf50895df7?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[350px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Celebration

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-2xl
                    leading-[1.1]
                    font-bold">

                        Victory Moments

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 5
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1593341646782-e0b495cff86d?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[500px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Bowling

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-3xl
                    leading-[1.1]
                    font-bold">

                        Pace Attack

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 6
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[360px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Awards

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-2xl
                    leading-[1.1]
                    font-bold">

                        Player Honors

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 7
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1624526267942-ab0ff8a3e972?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[450px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Team Spirit

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-3xl
                    leading-[1.1]
                    font-bold">

                        Squad Unity

                    </h3>

                </div>

            </div>


            <!-- =========================================
                 IMAGE 8
            ========================================= -->

            <div
            class="group relative overflow-hidden rounded-[28px] break-inside-avoid">

                <img
                src="https://images.unsplash.com/photo-1508098682722-e99c643e7485?q=80&w=1200&auto=format&fit=crop"
                alt=""
                class="w-full h-[330px] object-cover transition duration-700 group-hover:scale-110">

                <div
                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent">
                </div>

                <div
                class="absolute inset-0 bg-[#D4AF37]/10 opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                class="absolute bottom-0 left-0 p-6">

                    <span
                    class="text-[#D4AF37]
                    uppercase
                    tracking-[3px]
                    text-[10px]
                    font-medium">

                        Practice

                    </span>

                    <h3
                    class="mt-3 font-['Cinzel']
                    text-white
                    text-2xl
                    leading-[1.1]
                    font-bold">

                        Training Session

                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include 'components/footer.php'; ?>

</body>
</html>