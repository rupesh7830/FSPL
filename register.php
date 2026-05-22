
<?php

session_start();

/* IF USER ALREADY LOGGED IN */

if(isset($_SESSION['user_id'])){

    if(isset($_GET['redirect'])){

        header("Location: ".$_GET['redirect']);

    }else{

        header("Location: dashboard.php");
    }

    exit();
}

include 'admin/config/db_connect.php';

/* REDIRECT URL SAVE */

if(isset($_GET['redirect'])){

    $_SESSION['redirect_after_login'] = $_GET['redirect'];
}

if(isset($_POST['register'])){

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    /* CHECK PASSWORD */

    if($password != $confirm_password){

        echo "<script>alert('Passwords do not match');</script>";

    }else{

        /* CHECK EMAIL */

        $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");

        $check_stmt->bind_param("s", $email);

        $check_stmt->execute();

        $check_result = $check_stmt->get_result();

        if($check_result->num_rows > 0){

            echo "<script>alert('Email already exists');</script>";

        }else{

            /* HASH PASSWORD */

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            /* INSERT USER */

            $insert_stmt = $conn->prepare("
                INSERT INTO users
                (full_name, email, mobile, password)
                VALUES (?, ?, ?, ?)
            ");

            /* BIND VALUES */

            $insert_stmt->bind_param(
                "ssss",
                $full_name,
                $email,
                $mobile,
                $hashed_password
            );

            /* EXECUTE */

            if($insert_stmt->execute()){

                /* AUTO LOGIN */

                $_SESSION['user_id'] = $insert_stmt->insert_id;

                /* REDIRECT URL */

                $redirect_url = isset($_SESSION['redirect_after_login'])
                ? $_SESSION['redirect_after_login']
                : "dashboard.php";

                unset($_SESSION['redirect_after_login']);

                echo "
                <script>

                    alert('Registration Successful');

                    window.location.href='$redirect_url';

                </script>
                ";

            }else{

                echo "<script>alert('Something went wrong');</script>";

            }

            $insert_stmt->close();
        }

        $check_stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - FSPL</title>

    <!-- TAILWIND -->

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body class="bg-[#050505] overflow-x-hidden min-h-screen">

<?php include 'components/navbar.php'; ?>

<!-- =========================================
     REGISTER SECTION
========================================= -->

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

            <!-- LEFT CONTENT -->

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

                        Join Future Star League

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

                    Begin Your

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

                    Register now to access professional cricket trials,
                    player opportunities and elite Future Star Premier League events.

                </p>

            </div>

            <!-- REGISTER FORM -->

            <div
            class="relative overflow-hidden rounded-[28px]
            border border-white/10
            bg-white/[0.03]
            backdrop-blur-3xl
            max-w-[400px]
            mx-auto
            p-5 sm:p-6 lg:top-10">

                <!-- OVERLAY -->

                <div
                class="absolute inset-0 bg-gradient-to-b from-[#D4AF37]/10 via-transparent to-transparent">
                </div>

                <!-- CONTENT -->

                <div class="relative">

                    <!-- TITLE -->

                    <h2
                    class="font-['Cinzel']
                    text-white
                    text-[28px]
                    lg:text-[34px]
                    font-bold">

                        Create Account

                    </h2>

                    <p
                    class="mt-2 text-white/50
                    font-['Outfit']
                    text-[13px]
                    leading-[24px]">

                        Enter your details to join FSPL.

                    </p>

                    <!-- FORM -->

                    <form
                    method="POST"
                    class="mt-5 space-y-2.5">

                        <!-- FULL NAME -->

                        <div>

                            <input
                            type="text"
                            name="full_name"
                            placeholder="Full Name"
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

                        <!-- MOBILE -->

                        <div>

                            <input
                            type="text"
                            name="mobile"
                            placeholder="Mobile Number"
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

                        <!-- CONFIRM PASSWORD -->

                        <div>

                            <input
                            type="password"
                            name="confirm_password"
                            placeholder="Confirm Password"
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
                        name="register"
                        class="group relative overflow-hidden w-full h-[44px] rounded-full bg-[#D4AF37] shadow-[0_0_30px_rgba(212,175,55,0.18)] mt-2">

                            <!-- SHINE -->

                            <div
                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 -translate-x-full group-hover:translate-x-full transition duration-1000">
                            </div>

                            <!-- CONTENT -->

                            <div
                            class="relative flex items-center justify-center h-full">

                                <span
                                class="font-['Cinzel']
                                uppercase
                                tracking-[2px]
                                text-[9px]
                                font-bold
                                text-black">

                                    Create Account

                                </span>

                            </div>

                        </button>

                    </form>

                    <!-- LOGIN LINK -->

                    <div class="mt-4 text-center">

                        <p
                        class="text-white/45
                        font-['Outfit']
                        text-[13px]">

                            Already have an account?

                            <a
                                href="login.php?redirect=<?php echo urlencode($_GET['redirect'] ?? 'dashboard.php'); ?>"
                                class="text-[#D4AF37] hover:text-white transition">

                                Login

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