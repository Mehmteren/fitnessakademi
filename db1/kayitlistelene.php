<?php

require "veribaglanti.php";


$SORGU = $DB->prepare("SELECT id, name, email FROM users");
$SORGU->execute();
$users = $SORGU->fetchAll(PDO::FETCH_ASSOC); // Bu satır, çekilen verileri bir diziye dönüştürür ve $users adlı bir değişkene atar. 
//echo '<pre>'; print_r($users);

foreach($users as $user) {
    echo " {$user['id']} : {$user['name']}, {$user['email']} <br>";
}
