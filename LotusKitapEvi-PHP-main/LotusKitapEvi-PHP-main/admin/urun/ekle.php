<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Ürün Ekle</h1>
 </div>

<?php
if($_POST){
 // veritabanı yapılandırma dosyasını dahil et
 include '../../config/vtabani.php';
 try{
// kayıt ekleme sorgusu
$sorgu = "INSERT INTO urunler SET urunadi=:urunadi, aciklama=:aciklama,
fiyat=:fiyat, giris_tarihi=:giris_tarihi, resim=:resim, kategori_id=:kategori_id";
// sorguyu hazırla
$stmt = $con->prepare($sorgu);
// post edilen değerler
$urunadi=htmlspecialchars(strip_tags($_POST['urunadi']));
$aciklama=htmlspecialchars(strip_tags($_POST['aciklama']));
$fiyat=htmlspecialchars(strip_tags($_POST['fiyat']));
// yeni 'resim' alanı
$resim=!empty($_FILES["resim"]["name"]) ? uniqid() . "-" .
basename($_FILES["resim"]["name"]) : "";
$resim=htmlspecialchars(strip_tags($resim));
$kategori_id=htmlspecialchars(strip_tags($_POST['kategori_id']));
// parametreleri bağla
$stmt->bindParam(':urunadi', $urunadi);
$stmt->bindParam(':aciklama', $aciklama);
$stmt->bindParam(':fiyat', $fiyat);
$stmt->bindParam(':resim', $resim);
$stmt->bindParam(':kategori_id', $kategori_id);
// ürünün veritabanına kaydedildiği tarihi belirt
$giris_tarihi=date('Y-m-d H:i:s');
$stmt->bindParam(':giris_tarihi', $giris_tarihi);
 // sorguyu çalıştır
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Ürün kaydedildi.</div>";
 // resim boş değilse yükle
if($resim){
 $hedef_klasor = "../../content/images/";
 $hedef_dosya = $hedef_klasor . $resim;
 $dosya_turu = pathinfo($hedef_dosya, PATHINFO_EXTENSION);
 // hata mesajı
 $dosya_yukleme_hata_msj="";
 // sadece belirli dosya türlerine izin ver
$izinverilen_dosya_turleri=array("jpg", "jpeg", "png", "gif");
if(!in_array($dosya_turu, $izinverilen_dosya_turleri)){
 $dosya_yukleme_hata_msj.="<div>Sadece JPG, JPEG, PNG, GIF türündeki dosyalar
yüklenebilir.</div>";
}
// aynı isimde başka bir resim var mı?
if(file_exists($hedef_dosya)){
 $dosya_yukleme_hata_msj.="<div>Aynı isimde başka bir resim dosyası
var.</div>";
}
// yüklenen resim dosyasının boyutunun 1 mb sınırını aşmaması için
if($_FILES['resim']['size'] > (1024000)){
 $dosya_yukleme_hata_msj.="<div>Resim dosyasının boyutu 1 MB sınırını
aşamaz.</div>";
}
// eğer $dosya_yukleme_hata_msj boşsa
if(empty($dosya_yukleme_hata_msj)){
 // hata yok, o zaman dosya sunucuya yüklenir
 if(move_uploaded_file($_FILES["resim"]["tmp_name"], $hedef_dosya)){
 // dosya başarıyla yüklendi
 }
 else{
 echo "<div class='alert alert-danger'>";
 echo "<div>Dosya yüklenemedi.</div>";
 echo "<div>Dosyayı yüklemek için kaydı güncelleyin.</div>";
 echo "</div>";
 }
}
// eğer $dosya_yukleme_hata_msj boş değilse
else{
 // hata var, o halde kullanıcıyı bilgilendir
 echo "<div class='alert alert-danger'>";
 echo "<div>{$dosya_yukleme_hata_msj}</div>";
 echo "<div>Dosyayı yüklemek için kaydı güncelleyin.</div>";
 echo "</div>";
}
}
 }else{
 echo "<div class='alert alert-danger'>Ürün kaydedilemedi.</div>";
 }
 }
 // hatayı göster
 catch(PDOException $exception){
 die('ERROR: ' . $exception->getMessage());
 }
}
?>
 <!-- Ürün bilgilerini girmek için kullanılacak html formu -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
enctype="multipart/form-data">

 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Ürün adı</td>
 <td><input type='text' name='urunadi' class='form-control' /></td>
 </tr>
 <tr>
 <td>Açıklama</td><td><textarea name='aciklama' class='form-control'></textarea></td>
 </tr>
 <tr>
 <td>Fiyat</td>
 <td><input type='text' name='fiyat' class='form-control' /></td>
 </tr>
 <tr>
 <td>Kategori</td>
 <td>
 <?php
 // veritabanı yapılandırma dosyasını dahil et
 include '../../config/vtabani.php';
 // kayıt listeleme sorgusu
 $sorgu='select id, kategoriadi from kategoriler';
 $stmt = $con->prepare($sorgu); // sorguyu hazırla
 $stmt->execute(); // sorguyu çalıştır
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); // tablo verilerini oku
 ?>
 <select name='kategori_id' class='form-control'>
 <?php foreach ($veri as $kayit) { ?>
 <option value="<?php echo $kayit["id"] ?>">
 <?php echo $kayit["kategoriadi"] ?>
 </option>
 <?php } ?>
 </select>
 </td>
</tr>

 <tr>
 <td>Resim</td>
 <td><input type="file" name="resim" /></td>
</tr>
 <tr>
 <td></td>
 <td>
 <button type="submit" class='btn btn-primary'><span class="glyphicon glyphicon-ok"></span> Kaydet</button>
 <a href='liste.php' class='btn btn-danger'><span class='glyphicon glyphicon
glyphicon-list'></span> Ürün listesi</a>
 </td>
 </tr>
 </table>
</form>

</div> <!-- container -->
<?php include "../footer.php"; ?>
