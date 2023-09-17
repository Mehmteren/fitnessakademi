<?php
require 'login.kontrol.php';
require 'yetki.kontrol.php';
require 'sayfa.ust.php';

if ($_SESSION['id'] == $_GET['id']) {   // Eğer oturum kimliği ($_SESSION['id']) URL üzerinden gelen kimlik parametresi ($_GET['id']) ile aynı ise, yani kullanıcı kendi hesabını silmeye çalışıyorsa, bir hata mesajı gösterilir ve kod durur.
  echo "<h1>Kendinizi silemezsiniz!</h1>";
  die();
} // $_SESSION   kullanıcının bir web sitesine giriş yaptığında belirli bilgileri tutmak için kullanılır
  // Örneğin, bir kullanıcının giriş yapmış olduğunu ve hangi kullanıcı olduğunu takip etmek için $_SESSION kullanabilirsiniz.
  //$_SESSION değişkeni, oturum boyunca erişilebilir ve oturum sona erene kadar tutulan verileri depolamanızı sağlar.
  //*************************************************/
  // Genellikle HTML form elemanları (örneğin, <form> etiketi ile gönderilen veriler) kullanılarak gönderilen verileri almak için kullanılır.
  //$_POST verileri, kullanıcının form verilerini sunucuya göndermesiyle elde edilir ve sunucu tarafından işlenir.
  //$_POST verileri, yalnızca bir HTTP POST isteği ile sunucuya gönderilen verileri içerir ve tarayıcıda saklanmaz. Bu nedenle, bu verilere erişim yalnızca sunucu tarafından mümkün olur.

require_once('db.php');

$id    = $_GET['id'];

$sql = "DELETE FROM kullanicilar WHERE id = :id";
$SORGU = $DB->prepare($sql);

$SORGU->bindParam(':id', $id);

$SORGU->execute();
echo "Kullanıcı silindi...";
?>

<div class='row text-start'>
  <p><a href='list.php' class="btn btn-primary btn-sm"> Geri Dön </a></p>
</div>

<?php require 'sayfa.alt.php'; ?>