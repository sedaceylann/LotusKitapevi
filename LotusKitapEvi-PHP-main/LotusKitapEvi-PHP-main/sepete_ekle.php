<?php
 // oturum işlemlerini başlat
 session_start();
 // ürün id ve adet bilgilerini al
 $id = isset($_POST['id']) ? $_POST['id'] : "";
 $adet = isset($_POST['adet']) ? $_POST['adet'] : 1;
 // ürün sepette varsa ekleme
 if(array_key_exists($id, $_SESSION['sepet'])) {
 echo "false";
 }
 // ürün sepette yoksa ekle
 else{
 $_SESSION['sepet'][$id]=array('adet'=>$adet);
 echo "true";
 }
?>