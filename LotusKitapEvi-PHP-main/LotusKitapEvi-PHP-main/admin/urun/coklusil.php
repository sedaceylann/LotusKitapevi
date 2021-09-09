<?php
 include '../../config/vtabani.php';
 $ids = implode(',', $_POST['id']);
 $con->query("DELETE FROM urunler WHERE id IN ($ids)");
?>
