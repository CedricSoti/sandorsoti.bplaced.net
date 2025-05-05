<?php
session_start();
unset($_SESSION['cart']);
header("Location: warenkorb.php");
exit;