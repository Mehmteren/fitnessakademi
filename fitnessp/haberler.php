<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FİTNESS-HABERLERİ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/2023/fitnessp/style.css">
    <style>
        h1 {
            color:silver ; 
        }
    </style>
    
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
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">    
    <div class="container-fluid">
        <a class="navbar-brand" href="anasayfa.php">Fitness-Akademi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="haberler.php">Haberler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="ulasin.php">Bize Ulaşın</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Egzersizler</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Ara</button>
            </form>
        </div>
    </div>
</nav>
        <?php

$URL = "http://www.hurriyet.com.tr/rss/ekonomi";
$xml = simplexml_load_file($URL);
$json_str = json_encode($xml);
$arr_sonuc = json_decode($json_str, TRUE);
$Haberler = $arr_sonuc["channel"]["item"];

echo "<h1 class='mt-5 text-center'>FİTNESS-HABERLERİ</h1>";
echo "<div class='container'>";
$c = 0;
foreach ($Haberler as $key => $haber) {
    $c++;
    if ($c > 6) continue;
    $resim = $haber['media:group']['media:content']['@attributes']['url'];
    $link = $haber['link'];
    $baslik = $haber['title'];
    $ozet = $haber['description'];
    echo "<div class='card mb-3'>
            <img src='$resim' class='card-img-top' alt='Haber Görseli'>
            <div class='card-body'>
                <h5 class='card-title'><a href='$link'>$baslik</a></h5>
                <p class='card-text'>$ozet</p>
            </div>
          </div>";
}
echo "</div>";

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



