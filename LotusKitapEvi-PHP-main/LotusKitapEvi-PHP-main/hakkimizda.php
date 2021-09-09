<?php include "header.php"; ?>
<div class="container p-5">
 <?php
 $islem = isset($_GET['islem']) ? $_GET['islem'] : "";
 // eğer eposta.php sayfasından yönlendirme yapıldıysa
 if($islem == 'tamam') {
 echo "<div class='alert alert-success'>Mesajınız başarıyla iletildi.</div>";
 }
 else if($islem == 'hata') {
 echo "<div class='alert alert-danger'>Mesajınız iletilemedi!</div>";
 }
?>

 <h1 class="text-center baslik">Lotus Kitabevi</h1>
<p class="text-justify p-4">İstediğin Burada olarak ilk önceliğimiz olan "müşteri
memnuniyeti" ve ardından gelen kalite anlayışımızla, satışlarımızı hız kesmeden
sürdürmeye devam ederken, sektörün ihtiyaçları doğrultusunda, kaliteli ürün
tedarik etmek ve ürünlerimizden daha uzun yıllar faydalanmanız için çalışıyoruz.
 Türkiye'de değer kazanan bir marka olarak, uluslararası bir marka olma yolunda
hızla ilerliyoruz.
 Kuruluşumuzun 10. yılını kutladığımız bu günlerde, heyecanı ve mutluluğu
yaşıyoruz.</p><hr>
<div class="row mt-4">
 <div class="col-md-4">
 <h2 class="baslik">İletişim Formu</h2>
 </div>
 <div class="col-md-8">
 <form action="eposta.php" method="post" name="iletisim">
 <div class="form-group">
 <label for="exampleInputText1">İsim</label>
 <input type="text" class="form-control" id="exampleInputText1"
placeholder="Adınızı girin" name="kimden">
 </div>
 <div class="form-group">
 <label for="exampleInputEmail1">E-Posta adresi</label>
 <input type="email" class="form-control" id="exampleInputEmail1" ariadescribedby="emailHelp" placeholder="E-posta adresinizi girin" name="eposta">
 <small id="emailHelp" class="form-text text-muted">E-posta adresiniz
başkalarıyla paylaşılmayacaktır.</small>
 </div>
 <div class="form-group">
 <label for="exampleInputText2">Konu</label>
 <input type="text" class="form-control" id="exampleInputText2"
placeholder="Mesajınızın konusunu girin" name="konu">
 </div>
 <div class="form-group">
 <label for="exampleFormControlTextarea1">Mesaj</label>
 <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
placeholder="Bize iletmek istediğiniz mesajı girin" name="mesaj"></textarea>
 </div>
 <button type="submit" class="btn btn-success">Gönder</button>
 </form>
 </div>
 </div>
<div>
<?php include "footer.php"; ?>	