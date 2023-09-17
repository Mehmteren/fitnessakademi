<?php
require_once('db.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness-Akademi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="2023/fitnessp/styles.css">
    <style>
      body {
        background-image: url('/2023/fit.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
    </style>
  </head>
  <body>
    <br>
    <br>
    <div class='container'>
      <div class="offset-3 col-6">
        <div class='row text-center'>
          <h1 style="color: white;">Fitness-Akademisi</h1>
          <h1 style="color: white;">Kayıt</h1>
        </div>
        <br>
        <br>
        <br>
        <?php
        if (isset($_POST['eposta'])) {
          $eposta = $_POST['eposta'];
          $parola = $_POST['parola'];
          $adsoyad = $_POST['adsoyad'];
          $telefon = $_POST['telefon'];

          // E-posta geçerliliğini kontrol et
          if (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
            echo '
              <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                Geçerli bir e-posta adresi giriniz.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            ';
          } else {
            // Veritabanına kayıt işlemini yap
            $sql = "INSERT INTO kullanicilar 
                    SET eposta = :eposta,
                        kayittarih = :kayittarih,
                        adsoyad = :adsoyad,
                        parola = :parola,
                        telefon = :telefon
                    ";
            $SORGU = $DB->prepare($sql);

            $SORGU->bindParam(':eposta', $eposta);
            $SORGU->bindParam(':kayittarih', date("Y-m-d H:i:s"));
            $SORGU->bindParam(':adsoyad', $adsoyad);
            $SORGU->bindParam(':parola', $parola);
            $SORGU->bindParam(':telefon', $telefon);

            if ($SORGU->execute()) {
              echo '
                <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
                  Başarı ile kayıt gerçekleşti...
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              ';
            } else {
              echo '
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                  Kayıt sırasında bir hata oluştu...
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              ';
            }
          }
        }
        ?>
        <form method="POST">
          <div class="mb-3">
            <label style="color:white;" for="eposta" class="form-label">Eposta giriniz</label>
            <input type="text" name='eposta' class="form-control">
          </div>
          <div class="mb-3">
            <label style="color:white;" for="parola" class="form-label">Parola giriniz</label>
            <input type="password" name='parola' class="form-control">
          </div>
          <div class="mb-3">
            <label style="color:white;" for="adsoyad" class="form-label">Adınızı ve soyadınızı giriniz</label>
            <input type="text" name='adsoyad' class="form-control">
          </div>
          <div class="mb-3">
            <label style="color:white;" for="telefon" class="form-label">Telefon numarası giriniz</label>
            <input type="text" name='telefon' class="form-control">
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-danger">Kayıt Ol</button>
          </div>
          <br>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>
