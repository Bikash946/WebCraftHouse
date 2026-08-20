<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO enquiries
            (name, email, phone, subject, message)
            VALUES
            ('$name', '$email', '$phone', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Thank you! Your message has been sent successfully.');
                window.location.href='contact.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>