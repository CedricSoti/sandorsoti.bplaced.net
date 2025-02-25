<?php session_start();
$eingeloggt = FALSE;
$benutzerGruppe = "normaluser";
$benutzer = "";
if (isset($_REQUEST['benutzer'])) {
    $benutzer = $_REQUEST['benutzer'];
}
$passwort = "";
if (isset($_REQUEST['password'])) {
    $password = $_REQUEST['password'];
}

    
if (( strlen($benutzer) > 0 ) AND ( strlen($password) > 0 ))  {
    // Pruefe Inhalt von Eingabe
    
    $_SESSION['benutzer'] = $benutzer;
    $_SESSION['password'] = $password;
      
    $html_Output = "<html><head>";
	$html_Output .= "<title>Anmeldung</title>";
	$html_Output .= "<style>*{font-size: 28pt;}</style>";
	$html_Output .= "</head>";
	$html_Output .= "<body>";
	$html_Output .= "Hallo, <strong>".$_SESSION["benutzer"]."</strong> die Anmeldung war erfolgreich.<br><br>";
	$html_Output .= "Ich muss aber gestehen,<br>";
	$html_Output .= "das Passwort wurde gar noch nicht <br>";
	$html_Output .= "auf Richtigkeit gepr&uuml;ft.<br>";
	$html_Output .= "Aber zum zeigen wie es geht,<br>";
	$html_Output .= "taugt das schon mal <br><br>";
	$html_Output .= " - - und hier musst du dann die weitere Webseite - - <br>";
	$html_Output .= " - - hineinsetzen und zeigen, wie es weiter geht - - <br><br>";
	$html_Output .= "<a href=../control/abmeldung.php>abmelden</a>";
	$html_Output .= "</body></html>";
}
else {
	$html_Output = "<html><head><title>Anmeldung</title></head>";
	$html_Output .= "<body>";
	$html_Output .= "Hallo, die Anmeldung war nicht erfolgreich.";
	$html_Output .= "</body></html>";    	
}


echo $html_Output;
?>




