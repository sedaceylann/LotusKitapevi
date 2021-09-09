<?php include "header.php";
// sepet boşsa uyar
if(count($_SESSION['sepet']) == 0) {
 echo "<div class='container mt-5 mb-5'><div class='col-md-12'><div class='alert
alert-danger'>Sepetinizde henüz ürün yok!</div></div></div>";
}
// sepet boş değilse ürünleri listele
else {
 // sepetteki ürün id'lerini diziye kaydet
 $ids = array();
 foreach($_SESSION['sepet'] as $id=>$value){
 array_push($ids, $id);
 }
 $ids_arr = str_repeat('?,', count($ids) - 1) . '?';
 // veritabanı yapılandırma dosyasını dahil et
 include 'config/vtabani.php';
 // sepetteki ürünleri getiren sorgu
 $sorgu = "SELECT id, urunadi, fiyat, resim FROM urunler WHERE id IN ({$ids_arr})
ORDER BY urunadi";
 // sorguyu hazırla
 $stmt = $con->prepare($sorgu);
 // sorguyu çalıştır
 $stmt->execute($ids);

 ?>
 <div class="container mt-4 mb-5">
 <div class="baslik">
 <h3>Sepet Özeti</h3>
 </div>
 <!-- Sepetteki ürünleri görüntüleyen HTML tablosu -->
 <div class="table-responsive">
 <table class="table table-bordered sepet-tablo">
 <thead class="bg-light">
 <tr>
 <th>Ürün görseli</th>
 <th>Ürün adı</th>
 <th>Fiyat</th>
 <th>Adet</th>
 <th>Sil</th>
 </tr>
 </thead>
 <tbody>
 <?php
$urun_toplami = 0;
$urun_sayisi = 0;
// Sepetteki ürünleri listeleyen döngü
while ($kayit = $stmt->fetch(PDO::FETCH_ASSOC)) {
 extract($kayit);
 $adet = $_SESSION['sepet'][$id]['adet'];
 $urun_sayisi += $adet;
 $urun_toplami += $fiyat * $adet;
  ?>
 <tr>
 <td class="col-md-2">
 <img src="content/images/<?php echo $resim; ?>" class="img-fluid imgthumbnail" width="80">
 </td>
 <td class="col-md-4 text-left">
 <h6><a href="urundetay.php?id=<?php echo $id; ?>" class="link2"><?php
echo $urunadi; ?></a></h6>
 </td>
 <td class="col-md-2">
 <h6><?php echo number_format($fiyat, 2, ',', '.'); ?>&#8378;</h6>
 </td>
 <td class="col-md-2">
 <h6>
 <div class="input-group">
 <div class="input-group-prepend">
 <div class="input-group-text">
 <a href="#" class="text-dark urun-guncelle" id="<?php echo $id;
?>"><i class="fa fa-refresh"></i></a>
 </div>
 </div>
 <input type="number" value="<?php echo $adet; ?>" id="urun_<?php echo
$id; ?>" min="1" max="99" class="form-control">
 </div>
 </h6>
 </td>
 <td class="col-md-1">
 <h6><a href="#" class="link2 urun-sil" id="<?php echo $id; ?>"><i
class="fa fa-trash"></i></a></h6>
 </td>
 </tr>
<?php
} // while döngüsü sonu
$kargo_ucreti = 5.99;
$toplam = $urun_toplami + $kargo_ucreti;
?>
 </tbody>
 </table>
 </div><!--/Sepetteki ürünler-->

<div class="row">
 <div class="col-sm-8">
 </div>
 <div class="col-sm-4">
 <!--Sepet özeti-->
 <div class="text-right">
 <table class="table">
 <tbody>
 <tr>
 <td>Ürün Sayısı</td>
 <td><?php echo $urun_sayisi; ?></td>
 </tr>
<tr>
 <td>Ürün Tutarı</td>
<td><?php echo number_format($urun_toplami, 2, ',', '.');
?>&#8378;</td>
 </tr>
 <tr>
 <td>Kargo Ücreti</td>
<td><?php echo number_format($kargo_ucreti, 2, ',', '.');
?>&#8378;</td>
 </tr>
 <tr>
 <td><strong>Toplam</strong></td>
 <td><strong><?php echo number_format($toplam, 2, ',', '.');
?>&#8378;</strong></td>
 </tr>
 </tbody>
 </table>
 </div><!--/Sepet özeti-->
 <form name="frm_sepet" method="post" action="satinal.php">
 <input type="hidden" name="uruntutari" value="<?php echo
$urun_toplami; ?>">
 <input type="hidden" name="kargo" value="<?php echo $kargo_ucreti;
?>">
 <input type="hidden" name="toplam" value="<?php echo $toplam; ?>">
 <div class="text-right">
 <button type="submit" class="btn btn-success btn-lg btn-block">
 <i class="fa fa-credit-card"></i> Satın al
 </button>
 </div>
 </form>
 </div>
 </div>

 </div>
<?php
}
include "footer.php"; ?>