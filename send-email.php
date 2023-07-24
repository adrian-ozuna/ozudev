<?php

require __DIR__ . '/vendor/autoload.php';

$name = $_POST["name"];
$email = $_POST["email"];
$description = $_POST["description"];

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = getenv('SMTP_HOST');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = getenv('SMTP_PORT');

    $mail->Username = getenv('SMTP_USERNAME');
    $mail->Password = getenv('SMPT_PASSWORD');

    $mail->setFrom(getenv('SMTP_USERNAME'), $name);
    $mail->addAddress(getenv('SMTP_USERNAME'));

    $mail->Subject = "Solicitud de proyecto por parte de ${name}";
    $mail->Body = "Correo de parte de: $email, $name\n Descripcion: $description";

    if (!$mail->Send()) {
        echo 'Hubo un error del lado del servidor. Por favor contactanos a traves de nuestro instagram @ozudev';
        exit;
    } else {
        header("Location:contact-success.php");
    }
} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mail->ErrorInfo;
    include 'head.php';
    include 'header.php';
    echo '<p class="text-center">Hubo un error del lado del servidor. Por favor contactanos a traves de nuestro instagram @ozudev</p>';
    include 'footer.php';

}