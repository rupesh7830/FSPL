
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$is_logged_in = isset($_SESSION['user_id']);

$current_page = basename($_SERVER['PHP_SELF']);

?>

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- TAILWIND -->
  <script src="https://cdn.tailwindcss.com"></script>

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

    font-family:'Outfit',sans-serif;

}

a{
    text-decoration:none;
}

img{
    display:block;
    max-width:100%;
}

/* =========================================
NAVBAR
========================================= */

#navbar{

    position:fixed;

    top:0;
    left:0;

    width:100%;

    z-index:999;

    transition:0.35s ease;

}

/* =========================================
GLASS NAV
========================================= */

.glass-nav{

    position:relative;

    background:
    rgba(5,5,5,0.82);

    backdrop-filter:blur(24px);
    -webkit-backdrop-filter:blur(24px);

    border-bottom:
    1px solid rgba(212,175,55,0.14);

    overflow:visible;

}

/* =========================================
GOLD GLOW
========================================= */

.nav-glow{

    position:absolute;

    inset:0;

    background:
    radial-gradient(circle at top,
    rgba(212,175,55,0.12),
    transparent 70%);

    pointer-events:none;

}

/* =========================================
BOTTOM LINE
========================================= */

.glass-nav::after{

    content:'';

    position:absolute;

    left:0;
    bottom:0;

    width:100%;
    height:1px;

    background:
    linear-gradient(
    to right,
    transparent,
    rgba(212,175,55,0.35),
    transparent);

}

/* =========================================
NAV LINKS
========================================= */

.nav-link{

    position:relative;

    font-family:'Cinzel',serif;

    font-size:15px;
    font-weight:600;

    color:
    rgba(255,255,255,0.82);

    transition:0.35s ease;

}

/* LINE */

.nav-link::before{

    content:'';

    position:absolute;

    left:50%;
    bottom:-12px;

    transform:translateX(-50%);

    width:0;
    height:3px;

    border-radius:50px;

    background:#D4AF37;

    box-shadow:
    0 0 18px rgba(212,175,55,0.65);

    transition:0.35s ease;

}

/* HOVER */

.nav-link:hover{

    color:#F5D76E;

    transform:
    translateY(-2px);

}

/* HOVER LINE */

.nav-link:hover::before{

    width:70%;

}

/* =========================================
ACTIVE LINK
========================================= */

.active-link{

    color:#F5D76E;

}

.active-link::before{

    width:70%;

}

/* =========================================
PLAYER BUTTON
========================================= */

.player-btn{

    position:relative;

    overflow:hidden;

    display:flex;
    align-items:center;
    justify-content:center;

    background:
    rgba(255,255,255,0.03);

    border:
    1px solid rgba(212,175,55,0.14);

    backdrop-filter:
    blur(24px);

    color:#fff;

    font-family:'Cinzel',serif;

    font-weight:700;

    letter-spacing:1.5px;

    text-transform:uppercase;

    transition:0.35s ease;

}

/* HOVER */

.player-btn:hover{

    background:
    rgba(212,175,55,0.08);

    border-color:
    rgba(212,175,55,0.28);

    color:#F5D76E;

    transform:
    translateY(-2px);

    box-shadow:
    0 12px 35px rgba(212,175,55,0.18);

}

/* =========================================
REGISTER BUTTON
========================================= */

