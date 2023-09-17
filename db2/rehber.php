<?php
require 'login.kontrol.php';
require 'yetki.kontrol.php';
require 'sayfa.ust.php';
?>

<div class='row text-center'>
  <h1 class='alert alert-primary'>Telefon Rehberi</h1>
</div>

<div class="row justify-content-center mb-3">
  <form action="rehber.php" method="GET" class="form-inline">
    <div class="form-group">
      <label for="searchName">Adı Soyadı:</label>
      <input type="text" class="form-control mx-sm-2" id="searchName" name="searchName" placeholder="Aranacak adı soyadı girin">
    </div>
    <button type="submit" class="btn btn-primary">Ara</button>
  </form>
</div>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Adı Soyadı</th>
      <th scope="col">Telefonu</th>
      <th scope="col">Güncelle</th>
      <th scope="col">Sil</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once('db.php');

    $searchName = isset($_GET['searchName']) ? $_GET['searchName'] : '';

    if (!empty($searchName)) {
      $SORGU = $DB->prepare("SELECT id, name, telefon FROM users WHERE name LIKE :searchName");
      $SORGU->bindValue(':searchName', "%$searchName%", PDO::PARAM_STR);
      $SORGU->execute();
      $users = $SORGU->fetchAll(PDO::FETCH_ASSOC);

      if (count($users) > 0) {
        echo "<div class='alert alert-info'>Aranan kişinin telefonu: {$users[0]['telefon']}</div>";
      }
    } else {
      $SORGU = $DB->prepare("SELECT id, name, telefon FROM users");
      $SORGU->execute();
      $users = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    }

    foreach ($users as $user) {
      echo "
    <tr>
      <th>{$user['id']}</th>
      <td>{$user['name']}</td>
      <td>{$user['telefon']}</td>
      <td><a href='update.php?id={$user['id']}' class='btn btn-success btn-sm'>Güncelle</a></td>
      <td><a href='delete.php?id={$user['id']}' class='btn btn-danger btn-sm'>Sil</a></td>
    </tr> 
  ";
    }
    ?>
  </tbody>
</table>

<div class='text-center'>
  <a href='index.php' class='btn btn-warning'>ANASAYFAYA DÖN</a>
</div>
