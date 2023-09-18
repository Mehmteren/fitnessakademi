<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness-Akademi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/2023/fitnessp/icon.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('/2023/fit1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .overlay-container {
            position: relative;
            width: 100%;
            height: 65vh;
        }
        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .overlay-text h1 {
            font-size: 3em;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }
        .overlay-text h3 {
            font-size: 1.5em;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }
        .exercise-list {
            display: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">    
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fitness-Akademi</a>
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
                        <a class="nav-link active" aria-current="page" href="beslenme.php">Beslenme</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="nav-egzersizler" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Egzersizler
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="nav-egzersizler">
                            <li><a class="dropdown-item" href="kalca.php" id="kalcaEgzersizi">Kalça Egzersizi</a></li>
                            <li><a class="dropdown-item" href="kol.php" id="kolEgzersizi">Kol Egzersizi</a></li>
                            <li><a class="dropdown-item" href="bacak.php" id="bacakEgzersizi">Bacak Egzersizi</a></li>
                            <li><a class="dropdown-item" href="sirt.php" id="kolEgzersizi">Sırt Egzersizleri</a></li>
                            <li><a class="dropdown-item" href="karin.php" id="bacakEgzersizi">Karın Egzersizleri</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Ara</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="overlay-container">
        <div class="overlay-text">
            <h1>ZİNDELİĞİNİZİN ANAHTARI SİZDE</h1>
            <h3>KAPININ KİLİDİNİ AÇMAYA YARDIMCI OLABİLİRİZ</h3>
            
            <form method="post" action="ulasin.php">
                <input style="background-color:tomato;color:white;" type="submit" class="btn btn-danger" name="gonder" value="BİZE ULAŞIN">
            </form>
        </div>
    </div>

    <div class='row text-center'>
        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/M-XFktawwNs" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <div class="social-icons">
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-telegram"></i></a>
    </div>

    <div class="exercise-list">
        <h2>Egzersizler</h2>
        <ul>
            <li><a href="kalca.php" id="kalcaEgzersizi">Kalça Egzersizi</a></li>
            <li><a href="kalca.php" id="kolEgzersizi">Kol Egzersizi</a></li>           
            <li><a href="#" id="bacakEgzersizi">Bacak Egzersizi</a></li>
            <li><a href="#" id="bacakEgzersizi">Sırt Egzersizleri</a></li>
            <li><a href="#" id="bacakEgzersizi">Karın Egzersizleri</a></li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
