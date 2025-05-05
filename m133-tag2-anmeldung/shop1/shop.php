<?php session_start(); ?>
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
    <a href="warenkorb.php" class="w3-button w3-teal">🛍 Warenkorb ansehen</a>
    <a href="../templatehtml.html" class="w3-button w3-grey">Zurück zum Home</a>
  </div>

  <div class="w3-row-padding">
    <?php
    $products = [
      ["name" => "Design-Stuhl", "price" => 99, "image" => "w3images/house5.jpg"],
      ["name" => "Rattan-Lounge", "price" => 299, "image" => "w3images/sofa.jpg"],
      ["name" => "Stehlampe Bambus", "price" => 59, "image" => "w3images/lamp.jpg"],
      ["name" => "Holztisch Natur", "price" => 199, "image" => "w3images/table.jpg"],
      ["name" => "Sommerliche Wanddeko", "price" => 39, "image" => "w3images/deco1.jpg"],
      ["name" => "Hängematte", "price" => 49, "image" => "w3images/hammock.jpg"],
      ["name" => "Kissen Set (4 Stk.)", "price" => 35, "image" => "w3images/cushion.jpg"],
      ["name" => "Gartenlaterne", "price" => 19, "image" => "w3images/lantern.jpg"],
      ["name" => "Outdoor-Teppich", "price" => 89, "image" => "w3images/outdoorrug.jpg"],
      ["name" => "Blumentopf-Set", "price" => 24, "image" => "w3images/planter.jpg"],
      ["name" => "Sonnenschirm", "price" => 129, "image" => "w3images/parasoll.jpg"]
    ];

    foreach ($products as $product) {
      echo '
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card">
          <img src="' . $product['image'] . '" style="width:100%">
          <div class="w3-container">
            <h5>' . htmlspecialchars($product['name']) . '</h5>
            <p>CHF ' . number_format($product['price'], 2) . '.–</p>
            <form method="post" action="add_to_cart.php">
              <input type="hidden" name="name" value="' . htmlspecialchars($product['name']) . '">
              <input type="hidden" name="price" value="' . $product['price'] . '">
              <button class="w3-button w3-black" type="submit">In den Warenkorb</button>
            </form>
          </div>
        </div>
      </div>';
    }
    ?>
  </div>
</div>

</body>
</html>