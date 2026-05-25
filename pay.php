<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FSPL Secure Payment</title>

<!-- GOOGLE FONT -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600;700;800&display=swap"
rel="stylesheet">

<style>

:root{

    --gold:#D4AF37;
    --bg:#050505;
}

/* RESET */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* BODY */

body{

    background:var(--bg);

    min-height:100vh;

    color:#fff;

    overflow-x:hidden;

    position:relative;
}

/* GLOW EFFECT */

.blur{

    position:fixed;

    border-radius:999px;

    filter:blur(140px);

    z-index:-1;
}

.blur1{

    width:320px;
    height:320px;

    background:rgba(212,175,55,0.12);

    top:-100px;
    left:-100px;
}

.blur2{

    width:280px;
    height:280px;

    background:rgba(212,175,55,0.08);

    right:-100px;
    bottom:-100px;
}

/* WRAPPER */

.wrapper{

    width:100%;

    max-width:1080px;

    margin:auto;

    padding:10px 20px 80px;
}

/* CARD */

.card{

    width:100%;

    background:rgba(255,255,255,0.03);

    backdrop-filter:blur(30px);

    border-radius:30px;

    padding:30px;

    border:1px solid rgba(255,255,255,0.08);

    box-shadow:
    0 20px 60px rgba(0,0,0,0.35);
}

/* HEADER */

.header{

    text-align:center;
}

.logo{

    width:75px;
    height:75px;

    margin:auto;

    border-radius:22px;

    background:rgba(212,175,55,0.08);

    border:1px solid rgba(212,175,55,0.18);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:30px;
}

.brand{

    margin-top:18px;

    font-size:14px;

    letter-spacing:3px;

    color:var(--gold);

    text-transform:uppercase;
}

.header h1{

    margin-top:18px;

    font-size:48px;

    line-height:1.1;

    font-family:'Cinzel',serif;
}

.header p{

    margin-top:12px;

    color:rgba(255,255,255,0.55);

    font-size:15px;
}

/* BADGE */

.badge{

    margin-top:20px;

    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:10px 18px;

    border-radius:999px;

    background:rgba(34,197,94,0.08);

    border:1px solid rgba(34,197,94,0.15);

    color:#4ade80;

    font-size:13px;
}

/* GRID */

.grid{

    display:grid;

    grid-template-columns:1fr;

    gap:40px;

    margin-top:40px;
}

@media(min-width:992px){

    .grid{

        grid-template-columns:0.9fr 0.7fr;

        align-items:center;
    }
}

/* PRICING */

.pricing{

    display:grid;

    gap:16px;
}

.price-card{

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:22px;

    padding:20px;

    transition:0.4s;
}

.price-card:hover{

    transform:translateY(-5px);

    border-color:rgba(212,175,55,0.35);
}

.price-card h3{

    font-size:15px;

    color:#fff;
}

.price{

    margin-top:10px;

    font-size:30px;

    color:var(--gold);

    font-weight:700;

    font-family:'Cinzel',serif;
}

/* STEPS */

.steps{

    margin-top:24px;

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:22px;

    padding:22px;
}

.steps h3{

    margin-bottom:16px;

    font-size:18px;
}

.steps ul{

    list-style:none;
}

.steps li{

    margin-bottom:12px;

    color:rgba(255,255,255,0.55);

    font-size:14px;

    display:flex;
    align-items:center;
    gap:10px;
}

/* QR */

.qr{

width:100%;

display:flex;

justify-content:center;

align-items:center;
}

.qr-box{

    width:100%;

    max-width:320px;

    margin:auto;

    padding:24px;

    text-align:center;

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(255,255,255,0.08);

    border-radius:28px;

    backdrop-filter:blur(25px);

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;
}
.qr-box h2{

    font-size:30px;

    font-family:'Cinzel',serif;
}

.qr img{

width:100%;

max-width:190px;

display:block;

margin:22px auto 0;
}

/* AMOUNT */

.amount{

    margin-top:25px;
}

.amount p{

    color:rgba(255,255,255,0.45);

    font-size:13px;
}

.amount h3{

    margin-top:10px;

    font-size:42px;

    color:var(--gold);

    font-family:'Cinzel',serif;
}

/* BUTTONS */

.buttons{

    margin-top:35px;

    display:flex;

    flex-direction:column;

    gap:14px;
}

.btn{

    height:56px;

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    font-size:14px;

    font-weight:600;

    transition:0.4s;
}

.whatsapp{

    background:var(--gold);

    color:#000;
}

.whatsapp:hover{

    transform:translateY(-3px);
}

