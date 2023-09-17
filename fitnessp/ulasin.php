










<?php
require_once('db.php');
?>

<?php
        if (isset($_POST['eposta'])) {
          $eposta = $_POST['eposta'];
          $yas = $_POST['yas'];
          $tecrube = $_POST['tecrube'];
          $egitim = $_POST['egitim'];
          $beklenti = $_POST['beklenti'];
          $adsoyad = $_POST['adsoyad'];

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
            $sql = "INSERT INTO ulasanlar 
                    SET eposta = :eposta,
                        tarih = :tarih,
                        adsoyad = :adsoyad,
                        yas = :yas,
                        egitim = :egitim,
                        beklenti = :beklenti,
                        tecrube = :tecrube
                    ";
            $SORGU = $DB->prepare($sql);

            $SORGU->bindParam(':eposta', $eposta);
            $SORGU->bindParam(':tarih', date("Y-m-d H:i:s"));
            $SORGU->bindParam(':adsoyad', $adsoyad);
            $SORGU->bindParam(':yas', $yas);
            $SORGU->bindParam(':egitim', $egitim);
            $SORGU->bindParam(':beklenti', $beklenti);
            $SORGU->bindParam(':tecrube', $tecrube);

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




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness-Akademi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/2023/fitnessp/stil.css">
</head>
<body>
    <div id="container_2">

        <form method="POST">
            <h1>BİZE ULAŞIN</h1>
            <br>
            <label>Ad Soyad</label>
            <input type="text"  name="adsoyad" class="form" required placeholder="adınızı ve soyadınızı yazınız"><br><!--name--->
            <label>Email</label>
            <input type="email"  name="eposta" class="form" required placeholder="eposta giriniz"><br><!---email-->
            <label>yaş</label>
            <input type="number"  name="yas" class="form" placeholder="Yaşınız"><br><!---number-->
            <label>Daha önce fitness tecrübeniz oldu mu</label>
            <select name="tecrube">
                <option value='0'>
                    Oldu
                </option>
                <option value='1'>
                    Olmadı
                </option>
            </select><!--dropdown--->
            <label>Eğitimi onlinemi, hiybritmi yoksa birebir mi almak istersiniz</label>
            <select name="egitim">
                <option value='0'>
                    Online
                </option>
                <option value='1'>
                    Hyibrit
                </option>
                <option value='2'>
                    Birebir
                </option>
            </select><!--dropdown--->
            
            <p>Eğitim içerisindeki beklentileriniz nedir</p>
            <textarea
                name="beklenti"
                placeholder="Beklenti ve yorumunuzu buraya girin..."
            ></textarea><!---comment-->
            
            <button type="submit" class="btn btn-danger">Gönder</button>
        </form><!---survey-form--->
    </div><!--container_2--->
</body>

</html>

