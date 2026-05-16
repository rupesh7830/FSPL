<!-- =========================================
FSCL LUXURY SPORTS NAVBAR
========================================= -->
<?php

session_start();

$is_logged_in = isset($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>FSCL Luxury Navbar</title>

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
    a{
      text-decoration:none;
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

    .glass-nav{

      position:relative;

      background:
      rgba(5,5,5,0.82);

      backdrop-filter:blur(24px);
      -webkit-backdrop-filter:blur(24px);

      border-bottom:
      1px solid rgba(212,175,55,0.15);

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
      rgba(212,175,55,0.14),
      transparent 70%);

      pointer-events:none;

    }

    /* =========================================
       BOTTOM GOLD LINE
    ========================================= */

    .glass-nav::after{

      content:'';

      position:absolute;

      left:0;
      bottom:0;

      width:100%;
      height:1px;

      background:
      linear-gradient(to right,
      transparent,
      rgba(212,175,55,0.45),
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
      0 0 18px rgba(212,175,55,0.7);

      transition:0.35s ease;

    }

    .nav-link:hover{

      color:#F5D76E;

      transform:
      translateY(-2px);

    }

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


    .register-btn:hover{

      transform:
      translateY(-2px)
      scale(1.03);

      box-shadow:
      0 18px 40px rgba(212,175,55,0.4);

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
      #111111);

      backdrop-filter:blur(30px);

      z-index:1000;

      transition:0.45s ease;

      overflow-y:auto;

    }

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
      rgba(0,0,0,0.65);

      opacity:0;
      visibility:hidden;

      transition:0.35s ease;

      z-index:999;

    }

    .overlay.active{

      opacity:1;
      visibility:visible;

    }

    /* =========================================
       MOBILE LINKS
    ========================================= */

    .mobile-link{

      padding:18px 22px;

      border-radius:18px;

      background:
      rgba(255,255,255,0.03);

      border:
      1px solid rgba(212,175,55,0.08);

      transition:0.35s ease;

      font-family:'Cinzel',serif;
      font-weight:600;

    }

    .mobile-link:hover{

      background:
      rgba(212,175,55,0.08);

      border-color:
      rgba(212,175,55,0.28);

      transform:
      translateX(10px);

      color:#F5D76E;

    }

    /* =========================================
   PLAYER BUTTON
========================================= */

.player-btn{

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
  font-size:12px;

}

.player-btn:hover{

  transform:
  translateY(-2px)
  scale(1.03);

  box-shadow:
  0 18px 40px rgba(212,175,55,0.4);

}

/* =========================================
   DROPDOWN
========================================= */

.player-dropdown{

  background:
  rgba(10,10,10,0.96);

  backdrop-filter:blur(24px);

  border:
  1px solid rgba(212,175,55,0.15);

  box-shadow:
  0 20px 60px rgba(0,0,0,0.5);

}

/* =========================================
   DROPDOWN ITEM
========================================= */

.dropdown-item{

  display:block;

  padding:5px 12px;

  border-radius:18px;

  transition:0.35s ease;

  border:
  1px solid transparent;

}

.dropdown-item:hover{

  background:
  rgba(212,175,55,0.08);

  border-color:
  rgba(212,175,55,0.18);


}

/* =========================================
   DROPDOWN TITLE
========================================= */

.dropdown-title{

  font-family:'Cinzel',serif;

  font-size:12px;
  font-weight:700;

  color:#fff;

  letter-spacing:0px;

  text-transform:uppercase;

}

/* =========================================
   DROPDOWN DESC
========================================= */

.dropdown-desc{

  margin-top:5px;

  font-size:10px;

  color:
  rgba(255,255,255,0.55);

}
  </style>

</head>

<body>

  <!-- =========================================
       NAVBAR
  ========================================= -->

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

        <!-- DESKTOP MENU -->
        <div
        class="hidden lg:flex items-center gap-12 relative z-10">

          <a href="index.php" class="nav-link active-link">Home</a>

          <a href="aboutUs.php" class="nav-link">About</a>

          <a href="trials.php" class="nav-link">Trials</a>

          <a href="gallery.php" class="nav-link">Gallery</a>

          <a href="players.php" class="nav-link">Players</a>

          <a href="contact.php" class="nav-link">Contact</a>

        </div>

        <!-- DESKTOP BUTTON -->

<div class="hidden lg:block relative z-10">

<?php if($is_logged_in){ ?>

    <!-- DASHBOARD BUTTON -->

    <a
    href="dashboard.php"
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

                <a href="register.php"
                class="dropdown-item">

                    <h3 class="dropdown-title">
                        Register
                    </h3>

                    <p class="dropdown-desc">
                        New player account
                    </p>

                </a>

                <!-- LOGIN -->

                <a href="login.php"
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
  ========================================= -->

  <div id="overlay"
    class="overlay"></div>

  <div id="mobileMenu"
    class="mobile-menu">

    <!-- TOP -->
    <div
      class="flex items-center justify-between p-6 border-b border-white/10">

      <div class="flex items-center gap-4">

        <img src="assets/images/logo.png"
          class="w-14 h-14 object-contain">

        <div>

          <h2
            class="logo-title text-lg">

            FUTURE STAR

          </h2>

          <p
            class="logo-subtitle text-[9px] mt-1">

            PREMIER LEAGUE

          </p>

        </div>

      </div>

      <!-- CLOSE -->
      <button id="closeBtn"
        class="text-white">

        <svg xmlns="http://www.w3.org/2000/svg"
          class="w-8 h-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">

          <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12" />

        </svg>

      </button>

    </div>

    <!-- LINKS -->
    <div class="p-6 flex flex-col gap-5 text-white mt-5">

      <a href="index.php"
        class="mobile-link">

        Home

      </a>

      <a href="aboutUs.php"
        class="mobile-link">

        About

      </a>

      <a href="trials.php"
        class="mobile-link">

        Trials

      </a>

      <a href="gallery.php"
        class="mobile-link">

        Gallery

      </a>

      <a href="players.php"
        class="mobile-link">

        Players

      </a>

      <a href="contact.php"
        class="mobile-link">

        Contact

      </a>

      <!-- MOBILE BUTTON -->
      <a href="register.php"
        class="register-btn mt-5 text-center py-4 rounded-2xl">

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

</body>

</html>