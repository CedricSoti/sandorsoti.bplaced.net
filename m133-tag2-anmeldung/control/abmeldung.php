<?php
// Keine Leerzeile oder Leerzeichen vor diesem PHP-Block!

session_start();
session_unset();
session_destroy();

// Weiterleitung nach dem Logout
header("Location: ../anmeldung.html");
exit;
?>