<?php
require_once('./vendor/autoload.php');
use Postmark\Models\PostmarkException;
use Postmark\PostmarkClient;
session_start();

$name = $email = $description = '';

if (isset($_POST['submit'])) {

    if (empty($_POST['name']) || strlen($_POST['name']) < 1) {
        $_SESSION['nameError'] = 'Por favor introduzca su nombre.';
    } else {
        $name = htmlspecialchars(trim($_POST['name']));
    }

    if (empty($_POST['email']) || strlen($_POST['email']) < 1) {
        $_SESSION['emailError'] = 'Por favor introduzca su email.';
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
    }

    if (empty($_POST['description']) || strlen($_POST['description']) < 1) {
        $_SESSION['descriptionError'] = 'Por favor introduzca una descripcion para su proyecto.';
    } else {
        $description = htmlspecialchars(trim($_POST['description']));
    }

    try {
        $data = array(
            'secret' => $_ENV['HCAPTCHA_SECRET_KEY'],
            'response' => $_POST['h-captcha-response']
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $responseData = json_decode($response);
        if (!($responseData->success)) {
            $_SESSION['captchaError'] = responseData;
        }
    } catch (Exception $e) {
        $_SESSION['captchaError'] = e;
    }

    $errors =
        isset($_SESSION['nameError']) ||
        isset($_SESSION['emailError']) ||
        isset($_SESSION['descriptionError']) ||
        isset($_SESSION['captchaError']) ||
        isset($_SESSION['postmarkError']);

    if ($errors == true) {
        header("location:index.php#contact-us-section");
    } else {
        try {
            $client = new PostmarkClient($_ENV['POSTMARK_KEY']);
            $sendResult = $client->sendEmail(
                "desarrollo@ozudev.com",
                "desarrollo@ozudev.com",
                "Nueva solicitud de proyecto por parte de ${name}",
                "Nombre: ${name}\n Correo del solicitante: ${email}\n Descripcion: ${description}"
            );
    
            header("Location:contact-success.php");
        } catch (PostmarkException $ex) {
            $_SESSION['postmarkError'] = 'Ocurrio un error y no se pudo enviar el correo. Escribenos a desarrollo@ozudev.com';
        }
    }
}