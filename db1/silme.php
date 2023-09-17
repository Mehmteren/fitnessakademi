

<form action="" method="POST">
    Silinecek Kullanıcının ID'si: <input type='text' name='sil_id'><br>
    <input type='submit' value='KAYIT SİL'><br>
</form>

<?php

if(isset($_POST['sil_id'])) {


    require "veribaglanti.php";
    
    $id    = $_POST['sil_id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $SORGU = $DB->prepare($sql);
    
    $SORGU->bindParam(':id', $id);
    
    $SORGU->execute();
    
    echo "Silme başarılı";

}
