<?php
// kullanici_duzenle.php

if (isset($_POST['kullanici_duzenle'])) {
    // Formdan gelen verileri alın
    $kullanici_adsoyad= $_POST['kullanici_adsoyad'];
    $email = $_POST['email'];
    $kullanici_passwordone = $_POST['kullanici_passwordone'];
    $kullanici_passwordtwo = $_POST['kullanici_passwordtwo'];

  
    // Kullanıcının mevcut bilgilerini veritabanından alın
    $guncelle= $db->prepare("SELECT * FROM kullanicilar WHERE email = :email");
    $guncelle->execute(['email' => $email]);
    $user = $guncelle->fetch(PDO::FETCH_ASSOC);

    // Kullanıcının yeni bilgilerini güncelleyin
    $guncelle = $db->prepare("UPDATE kullanicilar SET 
    kullanici_adsoyad= :kullanici_adsoyad,
     email = :email, 
     parola = :parola WHERE
      kullanici_id = :kullanici_id");


    $guncelle->execute(['kullanici_adsoyad' => $kullanici_adsoyad, 'email' => $email, 
    ' parola' => $parola, 'kullanici_id' => $user['kullanici_id']]);


    // Başarılı güncelleme durumunda kullanıcıyı yönlendirin veya bir mesaj gösterin
    header("Location: hesabim.php?durum=basarili");
    exit;
}
?>

