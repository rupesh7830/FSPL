<?php

session_start();

require_once 'config/db_connect.php';

/* =========================================
   LOGIN PROCESS
========================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    /* =====================================
       VALIDATION
    ===================================== */

    if (empty($email) || empty($password)) {

        $_SESSION['error'] = "All fields are required";

    } else {

        /* =====================================
           CHECK ADMIN
        ===================================== */

        $stmt = $conn->prepare("
            SELECT 
                id,
                email,
                password
            FROM admin
            WHERE email = ?
            LIMIT 1
        ");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        /* =====================================
           ADMIN FOUND
        ===================================== */

        if ($result->num_rows === 1) {

            $admin = $result->fetch_assoc();

            /* =================================
               VERIFY PASSWORD
            ================================= */

            if (password_verify($password, $admin['password'])) {

                session_regenerate_id(true);

                $_SESSION['admin_id'] = $admin['id'];

                $_SESSION['admin_email'] = $admin['email'];

                $_SESSION['admin_logged_in'] = true;

                header("Location: dashboard.php");

                exit();

            } else {

                $_SESSION['error'] = "Invalid Password";

            }

        } else {

            $_SESSION['error'] = "Admin Not Found";

        }

    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>FSPL Admin Login</title>

    <!-- TAILWIND -->

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-[#050505] min-h-screen overflow-hidden">

<!-- =========================================================
     BACKGROUND
========================================================= -->

<div class="absolute inset-0 overflow-hidden">

    <!-- IMAGE -->

    <img
    src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1800&auto=format&fit=crop"
    alt=""
    class="w-full h-full object-cover opacity-[0.04]">

    <!-- OVERLAY -->

    <div class="absolute inset-0 bg-black/90"></div>

    <!-- GLOW -->

    <div
    class="absolute top-[-250px] left-[-150px]
    w-[500px] h-[500px]
    bg-[#D4AF37]/10
    blur-[180px]
    rounded-full">
    </div>

    <div
    class="absolute bottom-[-250px] right-[-150px]
    w-[500px] h-[500px]
    bg-[#D4AF37]/10
    blur-[180px]
    rounded-full">
    </div>

</div>

<!-- =========================================================
     LOGIN SECTION
========================================================= -->

<section class="relative z-10 min-h-screen flex items-center justify-center px-5">

    <div
    class="w-full max-w-[1050px]
    grid lg:grid-cols-2
    items-center gap-16">

        <!-- =========================================================
             LEFT CONTENT
        ========================================================== -->

        <div class="hidden lg:block">

            <!-- TAG -->

            <div
            class="inline-flex items-center gap-3
            px-5 py-3
            rounded-full
            border border-[#D4AF37]/15
            bg-white/[0.03]
            backdrop-blur-xl">

                <span
                class="w-2 h-2 rounded-full bg-[#D4AF37]">
                </span>

                <span
                class="text-[#F5D76E]
                uppercase
                tracking-[4px]
                text-[10px]
                font-medium
                font-['Outfit']">

                    Future Star Premier League

                </span>

            </div>

            <!-- HEADING -->

            <h1
            class="mt-8
            text-white
            font-['Cinzel']
            text-[64px]
            leading-[0.92]
            tracking-[-3px]
            font-bold">

                Premium

                <span class="block text-[#D4AF37] mt-2">

                    Admin Panel

                </span>

            </h1>

            <!-- TEXT -->

            <p
            class="mt-8
            max-w-[520px]
            text-white/45
            text-[15px]
            leading-[34px]
            font-light
            font-['Outfit']">

                Manage registrations, trials,
                players and complete league operations
                from one powerful dashboard.

            </p>

        </div>

        <!-- =========================================================
             LOGIN CARD
        ========================================================== -->

        <div
        class="relative
        max-w-[360px]
        w-full
        mx-auto">

            <!-- GLOW -->

            <div
            class="absolute inset-0
            rounded-[28px]
            bg-gradient-to-b
            from-[#D4AF37]/20
            via-transparent
            to-transparent
            blur-xl">
            </div>

            <!-- CARD -->

            <div
            class="relative
            rounded-[28px]
            border border-white/10
            bg-white/[0.03]
            backdrop-blur-3xl
            p-6">

                <!-- TOP -->

                <div class="flex items-center justify-between">

                    <!-- LOGO -->

                    <div
                    class="w-12 h-12
                    rounded-2xl
                    border border-[#D4AF37]/20
                    bg-[#D4AF37]/10
                    flex items-center justify-center">

                        <span
                        class="text-[#D4AF37]
                        text-lg
                        font-bold
                        font-['Cinzel']">

                            F

                        </span>

                    </div>

                    <!-- ADMIN -->

                    <div
                    class="px-3 py-1.5
                    rounded-full
                    border border-white/10
                    bg-black/30">

                        <span
                        class="text-white/50
                        text-[9px]
                        tracking-[3px]
                        uppercase
                        font-medium
                        font-['Outfit']">

                            Admin Access

                        </span>

                    </div>

                </div>

                <!-- TITLE -->

                <div class="mt-6">

                    <h2
                    class="text-white
                    text-[28px]
                    font-bold
                    tracking-[-1px]
                    font-['Cinzel']">

                        Welcome Back

                    </h2>

                    <p
                    class="mt-1.5
                    text-white/40
                    text-[13px]
                    leading-[24px]
                    font-['Outfit']">

                        Sign in to continue to dashboard.

                    </p>

                </div>

                <!-- ERROR -->

                <?php if(isset($_SESSION['error'])): ?>

                <div
                class="mt-5
                rounded-xl
                border border-red-500/20
                bg-red-500/10
                px-4 py-3">

                    <p
                    class="text-red-300
                    text-[13px]
                    font-medium
                    font-['Outfit']">

                        <?= $_SESSION['error']; ?>

                    </p>

                </div>

                <?php unset($_SESSION['error']); ?>

                <?php endif; ?>

                <!-- FORM -->

                <form
                method="POST"
                class="mt-6 space-y-4">

                    <!-- EMAIL -->

                    <div>

                        <label
                        class="block
                        mb-2
                        text-white/60
                        text-[11px]
                        uppercase
                        tracking-[2px]
                        font-medium
                        font-['Outfit']">

                            Email Address

                        </label>

                        <input
                        type="email"
                        name="email"
                        placeholder="admin@fspl.com"
                        required
                        class="w-full h-[48px]
                        rounded-xl
                        border border-white/10
                        bg-black/40
                        px-4
                        text-white
                        text-[13px]
                        outline-none
                        transition-all
                        duration-300
                        font-['Outfit']
                        focus:border-[#D4AF37]/40
                        focus:bg-black/60
                        placeholder:text-white/20">

                    </div>

                    <!-- PASSWORD -->

                    <div>

                        <div class="flex items-center justify-between mb-2">

                            <label
                            class="text-white/60
                            text-[11px]
                            uppercase
                            tracking-[2px]
                            font-medium
                            font-['Outfit']">

                                Password

                            </label>

                            <a
                            href="#"
                            class="text-[#D4AF37]
                            text-[11px]
                            hover:text-white
                            transition
                            font-medium
                            font-['Outfit']">

                                Forgot?

                            </a>

                        </div>

                        <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        class="w-full h-[48px]
                        rounded-xl
                        border border-white/10
                        bg-black/40
                        px-4
                        text-white
                        text-[13px]
                        outline-none
                        transition-all
                        duration-300
                        font-['Outfit']
                        focus:border-[#D4AF37]/40
                        focus:bg-black/60
                        placeholder:text-white/20">

                    </div>

                    <!-- REMEMBER -->

                    <label class="flex items-center gap-2.5 cursor-pointer">

                        <input
                        type="checkbox"
                        class="w-3.5 h-3.5 accent-[#D4AF37]">

                        <span
                        class="text-white/40
                        text-[12px]
                        font-['Outfit']">

                            Remember me

                        </span>

                    </label>

                    <!-- BUTTON -->

                    <button
                    type="submit"
                    class="group
                    relative
                    overflow-hidden
                    w-full h-[50px]
                    rounded-xl
                    bg-[#D4AF37]
                    mt-1
                    shadow-[0_0_30px_rgba(212,175,55,0.18)]">

                        <!-- SHINE -->

                        <div
                        class="absolute inset-0
                        bg-gradient-to-r
                        from-transparent
                        via-white/25
                        to-transparent
                        -translate-x-full
                        group-hover:translate-x-full
                        transition duration-1000">
                        </div>

                        <!-- TEXT -->

                        <span
                        class="relative
                        text-black
                        uppercase
                        tracking-[2px]
                        text-[10px]
                        font-bold
                        font-['Cinzel']">

                            Login Dashboard

                        </span>

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

</body>

</html>