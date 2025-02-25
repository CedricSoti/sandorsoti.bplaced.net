<style> 
* { font-size: 2em; } 
</style>
<?php
$eingabefeld = "Nobody";
if (isset($_REQUEST["inpTextfeld"])) {
    $eingabefeld = $_REQUEST["inpTextfeld"];
}
?>
Hoi <strong><?= $eingabefeld ?></strong>, Du Penner, 
<br>bist Du immer noch in der TBZ?
