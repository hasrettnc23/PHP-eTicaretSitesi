<?php  include 'header.php'; ?>

<div class="container">

		<div class="clearfix"></div>
		<div class="lines"></div>

		
		<!-- Slider Gelecek -->
		<?php include 'slider.php'; ?>


		</div>
		<div class="f-widget featpro">
	<div class="container">
		<div class="title-widget-bg">
			<div class="title-widget">Öne Çıkan Ürünler</div>
			<div class="carousel-nav">
				<a class="prev"></a>
				<a class="next"></a>
			</div>
		    </div>
		    <div id="product-carousel" class="owl-carousel owl-theme">
			<?php 
	$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_durum = :urun_durum AND urun_onecikar = :urun_onecikar");
	$urunsor->execute(array(
		'urun_durum' => 1,
		'urun_onecikar' => 1
	));
		while($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
	$urun_id = $uruncek['urun_id'];
	$urun_fotografsor = $db->prepare("SELECT * FROM urun_fotograf WHERE urun_id = :urun_id ORDER BY urunfotograf_id DESC LIMIT 1");
	$urun_fotografsor->execute(array(
		'urun_id' => $urun_id
	));
	$urun_fotografcek = $urun_fotografsor->fetch(PDO::FETCH_ASSOC);
		?>
			
			<div class="item">
			<div class="productwrap">
			<div class="pr-img">
			<div class="hot"></div>
<a href="urun-<?php echo seo($uruncek['urun_ad']).'-'.$uruncek['urun_id']; ?>"><img src="<?php echo $urun_fotografcek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
<div class="pricetag blue"><div class="inner"><span><?php echo $uruncek['urun_fiyat']; ?> TL</span></div></div>
			</div>
<span class="smalltitle"><a href="urun-<?php echo seo($uruncek['urun_ad']).'-'.$uruncek['urun_id']; ?>"><?php echo $uruncek['urun_ad']; ?></a></span>
<span class="smalldesc">Ürün Kodu: <?php echo $uruncek['urun_id']; ?></span>
			</div>
			</div>
	<?php } ?>
		    </div>
	        </div>
            </div>

	
	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">Hakkımızda Bilgi</div>
				</div>

				<p class="ct">
					<?php 
					$hakkimizda_ayar=$db->prepare("SELECT * FROM hakkimizda_ayar where id=:id");
					$hakkimizda_ayar->execute(array(
						'id' => 0
						));

					$hakabout=$hakkimizda_ayar->fetch(PDO::FETCH_ASSOC);


					echo substr($hakabout['icerik'],0,1000) ?>
				</p>

				<a href="hakkimizda_ayar" class="btn btn-default btn-red btn-sm">Devamını Oku</a>



				<div class="container">
    <div class="clearfix"></div>
    <div class="lines"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div class="title-bg">
                <div class="title">Ürünler</div>
                
            </div>
            <div class="row prdct"><!--Products-->

            <head>
    <style>
        .pr-img {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 100%; /* 1:1 boyut oranı için %100 */
        }
        
        .pr-img img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover,
            ; /* Görselin boyutunu korurken kırpma yapar */
        }
        
        .pr-img a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
    </style>
</head>

<!-- ... -->



<?php
    $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
    $sorgu=$db->prepare("SELECT * FROM kategori");
    $sorgu->execute();
    $toplam_icerik=$sorgu->rowCount();
    $toplam_sayfa = ceil($toplam_icerik / $sayfada);
    // eğer sayfa girilmemişse 1 varsayalım.
    $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
    if($sayfa < 1) $sayfa = 1; 
    // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
    if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
    $limit = ($sayfa - 1) * $sayfada;

    if (isset($_GET['sef'])) {
        $sef = $_GET['sef'];

        // Kategoriyi almak için sorguyu hazırlama ve çalıştırma
        $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_seourl = :seourl");
        $kategorisor->execute(array(
            'seourl' => $sef
        ));

        $kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);

        $kategori_id = $kategoricek['kategori_id'] ;

        // Seçilen kategorideki ürünleri getirmek için sorguyu hazırlama ve çalıştırma
        $urunsor = $db->prepare("SELECT * FROM urun WHERE kategori_id = :kategori_id ORDER BY RAND() LIMIT $limit,$sayfada");
        $urunsor->execute(array(
            'kategori_id' => $kategori_id
        ));

        $say = $urunsor->rowCount();
    } else {
        // Tüm ürünleri almak için sorguyu hazırlama ve çalıştırma
        $urunsor = $db->prepare("SELECT * FROM urun ORDER BY RAND() LIMIT $limit,$sayfada");
        $urunsor->execute();
        $say = $urunsor->rowCount();
    }
    ?>

    <head>
        <title><?php echo $genelayarlarigetir['title']?></title>
        <title><?php echo $kategoricek['kategori_ad']?></title>
    </head>

    <?php
    if ($toplam_icerik == 0) {
        echo "Bu kategoride ürün bulunamadı";
    }

    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
        $seoUrl = strtolower($uruncek['urun_ad']);
        $seoUrl = str_replace(' ', '-', $seoUrl);

        $urun_id = $uruncek['urun_id'];
        $urun_fotografsor = $db->prepare("SELECT * FROM urun_fotograf WHERE urun_id = :urun_id ORDER BY urunfotograf_id DESC LIMIT 1");
        $urun_fotografsor->execute(array(
            'urun_id' => $urun_id
        ));
        $urun_fotografcek = $urun_fotografsor->fetch(PDO::FETCH_ASSOC);
    ?>

        <div class="col-md-4">
            <div class="productwrap">
                <div class="pr-img">
                    <div class="hot"></div>
                    <a href="urun-<?php echo $seoUrl . '-' . $uruncek["urun_id"]; ?>"><img src="<?php echo $urun_fotografcek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
                    <div class="pricetag on-sale">
                        <div class="inner on-sale">
                            <span class="onsale">
                                <span class="oldprice"><?php echo $uruncek['urun_fiyat'] * 1.50; ?> TL</span>
                                <?php echo $uruncek['urun_fiyat']; ?> TL
                            </span>
                        </div>
                    </div>
                </div>
                <span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad']; ?></a></span>
                <span class="smalldesc">Ürün Kodu: <?php echo $uruncek['urun_id']; ?></span>
            </div>
        </div>

    <?php } ?>

    <div align="right" class="col-md-12">
        <ul class="pagination">
            <?php
            $s = 0;
            while ($s < $toplam_sayfa) {
                $s++;
                if ($s == $sayfa) {
            ?>
                    <li class="active">
                        <a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>




				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->
			<!-- Siderbar buraya gelecek -->
			<?php include 'sidebar.php' ?>
		</div>
	</div>
	
	<?php   include 'footer.php' ?>