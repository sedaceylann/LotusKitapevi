<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Ürün Listesi</h1>
 </div>
 <?php
 // veritabanı bağlantı dosyasını çağır
 include '../../config/vtabani.php';

 // gelen kategori parametresini oku
 $id = isset($_GET['id']) ? $_GET['id'] : "";

 // kategoriye ait kayıtları seç
 $sorgu = "SELECT id, urunadi, aciklama, fiyat FROM urunler WHERE kategori_id = ?
ORDER BY id DESC";
 $stmt = $con->prepare($sorgu);
 // Id parametresini bağla
 $stmt->bindParam(1, $id);
 $stmt->execute();

 // geriye dönen kayıt sayısı
 $sayi = $stmt->rowCount();

 echo "<a href='liste.php' class='btn btn-danger m-b-1em'>Kategori listesi</a>";
 //kayıt varsa listele
 if($sayi>0){

 echo "<table class='table table-hover table-responsive table-bordered'>";
//tablo başlangıcı
 //tablo başlıkları
 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>Ürün adı</th>";
 echo "<th>Açıklama</th>";
 echo "<th>Fiyat</th>";
 echo "</tr>";

 // tablo verilerinin okunması
 while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
 // tablo alanlarını değişkene dönüştürür
 // $kayit['urunadi'] => $urunadi
 extract($kayit);

 // her kayıt için yeni bir tablo satırı oluştur
 echo "<tr>";
 echo "<td>{$id}</td>";
 echo "<td>{$urunadi}</td>";
 echo "<td>{$aciklama}</td>";
 echo "<td>{$fiyat} &#8378;</td>"; // &#8378; ==> TL işareti
 echo "</tr>";
 }

 echo "</table>"; // tablo sonu

 }
 // kayıt yoksa mesajla bildir
 else{
 echo "<div class='alert alert-danger'>Listelenecek kayıt bulunamadı.</div>";
 }
?>

</div> <!-- /container -->
<?php include "../footer.php"; ?>
