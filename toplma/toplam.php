<form method='POST' action=''>
  Sayı 1: <input type='text' name='sayi1' value=''>
  Sayı 2: <input type='text' name='sayi2' value=''>
    <input type='submit' name='topla' value='TOPLA'>
</form>
  
<?php
if( isset($_POST['topla']) ) {  //gonder dugmesine basılmıs
  $S1=$_POST['sayi1'];
  $S2=$_POST['sayi2'];
  $toplam = $S1 + $S2;
  echo "Toplam: $toplam ";
  
}
?>