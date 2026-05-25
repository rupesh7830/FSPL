<?php

session_start();

include 'admin/config/db_connect.php';

/* =========================
SAVE REDIRECT URL
========================= */

if(isset($_GET['redirect'])){

    $_SESSION['redirect_after_login'] = $_GET['redirect'];
}

/* =========================
LOGIN
========================= */

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    /* CHECK USER */

    $stmt = $conn->prepare("
        SELECT id, full_name, email, password
        FROM users
        WHERE email = ?
    ");

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        /* VERIFY PASSWORD */

        if(password_verify($password, $user['password'])){

            /* SESSION */

            $_SESSION['user_id']    = $user['id'];

            $_SESSION['user_name']  = $user['full_name'];

            $_SESSION['user_email'] = $user['email'];

            /* REDIRECT URL */

            $redirect_url = isset($_SESSION['redirect_after_login'])
            ? $_SESSION['redirect_after_login']
            : "dashboard";

            unset($_SESSION['redirect_after_login']);

            echo "
            <script>

                window.location.href='$redirect_url';

            </script>
            ";

        }else{

            echo "
            <script>

                alert('Invalid Password');

            </script>
            ";
        }

    }else{

        echo "
        <script>

            alert('Email Not Found');

        </script>
        ";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - FSPL</title>

<!-- TAILWIND -->

<script src="https://cdn.tailwindcss.com"></script>

<!-- GOOGLE FONTS -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body class="bg-[#050505] overflow-x-hidden min-h-screen">

<?php include 'components/navbar.php'; ?>

<!-- LOGIN SECTION -->

<section class="relative overflow-hidden min-h-screen flex items-center py-20">

<!-- BACKGROUND -->

<div class="absolute inset-0">

    <img
    src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?q=80&w=1800&auto=format&fit=crop"
    alt=""
    class="w-full h-full object-cover opacity-[0.05]">

    <div class="absolute inset-0 bg-black/90"></div>

</div>

<!-- GLOW -->

<div
class="absolute top-[-250px] left-[-120px] w-[600px] h-[600px] bg-[#D4AF37]/10 blur-[180px] rounded-full">
</div>

<div
class="absolute bottom-[-250px] right-[-120px] w-[600px] h-[600px] bg-[#D4AF37]/5 blur-[180px] rounded-full">
</div>

<!-- MAIN -->

<div
class="relative z-10 max-w-6xl mx-auto px-5 lg:px-8 w-full">

    <div class="grid lg:grid-cols-2 gap-12 items-center">

        <!-- LEFT -->

        <div class="hidden lg:block">

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
                text-[#F5D76E]/90
                font-medium">

                    Welcome Back

                </span>

            </div>

            <h1
            class="mt-8 font-['Cinzel']
            text-white
            text-5xl
            xl:text-[70px]
            leading-[0.95]
            font-bold
            tracking-[-3px]">

                Continue Your

                <span class="block text-[#D4AF37] mt-3">

                    Cricket Journey

                </span>

            </h1>

            <p
            class="mt-6 max-w-[600px]
            text-white/55
            font-['Outfit']
            text-[17px]
            leading-[34px]
            font-light">

                Login to access your player dashboard,
                trials and Future Star Premier League features.

            </p>

        </div>

        <!-- LOGIN FORM -->

        <div
        class="relative overflow-hidden rounded-[28px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        max-w-[400px]
        mx-auto
        p-5 sm:p-6">

            <!-- OVERLAY -->

            <div
            class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/10 via-transparent to-transparent">
            </div>

            <!-- CONTENT -->

            <div class="relative">

                <h2
                class="font-['Cinzel']
                text-white
                text-[28px]
                lg:text-[34px]
                font-bold">

                    Login Account

                </h2>

                <p
                class="mt-2 text-white/50
                font-['Outfit']
                text-[13px]
                leading-[24px]">

                    Enter your login details below.

                </p>

                <!-- FORM -->

                <form
                method="POST"
                class="mt-5 space-y-2.5">

                    <!-- EMAIL -->

                    <div>

                        <input
                        type="email"
                        name="email"
                        placeholder="Email Address"
                        required
                        class="w-full h-[44px]
                        rounded-xl
                        border border-white/10
                        bg-black/30
                        px-4
                        text-[13px]
                        text-white
                        outline-none
                        font-['Outfit']
                        focus:border-[#D4AF37]/40
                        transition
                        placeholder:text-white/30">

                    </div>

                    <!-- PASSWORD -->

                    <div>

                        <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                        class="w-full h-[44px]
                        rounded-xl
                        border border-white/10
                        bg-black/30
                        px-4
                        text-[13px]
                        text-white
                        outline-none
                        font-['Outfit']
                        focus:border-[#D4AF37]/40
                        transition
                        placeholder:text-white/30">

                    </div>

                    <!-- BUTTON -->

                    <button
                    type="submit"
                    name="login"
                    class="group relative overflow-hidden w-full h-[44px] rounded-full bg-[#D4AF37] shadow-[0_0_30px_rgba(212,175,55,0.18)] mt-2">

                        <div
                        class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000">
                        </div>

                        <div
                        class="relative flex items-center justify-center h-full">

                            <span
                            class="font-['Cinzel']
                            uppercase
                            tracking-[2px]
                            text-[9px]
                            font-bold
                            text-black">

                                Login Account

                            </span>

                        </div>

                    </button>

                </form>

                <!-- REGISTER -->

                <div class="mt-4 text-center">

                    <p
                    class="text-white/45
                    font-['Outfit']
                    text-[13px]">

                        Don't have an account?

                        <a
                        href="register?redirect=<?php echo urlencode($_GET['redirect'] ?? 'dashboard'); ?>"
                        class="text-[#D4AF37] hover:text-white transition">

                            Register

                        </a>

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
