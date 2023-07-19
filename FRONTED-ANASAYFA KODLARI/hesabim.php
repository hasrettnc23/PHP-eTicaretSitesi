<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islemkullanici.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
				</div>

				<?php 
if (isset($_GET['durum'])) {
    if ($_GET['durum'] == "farklisifre") {
        echo '<div class="alert alert-danger">
                  <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
              </div>';
    } elseif ($_GET['durum'] == "eksiksifre") {
        echo '<div class="alert alert-danger">
                  <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
              </div>';
    } elseif ($_GET['durum'] == "mukerrerkayit") {
        echo '<div class="alert alert-danger">
                  <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
              </div>';
    } elseif ($_GET['durum'] == "basarisiz") {
        echo '<div class="alert alert-danger">
                  <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
              </div>';
    }
}
?>

				<div class="form-group dob">
					<div class="col-sm-12">
<input type="text" class="form-control"  required="" placeholder="Ad Soyad"  name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
					</div>
				</div>
				
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control"  placeholder="İl"  name="kullanici_il"    value="<?php echo $kullanicicek['kullanici_il'] ?>">
					</div>

					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="İlçe" name="kullanici_ilce"   value="<?php echo $kullanicicek['kullanici_ilce'] ?>">
					</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="Adres"   required="" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres'] ?>">
					</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control"   placeholder="TC Kimlik Numarası" name="kullanici_tc"    value="<?php echo $kullanicicek['kullanici_tc'] ?>">
					</div>

					<div class="col-sm-6">
						<input type="text" class="form-control"  placeholder="Gsm" name="kullanici_gsm"   value="<?php echo $kullanicicek['kullanici_gsm'] ?>">
					</div>
				</div>


				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



				<button type="submit" name="kullanicibilgiguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><a href="sifre-guncelle"><img width="180" src="dimg/Şifremi-Unuttum.png"></a></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>