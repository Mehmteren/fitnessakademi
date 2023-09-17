<?php
require 'login.kontrol.php';
require 'sayfa.ust.php';

$hedefKlasor = "../FORMLAR/";

// Klasördeki dosyaları al
$dosyalar = scandir($hedefKlasor);//scandir işlevi, belirtilen bir dizini (klasörü) taramak ve bu dizindeki dosya ve dizinleri bir dizi olarak döndürmek için kullanılır.

// "." ve ".." girdilerini kaldır
$dosyalar = array_diff($dosyalar, array(".", ".."));  
//Gönderdiğiniz kod parçası, $dosyalar dizisinden nokta (.) ve iki nokta (..) dizinleri hariç tutmak için kullanılıyor. Bu, genellikle bir dizini tararken veya listelerken bu özel dizinleri dışarıda bırakmanın yaygın bir yoludur.

sort($dosyalar);
// Dosya listesini alfabetik sıraya göre sırala


if (count($dosyalar) === 0) {
  echo "Henüz herhangi bir dosya yüklenmemiş.";
} else {
  echo "<h2>Yüklenen Dosyalar</h2>";
  echo "<ul>";
  foreach ($dosyalar as $dosya) {
    echo "<li><a href=\"$hedefKlasor$dosya\" download>$dosya</a></li>";
  }
  echo "</ul>";
}

require 'sayfa.alt.php';