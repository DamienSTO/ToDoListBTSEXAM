<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $to = "damienciobanu@email.com"; /
    $from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = "From: $from" . "\r\n" .
        "Reply-To: $from" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Envoyer l'e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo '<script>alert("E-mail envoyé avec succès !");</script>';
    } else {
        echo '<script>alert("Erreur lors de l\'envoi de l\'e-mail. Veuillez réessayer.");</script>';
    }
}
?>
