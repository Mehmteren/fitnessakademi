<?php
require 'login.kontrol.php';
require 'yetki.kontrol.php';
?>
<h1>KAYIT EKLEME FORMU</h1>

<form method='POST'> 
  <p>user name: <input type='text' name='name'></p>
  <p>user email: <input type='text' name='email'></p>
  <p><input type='submit' value='EKLE'></p>
</form>

<p><a href='index.php'>ANASAYFAYA DÖN</a></p>

<?php

if (isset($_POST['name'])) {

  require_once('db.php');

  $name  = $_POST['name']; //Kullanıcının girdiği ad verisini alır.
  $email = $_POST['email'];

  $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
  $SORGU = $DB->prepare($sql);

  $SORGU->bindParam(':name',  $name);
  $SORGU->bindParam(':email', $email);

  $SORGU->execute();
  echo "User created";
}

// 7-Bu HTML formu, kullanıcının adını ve e-posta adresini girerek bir form göndermesini sağlar. Form verileri POST yöntemiyle sunucuya iletilir. 