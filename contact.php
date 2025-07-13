<?php
// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<p style='color:red;'>Please fill in all fields.</p>";
    } else {
        // Prepare the data to save
        $contactData = "Name: $name\nEmail: $email\nMessage: $message\n---\n";

        // Save the data to a text file
        file_put_contents("Contact_by_someone.txt", $contactData, FILE_APPEND);

        // Confirmation message
        echo "<p style='color: green;'>Thank you for reaching out! We will get back to you soon.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    @media (max-width: 768px) {

        header h1 {
            font-size: 28px;
            /* Smaller font for the header */
        }

        .content {
            padding: 15px;
            width: 90%;
            /* More space on smaller screens */
        }

        .content h2 {
            font-size: 24px;
        }

        /* Adjust form input styles for smaller devices */
        .content input,
        .content textarea {
            font-size: 14px;
            padding: 8px;
        }

        .content input[type="submit"] {
            padding: 12px;
            font-size: 14px;
        }

        /* Footer adjustments for mobile */
        footer {
            padding: 10px;
        }

        footer p {
            font-size: 14px;
        }
    }




    .content {
        padding: 20px;
        max-width: 900px;
        margin: 0 auto;
    }

    .content h2 {
        color: #00ff00;
    }

    .content form {
    background: rgba(0, 0, 0, 0.8);
    padding: 20px;
    border-radius: 10px;
    width: 100%;
    max-width: 600px; /* Limits form width on larger screens */
    box-sizing: border-box;
}

    .content input,
    .content textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
        background: #444;
        color: #fff;
        font-size: 16px;
    }

    .content input[type="submit"] {
        background-color: #00ff00;
        color: #000;
        cursor: pointer;
        font-weight: bold;
        width: 36%;
    }

    .content input[type="submit"]:hover {
        background-color: #ff00ff;
    }

    footer {
        padding: 15px;
        text-align: center;
        margin-top: 30px;
    }

    footer p {
        margin: 0;
    }
    </style>
</head>

<body>

<header>
    <h1 class="glitch" data-text="SHADOWS Sci-Fi MARKET">SHADOWS Sci-Fi MARKET</h1>
    <p> <strong>"The SHADOWS Sci-Fi market thrives where desire meets secrecy."</strong> </p>

    <div class="header-right">
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="service.php">Services</a></li>
          <li><a href="seller.php">Sell</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          
        </ul>
      </nav>

    </div>
  </header>

    <div class="content">
        <h2>Get in Touch</h2>
        <p>If you have any questions or feedback, feel free to contact us using the form below. We will get back to you
            as soon as possible!</p>

        <!-- Contact Form -->
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>

    <footer>
        <p>&copy; SHADOWS Sci-Fi MARKET 2025. All rights reserved.</p>
    </footer>

</body>

</html>