.register-btn{

    position:relative;

    overflow:hidden;

    background:
    linear-gradient(
    135deg,
    #D4AF37,
    #F5D76E);

    color:#111;

    border:
    1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 10px 30px rgba(212,175,55,0.28);

    transition:0.4s ease;

    font-family:'Cinzel',serif;
    font-weight:700;

}

/* HOVER */

.register-btn:hover{

    transform:
    translateY(-2px)
    scale(1.03);

    box-shadow:
    0 18px 40px rgba(212,175,55,0.4);

}

/* =========================================
PLAYER DROPDOWN
========================================= */

.player-dropdown{

    background:
    rgba(10,10,10,0.96);

    backdrop-filter:blur(24px);

    border:
    1px solid rgba(212,175,55,0.14);

    box-shadow:
    0 20px 60px rgba(0,0,0,0.5);

}

/* =========================================
DROPDOWN ITEM
========================================= */

.dropdown-item{

    display:block;

    padding:14px;

    border-radius:18px;

    transition:0.35s ease;

    border:
    1px solid transparent;

}

/* HOVER */

.dropdown-item:hover{

    background:
    rgba(212,175,55,0.08);

    border-color:
    rgba(212,175,55,0.18);

    transform:
    translateX(3px);

}

/* =========================================
TITLE
========================================= */

.dropdown-title{

    font-family:'Cinzel',serif;

    font-size:13px;
    font-weight:700;

    color:#fff;

    text-transform:uppercase;

}

/* =========================================
DESC
========================================= */

.dropdown-desc{

    margin-top:5px;

    font-size:10px;

    color:
    rgba(255,255,255,0.55);

}

/* =========================================
MOBILE MENU
========================================= */

.mobile-menu{

    position:fixed;

    top:0;
    right:-100%;

    width:100%;
    height:100vh;

    background:
    linear-gradient(
    to bottom,
    #050505,
    #0d0d0d);

    z-index:9999;

    overflow-y:auto;

    -webkit-overflow-scrolling:touch;

    transition:0.45s ease;

}

/* ACTIVE */

.mobile-menu.active{

    right:0;

}

/* =========================================
OVERLAY
========================================= */

.overlay{

    position:fixed;

    inset:0;

    background:
    rgba(0,0,0,0.55);

    backdrop-filter:
    blur(4px);

    opacity:0;
    visibility:hidden;

    transition:0.35s ease;

    z-index:9998;

}

/* ACTIVE */

.overlay.active{

    opacity:1;
    visibility:visible;

}

/* =========================================
MENU ITEM
========================================= */

.mobile-app-link{

    display:flex;
    align-items:center;
    justify-content:space-between;

    padding:18px;

    border-radius:24px;

    background:
    rgba(255,255,255,0.03);

    border:
    1px solid rgba(212,175,55,0.08);

    transition:0.35s ease;

}

/* HOVER */

.mobile-app-link:hover{

    transform:
    translateY(-3px);

    border-color:
    rgba(212,175,55,0.18);

    background:
    rgba(212,175,55,0.05);

}

/* =========================================
ACTIVE
========================================= */

.mobile-active{

    border-color:
    rgba(212,175,55,0.22);

    background:
    rgba(212,175,55,0.08);

}

/* =========================================
ICON
========================================= */

.menu-icon{

    width:54px;
    height:54px;

    border-radius:18px;

    background:
    rgba(212,175,55,0.08);

    border:
    1px solid rgba(212,175,55,0.12);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;

    flex-shrink:0;

}

/* =========================================
MENU TITLE
========================================= */

.menu-title{

    font-family:'Cinzel',serif;

    font-size:16px;
    font-weight:700;

    color:#fff;

}

/* =========================================
MENU DESC
========================================= */

.menu-desc{

    margin-top:4px;

    font-size:11px;

    color:
    rgba(255,255,255,0.45);

}

/* =========================================
ARROW
========================================= */

.menu-arrow{

    font-size:22px;

    color:
    rgba(212,175,55,0.7);

}

/* =========================================
REGISTER APP BUTTON
========================================= */

.register-app-btn{

    display:flex;
    align-items:center;
    justify-content:center;

    width:100%;
    height:58px;

    border-radius:22px;

    background:
    linear-gradient(
    135deg,
    #D4AF37,
    #F5D76E);

    color:#111;

    font-family:'Cinzel',serif;

    font-size:13px;
    font-weight:700;

    letter-spacing:2px;

    text-transform:uppercase;

    box-shadow:
    0 15px 40px rgba(212,175,55,0.25);

    transition:0.35s ease;

}

/* HOVER */

.register-app-btn:hover{

    transform:
    translateY(-2px)
    scale(1.02);

}

/* =========================================
REMOVE WHITE BORDER ISSUE
========================================= */

.border-white\/5{

    border-color:
    rgba(212,175,55,0.08)!important;

}

.border-white\/10{

    border-color:
    rgba(212,175,55,0.12)!important;

}

.border-white\/20{

    border-color:
    rgba(212,175,55,0.16)!important;

}

/* =========================================
RESPONSIVE
========================================= */

@media(max-width:768px){

    .nav-link{

        font-size:14px;

    }

    .player-btn{

        padding:
        11px 18px!important;

        font-size:
        11px!important;

    }

}

@media(max-width:640px){

    .menu-title{

        font-size:14px;

    }

    .menu-desc{

        font-size:10px;

    }

    .mobile-app-link{

        padding:16px;

    }

    .menu-icon{

        width:50px;
        height:50px;

        font-size:20px;

    }

}
  </style>

<!-- =========================================
NAVBAR
========================================= -->

<nav id="navbar">

  <div class="glass-nav">

    <div class="nav-glow"></div>

    <div class="max-w-7xl mx-auto px-5 lg:px-10">

      <!-- NAV INNER -->
      <div class="h-[68px] lg:h-[80px] flex items-center justify-between">

        <!-- LOGO -->
        <a href="index.php"
        class="flex items-center relative z-10 shrink-0 py-2">

          <img
          src="assets/images/logo.png"
          alt="FSCL Logo"
          class="w-16 h-16 lg:w-20 lg:h-20 object-contain">

        </a>

<div class="hidden lg:flex items-center gap-12 relative z-10">

<a href="index"
class="nav-link <?= ($current_page == 'index.php') ? 'active-link' : '' ?>">
    Home
</a>

<a href="aboutUs"
class="nav-link <?= ($current_page == 'aboutUs.php') ? 'active-link' : '' ?>">
    About
</a>

<a href="trials"
class="nav-link <?= ($current_page == 'trials.php') ? 'active-link' : '' ?>">
    Trials
</a>

<a href="gallery"
class="nav-link <?= ($current_page == 'gallery.php') ? 'active-link' : '' ?>">
    Gallery
</a>

<a href="players"
class="nav-link <?= ($current_page == 'players.php') ? 'active-link' : '' ?>">
    Players
</a>

<a href="contact"
class="nav-link <?= ($current_page == 'contact.php') ? 'active-link' : '' ?>">
    Contact
</a>

</div>

        <!-- DESKTOP BUTTON -->

<div class="hidden lg:block relative z-10">

<?php if($is_logged_in){ ?>

    <!-- DASHBOARD BUTTON -->

    <a
    href="dashboard"
    class="player-btn flex items-center gap-3 px-8 py-[13px] rounded-full text-[12px] tracking-[1px]">

        Go To Dashboard

        <!-- ICON -->

        <svg xmlns="http://www.w3.org/2000/svg"
        class="w-4 h-4"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 5l7 7-7 7" />

        </svg>

    </a>

<?php }else{ ?>

    <!-- PLAYER ZONE -->

    <div class="group relative">

        <!-- BUTTON -->

        <button
        class="player-btn flex items-center gap-3 px-8 py-[13px] rounded-full text-[12px] tracking-[1px]">

            Player Zone

            <!-- ICON -->

            <svg xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 transition duration-300 group-hover:rotate-180"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7" />

            </svg>

        </button>

        <!-- DROPDOWN -->

        <div
        class="absolute right-0 top-[115%] w-48 z-[9999]
        opacity-0 invisible translate-y-2
        group-hover:opacity-100
        group-hover:visible
        group-hover:translate-y-0
        transition-all duration-300">

            <div
            class="player-dropdown rounded-2xl p-2">

                <!-- REGISTER -->

                <a href="register"
                class="dropdown-item">

                    <h3 class="dropdown-title">
                        Register
                    </h3>

                    <p class="dropdown-desc">
                        New player account
                    </p>

                </a>

                <!-- LOGIN -->

                <a href="login"
                class="dropdown-item mt-1">

                    <h3 class="dropdown-title">
                        Login
                    </h3>

                    <p class="dropdown-desc">
                        Access dashboard
                    </p>

                </a>

            </div>

        </div>

    </div>

<?php } ?>

</div>

        <!-- MOBILE BUTTON -->
        <button
        id="menuBtn"
        class="lg:hidden ml-auto text-white relative z-10">

          <svg xmlns="http://www.w3.org/2000/svg"
          class="w-8 h-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">

            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"/>

          </svg>

        </button>

      </div>

    </div>

  </div>

</nav>

<!-- =========================================
MOBILE MENU
APP STYLE PREMIUM UI
========================================= -->

<div id="overlay" class="overlay"></div>

<div id="mobileMenu"
class="mobile-menu">

    <!-- =========================================
    TOP HEADER
    ========================================= -->

    <div
    class="relative px-6 pt-7 pb-6 border-b border-white/10 overflow-hidden">

        <!-- GOLD GLOW -->

        <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.15),transparent_70%)]">
        </div>

        <!-- CONTENT -->

        <div class="relative flex items-center justify-between">

            <!-- LEFT -->

            <div class="flex items-center gap-4">

                <!-- LOGO -->

                <div
                class="w-16 h-16 rounded-2xl bg-white/[0.04] border border-[#D4AF37]/15 backdrop-blur-xl flex items-center justify-center overflow-hidden">

                    <img
                    src="assets/images/logo.png"
                    alt="FSPL Logo"
                    class="w-12 h-12 object-contain">

                </div>

                <!-- TEXT -->

                <div>

                    <h2
                    class="font-['Cinzel']
                    text-white
                    text-[20px]
                    font-bold
                    leading-none">

                        FSPL

                    </h2>

                    <p
                    class="mt-2 text-[#D4AF37]/70
                    uppercase
                    tracking-[3px]
                    text-[9px]
                    font-medium">

                        Future Star League

                    </p>

                </div>

            </div>

            <!-- CLOSE -->

            <button
            id="closeBtn"
            class="w-12 h-12 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-white">

                <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>

                </svg>

            </button>

        </div>

    </div>


    <!-- =========================================
    USER CARD
    ========================================= -->

    <div class="px-6 mt-6">

        <div
        class="relative overflow-hidden rounded-[28px]
        border border-[#D4AF37]/10
        bg-white/[0.03]
        backdrop-blur-3xl p-5">

            <!-- GLOW -->

            <div
            class="absolute inset-0 bg-gradient-to-br from-[#D4AF37]/10 to-transparent">
            </div>

            <!-- CONTENT -->

            <div class="relative flex items-center gap-4">

                <!-- AVATAR -->

                <div
                class="w-16 h-16 rounded-2xl bg-[#D4AF37]/10 border border-[#D4AF37]/15 flex items-center justify-center text-[#D4AF37] text-2xl font-bold">

                    F

                </div>

                <!-- TEXT -->

                <div>

                    <h3
                    class="font-['Cinzel']
                    text-white
                    text-[18px]
                    font-bold">

                        Future Star

                    </h3>

                    <p
                    class="mt-1 text-white/45 text-[12px]">

                        Premium Cricket Platform

                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================
    MENU LINKS
    ========================================= -->

    <div class="px-6 mt-8 flex flex-col gap-4">

        <!-- ITEM -->

        <a
        href="index"
        class="mobile-app-link <?= ($current_page == 'index.php') ? 'mobile-active' : '' ?>">

            <div class="flex items-center gap-4">

                <div class="menu-icon">
                    🏠
                </div>

                <div>

                    <h3 class="menu-title">
                        Home
                    </h3>

                    <p class="menu-desc">
                        Main landing page
                    </p>

                </div>

            </div>

            <span class="menu-arrow">
                →
            </span>

        </a>


        <!-- ITEM -->

        <a
        href="aboutUs"
        class="mobile-app-link <?= ($current_page == 'aboutUs.php') ? 'mobile-active' : '' ?>">

            <div class="flex items-center gap-4">

                <div class="menu-icon">
                    📖
                </div>

                <div>

                    <h3 class="menu-title">
                        About
                    </h3>

                    <p class="menu-desc">
                        About FSPL platform
                    </p>

                </div>

            </div>

            <span class="menu-arrow">
                →
            </span>

        </a>


        <!-- ITEM -->

        <a
        href="trials"
        class="mobile-app-link <?= ($current_page == 'trials') ? 'mobile-active' : '' ?>">

            <div class="flex items-center gap-4">

                <div class="menu-icon">
                    🏏
                </div>

                <div>

                    <h3 class="menu-title">
                        Trials
                    </h3>

                    <p class="menu-desc">
                        Upcoming cricket trials
                    </p>

                </div>

            </div>

            <span class="menu-arrow">
                →
            </span>

        </a>


        <!-- ITEM -->

        <a
        href="gallery"
        class="mobile-app-link <?= ($current_page == 'gallery') ? 'mobile-active' : '' ?>">

            <div class="flex items-center gap-4">

                <div class="menu-icon">
                    🖼️
                </div>

                <div>

                    <h3 class="menu-title">
                        Gallery
                    </h3>

                    <p class="menu-desc">
                        Match highlights & moments
                    </p>

                </div>

            </div>

            <span class="menu-arrow">
                →
            </span>

        </a>


        <!-- ITEM -->

        <a
        href="players"
        class="mobile-app-link <?= ($current_page == 'players') ? 'mobile-active' : '' ?>">

            <div class="flex items-center gap-4">

                <div class="menu-icon">
                    ⭐
                </div>

                <div>

                    <h3 class="menu-title">
                        Players
                    </h3>

                    <p class="menu-desc">
                        Explore player profiles
                    </p>

                </div>

            </div>

            <span class="menu-arrow">
                →
            </span>

        </a>


        <!-- ITEM -->

        <a
        href="contact"
        class="mobile-app-link <?= ($current_page == 'contact') ? 'mobile-active' : '' ?>">

            <div class="flex items-center gap-4">

                <div class="menu-icon">
                    📞
                </div>

                <div>

                    <h3 class="menu-title">
                        Contact
                    </h3>

                    <p class="menu-desc">
                        Get support & help
                    </p>

                </div>

            </div>

            <span class="menu-arrow">
                →
            </span>

        </a>

    </div>


    <!-- =========================================
    BOTTOM BUTTON
    ========================================= -->

    <div class="px-6 mt-8 pb-10">

        <a
        href="register"
        class="register-app-btn">

            Register Now

        </a>

    </div>

</div>

  <!-- =========================================
       JAVASCRIPT
  ========================================= -->

  <script>

    const menuBtn = document.getElementById("menuBtn");
    const closeBtn = document.getElementById("closeBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const overlay = document.getElementById("overlay");

    // OPEN
    menuBtn.addEventListener("click",()=>{

      mobileMenu.classList.add("active");
      overlay.classList.add("active");

    });

    // CLOSE
    closeBtn.addEventListener("click",closeMenu);
    overlay.addEventListener("click",closeMenu);

    function closeMenu(){

      mobileMenu.classList.remove("active");
      overlay.classList.remove("active");

    }

  </script>

