<form method='POST' action=''>
  Sayı 1: <input type='text' name='sayi1' value=''>
  Sayı 2: <input type='text' name='sayi2' value=''> 
  <input type='submit'name='islem' value='TOPLA'>  <!-- KENDİM YAPTIM BÖYLE DAHA MANTIKLI GELDİ-->
</form>

<form method='POST' action=''>
  Sayı 1: <input type='text' name='sayi1' value=''>
  Sayı 2: <input type='text' name='sayi2' value=''>
  <input type='hidden' name='islem' value='çıkar'>
  <input type='submit' value='ÇIKAR'>
</form>
        

<?php

if( isset($_POST['islem']) ) {
  $S1=$_POST['sayi1'];
  $S2=$_POST['sayi2'];
  
  if( $_POST['islem'] == "TOPLA" ) echo "TOPLAM: " . ($S1 + $S2);
  if( $_POST['islem'] == "çıkar" ) echo "FARK: "   . ($S1 - $S2);

}
?>
