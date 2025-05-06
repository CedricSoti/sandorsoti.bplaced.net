<?php
// App/view/shop.php
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Summer House Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container w3-padding-32">
  <h2 class="w3-center">Willkommen im Summer House Shop</h2>

  <div class="w3-right w3-margin-bottom">
    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?page=cart" class="w3-button w3-teal">
      🛍 Warenkorb ansehen
    </a>
    <?php if ($user): ?>
      <span class="w3-button w3-light-blue">Hallo, <?php echo htmlspecialchars($user); ?></span>
      <a href="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>?action=logout" class="w3-button w3-red">Logout</a>
    <?php else: ?>
      <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?page=login" class="w3-button w3-blue">🔒 Login</a>
    <?php endif; ?>
    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?page=home" class="w3-button w3-grey">Zurück zum Home</a>
  </div>

  <!-- Produktliste -->
  <div class="w3-row-padding">
    <?php foreach ($products as $product): ?>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card w3-hover-shadow">
          <img src="/public/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width:100%; height:200px; object-fit:cover;">
          <div class="w3-container">
            <h5 class="w3-margin-top"><?php echo htmlspecialchars($product['name']); ?></h5>
            <p>CHF <?php echo number_format($product['price'], 2); ?>.–</p>
            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?page=shop&amp;add=<?php echo (int)$product['id']; ?>" class="w3-button w3-black w3-block">In den Warenkorb</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>