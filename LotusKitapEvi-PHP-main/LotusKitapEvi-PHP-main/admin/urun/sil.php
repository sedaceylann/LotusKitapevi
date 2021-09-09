<?php
 session_start();
 if ($_SESSION["loginkey"] == "") {
 // oturum açılmamışsa login.php sayfasına git
 header("Location: /proje/admin/login.php");
 }
?>

<?php
// veritabanı ayar dosyasını dahil et
include '../../config/vtabani.php';
try {
 // kaydın id bilgisini al
 $id=isset($_GET['id']) ? $_GET['id'] : die('HATA: Id bilgisi bulunamadı.');
 // silinecek kayıt bilgilerini oku
// seçme sorgusunu hazırla
$sorgu = "SELECT id, resim FROM urunler WHERE id = ? LIMIT 0,1";
$stmt = $con->prepare( $sorgu );
// id parametresini bağla (? işaretini id değeri ile değiştir)
$stmt->bindParam(1, $id);
// sorguyu çalıştır
$stmt->execute();
$kayit = $stmt->fetch(PDO::FETCH_ASSOC);
// okunan resim bilgilerini bir değişkene kaydet
$resim = $kayit['resim']; 
 // silme sorgusu
 $sorgu = "DELETE FROM urunler WHERE id = ?";
 $stmt = $con->prepare($sorgu);
 $stmt->bindParam(1, $id);

 // sorguyu çalıştır
 if($stmt->execute()){
 // kayıt listeleme sayfasına yönlendir
 // ve kullanıcıya kaydın silindiğini
 	// kayda ait resim varsa sunucudan sil
if(!empty($resim)){
 $silinecek_resim = "../../content/images/".$resim;
 if (file_exists($silinecek_resim)) unlink($silinecek_resim);
}
 header('Location: liste.php?islem=silindi');
 } // veya silinemediğini bildir
 else{
 header('Location: liste.php?islem=silinemedi');
 }
}
// hata varsa göster
catch(PDOException $exception){
 die('HATA: ' . $exception->getMessage());
}
?>