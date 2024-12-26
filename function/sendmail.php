


<?php
//LEZEM NA3MEL CREATE LA DATABASE LAL MAIL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "info@rhu.edu.lb";
    $subject = "Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    if (mail($to, $subject, $body)) {
        echo "<p>Thank you for contacting us. We will get back to you soon.</p>";
    } else {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
}
?>