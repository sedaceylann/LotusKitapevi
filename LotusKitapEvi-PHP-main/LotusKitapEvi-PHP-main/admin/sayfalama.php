<?php
 echo "<ul class='pagination pull-left margin-zero mt0'>";

  // önceki sayfa butonu
 if($sayfa>1){

 $onceki_sayfa = $sayfa - 1;
 echo "<li>";
echo "<a href='{$sayfa_url}?sayfa={$onceki_sayfa}&aranan={$aranan}'>";
 echo "<span style='margin:0 .5em;'>&laquo;</span>";
 echo "</a>";
 echo "</li>";
 }


  // tıklanabilir sayfa numaraları
 // sayfa sayısını hesapla
 $sayfa_sayisi = ceil($kayit_sayisi / $sayfa_kayit_sayisi);

 // aktif sayfanın öncesinde ve sonrasında gösterilecek sayfa numarası aralığı
 $aralik = 2;

 // aktif sayfanın önce ve sonrasındaki sayfa numaralarını görüntüle
 $baslangic_no = $sayfa - $aralik;
 $bitis_no = ($sayfa + $aralik) + 1;

 for ($x=$baslangic_no; $x<$bitis_no; $x++) {
 	// $x değerinin 0'dan büyük VE $sayfa_sayisi'na eşit veya küçük olduğundan emin ol
 if (($x > 0) && ($x <= $sayfa_sayisi)) {

 // aktif sayfa
 if ($x == $sayfa) {
 echo "<li class='active'>";
 echo "<a href='javascript::void();'>{$x}</a>";
 echo "</li>";
 }
 // aktif olmayan sayfa
 else {
 echo "<li>";
 echo " <a href='{$sayfa_url}?sayfa={$x}&aranan={$aranan}'>{$x}</a> ";
 echo "</li>";
 }
 }
 }
  // sonraki sayfa butonu
 if($sayfa<$sayfa_sayisi){
 $sonraki_sayfa = $sayfa + 1;

 echo "<li>";
 echo "<a href='{$sayfa_url}?sayfa={$sonraki_sayfa}&aranan={$aranan}'>";
 echo "<span style='margin:0 .5em;'>&raquo;</span>";
 echo "</a>";
 echo "</li>";
 }

 // sonraki sayfa butonu burada yer alacak

 echo "</ul>";
?>
<!-- sayfa yönlendirme menüsü -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
 <div class="row">
 <div class="col-xs-3 col-md-2 pull-right">
 <div class="input-group">
<select name="sayfa" class="form-control no-arrow">
 <?php
 for($i=1; $i<=$sayfa_sayisi; $i++) {
 echo "<option value=".$i.($i == $sayfa ? " selected" :
"").">".$i."</option>";
 }
 ?>
 </select>
 <input type="hidden" name="aranan" value="<?php echo $aranan; ?>">
 <div class="input-group-btn">
 <button class="btn btn-primary" type="submit">
 <span>Git</span>
 </button>
 </div>
 </div>
 </div>
 </div>
</form>
