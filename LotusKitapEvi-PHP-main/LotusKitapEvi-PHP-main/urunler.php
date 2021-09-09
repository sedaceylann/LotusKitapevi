<?php include "header.php"; ?>
<div class="row">
 <div class="col-md text-center">
 <img src="content/images/banner.jpg">
 <div class="carousel-caption">
 <span class="fa-stack fa-3x">
 <i class="fa fa-circle-thin fa-stack-2x"></i>
 <i class="fa fa-search fa-stack-1x"></i>
 </span>
 <h1 class="baslik"><b>Ürünler</b></h1>
 </div>
 </div>
</div>

 <div class="container mt-4">
 <div class="row">
 <div class="col-md-3">
<div><!--kategoriler-->
 <h4 class="baslik">Kategoriler</h4>
 <ul class="list-group list-group-flush">
 <?php
 // gelen parametreleri değişkenlere kaydet
 $aranan=isset($_GET["aranan"]) ? $_GET["aranan"]:"";
 $kategori=isset($_GET["id"]) ? $_GET["id"]:"";
 $siralama=isset($_GET["siralama"]) ? $_GET["siralama"]:"akilli";
 $fiyat=isset($_GET["fiyat"]) ? $_GET["fiyat"]:"0";
 // kategori haricindeki seçenekleri de linke dahil etmek için
 $parametre="&aranan=$aranan&siralama=$siralama&fiyat=$fiyat";
 // veritabanı yapılandırma dosyasını dahil et
 include 'config/vtabani.php';
 // kayıt listeleme sorgusu
 $sorgu='SELECT kategoriler.*, COUNT(urunler.id) AS adet FROM kategoriler LEFT
JOIN urunler ON kategoriler.id=urunler.kategori_id GROUP BY kategoriler.id ORDER
BY kategoriler.kategoriadi';
 $stmt = $con->prepare($sorgu); // sorguyu hazırla
 $stmt->execute(); // sorguyu çalıştır
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); // tablo verilerini oku
 $toplam=0;
 foreach ($veri as $kayit) { ?>
 <a href="urunler.php?id=<?php echo $kayit["id"];echo $parametre ?>"
class="list-group-item d-flex justify-content-between align-items-center listgroup-item-action<?php echo $kategori==$kayit["id"] ? "active":""; ?>"><?php echo
$kayit["kategoriadi"] ?>
 <span class="badge badge-primary badge-pill"><?php echo $kayit["adet"]
?></span>
 </a>
 <?php $toplam+=$kayit["adet"]; } ?>
 <a href="urunler.php?id=<?php echo $parametre ?>" class="list-group-item dflex justify-content-between align-items-center list-group-item-action<?php echo
$kategori=="" ? "active":""; ?>">Hepsi
 <span class="badge badge-primary badge-pill"><?php echo $toplam ?></span>
 </a>
 </ul>
</div><!--/kategoriler-->
<div class="pt-4"><!--sıralama-->
 <h4 class="baslik">Sıralama</h4>
 <div class="list-group list-group-flush">
 <!-- sıralama haricindeki seçenekleri de linke dahil etmek için -->
 <?php $parametre="&aranan=$aranan&id=$kategori&fiyat=$fiyat"; ?>

 <a href="urunler.php?siralama=akilli<?php echo $parametre ?>" class="listgroup-item list-group-item-action<?php echo $siralama=="akilli" ? "active":"";
?>">Akıllı sıralama</a>
 <a href="urunler.php?siralama=yeni<?php echo $parametre ?>" class="list-groupitem list-group-item-action<?php echo $siralama=="yeni" ? "active":""; ?>">Yeni
ürünler</a> 
<a href="urunler.php?siralama=artan<?php echo $parametre ?>" class="listgroup-item list-group-item-action<?php echo $siralama=="artan" ? "active":"";
?>">Artan fiyat</a>
 <a href="urunler.php?siralama=azalan<?php echo $parametre ?>" class="listgroup-item list-group-item-action<?php echo $siralama=="azalan" ? "active":"";
?>">Azalan fiyat</a>
 </div>
