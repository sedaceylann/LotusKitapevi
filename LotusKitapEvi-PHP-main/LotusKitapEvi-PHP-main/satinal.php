<?php include "header.php";
if($_POST) {
 $urun_tutari = $_POST["uruntutari"];
 $kargo_ucreti = $_POST["kargo"];
 $toplam = $_POST["toplam"];
}
?>
<div class="container mt-4 mb-5">
 <form name="form" method="post" action="siparis_onay.php">
 <div class="row">
 <div class="col-sm-7">
 <div class="baslik">
 <h3>Teslimat Adresi</h3>
 <hr>
 </div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="isim">İsim*</label>
 <input type="text" id="isim" class="form-control"
placeholder="Adınız">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="soyisim">Soyisim*</label>
 <input type="text" id="soyisim" class="form-control"
placeholder="Soyadınız">
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="il">İl*</label>
 <select class="form-control" id="il">
 <option>Adana</option>
<option>Ankara</option>
<option>Bursa</option>
 <option>Edirne</option>
 <option>İstanbul</option>
<option>Tekirdağ</option>
<option>Zonguldak</option>
 </select>
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="ilce">İlçe</label>
 <input type="text" id="ilce" class="form-control"
placeholder="İlçe adı">
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-12">
 <div class="form-group">
 <label for="adres">Adres*</label>
 <textarea id="adres" class="form-control" placeholder="Mahalle,
Cadde/Sokak, Kapı no..."></textarea>
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-6">
 	<div class="form-group">
 <label for="kurum">Kurum/Şirket</label>
 <input type="text" id="kurum" class="form-control"
placeholder="Kurum veya Şirket adı">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="postakodu">Posta Kodu</label>
 <input type="text" id="postakodu" class="form-control"
placeholder="Beş haneli posta kodu">
 </div>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-6">
 <div class="form-group">
 <label for="eposta">E-posta Adresi*</label>
 <input type="email" id="eposta" class="form-control"
placeholder="aaa@bbb.ccc">
 </div>
 </div>
 <div class="col-sm-6">
 <div class="form-group">
 <label for="telefon">Telefon Numarası*</label>
 <input type="text" id="telefon" class="form-control"
placeholder="0111 222 33 44">
 </div>
 </div>
 </div>
 </div>
 <div class="col-sm-5">
 <div>
 <div class="baslik mb-3">
 <h3>Sipariş Özeti</h3>
 </div>
 <div>
 <table class="table">
 <tbody>
 <tr>
 <td>Ürün Tutarı</td>
<td><?php echo number_format($urun_tutari, 2, ',', '.');
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
 </div>
 </div>
 <div>
 <div class="baslik">
 <h3>Ödeme Seçenekleri</h3>
 <hr>
 </div>
 <ul class="list-unstyled">
 <li>
 <input type="radio" name="odemesekli" id="havale" checked >
 <label for="havale"> Havale/EFT</label>
 <p class="text-secondary">Havale ve EFT ödemelerinizi anlaşmalı banka
hesaplarına üç gün içinde yapabilirsiniz.</p>
 </li>
 <li>
 <input type="radio" name="odemesekli" id="kart">
 <label for="kart"> Banka/Kredi Kartı</label>
 </li>
 <li>
 <input type="radio" name="odemesekli" id="kapida">
 <label for="kapida"> Kapıda Ödeme</label>
 </li>
 </ul>
 <p>
 <input type="checkbox" name="onay" id="onay">
 <label for="onay"><a href="#">Satış Sözleşmesi</a>ni onaylıyorum.</label>
 </p>
 <div class="text-center">
 <hr>
 <button type="submit" class="btn btn-success btn-lg btn-block">
 <i class="fa fa-turkish-lira"></i> Ödemeyi tamamla
 </button>
 </div>
 </div>
 </div>
 </div>
 </form>
</div>
<?php include "footer.php"; ?>