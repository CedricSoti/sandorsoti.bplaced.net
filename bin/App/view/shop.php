<?php
// App/view/shop.php
// Erwartet vom Front Controller: $products (array) und $_SERVER['PHP_SELF']
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

  <div class="w3-right w3-margin">
    <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=cart" class="w3-button w3-teal">
      🛍 Warenkorb ansehen
    </a>
    <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=login" class="w3-button w3-blue">
      🔒 Login
    </a>
    <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=home" class="w3-button w3-grey">
      Zurück zum Home
    </a>
  </div>

  <div class="w3-row-padding">
    <?php foreach ($products as $product): ?>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card">
          <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width:100%">
          <div class="w3-container">
            <h5><?= htmlspecialchars($product['name']) ?></h5>
            <p>CHF <?= number_format($product['price'], 2) ?>.–</p>
            <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=shop&add=<?= (int)$product['id'] ?>"
               class="w3-button w3-black">
              In den Warenkorb
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
