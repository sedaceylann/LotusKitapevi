<?php include "../header.php"; ?>

 <div class="container">
 <div class="page-header">
 <h1>Ürün Bilgisi</h1>
 </div>
 <?php
 // gelen Id parametresini al
 // isset() bir değer olup olmadığını kontrol eden PHP fonksiyonudur
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Kayıt bulunamadı.');

 // veritabanı bağlantı dosyasını çağır
 include '../../config/vtabani.php';
 // aktif kayıt bilgilerini oku
 try {
 // seçme sorgusunu hazırla
 $sorgu = "SELECT urunler.id, urunler.urunadi, urunler.aciklama, urunler.fiyat,
urunler.resim, kategoriler.kategoriadi FROM urunler LEFT JOIN kategoriler ON
urunler.kategori_id = kategoriler.id WHERE urunler.id = ? LIMIT 0,1";

 $stmt = $con->prepare( $sorgu );

 // Id parametresini bağla
 $stmt->bindParam(1, $id);

 // sorguyu çalıştır
 $stmt->execute();

 // gelen kaydı bir değişkende sakla
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);

 // tabloya yazılacak bilgileri değişkenlere doldur
 $urunadi = $kayit['urunadi'];
 $aciklama = $kayit['aciklama'];
 $fiyat = $kayit['fiyat'];
 $resim = htmlspecialchars($kayit['resim'], ENT_QUOTES);
 $kategoriadi = $kayit['kategoriadi'];


 }

 // hatayı göster
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 ?>

<!--kayıt bilgilerini görüntüleyen HTML tablosu -->
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ürün adı</td>
 <td><?php echo htmlspecialchars($urunadi, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><?php echo htmlspecialchars($aciklama, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Fiyat</td>
 <td><?php echo htmlspecialchars($fiyat, ENT_QUOTES); ?> &#8378;</td>
 </tr>
 <tr>
 <td>Kategori</td>
 <td><?php echo htmlspecialchars($kategoriadi, ENT_QUOTES); ?></td>
</tr>
 <tr>
 <td>Resim</td>
 <td><?php echo $resim ? "<img src='../../content/images/{$resim}'
style='width:300px;' />" : "Ürün görseli yok."; ?></td>
 </tr>
 <tr>
 <td></td>
 <td>
<a href='liste.php' class='btn btn-danger'><span class='glyphicon glyphicon glyphicon-list'></span> Ürün listesi</a>
 </td>
 </tr>
 </table>
 </div> <!-- container -->

 <?php include "../footer.php"; ?>
