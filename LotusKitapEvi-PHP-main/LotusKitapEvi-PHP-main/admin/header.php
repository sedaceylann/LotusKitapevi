<!doctype html>
<html lang="tr">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>PHP - PDO Projesi</title>
 <!-- Bootstrap CSS dosyası -->
 <link rel="stylesheet" href="/proje/content/css/bootstrap.min.css" />
 <link rel="stylesheet" href="/proje/content/css/style.css" />
</head>
<?php
 session_start();
 if ($_SESSION["loginkey"] == "") {
 // oturum açılmamışsa login.php sayfasına git
 header("Location: /proje/admin/login.php");
 }
?>

<body class="admin">
 <!-- Menü – Bootstrap Fixed Navbar -->
 <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" datatoggle="collapse" data-target="#navbar" aria-expanded="false" ariacontrols="navbar">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#">PHP - PDO Projesi</a>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
 <ul class="nav navbar-nav">
 <li class="active"><a href="/proje/admin/index.php">Anasayfa</a></li>
 <li><a href="/proje/admin/urun/liste.php">Ürünler</a></li>
 <li><a href="/proje/admin/kategori/liste.php">Kategoriler</a></li>
 </ul>
 <ul class="nav navbar-nav navbar-right">
 <li><a href="/proje/admin/login.php?cikis=1">Oturumu kapat</a></li>
 </ul>
 </div><!--/.nav-collapse -->
 </div>
 </nav>
 <!-- Menü sonu -->
 <!-- Menü - Fixed navbar -->
 <nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" datatoggle="collapse" data-target="#navbar" aria-expanded="false" ariacontrols="navbar">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#">PHP - PDO Projesi</a>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
 <ul class="nav navbar-nav">
 <!--- tarayıcının adres satırındaki url ifadesini okur
 ve buna göre ilgili menü seçeneğini aktifleştirir -->
 <?php $aktif_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
 <li <?php echo((strpos($aktif_link, 'index') !== false) ?
'class="active"' : ''); ?>><a href="/proje/admin/index.php">Anasayfa</a></li>
 <li <?php echo((strpos($aktif_link, 'urun/') !== false) ?
'class="active"' : ''); ?>><a href="/proje/admin/urun/liste.php">Ürünler</a></li>
 <li <?php echo((strpos($aktif_link, 'kategori/') !== false) ?
'class="active"' : ''); ?>><a
href="/proje/admin/kategori/liste.php">Kategoriler</a></li>
<li <?php echo((strpos($aktif_link, 'kullanici/') !== false) ? 'class="active"' :
''); ?>><a href="/proje/admin/kullanici/liste.php">Kullanıcılar</a></li>
 </ul>
 <ul class="nav navbar-nav navbar-right">
 <li><a href="/proje/admin/login.php?cikis=1">Oturumu kapat</a></li>
 </ul>
 </div><!--/.nav-collapse -->
 </div>
 </nav>
 <!-- Menü sonu -->
