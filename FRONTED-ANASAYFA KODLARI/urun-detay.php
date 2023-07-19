
<?php 

include 'header.php'; 

$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
$urunsor->execute(array(
	'urun_id' => $_GET['urun_id']
	));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

echo$say=$urunsor->rowCount();

if ($say==0) {
	
	header("Location:index.php?durum=Bosunakurcalama");
	exit;
}
?>

<head>

    <title> <?php echo $uruncek['urun_ad']?> </title>

	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
</head>


<?php
if (isset($_GET['durum']) && $_GET['durum'] == "ok") {
    echo '<script type="text/javascript">
    alert("Yorum Başarıyla Eklendi");
    </script>';
}
?>




<div class="container">
	
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad'] ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">

              <?php

			    $urun_id=$uruncek['urun_id'];
				$urun_fotografsor=$db->prepare("SELECT * FROM urun_fotograf where urun_id=:urun_id order by urunfoto_sira ASC limit 1");
                $urun_fotografsor->execute(array(
                  'urun_id' => $urun_id
				));

				$urun_fotografcek = $urun_fotografsor->fetch(PDO::FETCH_ASSOC);?>
                
					<div class="dt-img">
	<div class="detpricetag"><div class="inner"><?php echo $uruncek['urun_fiyat'] ?> TL</div></div>
	<a class="fancybox" href="<?php echo $urun_fotografcek['urunfoto_resimyol']?> " data-fancybox-group="gallery"
 title="Cras neque mi, semper leon"><img src="<?php echo $urun_fotografcek['urunfoto_resimyol']?>" alt="" class="img-responsive"></a>
					</div>

					<?php
					$urun_id=$uruncek['urun_id'];
					$urun_fotografsor=$db->prepare("SELECT * FROM urun_fotograf where urun_id=:urun_id order by urunfoto_sira ASC limit 1,3 ");
					$urun_fotografsor->execute(array(
						'urun_id' => $urun_id
						));

					while($urun_fotografcek=$urun_fotografsor->fetch(PDO::FETCH_ASSOC)) {

					?>

					<div class="thumb-img">
<a class="fancybox" href="<?php echo $urun_fotografcek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" 
title="Cras neque mi, semper leon"><img src="<?php echo $urun_fotografcek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
					</div>

					<?php } ?>

					
				</div>
				<div class="col-md-6 det-desc">
					<div class="productdata">
						<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id']; ?></span></div>
						<div class="infospan">Ürün Fiyat <span><?php echo $uruncek['urun_fiyat']; ?></span></div>




						<div class="clearfix"></div>
						<hr>


						<form action="nedmin/netting/sepetislem.php" method="POST">

						<div class="form-group">
							<label for="qty" class="col-sm-2 control-label">Adet</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="1" name="urun_adet">
							</div>
							<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

										<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
							<div class="col-sm-4">

							<?php if (isset($_SESSION['userkullanici_mail'])) {?>

								<button type="submit" name="sepetekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
								<?php  } else { ?>

                           <button type="submit" name="sepetekle" disabled class="btn btn-default btn-red btn-sm"><span class="addchart">Giriş Yapın</span></button>

                          <?php } ?>
							
							
							</div>
							<div class="clearfix"></div>
						</div>

						</form>

						<div class="sharing">
							<div class="share-bt">
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
								<div class="clearfix"></div>
							</div>


							<div  class="avatock"><span>

								<?php if ($uruncek['urun_stok']>=1) {

									echo "Stok Adeti : ".$uruncek['urun_stok'];
								} else {

									echo "Ürün Kalmadı";
								} ?>

							</span></div>
						</div>



					</div>
				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					

	<li <?php if (isset($_GET['durum']) && $_GET['durum'] != "ok") { ?>
    class="active"
<?php } ?>><a href="#desc" data-toggle="tab">Açıklama</a></li>

             <li <?php if (isset($_GET['durum']) && $_GET['durum'] == "ok") { ?>
                        class="active"
                        <?php } ?>


						<?php 
						$kullanici_id=$kullanicicek['kullanici_id'];
						$urun_id=$uruncek['urun_id'];
						$yorumsor=$db->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay");
						$yorumsor->execute(array(
							'urun_id' => $urun_id,
							'yorum_onay' => 1
                        ));

							?>
							><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $yorumsor->rowCount(); ?>)</a></li>
							<li class=""><a href="#video" data-toggle="tab">Ürün Video</a>
             </li>
						</ul>




						<div id="myTabContent" class="tab-content shop-tab-ct">
							<div class="tab-pane fade <?php if ($_GET['durum']!="ok") {?>
								active in
								<?php } ?>" id="desc">
								<p>
									<?php echo $uruncek['urun_detay'] ?>
								</p>
							</div>


							<div class="tab-pane fade <?php if ($_GET['durum']=="ok") {?>
								active in
								<?php } ?>" id="rev">


								<?php 




								while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {

									$kullanici_id=$yorumcek['kullanici_id'];

									$guncelle=$db->prepare("SELECT * FROM kullanicilar where kullanici_id=:id");
									$guncelle->execute(array(
										'id' => $kullanici_id
										));

									$kullanicicek=$guncelle->fetch(PDO::FETCH_ASSOC);
									?>



									<!-- Yorumları Dökeceğiz -->
									<p class="dash">
										<span><?php echo $kullanicicek['kullanici_adsoyad'] ?></span> (<?php echo $yorumcek['yorum_zaman'] ?>)<br><br>
										<?php echo $yorumcek['yorum_detay'] ?>
									</p>

									<!-- Yorumları Dökeceğiz -->

									<?php } ?>


									<h4>Yorum Yazın</h4>

			<form action="nedmin/netting/yorumislem.php" method="POST" role="form">

									<?php if (isset($_SESSION['userkullanici_mail'])) {?>

										<div class="form-group">
											<textarea name="yorum_detay" class="form-control" placeholder="Lütfen yorumunuzu buraya yazınız..." id="text"></textarea>
										</div>

										<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

										<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">

										<input type="hidden" name="gelen_url" value="<?php 
										echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; 

										?>">

										

										<button type="submit" name="yorumkaydet" class="btn btn-default btn-red btn-sm">Yorumu Gönder</button>
									</form>

									<?php } else {?>

									Yorum yazabilmek için <a style="color:red" href="nedmin/production/register.php">kayıt</a> olmalı yada üyemizseniz giriş yapmalısınız...

									<?php } ?>



								</div>

								<div class="tab-pane fade " id="video">
									<p>


										<?php 

										$say=strlen($uruncek['urun_video']);

										if ($say>0) {?>

										<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $uruncek['urun_video'] ?>" frameborder="0" allowfullscreen></iframe>

										<?php } else {

											echo "Bu ürüne video eklenmemiştir";

										}

										?>
									</p>
								</div>


							</div>
						</div>

						<div id="title-bg">
							<div class="title">Benzer Ürünler</div>
						</div>
						<div class="row prdct"><!--Products-->


							<?php 

							$kategori_id=$uruncek['kategori_id'];

							$urunaltsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by  rand() limit 3");
							$urunaltsor->execute(array(
								'kategori_id' => $kategori_id
								));

							while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)) {

								?>

								<div class="col-md-4">
									<div class="productwrap">
										<div class="pr-img">
											<div class="hot"></div>
											<a href="urun-<?=seo($urunaltcek["urun_ad"]).'-'.$urunaltcek["urun_id"]?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
											<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urunaltcek['urun_fiyat']*1.50 ?> TL</span><?php echo $urunaltcek['urun_fiyat'] ?> TL</span></div></div>
										</div>
										<span class="smalltitle"><a href="product.htm"><?php echo $urunaltcek['urun_ad'] ?></a></span>
										<span class="smalldesc">Ürün Kodu.: <?php echo $urunaltcek['urun_id'] ?></span>
									</div>
								</div>

								<?php } ?>


							</div><!--Products-->
							<div class="spacer"></div>
						</div><!--Main content-->


						<?php include 'sidebar.php' ?>
					</div>
				</div>

				<?php include 'footer.php' ?>