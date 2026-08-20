
<?php

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $service = trim($_POST["service"]);
    $budget = trim($_POST["budget"]);
    $message = trim($_POST["message"]);


    if (empty($name) || empty($email) || empty($message)) {

        header("Location: index.php?error=1#contact");
        exit();

    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        header("Location: index.php?error=1#contact");
        exit();

    }


    // SAVE DATA INTO DATABASE

    $stmt = $conn->prepare(
        "INSERT INTO enquiries
        (name, email, phone, service, budget, message)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssssss",
        $name,
        $email,
        $phone,
        $service,
        $budget,
        $message
    );


    if ($stmt->execute()) {


        // EMAIL NOTIFICATION

        $to = "panigrahi.bikash01@gmail.com";

        $subject = "New Website Project Enquiry";

        $emailMessage = "
        <html>
        <head>
            <title>New Customer Enquiry</title>
        </head>

        <body>

            <h2>New Website Project Request</h2>

            <p><strong>Name:</strong> $name</p>

            <p><strong>Email:</strong> $email</p>

            <p><strong>Phone:</strong> $phone</p>

            <p><strong>Service:</strong> $service</p>

            <p><strong>Budget:</strong> $budget</p>

            <p><strong>Project Requirements:</strong></p>

            <p>$message</p>

        </body>

        </html>
        ";


        $headers = "MIME-Version: 1.0" . "\r\n";

        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= "From: Website Enquiry <noreply@yourwebsite.com>" . "\r\n";

        $headers .= "Reply-To: $email" . "\r\n";


        // Attempt to send email
        @mail($to, $subject, $emailMessage, $headers);


        header("Location: index.php?success=1#contact");
        exit();

    } else {

        header("Location: index.php?error=1#contact");
        exit();

    }

}

$conn->close();

?>
