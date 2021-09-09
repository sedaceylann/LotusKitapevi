<?php
// oturum işlemlerini başlat
session_start();
// sepeti boşalt
session_destroy();
include "header.php";
?>
<div class="container mt-5 mb-5">
 <div class="col-md-12">
 <h2>Siparişiniz alındı!</h2>
 <hr>
 <!-- tell the user order has been placed -->
 <div class="alert alert-success">
 <strong>Bizi tercih ettiğiniz için teşekkür ederiz!</strong> Teslimatınız en
kısa süre içinde belirttiğiniz adrese yapılacaktır.
 </div>
 </div>
</div>
<?php
include "footer.php";
?>