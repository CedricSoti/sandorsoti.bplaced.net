<?php
session_start();
if (isset($_SESSION['benutzer'])) {
    echo htmlspecialchars($_SESSION['benutzer']);
} else {
    echo '<a href="../m133-tag2-anmeldung/anmeldung.html" class="w3-bar-item w3-button">Login</a>';
}
?>