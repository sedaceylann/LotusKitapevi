<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Kategori Bilgisi</h1>
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
 $sorgu = "SELECT id, kategoriadi, aciklama FROM kategoriler WHERE id = ?
LIMIT 0,1";
 $stmt = $con->prepare( $sorgu );

 // Id parametresini bağla
 $stmt->bindParam(1, $id);

 // sorguyu çalıştır
 $stmt->execute();

 // gelen kaydı bir değişkende sakla
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);

 // tabloya yazılacak bilgileri değişkenlere doldur
 $kategoriadi = $kayit['kategoriadi'];
 $aciklama = $kayit['aciklama'];
 }

 // hatayı göster
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 ?>
<!--kayıt bilgilerini görüntüleyen HTML tablosu -->
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Kategori adı</td>
 <td><?php echo htmlspecialchars($kategoriadi, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><?php echo htmlspecialchars($aciklama, ENT_QUOTES); ?></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <a href='liste.php' class='btn btn-danger'>Kategori listesi</a>
 </td>
 </tr>
 </table>
</div> <!-- container -->
<?php include "../footer.php"; ?>