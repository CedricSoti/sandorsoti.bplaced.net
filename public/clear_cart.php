<?php
// public/clear_cart.php
session_start();

// Warenkorb in der Session leeren
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Zur Warenkorb-Seite zurückleiten
header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart');
exit;
