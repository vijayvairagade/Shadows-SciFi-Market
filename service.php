<?php
// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceName = htmlspecialchars($_POST['service_name']);
    $description = htmlspecialchars($_POST['description']);
    $price = floatval($_POST['price']);
    $email = htmlspecialchars($_POST['email']);
    $telegram = htmlspecialchars($_POST['telegram']);
    $whatsapp = htmlspecialchars($_POST['whatsapp']);
    $image = "";
    $extraFields = [];

    // Validate price (must be greater than $300)
    if ($price <= 300) {
        echo "<p style='color:red;'>Error: The price must be greater than $300.</p>";
        exit();
    }

    // Handle extra fields
    if (!empty($_POST['extra_keys']) && !empty($_POST['extra_values'])) {
        foreach ($_POST['extra_keys'] as $index => $key) {
            $key = htmlspecialchars($key);
            $value = htmlspecialchars($_POST['extra_values'][$index]);
            if (!empty($key) && !empty($value)) {
                $extraFields[$key] = $value;
            }
        }
    }

    // Handle image upload
    if (isset($_FILES['service_image']) && $_FILES['service_image']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['service_image']['type'];

        if (in_array($fileType, $allowedTypes)) {
            $uploadDir = "uploads/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $image = $uploadDir . basename($_FILES['service_image']['name']);
            move_uploaded_file($_FILES['service_image']['tmp_name'], $image);
        } else {
            echo "<p style='color:red;'>Invalid file type! Only JPG, PNG, and GIF allowed.</p>";
            exit();
        }
    }

    // Save service details (Simulating database storage)
    $extraData = json_encode($extraFields);
    $data = "$serviceName | $description | $price | $image | $extraData | $email | $telegram | $whatsapp\n";
    file_put_contents("services.txt", $data, FILE_APPEND);

    echo "<p style='color: green;'>Service submitted successfully! An admin will review your request and contact you for approval.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Service Request</title>
    <link rel="stylesheet" href="styles.css">
    <style>
 form {
    background: rgba(0, 0, 0, 0.8);
    padding: 20px;
    border-radius: 10px;
    display: inline-block;
    text-align: left;
    margin-top: 20px;
    width: 60%;
    max-width: 600px;
}

input, textarea {
    display: block;
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    background: #222;
    color: #00ff00;
    font-size: 16px;
}

input[type="submit"], button {
    background-color: #00ff00;
    color: #000;
    cursor: pointer;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    font-weight: bold;
    font-size: 16px;
}

input[type="submit"]:hover, button:hover {
    background-color: #ff00ff;
}

.extra-fields {
    margin-top: 10px;
}

@media (max-width: 768px) {
    form {
        width: 90%;
        padding: 15px;
    }

    input, textarea {
        font-size: 14px;
        padding: 8px;
    }

    input[type="submit"], button {
        font-size: 14px;
        padding: 8px;
    }
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
    <h1>Submit/Request Service</h1>
    <p>Offer or Request services and get contacted by potential clients/providers.</p>
    <p><strong>Note:</strong> An admin will contact you to approve your service request.</p>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="service_name" placeholder="Service Name" required>
        <textarea name="description" placeholder="Service Description" required></textarea>
        <input type="number" name="price" placeholder="Price ($) - Minimum $300" required min="301">
        <input type="file" name="service_image" accept="image/*">

        <h3>Your Contact Details</h3>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telegram" placeholder="Telegram Username">
        <input type="text" name="whatsapp" placeholder="WhatsApp Number">

        <h3>Extra Details</h3>
        <div class="extra-fields">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['extra_keys'])) {
                foreach ($_POST['extra_keys'] as $index => $key) {
                    $value = $_POST['extra_values'][$index] ?? "";
                    echo '<div>
                            <input type="text" name="extra_keys[]" placeholder="Field Name" value="'.htmlspecialchars($key).'">
                            <input type="text" name="extra_values[]" placeholder="Value" value="'.htmlspecialchars($value).'">
                          </div>';
                }
            }
            ?>
        </div>

        <button type="button" onclick="addExtraField()">+ Add More Fields</button>
        <input type="submit" value="Submit">
    </form>
    <footer>
        <p>&copy; SHADOWS Sci-Fi MARKET 2025. All rights reserved.</p>
    </footer>

    <script>
        function addExtraField() {
            let extraFields = document.querySelector('.extra-fields');
            let div = document.createElement('div');
            div.innerHTML = `
                <input type="text" name="extra_keys[]" placeholder="Field Name">
                <input type="text" name="extra_values[]" placeholder="Value">
            `;
            extraFields.appendChild(div);
        }
    </script>
</body>
</html>
