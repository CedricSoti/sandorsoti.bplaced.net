<?php
// public/index.php
declare(strict_types=1);
session_start();

// 1) Logout abfangen
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Session komplett löschen
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=home');
    exit;
}

// Pfad zur cart.json
$cartFile = __DIR__ . '/data/cart.json';

// 2) Lade bzw. initialisiere alle persistierten Carts
if (file_exists($cartFile)) {
    $carts = json_decode(file_get_contents($cartFile), true) ?: [];
} else {
    $carts = [];
}

// Aktueller User
$user = $_SESSION['user'] ?? null;

// 3) Warenkorb-Operationen (Add, Clear, Buy)
if ($user !== null) {
    $userCart = $carts[$user] ?? [];

    if (isset($_GET['add'])) {
        $userCart[] = (int)$_GET['add'];
        $carts[$user] = $userCart;
        file_put_contents($cartFile, json_encode($carts, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart');
        exit;
    }

    if (isset($_GET['clear'])) {
        $carts[$user] = [];
        file_put_contents($cartFile, json_encode($carts, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart');
        exit;
    }

    if (isset($_GET['buy'])) {
        $carts[$user] = [];
        file_put_contents($cartFile, json_encode($carts, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart&bought=1');
        exit;
    }
} else {
    // Gäste-Logik über Session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_GET['add'])) {
        $_SESSION['cart'][] = (int)$_GET['add'];
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart');
        exit;
    }

    if (isset($_GET['clear'])) {
        $_SESSION['cart'] = [];
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart');
        exit;
    }

    if (isset($_GET['buy'])) {
        $_SESSION['cart'] = [];
        header('Location: ' . $_SERVER['SCRIPT_NAME'] . '?page=cart&bought=1');
        exit;
    }
}

// 4) Seite wählen
$page = $_GET['page'] ?? 'home';
if (!in_array($page, ['home','shop','cart','login'], true)) {
    $page = 'home';
}

// 5) Produkte laden
require_once __DIR__ . '/App/models/ProductModel.php';
$model    = new ProductModel();
$products = $model->getAllProducts();

// 6) Routing und View-Einbindung
switch ($page) {
    case 'shop':
        include __DIR__ . '/App/view/shop.php';
        break;

    case 'cart':
        // IDs aus JSON oder Session laden
        $ids = $user !== null
             ? ($carts[$user] ?? [])
             : ($_SESSION['cart'] ?? []);

        // Vollständige Produktdaten zusammensetzen
        $cartItems = [];
        foreach ($ids as $pid) {
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
