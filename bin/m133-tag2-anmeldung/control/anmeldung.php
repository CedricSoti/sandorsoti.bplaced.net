<?php session_start();

$eingeloggt = FALSE;
$benutzerGruppe = "normaluser";
$benutzer = "";
if (isset($_REQUEST['benutzer'])) {
    $benutzer = $_REQUEST['benutzer'];
}
$password = "";
if (isset($_REQUEST['password'])) {
    $password = $_REQUEST['password'];
}

    
if (( strlen($benutzer) > 0 ) AND ( strlen($password) > 0 ) AND ($password == "1234"))  {
    // Pruefe Inhalt von Eingabe
    
    $_SESSION['benutzer'] = $benutzer;
    $_SESSION['password'] = $password;
      

header("Location: ../templatehtml.html");

}
else {

header("Location: ../tryagain.html");

}


echo $html_Output;
?>




