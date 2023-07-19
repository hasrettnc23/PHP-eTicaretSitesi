


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovArt | Sanat Galerisi</title>

    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div class="container ">
        <div class="logo">
            <img src="https://movartdanza.com/img/logo-movart-color.svg" alt="Logo">
        </div>
        <form action="../netting/islemkullanici.php" method="POST">
            <div class="title">Login</div>
            <div class="input-box">
                <input type="text" name="kullanici_adi" value="<?php echo @$kadi['kullanici_adi']?>" placeholder="Kullanıcı Adı Giriniz..." required>
                <div class="underline"></div>
            </div>
            <div class="input-box">
                <input type="password"  name="parola" value="<?php echo @$kadi['parola']?>" placeholder="Şifrenizi Giriniz..." required>
                <div class="underline"></div>
            </div>
            <div class="input-box button">
                <input type="submit" name="giris" value="Giriş Yap">
            </div>
        </form>
    </div>
</body>
</html>




