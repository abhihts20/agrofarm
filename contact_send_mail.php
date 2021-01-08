<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

$subject = 'Query Form : $name';
$mailContent = "<h3>Query Details: </h3>
<br>
<p><strong>Name:</strong> $name<br>
<strong>Email:</strong> $email<br>
<strong>Mobile Number:</strong> $mobile<br>
<strong>message:</strong> $message<br><p>";


$subjectUser = 'Thank You for contacting Agrofarm Development Limited';
$mailUser = "<p>Hi $name,<br>Thank You for showing your interest in our organisation. We wanted to let you know that
We received your message and will contact you soon.For any further queries please on the given number<p>";
email("", $subject, $mailContent);
email($email, $subjectUser, $mailUser);

function email($email, $subject, $mailContent)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.agrofarmdev.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'agrofarm@agrofarmdev.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'SMTP';
    $mail->Port = 25;

    $mail->setFrom('agrofarm@agrofarmdev.com', 'Agrofarm Development Limited');
    $mail->addReplyTo('', 'Agrofarm Development Limited');

    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $mailContent;

// Send email
    if (!$mail->send()) {
        return FALSE;
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        if ($email != "") {
            header("Location: http://Agrofarm/index.html");
        }
        return TRUE;
    }
}

?>
