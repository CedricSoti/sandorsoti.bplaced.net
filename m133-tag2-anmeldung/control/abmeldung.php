
<?php
session_start(); // ganz am Anfang, vor jeglicher Ausgabe!

unset($_SESSION['benutzer']);
unset($_SESSION['password']);
session_destroy();

header('Location: ../anmeldung.html'); // oder eine andere Seite
exit;
?>