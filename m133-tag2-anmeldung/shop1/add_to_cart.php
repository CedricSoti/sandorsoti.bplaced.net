<?php
session_start();

$name = $_POST['name'] ?? '';
$price = floatval($_POST['price']);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$_SESSION['cart'][] = [
    'name' => $name,
    'price' => $price
];

header("Location: warenkorb.php");
exit;