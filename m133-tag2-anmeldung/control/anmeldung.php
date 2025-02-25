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
      

header("Location: http://localhost:8080/workspace/templatehtml.php");

}
else {
	header("http://localhost:8080/tryagain.php");
}


echo $html_Output;
?>




