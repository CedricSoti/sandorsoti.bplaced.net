<?php
session_start();
$index = $_POST['index'] ?? null;

if (isset($index) && isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Indizes neu ordnen
}

header("Location: warenkorb.php");
exit;