<?php
include_once '../Configuration/DBconnect.php';

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userEmail = $_POST["ForgotEmail"];

    $token = bin2hex(random_bytes(16));

   // Construct the password recovery link with the token as a query string parameter
    $passwordRecoveryLink = "https://yourwebsite.com/password_recovery.php?token=$token";

    //php mailer code here   


    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
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
    $mail->Subject = 'Sending from php file!!';
    $mail->Body    = 'Body for email from php file ' . $token . ' <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
    echo "form not submited";
}





?>