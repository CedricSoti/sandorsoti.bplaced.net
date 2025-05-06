<?php
// App/view/warenkorb.php
// Erwartet: $cartItems (Array)
// Hinweis: Session und Model-Logik findet im Front Controller statt

// Gesamt berechnen
$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'];
}
$bought = isset($_GET['bought']);
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Dein Warenkorb</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="w3-container w3-padding-32">
    <h2 class="w3-center">Dein Warenkorb</h2>

    <?php if ($bought): ?>
      <div class="w3-panel w3-green">
        <p>Vielen Dank für deinen Einkauf! Dein Warenkorb wurde geleert.</p>
      </div>
    <?php endif; ?>

    <?php if (empty($cartItems)): ?>
      <p>Dein Warenkorb ist leer.</p>
      <a href="<?= $_SERVER['PHP_SELF'] ?>?page=shop" class="w3-button w3-blue">Weiter einkaufen</a>
    <?php else: ?>
      <table class="w3-table w3-striped w3-bordered">
        <thead>
          <tr><th>Produkt</th><th>Preis</th></tr>
        </thead>
        <tbody>
          <?php foreach ($cartItems as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td>CHF <?= number_format($item['price'], 2) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Gesamt</th>
            <th>CHF <?= number_format($total, 2) ?></th>
          </tr>
        </tfoot>
      </table>

      <div class="w3-margin-top">
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=shop" class="w3-button w3-grey">Weiter einkaufen</a>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=cart&clear=1" class="w3-button w3-red">Warenkorb leeren</a>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=cart&buy=1" class="w3-button w3-green">Jetzt kaufen</a>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
