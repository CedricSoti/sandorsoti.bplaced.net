<?php
// App/auth/login.php

// Pfad zur user.json (Projekt-Root/data/user.json)
$dataDir  = realpath(__DIR__ . '/../../data');
if ($dataDir === false) {
    // Versuch das data-Verzeichnis anzulegen
    $dataDir = __DIR__ . '/../../data';
    mkdir($dataDir, 0755, true);
}
$dataFile = $dataDir . '/user.json';

// Lade existierende Nutzer
$users = [];
if (file_exists($dataFile) && is_readable($dataFile)) {
    $json  = file_get_contents($dataFile);
    $users = json_decode($json, true) ?: [];
}

$errors = [];

// Verarbeite Form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action   = $_POST['action'] ?? '';
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Bei Registrierung zusätzliche Felder
    if ($action === 'register') {
        $email   = trim($_POST['email'] ?? '');
        $address = trim($_POST['address'] ?? '');
    }

    // Basis-Validierung
    if ($username === '' || $password === '' || ($action === 'register' && ($email === '' || $address === ''))) {
        $errors[] = 'Bitte alle erforderlichen Felder ausfüllen.';
    } else {
        if ($action === 'register') {
            // Neuer User anlegen
            if (isset($users[$username])) {
                $errors[] = 'Benutzername bereits vergeben.';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $users[$username] = [
                    'password' => $hash,
                    'email'    => $email,
                    'address'  => $address
                ];
                if (file_put_contents($dataFile, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
                    $errors[] = 'Fehler beim Speichern der Nutzerdaten.';
                } else {
                    $_SESSION['user'] = $username;
                    header('Location: ' . $_SERVER['PHP_SELF'] . '?page=shop');
                    exit;
                }
            }
        } elseif ($action === 'login') {
            // Login check gegen JSON-Array
            if (!isset($users[$username]) || !password_verify($password, $users[$username]['password'])) {
                $errors[] = 'Ungültige Benutzername oder Passwort.';
            } else {
                $_SESSION['user'] = $username;
                header('Location: ' . $_SERVER['PHP_SELF'] . '?page=shop');
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Login / Registrierung</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container w3-padding-32" style="max-width:400px; margin:auto;">
  <h2 class="w3-center">Login / Registrierung</h2>

  <?php if (!empty($errors)): ?>
    <div class="w3-panel w3-red">
      <?php foreach ($errors as $e): ?>
        <p><?= htmlspecialchars($e) ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Benutzername</label>
    <input class="w3-input" type="text" name="username" required>

    <label>Passwort</label>
    <input class="w3-input" type="password" name="password" required>

    <div id="register-fields" class="w3-hide">
      <label>E-Mail</label>
      <input class="w3-input" type="email" name="email">
      <label>Adresse</label>
      <input class="w3-input" type="text" name="address">
    </div>

    <div class="w3-margin-top">
      <button type="button" id="login-btn" class="w3-button w3-blue">Login</button>
      <button type="button" id="register-btn" class="w3-button w3-gray">Registrieren</button>
      <input type="hidden" name="action" id="action-field" value="login">
      <button type="submit" id="submit-btn" class="w3-button w3-green w3-hide">Senden</button>
    </div>
  </form>

  <p class="w3-small w3-center"><a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?page=home">Zurück zum Home</a></p>
</div>

<script>
  const loginBtn = document.getElementById('login-btn');
  const registerBtn = document.getElementById('register-btn');
  const actionField = document.getElementById('action-field');
  const registerFields = document.getElementById('register-fields');
  const submitBtn = document.getElementById('submit-btn');

  loginBtn.onclick = () => {
    actionField.value = 'login';
    registerFields.classList.add('w3-hide');
    submitBtn.classList.remove('w3-hide');
  };
  registerBtn.onclick = () => {
    actionField.value = 'register';
    registerFields.classList.remove('w3-hide');
    submitBtn.classList.remove('w3-hide');
  };
</script>
</body>
</html>
