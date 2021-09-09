<?php include "../header.php"; ?>

 <div class="container">
 <div class="page-header">
 <h1>Kategori Güncelleme</h1>
 </div>
 <?php
 // gelen parametre değerini oku, bizim örneğimizde bu Id bilgisidir
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');

 // veritabanı bağlantı dosyasını dahil et
 include '../../config/vtabani.php';

 // aktif kayıt bilgilerini oku
 try {
 // seçme sorgusunu hazırla
 $sorgu = "SELECT id, kategoriadi, aciklama FROM kategoriler WHERE id = ?
LIMIT 0,1";
 $stmt = $con->prepare( $sorgu );

 // id parametresini bağla (? işaretini id değeri ile değiştir)
 $stmt->bindParam(1, $id);

 // sorguyu çalıştır
 $stmt->execute();

 // okunan kayıt bilgilerini bir değişkene kaydet
 $kayit = $stmt->fetch(PDO::FETCH_ASSOC);

 // formu dolduracak değişken bilgileri
 $kategoriadi = $kayit['kategoriadi'];
 $aciklama = $kayit['aciklama'];
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
 $sorgu = "UPDATE kategoriler SET kategoriadi=:kategoriadi,
aciklama=:aciklama WHERE id = :id";

 // sorguyu hazırla
 $stmt = $con->prepare($sorgu);

 // gelen bilgileri değişkenlere kaydet
 $kategoriadi=htmlspecialchars(strip_tags($_POST['kategoriadi']));
 $aciklama=htmlspecialchars(strip_tags($_POST['aciklama']));

 // parametreleri bağla
 $stmt->bindParam(':kategoriadi', $kategoriadi);
 $stmt->bindParam(':aciklama', $aciklama);
 $stmt->bindParam(':id', $id);

 // sorguyu çalıştır
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Kayıt güncellendi.</div>";
 }else{
 echo "<div class='alert alert-danger'>Kayıt
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
 <td>Kategori adı</td>
 <td><input type='text' name='kategoriadi' value="<?php echo
htmlspecialchars($kategoriadi, ENT_QUOTES); ?>" class='form-control' /></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><textarea name='aciklama' class='form-control'><?php echo
htmlspecialchars($aciklama, ENT_QUOTES); ?></textarea></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type='submit' value='Kaydet' class='btn btn-primary' />
 <a href='liste.php' class='btn btn-danger'>Kategori
listesi</a>
 </td>
 </tr>
 </table>
 </form>
 </div> <!-- container -->

 <?php include "../footer.php"; ?>
