<?php
// Product Data (Includes your original products + more to reach 30)
$products = [

    // Global



    ["name" => "ETH Stone", "desc" => "Rare ETH Stone Found On PlanetX", "price" => "$4999.99", "image" => "products/images/eth.jpg", "link" => "products/product1.php"],





    ["name" => "BTH Stone", "desc" => "Rare ETH Stone Found On PlanetX", "price" => "$4999.99", "image" => "products/images/bth.jpg", "link" => "products/product2.php"],





    ["name" => "Cloudium Stone", "desc" => "Stone Made Of Cloud", "price" => "$4999.99", "image" => "products/images/cloudium.jpg", "link" => "products/product13.php"],



];

// Search Filtering
$searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : "";
$filteredProducts = empty($searchQuery)
    ? $products
    : array_filter($products, function ($product) use ($searchQuery) {
        return strpos(strtolower($product['name']), $searchQuery) !== false || 
               strpos(strtolower($product['desc']), $searchQuery) !== false;
    });

// Pagination
$productsPerPage = 15;
$totalProducts = count($filteredProducts);
$totalPages = ceil($totalProducts / $productsPerPage);
$current_page = isset($_GET['page']) ? max(1, min($_GET['page'], $totalPages)) : 1;
$startIndex = ($current_page - 1) * $productsPerPage;
$paginatedProducts = array_slice($filteredProducts, $startIndex, $productsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SHADOWS Sci-Fi MARKET</title>
  <link rel="stylesheet" href="styles.css">
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

      <form action="index.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search products..." class="search-input">
        <button type="submit" class="search-btn">Search</button>
      </form>
    </div>
  </header>

  <main>
    <div class="product-grid">
      <?php if (empty($paginatedProducts)): ?>
        <p>No products found.</p>
      <?php else: ?>
        <?php foreach ($paginatedProducts as $product): ?>
          <div class="card">
            <div class="corner-top-left"></div>
            <div class="corner-top-right"></div>
            <div class="corner-bottom-left"></div>
            <div class="corner-bottom-right"></div>
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
            <h3><?= htmlspecialchars($product['name']) ?></h3>
            <p><?= htmlspecialchars($product['desc']) ?></p>
            <span class="price"><?= htmlspecialchars($product['price']) ?></span>
            <a href="<?= htmlspecialchars($product['link']) ?>" class="buy-btn">Buy Now</a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- Pagination Controls -->
    <div class="pagination">
      <?php if ($current_page > 1): ?>
        <a href="?search=<?= urlencode($searchQuery) ?>&page=<?= $current_page - 1 ?>" class="prev">Previous</a>
      <?php endif; ?>

      <span>Page <?= $current_page ?> of <?= $totalPages ?></span>

      <?php if ($current_page < $totalPages): ?>
        <a href="?search=<?= urlencode($searchQuery) ?>&page=<?= $current_page + 1 ?>" class="next">Next</a>
      <?php endif; ?>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 SHADOWS Sci-Fi MARKET. All rights reserved.</p>
  </footer>
</body>
</html>
