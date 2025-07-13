<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Additional Payment Info</title>
  <link rel="stylesheet" href="styles.css">
  <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            color: #14ff14
        }

        header {
            width: 100%;
            padding: 10px 0;
            top: 0;
            left: 0;
            text-align: center;
        }

        .container {
            background: rgb(0 0 0 / 80%);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 700px;
            max-width: 1000px;
            color: white;
            margin-top: 30px; /* To avoid overlap with the fixed header */
        }

        input, textarea, select {
            width: 95%;
            background: #141414;
            color: #fff;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .butt {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: rgb(7, 218, 7);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .butt:hover {
            background-color: rgb(8, 165, 8);
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: #14ff14;
            font-size: 14px;
        }

        footer {
            width: 100%;
            text-align: center;
            margin-top: 20px;
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
          <li><a href="/index.php">Home</a></li>
          <li><a href="/service.php">Services</a></li>
          <li><a href="/seller.php">Sell</a></li>
          <li><a href="/about.php">About</a></li>
          <li><a href="/contact.php">Contact</a></li>
        </ul>
      </nav>

      <form action="/index.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search products..." class="search-input">
        <button type="submit" class="search-btn">Search</button>
      </form>
    </div>
</header>

<div class="container">
    <h1>Additional Payment Info</h1>
    <p>We will contact you ASAP. Please fill out the form below.</p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $transactionHash = $_POST['transaction_hash'];
        $contactType = $_POST['contact_type'];
        $contactDetails = $_POST['contact_details'];
        $additionalInfo = $_POST['additional_info']; // Optional field

        // Validate Transaction Hash length
        if (strlen($transactionHash) < 15) {
            echo "<p class='error'>Error: Enter A Valid Transaction Hash</p>";
        } else {
            // Handle file upload
            if (isset($_FILES['payment_screenshot']) && $_FILES['payment_screenshot']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['payment_screenshot']['tmp_name'];
                $fileName = $_FILES['payment_screenshot']['name'];
                $uploadDir = 'uploads/';
                $destPath = $uploadDir . $fileName;

                // Move uploaded file to destination
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Save form data to a text file
                    $data = "Transaction Hash: $transactionHash\n" .
                            "Preferred Contact Method: $contactType\n" .
                            "Contact Details: $contactDetails\n" .
                            "Additional Info or Comment: $additionalInfo\n" .
                            "Payment Screenshot: $destPath\n\n";

                    $file = 'form_data.txt';
                    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
                        echo "<p class='success'>Form submitted successfully. We will contact you ASAP.</p>";
                    } else {
                        echo "<p class='error'>Error: Unable to save form data.</p>";
                    }
                } else {
                    echo "<p class='error'>Error: Failed to upload payment screenshot.</p>";
                }
            } else {
                echo "<p class='error'>Error: Payment screenshot is required.</p>";
            }
        }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <!-- Transaction Hash -->
        <label for="transaction_hash">Transaction Hash:</label>
        <input type="text" id="transaction_hash" name="transaction_hash" required minlength="15">
        <span id="hash_error" class="error"></span>

        <!-- Payment Screenshot -->
        <label for="payment_screenshot">Payment Screenshot:</label>
        <input type="file" id="payment_screenshot" name="payment_screenshot" accept="image/*" required>
        <span id="screenshot_error" class="error"></span>

        <!-- Contact Type Dropdown -->
        <label for="contact_type">Preferred Contact Method:</label>
        <select id="contact_type" name="contact_type" required>
            <option value="">Select an option</option>
            <option value="Email">Email</option>
            <option value="Telegram">Telegram</option>
            <option value="Signal">Signal</option>
            <option value="WhatsApp">WhatsApp</option>
        </select>

        <!-- Contact Details -->
        <label for="contact_details">Contact Details:</label>
        <input type="text" id="contact_details" name="contact_details" required>

        <!-- Additional Info or Comment -->
        <label for="additional_info">Additional Info or Comment (Optional):</label>
        <textarea id="additional_info" name="additional_info" rows="4"></textarea>

        <!-- Submit Button -->
        <button class="butt" type="submit">Submit</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 SHADOWS Sci-Fi MARKET. All rights reserved.</p>
</footer>

<script>
    function validateForm() {
        const transactionHash = document.getElementById('transaction_hash').value;
        const hashError = document.getElementById('hash_error');

        // Validate Transaction Hash length
        if (transactionHash.length < 15) {
            hashError.textContent = 'Enter A Valid Transaction Hash.';
            return false;
        } else {
            hashError.textContent = '';
        }

        return true;
    }
</script>
</body>
</html>