</div><!--/sıralama-->
<div class="pt-4"><!--fiyat-->
 <h4 class="baslik">Fiyat Aralığı</h4>
 <div class="list-group list-group-flush">
 <!-- fiyat haricindeki seçenekleri de linke dahil etmek için -->
 <?php $parametre="&aranan=$aranan&id=$kategori&siralama=$siralama"; ?>
 <a href="urunler.php?fiyat=0<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="0" ? "active":""; ?>">Yok</a>
 <a href="urunler.php?fiyat=1<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="1" ? "active":""; ?>">0 - 25 &#8378;</a>
 <a href="urunler.php?fiyat=2<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="2" ? "active":""; ?>">25 - 50
&#8378;</a>
 <a href="urunler.php?fiyat=3<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="3" ? "active":""; ?>">50 - 100
&#8378;</a>
 <a href="urunler.php?fiyat=4<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="4" ? "active":""; ?>">100 - 250
&#8378;</a>
 <a href="urunler.php?fiyat=5<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="5" ? "active":""; ?>">250 - 500
&#8378;</a>
 <a href="urunler.php?fiyat=6<?php echo $parametre ?>" class="list-group-item
list-group-item-action<?php echo $fiyat=="6" ? "active":""; ?>">500 - 1000
&#8378;</a>
 </div>
 </div><!--/fiyat-->

 </div>
 <div class="col-md-9">
 <div class="row">
 <?php
 // select sorgusu için sıralama seçenekleri hazırlanıyor
 switch($siralama){
 case 'yeni': $orderby="giris_tarihi desc";break;
 case 'artan': $orderby="fiyat";break;
 case 'azalan':$orderby="fiyat desc";break;
 default: $orderby="dzltm_tarihi desc";
 }
 // select sorgusu için fiyat aralığı hazırlanıyor
 switch($fiyat){
 case '1': $where1="fiyat between 0 and 25";break;
 case '2': $where1="fiyat between 25 and 50";break;
 case '3': $where1="fiyat between 50 and 100";break;
 case '4': $where1="fiyat between 100 and 250";break;
 case '5': $where1="fiyat between 250 and 500";break;
 case '6': $where1="fiyat between 500 and 1000";break;
 }
 // select sorgusu için kategori şartı hazırlanıyor
 if($kategori!="") $where2="kategori_id=$kategori";
 // select sorgusu için arama şartı hazırlanıyor
 if($aranan!="") $where3="urunadi like '%$aranan%'"; else $where3="urunadi like
'%'";
 // select sorgusu için şartlar birleştiriliyor
 if(isset($where1) && isset($where2)) $where="(".$where1.") and (".$where2.") and
(".$where3.")";
 elseif(isset($where1)) $where="(".$where1.") and (".$where3.")";
 elseif(isset($where2)) $where="(".$where2.") and (".$where3.")";
 else $where=$where3;
 // veritabanı yapılandırma dosyasını dahil et
 include 'config/vtabani.php';
 // kayıt listeleme sorgusu
 $sorgu="select id, urunadi, aciklama, fiyat, resim from urunler where $where
order by $orderby";
 $stmt = $con->prepare($sorgu); // sorguyu hazırla
 $stmt->execute(); // sorguyu çalıştır
 $veri = $stmt->fetchAll(PDO::FETCH_ASSOC); // tablo verilerini oku
 foreach ($veri as $kayit) { ?>
 <div class="col-md-4 mb-4">
 <div class="card" style="height:700px">
 <a href="urundetay.php?id=<?php echo $kayit['id']?>">
 <img class="card-img-top" src="content/images/<?php echo
$kayit['resim']?>" alt="<?php echo $kayit['urunadi']?>"height="400">
 </a>
 <div class="card-body">
 <h4 class="card-title"><?php echo $kayit['urunadi']?></h4>
 <p class="card-text"><?php echo $kayit['aciklama']?></p>
 </div>
 <div class="card-footer text-muted">
<a href="#" class="text-secondary float-left sepete-ekle" id="<?php echo
$kayit['id']?>"><i class="fa fa-cart-plus fa-2x"></i></a>

 <span class="badge badge-primary p-2 float-right"><?php echo
$kayit['fiyat']?>&#8378;</span>
 </div>
 </div>
 </div>
 <?php } ?>
</div>
 </div>
 </div>
 </div>
<?php include "footer.php"; ?>