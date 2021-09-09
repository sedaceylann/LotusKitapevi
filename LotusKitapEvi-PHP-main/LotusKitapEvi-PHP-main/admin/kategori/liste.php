<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Kategori Listesi</h1>
 </div>
  <?php
 // veritabanı bağlantı dosyasını çağır
 include '../../config/vtabani.php';

 $islem = isset($_GET['islem']) ? $_GET['islem'] : "";
 // eğer silme (sil.php) sayfasından yönlendirme yapıldıysa
 if($islem=='silindi'){
 echo "<div class='alert alert-success'>Kayıt silindi.</div>";
 }
 else if($islem=='silinemedi'){
 echo "<div class='alert alert-danger'>Kayıt silinemedi.</div>";
 }


 // bütün kayıtları seç
 $sorgu = "SELECT id, kategoriadi, aciklama FROM kategoriler ORDER BY id DESC";
 $stmt = $con->prepare($sorgu);
 $stmt->execute();

 // geriye dönen kayıt sayısı
 $sayi = $stmt->rowCount();

 // kayıt ekleme sayfasının linki
 echo "<a href='ekle.php' class='btn btn-primary m-b-1em'>Yeni Kategori</a>";

 //kayıt varsa listele
 if($sayi>0){

 echo "<table class='table table-hover table-responsive table-bordered'>";
//tablo başlangıcı
 //tablo başlıkları
 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>Kategori adı</th>";
 echo "<th>Açıklama</th>";
 echo "<th>İşlem</th>";
 echo "</tr>";

 // tablo verilerinin okunması
 while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)){
 // tablo alanlarını değişkene dönüştürür
 // $kayit['kategoriadi'] => $kategoriadi
 extract($kayit);

 // her kayıt için yeni bir tablo satırı oluştur
 echo "<tr>";
 echo "<td>{$id}</td>";
 echo "<td>{$kategoriadi}</td>";
 echo "<td>{$aciklama}</td>";
 echo "<td>";
 // kategori ürünleri sayfa bağlantısı
echo "<a href='urunler.php?id={$id}' class='btn btn-warning m-r-1em'>Ürünler</a>";
 // kayıt detay sayfa bağlantısı
 echo "<a href='detay.php?id={$id}' class='btn btn-info m-r1em'>Detay</a>";
 // kayıt güncelleme sayfa bağlantısı
 echo "<a href='duzelt.php?id={$id}' class='btn btn-primary m-r1em'>Düzelt</a>";
 // kayıt silme butonu
 echo "<a href='#' onclick='silme_onay({$id});' class='btn btndanger'>Sil</a>";
 echo "</td>";
 echo "</tr>";
 }

 echo "</table>"; // tablo sonu

 }
 // kayıt yoksa mesajla bildir
 else{
 echo "<div class='alert alert-danger'>Listelenecek kayıt
bulunamadı.</div>";
 }
 ?>
</div> <!-- /container -->
<?php include "../footer.php"; ?>
<script type='text/javascript'>
 // kayıt silme işlemini onayla
 function silme_onay( id ){

 var cevap = confirm('Kaydı silmek istiyor musunuz?');
 if (cevap){
 // kullanıcı evet derse,
 // id bilgisini sil.php sayfasına yönlendirir
 window.location = 'sil.php?id=' + id;
 }
 }
</script>
