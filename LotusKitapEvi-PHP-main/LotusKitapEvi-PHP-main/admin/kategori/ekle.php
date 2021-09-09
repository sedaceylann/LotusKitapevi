<?php include "../header.php"; ?>
<div class="container">
 <div class="page-header">
 <h1>Kategori Ekle</h1>
 </div>
<?php
if($_POST){
 // veritabanı yapılandırma dosyasını dahil et
 include '../../config/vtabani.php';
 try{
 // kayıt ekleme sorgusu
 $sorgu = "INSERT INTO kategoriler SET kategoriadi=:kategoriadi,
aciklama=:aciklama";
 // sorguyu hazırla
 $stmt = $con->prepare($sorgu);
 // post edilen değerler
 $kategoriadi=htmlspecialchars(strip_tags($_POST['kategoriadi']));
 $aciklama=htmlspecialchars(strip_tags($_POST['aciklama']));
 // parametreleri bağla
 $stmt->bindParam(':kategoriadi', $kategoriadi);
 $stmt->bindParam(':aciklama', $aciklama);
 // sorguyu çalıştır
 if($stmt->execute()){
 echo "<div class='alert alert-success'>Kategori kaydedildi.</div>";
 }else{
 	echo "<div class='alert alert-danger'>Kategori kaydedilemedi.</div>";
 }
 }
 // hatayı göster
 catch(PDOException $exception){
 die('ERROR: ' . $exception->getMessage());
 }
}
?>
<!-- Kategori bilgilerini girmek için kullanılacak html formu -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
 <tr>
 <td>Kategori adı</td>
 <td><input type='text' name='kategoriadi' class='form-control' /></td>
 </tr>
 <tr>
 <td>Açıklama</td>
 <td><textarea name='aciklama' class='form-control'></textarea></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type='submit' value='Kaydet' class='btn btn-primary' />
 <a href='liste.php' class='btn btn-danger'>Kategori listesi</a>
 </td>
 </tr>
 </table>
</form>
 </div> <!-- container -->
<?php include "../footer.php"; ?>