<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="register.css">
</head>

<body>
    <div class="container">
        <h2>Kullanıcı Kaydı</h2>

		<form action="../netting/islemkullanici.php" method="POST">


		<?php 
if (isset($_GET['durum'])) {
    $durum = $_GET['durum'];

    if ($durum == "farklisifre") {
?>
        <div class="alert alert-danger">
            <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
        </div>
<?php
    } elseif ($durum == "eksiksifre") {
?>
        <div class="alert alert-danger">
            <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
        </div>
<?php
    } elseif ($durum == "mukerrerkayit") {
?>
        <div class="alert alert-danger">
            <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
        </div>
<?php
    } elseif ($durum == "basarisiz") {
?>
        <div class="alert alert-danger">
            <strong>Hata!</strong> Kayıt Yapılamadı. Sistem Yöneticisine Danışınız.
        </div>
<?php
    }
}
?>



            <div class="form-group">
                <label for="fullname">Ad ve Soyad:</label>
                <input type="text" name="kullanici_adsoyad"id="fullname" required>
            </div>

            <div class="form-group">
                <label for="fullname">Kullanıcı Adı:</label>
                <input type="text" name="kullanici_adi"id="fullname" required>
            </div>

            <div class="form-group">
                <label for="email">E-posta:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" name="kullanici_passwordone" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Şifre Tekrarı:</label>
                <input type="password" name="kullanici_passwordtwo"id="confirm_password" required>
            </div>
			
            <div class="form-group">
                <input type="submit" name="kullanicikaydet" value="Kayıt Ol">
            </div>
			
<div class="col-md-6 right-side">			
 <div class="col-md-6">
  <div class="title-bg">
    <div class="title" style="text-align: center;">Şifrenizi mi Unuttunuz?</div>
  </div>
</div>
<br>
		
        </form>
    </div>
</body>

</html>
