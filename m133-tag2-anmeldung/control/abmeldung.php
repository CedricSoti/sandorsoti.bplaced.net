

<?php 
session_start();
session_unset();      // entfernt alle session variablen, inkl. warenkorb
session_destroy();    // beendet session komplett
header('Location: ../anmeldung.html');
exit;