.home{

    background:rgba(255,255,255,0.04);

    border:1px solid rgba(255,255,255,0.08);

    color:#fff;
}

.home:hover{

    background:rgba(255,255,255,0.08);
}

/* NOTE */

.note{

    margin-top:20px;

    text-align:center;

    font-size:13px;

    color:rgba(255,255,255,0.4);

    line-height:26px;
}

/* MOBILE */

@media(max-width:768px){

    .wrapper{

        padding:10px 16px 90px;
    }

    .card{

        padding:22px;

        border-radius:24px;
    }

    .header h1{

        font-size:34px;
    }

    .price{

        font-size:24px;
    }

    .amount h3{

        font-size:34px;
    }
    
}
@media(max-width:768px){

    .qr{

        justify-content:center;
    }

    .qr-box{

width:100%;

max-width:260px;

padding:20px;

margin:auto;
}

    .qr img{

        max-width:180px;

        margin-inline:auto;
    }
}

/* MOBILE STICKY */

.sticky-btn{

    display:none;
}

@media(max-width:768px){

    .sticky-btn{

        position:fixed;

        left:0;
        right:0;
        bottom:0;

        height:68px;

        background:#050505;

        border-top:1px solid rgba(255,255,255,0.08);

        display:flex;
        align-items:center;
        justify-content:center;

        padding:10px;

        z-index:999;
    }

    .sticky-btn a{

        width:100%;

        height:50px;

        border-radius:16px;

        background:var(--gold);

        color:#000;

        display:flex;
        align-items:center;
        justify-content:center;

        text-decoration:none;

        font-size:13px;

        font-weight:700;
    }
}

</style>

</head>

<body>

<!-- NAVBAR -->

<?php include 'components/navbar.php'; ?>

<div style="height:90px;"></div>

<!-- GLOW -->

<div class="blur blur1"></div>
<div class="blur blur2"></div>

<!-- MAIN -->

<div class="wrapper">

<div class="card">

    <!-- HEADER -->

    <div class="header">

        <div class="logo">
            🏏
        </div>

        <div class="brand">
            Future Star Premier League
        </div>

        <h1>

            Complete
            <span style="color:#D4AF37;">
                Your Payment
            </span>

        </h1>

        <p>

            Secure your registration slot by completing payment verification.

        </p>

        <div class="badge">

            ✔ Secure • Verified

        </div>

    </div>

    <!-- GRID -->

    <div class="grid">

        <!-- LEFT -->

        <div>

            <!-- PRICING -->

            <div class="pricing">

                <div class="price-card">

                    <h3>
                        Batsman / Bowler
                    </h3>

                    <div class="price">
                        ₹799
                    </div>

                </div>

                <div class="price-card">

                    <h3>
                        All-Rounder / Wicket Keeper
                    </h3>

                    <div class="price">
                        ₹999
                    </div>

                </div>

            </div>

            <!-- STEPS -->

            <div class="steps">

                <h3>
                    📌 Payment Steps
                </h3>

                <ul>

                    <li>
                        ✔ Scan QR using any UPI app
                    </li>

                    <li>
                        ✔ Complete payment successfully
                    </li>

                    <li>
                        ✔ Take screenshot after payment
                    </li>

                    <li>
                        ✔ Send screenshot on WhatsApp
                    </li>

                </ul>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="qr">

            <div class="qr-box">

                <h2>

                    Scan & Pay

                </h2>

                <img
                src="assets/images/qr.jpeg"
                alt="QR Code">

                <div class="amount">

                    <p>
                        Registration Starts From
                    </p>

                    <h3>
                        ₹799
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- BUTTONS -->

    <div class="buttons">

        <a
        href="https://wa.link/ts658p?text=I%20have%20completed%20the%20FSPL%20payment.%20Please%20verify%20my%20registration."
        target="_blank"
        class="btn whatsapp">

            📲 Send Screenshot on WhatsApp

        </a>

        <a
        href="dashboard"
        class="btn home">

            ⬅ Back To Home

        </a>

    </div>

    <!-- NOTE -->

    <div class="note">

        🔒 Registration will be confirmed only after payment verification.

    </div>

</div>

</div>

<!-- MOBILE STICKY BUTTON -->

<div class="sticky-btn">

    <a
    href="https://wa.link/ts658p?text=I%20have%20completed%20the%20FSPL%20payment.%20Please%20verify%20my%20registration."
    target="_blank">

        📲 Send Screenshot

    </a>

</div>

<!-- FOOTER -->

<?php include 'components/footer.php'; ?>

</body>
</html>