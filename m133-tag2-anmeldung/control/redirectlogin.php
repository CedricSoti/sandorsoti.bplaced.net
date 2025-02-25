<?php 
  session_start();
  unset($_SESSION['benutzer']);
  unset($_SESSION['password']);
  header('Location: ../anmeldung.html'); // <--- das hier ist dann die Weierleitung zur gewuenschten Seite
?>