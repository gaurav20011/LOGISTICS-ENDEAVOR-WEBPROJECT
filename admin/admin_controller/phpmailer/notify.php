<?php


// 🟡 config files
include '../../../config.php';

$admin = new Admin();


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



//-------------🟡getting id 
$id =$_GET['doctor_id'];

//🟡getting query
$query=$admin->ret("SELECT * FROM `doctor` where `doctor_id`='$id' ");
$row=$query->fetch(PDO::FETCH_ASSOC);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; //🟡 set as gmail.com
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'enter_sender_gmail';                     //SMTP username
    $mail->Password   = 'enter_gmail_password_here';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients //from - 🔴you want to add your (sender) email id 
    $mail->setFrom('enter_sender_email', 'enter_sender_name');


    //🟡 sending to
    $mail->addAddress($row['email'], $row['doctor_name']);     //Add a recipient
    // $mail->addAddress('ellen@example.com'); 

    //🔴from - you want to add your (sender) email id           
    $mail->addReplyTo('enter_sender_email', 'enter_sender_name');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //🟡 message
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account approved';
    $mail->Body    = 'Congratulations '.$row['doctor_name'].' ,Your account is approved</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';


    //🟡 redirect 
    echo "<script>alert('approved'); window.location.href='../../doctor_manage.php';</script>";


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}