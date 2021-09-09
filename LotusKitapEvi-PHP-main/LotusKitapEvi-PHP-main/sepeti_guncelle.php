<?php
 // oturum işlemlerini başlat
 session_start();
 // ürün id ve adet bilgilerini al
 $id = isset($_POST['id']) ? $_POST['id'] : "";
 $adet = isset($_POST['adet']) ? $_POST['adet'] : "";
 // ürünü sepetten sil
 unset($_SESSION['sepet'][$id]);
 if($adet <> "") {
 // ürünü güncel adet bilgisiyle kaydet
 $_SESSION['sepet'][$id]=array('adet'=>$adet);
 }
?>