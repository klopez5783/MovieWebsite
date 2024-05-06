<?php
include_once '../Configuration/DBconnect.php';
include '../Objects/Customers/CustomersFunctions.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

 // Access the global $conn variable
 global $conn;
 

if ( isset($_POST['forgotEmail']) ) {

    $userEmail = $_POST["forgotEmail"];

    $token = bin2hex(random_bytes(16));

    if ( emailExists($userEmail) ){
        $result = updateToken($userEmail,$token);
        if($result){


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer();

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
                $mail->Username   = 'lkristopher62@gmail.com';                     //SMTP username
                $mail->Password   = 'jqjuptdvjfjkywjj';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('lkristopher62@gmail.com', 'Mailer');
                $mail->addAddress($userEmail);     //Add a recipient
                //$mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('lkristopher289@gmail.com', 'Information');
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                // Set the subject
                $mail->Subject = 'Cinemagic: Password Reset Request';

                // Set the HTML body
                $mail->Body    = '
                    <html>
                    <head>
                    <title>Cinemagic: Password Reset Request</title>
                    </head>
                    <body>
                    <p>Dear Valued Cinemagic Customer,</p>
                    <p>We received a request to reset your password. To ensure the security of your account, please use the following token to reset your password:</p>
                    <p><strong>Token: ' . $token . '</strong></p>
                    <p>If you did not request this password reset, please disregard this message.</p>
                    <p>Thank you for choosing Cinemagic.</p>
                    <p>Best regards,<br>Cinemagic Team</p>
                    </body>
                    </html>
                ';

                // Set the plain text alternative body (for non-HTML mail clients)
                $mail->AltBody = 'Dear Valued Cinemagic Customer,
                    
                We received a request to reset your password. To ensure the security of your account, please use the following token to reset your password:

                Reset Code: ' . $token . '

                If you did not request this password reset, please disregard this message.

                Thank you for choosing Cinemagic.

                Best regards,
                Cinemagic Team';

                // Send the email
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Email Sent';
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }
    }{
        echo "There is no account associated with that email";
    }

    
}
else{
    echo "form not submited";
}





?>