<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail($to, $name, $trial_id){

    $mail = new PHPMailer(true);

    try{

        // SMTP

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'roopeshcomputer071@gmail.com';

        $mail->Password = 'uyka qitw fnoo begt';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;

        // SENDER

        $mail->setFrom(
            'roopeshcomputer071@gmail.com',
            'Future Star Premier League'
        );

        // RECEIVER

        $mail->addAddress($to, $name);

        // HTML MAIL

        $mail->isHTML(true);

        $mail->Subject =
        'FSPL Trial Registration & Payment Pending';

        $mail->Body = "

            <div style='
            background:#050505;
            padding:15px;
            font-family:Arial,sans-serif;'>

                <table
                width='100%'
                cellpadding='0'
                cellspacing='0'
                style='
                max-width:520px;
                margin:auto;
                background:#0b0b0b;
                border-radius:20px;
                overflow:hidden;
                border:1px solid #1f1f1f;'>

                    <!-- TOP -->

                    <tr>

                        <td
                        style='
                        background:linear-gradient(135deg,#D4AF37,#F5D76E);
                        padding:22px;
                        text-align:center;'>

                            <h1 style='
                            margin:0;
                            color:black;
                            font-size:28px;
                            font-weight:bold;'>

                                🏏 FSPL

                            </h1>

                        </td>

                    </tr>

                    <!-- BODY -->

                    <tr>

                        <td style='padding:30px 24px;'>

                            <h2 style='
                            margin-top:0;
                            color:#F5D76E;
                            font-size:24px;'>

                                Hello {$name}

                            </h2>

                            <p style='
                            color:#d2d2d2;
                            font-size:14px;
                            line-height:28px;'>

                                Your trial registration has been received successfully.

                            </p>

                            <!-- ALERT -->

                            <div style='
                            margin-top:25px;
                            background:#141414;
                            border:1px solid rgba(212,175,55,0.15);
                            border-radius:14px;
                            padding:18px;'>

                                <p style='
                                margin:0;
                                color:#ffffff;
                                font-size:14px;
                                line-height:28px;'>

                                    ⚠️ Payment is still pending.

                                    Complete payment to confirm your participation in FSPL trials.

                                </p>

                            </div>

                            <!-- BUTTON -->

                            <div style='text-align:center;margin-top:30px;'>

                                <a
                                href='http://localhost/FSPL/pay?trial_id={$trial_id}'
                                style='
                                display:inline-block;
                                background:#D4AF37;
                                color:black;
                                text-decoration:none;
                                padding:14px 26px;
                                border-radius:50px;
                                font-size:11px;
                                font-weight:bold;
                                letter-spacing:2px;
                                text-transform:uppercase;'>

                                    Complete Payment

                                </a>

                            </div>

                        </td>

                    </tr>

                </table>

            </div>

            ";

        $mail->send();

        return true;

    }catch(Exception $e){

        echo $mail->ErrorInfo;

        return false;

    }

}