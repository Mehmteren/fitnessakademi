<form action ="" method="POST">
    ADI <input type='text' name='adi'> <br>
    ePosta <input type='text' name='eposta'> <br>
    <input type='submit' value='KAYIT EKLE'> <br>

</form>

<?php

if(isset($_POST['adi'])) {

require "veribaglanti.php";

$name  = $_POST['adi'];
$email = $_POST['eposta'];

$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$SORGU = $DB->prepare($sql); //sorgu hazırlama

$SORGU->bindParam(':name', $name); //değişkenleri bağlıyoruz boyle daha guvenli
$SORGU->bindParam(':email', $email);

$SORGU->execute();
echo "User created";
}