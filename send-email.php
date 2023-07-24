<?php

//import the classes we'll be using and require the autoloader if it hasn't been already.
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;
use Postmark\Models\PostmarkException;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['description'];

$recaptcha = $_POST['g-recaptcha-response'];
$secret_key = $_ENV['RECAPTCHA_SECRET'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
    . $secret_key . '&response=' . $recaptcha;

$response = file_get_contents($url);
$response = json_decode($response);


try {
    if ($response->success == true) {
        $client = new PostmarkClient($_ENV['POSTMARK_KEY']);
        $sendResult = $client->sendEmail(
            "desarrollo@ozudev.com",
            "desarrollo@ozudev.com",
            "Nueva solicitud de proyecto por parte de ${name}",
            "Nombre: ${name}\n Correo del solicitante: ${email}\n Descripcion: ${message}"
        );

        // Getting the MessageID from the response
        header("Location:contact-success.php");
    } else {
        echo "<script>alert('No pudimos verificar que no eres un robot. Recarga la pagina e intenta otra vez.${secret_key}')</script>";
    }

} catch (PostmarkException $ex) {
    // If the client is able to communicate with the API in a timely fashion,
    // but the message data is invalid, or there's a server error,
    // a PostmarkException can be thrown.

    include 'head.php';
    include 'header.php';
    echo "Ocurrio un error en el servidor y no se pudo enviar el correo. Por favor contactanos en nuestro instagram a @ozudev";
    echo $ex->httpStatusCode;
    echo $ex->message;
    echo $ex->postmarkApiErrorCode;
    include 'footer.php';

} catch (Exception $generalException) {
    include 'head.php';
    include 'header.php';
    echo "Ocurrio un error en el servidor y no se pudo enviar el correo. Por favor contactanos en nuestro instagram a @ozudev";
    // A general exception is thrown if the API
    // was unreachable or times out.
    include 'footer.php';
}

?>