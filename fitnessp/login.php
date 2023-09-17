
<?php
@session_start();

if (isset($_SESSION['girisyapti'])) {
  // Oturum açmış
  header("location: anasayfa.php");// Bu satır, kullanıcıyı başka bir sayfaya yönlendirmek için kullanılır. Kullanıcıyı "index.php" sayfasına yönlendirir.
  die();// Bu işlev, kodun burada sonlandırılmasını sağlar. Yani, bu satırdan sonraki kod işlenmez. Bu, gereksiz işlemlerin yapılmasını önlemek için kullanılır.
}


if (isset($_POST['eposta_form'])) {
  // Form gönderildi. Şimdi işimize bakalım
  // 1.DB'na bağlan
  // 2.SQL hazırla ve çalıştır
  // 3.Gelen sonuç 1 satırsa GİRİŞ BAŞARILI değilse, BAŞARISIZ
  require_once('db.php');

  $sql = "SELECT * FROM kullanicilar WHERE eposta = :eposta_form AND parola = :parola_form";
  $SORGU = $DB->prepare($sql);

  $SORGU->bindParam(':eposta_form', $_POST['eposta_form']);
  $SORGU->bindParam(':parola_form', $_POST['parola_form']);

  $SORGU->execute();

  $CEVAP = $SORGU->fetchAll(PDO::FETCH_ASSOC);//Bu PHP kod parçası, bir PDO (PHP Data Objects) sorgusunun sonucunu bir dizi olarak almak için kullanılır. ***FAYDALI BİRŞEY
  //var_dump($CEVAP);
  // echo "Gelen cevap " .  count($CEVAP) . " adet satırdan oluşuyor";
  if (count($CEVAP) == 1) {
    //echo "<h1>GİRİŞ BAŞARILI!</h1>";
    @session_start();
    $_SESSION['girisyapti'] = 1;
    $_SESSION['adsoyad'] = $CEVAP[0]['adsoyad']; // Kullanıcının adını alalım
    $_SESSION['id'] = $CEVAP[0]['id']; // Kullanıcının ID'sini alalım
    $_SESSION['rol'] = $CEVAP[0]['rol']; // Kullanıcının ROL'ünü alalım
    header("location: anasayfa.php");
    die();
  } else {
    //header("location: hata.php");
    //die();
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness-Akademi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="2023/fitnessp/styles.css">
    <title>Web Sitenizin Başlığı</title>
    <style>
    body {
        background-image: url('/2023/fit.jpg'); /* Resmin yolunu belirtin */
        background-size: cover; /* Resmi sayfa boyutuna sığdır */
        background-repeat: no-repeat; /* Resmi yinelemeyi kapat */
        background-attachment: fixed; /* Arka plan resmini sabit konumda tutar */
    }
</style>



  </head>
  <body>
<br>
<br>
    <div class='container'>
      <div class="offset-3 col-6">

        <div class='row text-center'>
          <h1 style=color:white;>Fitness-Akademisi</h1>
        </div>
        <br>
        <br>
        <br>

        <form method="POST">
          <div class="mb-3">
            <label style=color:white; for="eposta" class="form-label">Eposta</label>
            <input type="text" name='eposta_form' class="form-control" id="eposta" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
    <label style="color:white;" for="parola" class="form-label">Parola</label>
    <input type="password" name='parola_form' class="form-control" id="parola">
    </div>
<br>
       <?php
         if (isset($_POST['eposta_form']) && count($CEVAP) != 1) {
           echo "<div class='alert alert-danger' role='alert'>HATALI EPOSTA veya PAROLA!</div>";
       }
         ?>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary">GİRİŞ</button>
          </div>
          <br>
        
        </form>
     
    </div>
      <div class='container'>
       <div class="offset-3 col-6">
        <div class='row text-center'>
        <form method="post" action="kayitol.php">
         <input style="background-color:tomato;color:white;" type="submit" name="gonder" value="Hemen Kayıt Ol">
        </form>
        </div>
     </div>
    </div>

  

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

  </body>
</html>
