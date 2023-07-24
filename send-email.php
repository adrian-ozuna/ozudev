<?php

//import the classes we'll be using and require the autoloader if it hasn't been already.
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;
use Postmark\Models\PostmarkException;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['description'];

$recaptcha = $_POST['g-recaptcha-response'];
$secret_key = '6LdQ_UknAAAAAMPbWoaCcbQF7QdgLoovTu6e4XPx';
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
    . $secret_key . '&response=' . $recaptcha;

$response = file_get_contents($url);
$response = json_decode($response);


try {
    if ($response->success == true) {
        $client = new PostmarkClient("47000e1c-4943-4fcc-8b33-c309c49e6a5e");
        $sendResult = $client->sendEmail(
            "desarrollo@ozudev.com",
            "desarrollo@ozudev.com",
            "Nueva solicitud de proyecto por parte de ${name}",
            "Nombre: ${name}\n Correo del solicitante: ${email}\n Descripcion: ${message}"
        );

        // Getting the MessageID from the response
        header("Location:contact-success.php");
    } else {
        echo '<script>alert("No pudimos verificar que no eres un robot. Recarga la pagina e ntenta otra vez.")</script>';
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