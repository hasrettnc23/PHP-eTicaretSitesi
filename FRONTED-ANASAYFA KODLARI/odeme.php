<?php include 'header.php' ?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>
	<div class="title-bg">
		<div class="title">Ödeme Sayfası</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
		
			<form action="nedmin/netting/islemsiparis.php" method="POST">
				<tbody>
				<?php
$kullanici_id = $kullanicicek['kullanici_id'];
$sepetsor = $db->prepare("SELECT * FROM sepet WHERE kullanici_id = :id");
$sepetsor->execute(array(
    'id' => $kullanici_id
));

$toplam_fiyat = 0; // Toplam fiyatı saklamak için değişkeni tanımladık
?>

<div class="table-responsive">
    <table class="table table-bordered chart">
        <thead>
            <tr>
                <th>Remove</th>
                <th>Ürün Resim</th>
                <th>Ürün ad</th>
                <th>Ürün Kodu</th>
                <th>Adet</th>
                <th>Toplam Fiyat</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {
            $urun_id = $sepetcek['urun_id'];
            $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id = :urun_id");
            $urunsor->execute(array(
                'urun_id' => $urun_id
            ));

            $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

            $urun_fotografsor = $db->prepare("SELECT * FROM urun_fotograf WHERE urun_id = :urun_id ORDER BY urunfotograf_id ASC");
            $urun_fotografsor->execute(array(
                'urun_id' => $urun_id
            ));

            while ($urun_fotografcek = $urun_fotografsor->fetch(PDO::FETCH_ASSOC)) {
                $toplam_fiyat += $uruncek['urun_fiyat'] * $sepetcek['urun_adet']; // Toplam fiyatı güncelliyoruz
        ?>
            <tr>
                <td><form><input type="checkbox"></form></td>
                <td><img src="<?php echo $urun_fotografcek['urunfoto_resimyol']; ?>" width="100" alt=""></td>
                <td><?php echo $uruncek['urun_ad'] ?></td>
                <td><?php echo $uruncek['urun_id'] ?></td>
                <td><form><input type="text" class="form-control quantity" value="<?php echo $sepetcek['urun_adet'] ?>"></form></td>
                <td><?php echo $uruncek['urun_fiyat'] ?></td>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- Diğer içerikler buraya gelebilir -->
    </div>
    <div class="col-md-3 col-md-offset-3">
        <div class="subtotal-wrap">
            <div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $toplam_fiyat ?> TL</span></div>
            <div class="clearfix"></div>
            <!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
        </div>
        <div class="clearfix"></div>
    </div>
</div>

		<div class="tab-review">
			<ul id="myTab" class="nav nav-tabs shop-tab">

				<li class="active"><a href="#desc" data-toggle="tab">Kredi Kartı</a></li>
				<li><a href="#rev" data-toggle="tab">Banka Havalesi </a></li>
			</ul>




			<div id="myTabContent" class="tab-content shop-tab-ct">
				

				<div class="tab-pane fade active in" id="desc">
					<p>
					<!DOCTYPE html>
					<html>
					<head>
						<style>
							body {
								font-family: Arial, sans-serif;
								background-color: #f5f5f5;
							}

							h1 {
								text-align: center;
								color: #333;
							}

							label {
								display: block;
								margin-bottom: 5px;
								color: #666;
							}

							input[type="text"],
							input[type="number"] {
								width: 100%;
								padding: 10px;
								border: 1px solid #ccc;
								border-radius: 4px;
								box-sizing: border-box;
							}

							.card-details {
								margin-bottom: 20px;
							}

							.card-number {
								display: flex;
							}

							.card-number input[type="text"] {
								flex-grow: 1;
								margin-right: 10px;
							}

							.card-expiration {
								display: flex;
							}

							.card-expiration input[type="text"] {
								flex-grow: 1;
								margin-right: 10px;
							}

							.card-cvv {
								display: flex;
								justify-content: space-between;
							}

							.card-cvv input[type="text"] {
								flex-grow: 1;
								margin-right: 10px;
							}

							input[type="submit"] {
								display: block;
								width: 100%;
								padding: 10px;
								background-color: #4CAF50;
								color: #fff;
								border: none;
								border-radius: 4px;
								cursor: pointer;
								font-weight: bold;
							}

							input[type="submit"]:hover {
								background-color: #45a049;
							}
						</style>
					</head>
					<body>
						<div class="container">
							<h1>Kredi Kartı ile Ödeme</h1>
							<form method="POST" action="nedmin/netting/islemkredi.php">
								<?php
								$kredisor = $db->prepare("SELECT * FROM kredi_karti ORDER BY kredi_id");
								$kredisor->execute();

								while ($kredicek = $kredisor->fetch(PDO::FETCH_ASSOC)) {
									?>
									<div class="card-details">
										<label for="cardNumber">Kredi Kartı Numarası:</label>
										<div class="card-number">
											<input type="text" name="kartnumarasi" value="<?php echo $kredicek['kartnumarasi'] ?>">
										</div>
									</div>
									<div class="card-details">
										<label>Son Kullanma Tarihi:</label>
										<div class="card-expiration">
											<input type="text" name="ay" value="<?php echo $kredicek['ay'] ?>" placeholder="Ay" required>
											<input type="text" name="yil" value="<?php echo $kredicek['yil'] ?>" placeholder="Yıl" required>
										</div>
									</div>
									<div class="card-details">
										<label for="cvv">CVV:</label>
										<div class="card-cvv">
											<input type="text" id="cvv" name="cvv" value="<?php echo $kredicek['cvv'] ?>" required>
										</div>
									</div>
									<div class="card-details">
										<label for="amount">Ödeme Tutarı:</label>
										<div class="amount-input">
											<input type="number" id="odeme" name="odeme" value="<?php echo $kredicek['odeme'] ?>" min="0" step="0.01" required>
										</div>
									</div>
								<?php } ?>
								<input type="submit" class="btn btn-success" name="kredikartisiparisekle" value="Ödemeyi Tamamla">
							</form>
						</div>
					</body>
					</html>
					</p>
				</div>


				<div class="tab-pane fade " id="rev">


					<p>Ödeme yapacağınız hesap numarasını seçerek işlemi tamamlayınız.</p>


					<?php 

					$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
					$bankasor->execute();

					while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>

					
					<input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_ad'] ?>">
					<?php echo $bankacek['banka_ad']; echo " "; echo $bankacek['banka_iban'];  ?><br>


					

					<?php } ?>

					<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
					<input type="hidden" name="siparis_toplam" value="<?php echo $toplam_fiyat ?>">
					<hr>
					<button class="btn btn-success" type="submit" name="bankasiparisekle">Sipariş Ver</button>

				</form>

			</div>


		</div>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php' ?>