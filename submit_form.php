<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $transactionHash = $_POST['transaction_hash'];
    $contactType = $_POST['contact_type'];
    $contactDetails = $_POST['contact_details'];
    $additionalInfo = $_POST['additional_info']; // Optional field

    // Validate Transaction Hash length
    if (strlen($transactionHash) < 15) {
        die("Error: Enter A Valid Transaction Hash.");
    }

    // Handle file upload
    if (isset($_FILES['payment_screenshot']) && $_FILES['payment_screenshot']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['payment_screenshot']['tmp_name'];
        $fileName = $_FILES['payment_screenshot']['name'];
        $uploadDir = 'uploads/';
        $destPath = $uploadDir . $fileName;

        // Move uploaded file to destination
        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            die("Error: Failed to upload payment screenshot.");
        }
    } else {
        die("Error: Payment screenshot is required.");
    }

    // Save form data to a text file
    $data = "Transaction Hash: $transactionHash\n" .
            "Preferred Contact Method: $contactType\n" .
            "Contact Details: $contactDetails\n" .
            "Additional Info or Comment: $additionalInfo\n" . // Include additional info
            "Payment Screenshot: $destPath\n\n";

    $file = 'form_data.txt';
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "<p class='success'>Form submitted successfully. We will contact you ASAP.</p>";
    } else {
        echo "<p class='error'>Error: Unable to save form data.</p>";
    }
} else {
    echo "<p class='error'>Error: Invalid request method.</p>";
}
?>