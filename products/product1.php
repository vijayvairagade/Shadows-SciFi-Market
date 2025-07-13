<?php
// Sample product details
$product = [
    "name" => "Etherium Stone",
    "By" => "By: Verified Seller™ ✔",
    "desc" => "Found On Planet X Nibiru.",
    "price" => "$4999.99",
    "images" => [
        "images/eth.jpg",
        "images/sample-data.png"

    ],
    "features" => [
        "✔ Very Rare",
        "✔ Can Create Diamond",
        "✔ Fresh",
        "✔ 100x More Valuable Than Gold",
        "✔ Purely Mined",
        "✔ No Bad Aliens Involved",
        "✔ Non Hazardos"
    ],
    "link" => "checkout.php?product=keylogger-pro"
];
?>

<!DOCTYPE html>
<html lang="en">
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
    <div>
        
    </div>
  </header>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - SHADOWS Sci-Fi MARKET</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Global Styles */
        main {
            padding: 20px;
        }

        /* Product Container */
        .product-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background: rgb(0 0 0 / 80%); /* Adjust the 0.8 for more or less transparency */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Image Gallery */
        .product-image {
            text-align: center;
        }

        .main-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        .main-image:hover {
            transform: scale(1.05);
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.2s;
            border: 2px solid transparent;
        }

        .thumbnail:hover {
            border: 2px solid #ff9900;
            transform: scale(1.1);
        }

        /* Product Info */
        .product-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-info h2 {
            font-size: 26px;
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 16px;
            color: #fff;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            font-size: 16px;
            padding: 5px 0;
            color: #fff;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #00ff00;
            margin-top: 10px;
        }

        .buy-btn {
            display: inline-block;
            margin-top: 20px;
            background:rgb(7, 155, 7);
            color: white;
            padding: 12px 20px;
            font-size: 18px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .buy-btn:hover {
            background:rgb(40, 250, 40);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-container {
                grid-template-columns: 1fr;
            }

            .thumbnail-container {
                flex-wrap: wrap;
            }

            .thumbnail {
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .product-info h2 {
                font-size: 22px;
            }

            .product-info p {
                font-size: 14px;
            }

            .feature-list li {
                font-size: 14px;
            }

            .price {
                font-size: 20px;
            }

            .buy-btn {
                font-size: 16px;
                padding: 10px 15px;
            }
        }

        /* Payment Popup Styles */
        .payment-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #000000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            color: #fff;
            text-align: center;
        }

        .payment-popup h2 {
            margin-bottom: 20px;
        }

        .payment-popup select {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 200px;
        }

        .payment-popup .qr-code {
            margin-bottom: 20px;
        }

        .payment-popup .address {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .payment-popup .address img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .payment-popup .address input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background: #333;
            color: #fff;
            width: 300px;
        }

        .payment-popup .countdown {
            font-size: 18px;
            color: #ff9900;
            margin-bottom: 20px;
        }

        .payment-popup .manual-payment {
            margin-top: 20px;
        }

        .payment-popup .manual-payment input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background: #333;
            color: #fff;
            width: 80%;
            margin-bottom: 10px;
        }

        .payment-popup .manual-payment input::placeholder {
            color: #aaa;
        }

        /* Button Row for Submit and Close Buttons */
        .payment-popup .button-row {
            display: flex;
            gap: 10px; /* Space between buttons */
            justify-content: center; /* Center buttons horizontally */
            margin-top: 10px; /* Space above buttons */
        }

        .payment-popup .button-row button {
            flex: 1; /* Equal width for both buttons */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .payment-popup .button-row button[onclick="submitManualPayment()"] {
            background:rgb(228, 150, 6); /* Submit button color */
            color: white;
        }

        .payment-popup .button-row button[onclick="submitManualPayment()"]:hover {
            background:rgb(252, 184, 58); /* Submit button hover color */
        }

        .payment-popup .button-row button[onclick="closePaymentPopup()"] {
            background: #666; /* Close button color */
            color: white;
        }

        .payment-popup .button-row button[onclick="closePaymentPopup()"]:hover {
            background: #555; /* Close button hover color */
        }

        /* Loading Overlay */
        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1001;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 24px;
        }
    </style>
    <script>
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;
        }

        function openPaymentPopup() {
            // Show loading overlay for 2 seconds
            const loadingOverlay = document.getElementById('loadingOverlay');
            loadingOverlay.style.display = 'flex';

            setTimeout(() => {
                loadingOverlay.style.display = 'none';
                document.getElementById('paymentPopup').style.display = 'block';
                startCountdown();
            }, 5000); // 2 seconds delay
        }

        function closePaymentPopup() {
            document.getElementById('paymentPopup').style.display = 'none';
    
            location.reload();
        }
        

        function startCountdown() {
            let timeLeft = 3600; // 1 hour in seconds
            const countdownElement = document.getElementById('countdown');

            const interval = setInterval(() => {
                const hours = Math.floor(timeLeft / 3600);
                const minutes = Math.floor((timeLeft % 3600) / 60);
                const seconds = timeLeft % 60;

                countdownElement.textContent = `${minutes}m ${seconds}s`;

                if (timeLeft <= 0) {
                    clearInterval(interval);
                    countdownElement.textContent = 'Time is up!';
                    // Optionally, you can close the popup or show an error message
                } else {
                    timeLeft--;
                }
            }, 1000);
        }

        function updateCryptoDetails() {
            const selectedCoin = document.getElementById('cryptoSelect').value;
            const qrCodeElement = document.getElementById('qrCode');
            const addressElement = document.getElementById('cryptoAddress');
            const iconElement = document.getElementById('cryptoIcon');

            // Example data for different cryptocurrencies
            const cryptoData = {
                BTC: { address: 'bc1qtqexke3pakql7th59fhha8ajsck32sfftf5cer', icon: 'btc.webp' },
                ETH: { address: '0xaCE11965d077F7472728aD4ea32Ce2890D7ae746', icon: 'eth.png' },
                USDT: { address: '0xaCE11965d077F7472728aD4ea32Ce2890D7ae746', icon: 'usdterc20.png' },
                USDTTRC: { address: 'TEW2b1LRkDKzH1UGEcQnZHWd2ZRGumzFxJ', icon: 'usdttrc.webp' },
                LITECOIN: { address: 'LRHEMgr8NBJw1cjbrFEUvYuc4RiESDSLe7', icon: 'litecoin.png' },
                TRON: { address: 'TEW2b1LRkDKzH1UGEcQnZHWd2ZRGumzFxJ', icon: 'tron.webp' },
                BNB: { address: '0xaCE11965d077F7472728aD4ea32Ce2890D7ae746', icon: 'bnb.png' },
                Doge: { address: 'D7oihtjfQXJ9afge4qvuSjeZzv6uKJE5cn', icon: 'doge.png' }
            };

            qrCodeElement.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${cryptoData[selectedCoin].address}`;
            addressElement.value = cryptoData[selectedCoin].address;
            iconElement.src = cryptoData[selectedCoin].icon;
        }

        function submitManualPayment() {
            
            const transactionHash = document.getElementById('transactionHash').value;
            const contactInfo = document.getElementById('contactInfo').value;

            if (!transactionHash) {
                alert('Please enter the Transaction Hash.');
                return;
            }

            // Simulate submission (you can replace this with an actual API call)
            alert(`Payment submitted!\nTransaction Hash: ${transactionHash}\nContact Info: ${contactInfo || 'Not provided'}`);
            closePaymentPopup();
            window.location.href = 'payment.php';
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('cryptoSelect').addEventListener('change', updateCryptoDetails);
            updateCryptoDetails(); // Initialize with default selected coin
        });
    </script>
</head>
<body>
    <header>
        <h2>Secure Checkout</h2>
    </header>

    <main>
        <div class="product-container">
            <!-- Product Image Gallery -->
            <div class="product-image">
                <img id="mainImage" src="<?= htmlspecialchars($product['images'][0]) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="main-image">
                
                <div class="thumbnail-container">
                    <?php foreach ($product['images'] as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" class="thumbnail" onclick="changeMainImage('<?= htmlspecialchars($image) ?>')" alt="Thumbnail">
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <h2><?= htmlspecialchars($product['name']) ?></h2>
                <span style="color: #00ff00;"><?= htmlspecialchars($product['By']) ?> </span>
                <p><?= htmlspecialchars($product['desc']) ?></p>
                
                <ul class="feature-list">
                    <?php foreach ($product['features'] as $feature): ?>
                        <li><?= htmlspecialchars($feature) ?></li>
                    <?php endforeach; ?>
                </ul>
                
                <span class="price"><?= htmlspecialchars($product['price']) ?></span>
                <br>
                <button onclick="openPaymentPopup()" class="buy-btn">Buy Now</button>
            </div>
        </div>
    </main>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        Loading...
    </div>

    <!-- Payment Popup -->
    <div id="paymentPopup" class="payment-popup">
        <h2>Pay with Crypto Securely</h2>
        <div>
        Pay the exact amount: $4999.99 (USD)
        </div>
        <br>
        <select id="cryptoSelect">
            <option value="BTC">Bitcoin (BTC)</option>
            <option value="ETH">Ethereum (ETH)</option>
            <option value="USDT">USDT (ERC-20)</option>
            <option value="USDTTRC">USDT (TRC-20)</option>
            <option value="LITECOIN">Litecoin (LTC)</option>
            <option value="TRON">Tron (TRX)</option>
            <option value="BNB">Binance Coin (BNB)</option>
            <option value="Doge">Dogecoin (Doge)</option>
        </select>

        <div class="qr-code">
            <img id="qrCode" src="" alt="QR Code">
        </div>

        <div class="address">
    <img id="cryptoIcon" src="" alt="Crypto Icon">
    <input type="text" id="cryptoAddress" readonly onclick="copyCryptoAddress()">
    </div>

    <script>
        function copyCryptoAddress() {
            // Select the input field
            const cryptoAddress = document.getElementById('cryptoAddress');
            cryptoAddress.select(); // Select the text inside the input
            cryptoAddress.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text to the clipboard
            document.execCommand('copy');

            // Optional: Show a confirmation message
            alert('Crypto address copied to clipboard: ' + cryptoAddress.value);
        }
    </script>

        <div class="countdown" id="countdown"> <strong></strong></div>

        <div class="manual-payment">
            <p>If the page does not redirect automatically after paying, enter the details manually:</p>
            <input type="text" id="transactionHash" placeholder="Enter Transaction Hash" required>
            <input type="text" id="contactInfo" placeholder="Email Address or Telegram ID (optional)">
            
            <!-- Button Row for Submit and Close Buttons -->
            <div class="button-row">
                <button onclick="submitManualPayment()">Submit</button>
                <button onclick="closePaymentPopup()">Close</button>
            </div>

        </div>
    </div>
    <footer>
        <p>&copy; 2025 SHADOWS Sci-Fi MARKET. All rights reserved.</p>
    </footer>
</body>
</html>