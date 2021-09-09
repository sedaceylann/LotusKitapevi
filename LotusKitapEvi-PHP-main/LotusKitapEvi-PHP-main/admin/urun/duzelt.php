<?php include "../header.php"; ?>

 <div class="container">
 <div class="page-header">
 	<h1>Ürün Güncelleme</h1>
 </div>
 <?php
 // gelen parametre değerini oku, bizim örneğimizde bu Id bilgisidir
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');

 // veritabanı bağlantı dosyasını dahil et
 include '../../config/vtabani.php';

 // aktif kayıt bilgilerini oku
 try {
 // seçme sorgusunu hazırla
 $sorgu = "SELECT id, urunadi, aciklama, fiyat, kategori_id FROM urunler WHERE id =
? LIMIT 0,1";

 $stmt = $con->prepare( $sorgu );

 // id parametresini bağla (? işaretini id değeri ile değiştir)
 $stmt->bindParam(1, $id);

 // sorguyu çalıştır
 $stmt->execute();

 // okunan kayıt bilgilerini bir değişkene kaydet
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);

 // formu dolduracak değişken bilgileri
 $urunadi = $kayit['urunadi'];
 $aciklama = $kayit['aciklama'];
 $fiyat = $kayit['fiyat'];
 $kategori_id = $kayit['kategori_id'];
 }
 // hatayı göster
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 ?>
  <?php
 // Kaydet butonu tıklanmışsa
 if($_POST){

 try{
 // güncelleme sorgusu
 // çok fazla parametre olduğundan karışmaması için
 // soru işaretleri yerine etiketler kullanacağız
$sorgu = "UPDATE urunler
 SET urunadi=:urunadi, aciklama=:aciklama, fiyat=:fiyat,
kategori_id=:kategori_id
 WHERE id = :id";

 // sorguyu hazırla
 $stmt = $con->prepare($sorgu);

 // gelen bilgileri değişkenlere kaydet
 $urunadi=htmlspecialchars(strip_tags($_POST['urunadi']));
 $aciklama=htmlspecialchars(strip_tags($_POST['aciklama']));
 $fiyat=htmlspecialchars(strip_tags($_POST['fiyat']));
$kategori_id=htmlspecialchars(strip_tags($_POST['kategori_id']));


 // parametreleri bağla
 $stmt->bindParam(':urunadi', $urunadi);
 $stmt->bindParam(':aciklama', $aciklama);
 $stmt->bindParam(':fiyat', $fiyat);
 $stmt->bindParam(':kategori_id', $kategori_id);
 $stmt->bindParam(':id', $id);

 // sorguyu çalıştır
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Kayıt güncellendi.</div>";
 }else{ echo "<div class='alert alert-danger'>Kayıt
güncellenemedi.</div>";
 }

 }
 // hata varsa göster
 catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
 }
 }
 ?>

 <!-- kayıt bilgilerini güncelleyebileceğimiz HTML formu -->
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] .
"?id={$id}");?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ürün adı</td>
 <td><input type='text' name='urunadi' value="<?php echo
htmlspecialchars($urunadi, ENT_QUOTES); ?>" class='form-control' /></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><textarea name='aciklama' class='form-control'><?php echo
htmlspecialchars($aciklama, ENT_QUOTES); ?></textarea></td>
 </tr>
 <tr>
 <td>Fiyat</td>
 <td><input type='text' name='fiyat' value="<?php echo
htmlspecialchars($fiyat, ENT_QUOTES); ?>" class='form-control' /></td>
 </tr>
 <tr>
 <td>Kategori</td>
 <td>
 <?php
 // kayıt listeleme sorgusu
 $sorgu='select id, kategoriadi from kategoriler';
 $stmt = $con->prepare($sorgu); // sorguyu hazırla
 $stmt->execute(); // sorguyu çalıştır
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); ; // tablo verilerini oku
 ?>
 <select name='kategori_id' class='form-control'>
 <?php foreach ($veri as $kayit) { ?>
 <option value="<?php echo $kayit["id"] ?>"
 	<?php if($kayit["id"]==$kategori_id) echo " selected" ?>>
 <?php echo $kayit["kategoriadi"] ?>
 </option>
 <?php } ?>
 </select>
 </td>
</tr>
 <tr>
 <td></td>
 <td>
 <button type="submit" class='btn btn-primary'><span class="glyphicon glyphiconok"></span> Kaydet</button>
 <a href='liste.php' class='btn btn-danger'><span class='glyphicon glyphicon
glyphicon-list'></span> Ürün listesi</a>
 </td>
 </tr>
 </table>
 </form>
 </div> <!-- container -->

 <?php include "../footer.php"; ?>
