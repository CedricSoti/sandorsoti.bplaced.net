<?php
// public/index.php
declare(strict_types=1);

// 1) Session starten
session_start();

// 2) „Buy“, „Clear“ und „Add“ abfangen
if (isset($_GET['buy']) && $_GET['buy'] === '1') {
    $_SESSION['cart'] = [];
    header('Location: ' . $_SERVER['PHP_SELF'] . '?page=cart&bought=1');
    exit;
}

if (isset($_GET['clear']) && $_GET['clear'] === '1') {
    $_SESSION['cart'] = [];
    header('Location: ' . $_SERVER['PHP_SELF'] . '?page=cart');
    exit;
}

if (isset($_GET['add'])) {
    $_SESSION['cart'][] = (int)$_GET['add'];
    header('Location: ' . $_SERVER['PHP_SELF'] . '?page=cart');
    exit;
}

// 3) Seite bestimmen
$page = $_GET['page'] ?? 'home';
if (!in_array($page, ['home','shop','cart','login'], true)) {
    $page = 'home';
}

// 4) Model laden
require_once __DIR__ . '/App/models/ProductModel.php';
$model    = new ProductModel();
$products = $model->getAllProducts();

// 5) Route auf View
switch ($page) {
    case 'shop':
        include __DIR__ . '/App/view/shop.php';
        break;

    case 'cart':
        // Hier setzen wir $cartItems für die View
        $cartItems = [];
        foreach ($_SESSION['cart'] ?? [] as $pid) {
            if ($item = $model->getProductById((int)$pid)) {
                $cartItems[] = $item;
            }
        }
        include __DIR__ . '/App/view/warenkorb.php';
        break;

    case 'login':
        include __DIR__ . '/App/auth/login.php';
        break;

    case 'home':
    default:
        include __DIR__ . '/App/view/home.php';
        break;
}
