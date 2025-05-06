<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Warenkorb</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container w3-padding-32">
  <h2 class="w3-center">Dein Warenkorb</h2>

  <div class="w3-container">
    <?php
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<p>Dein Warenkorb ist leer.</p>";
    } else {
        $total = 0;
        echo '<ul class="w3-ul w3-card">';
        foreach ($_SESSION['cart'] as $index => $item) {
            echo '<li>' . htmlspecialchars($item['name']) . ' – CHF ' . number_format($item['price'], 2) .
                 '<form method="post" action="remove_item.php" style="display:inline;">
                    <input type="hidden" name="index" value="' . $index . '">
                    <button class="w3-button w3-small w3-right w3-red">Entfernen</button>
                  </form>
                 </li>';
            $total += $item['price'];
        }
        echo '</ul>';
        echo "<p><strong>Total: CHF " . number_format($total, 2) . "</strong></p>";
    }
    ?>
  </div>

  <div class="w3-container w3-margin-top">
    <form method="post" action="clear_cart.php" style="display:inline;">
      <button class="w3-button w3-red">Warenkorb leeren</button>
    </form>
    <a href="../shop1/shop.php" class="w3-button w3-grey">Zurück zum Shop</a>
  </div>
</div>

</body>
</html>