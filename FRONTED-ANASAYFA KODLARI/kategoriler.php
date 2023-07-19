<?php
include 'header.php';

?>




<div class="container">
    <div class="clearfix"></div>
    <div class="lines"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div class="title-bg">
                <div class="title">Ürünler</div>
                <div class="title-nav">
                    <a href="javascript:void(0);"><i class="fa fa-th-large"></i>grid</a>
                    <a href="javascript:void(0);"><i class="fa fa-bars"></i>List</a>
                </div>
            </div>
            <div class="row prdct"><!--Products-->

    <?php
$sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
$sorgu=$db->prepare("SELECT *  FROM kategori");
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
    $urunsor = $db->prepare("SELECT * FROM urun WHERE kategori_id = :kategori_id ORDER BY urun_id DESC limit $limit,$sayfada");
    $urunsor->execute(array(
        'kategori_id' => $kategori_id
    ));

    $say = $urunsor->rowCount();
} else {
    // Tüm ürünleri almak için sorguyu hazırlama ve çalıştırma
    $urunsor = $db->prepare("SELECT * FROM urun ORDER BY urun_id DESC limit $limit,$sayfada");
    $urunsor->execute();
    $say = $urunsor->rowCount();
}
?>

<head>
    
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

                     			$s=0;

                     			while ($s < $toplam_sayfa) {

                     				$s++; ?>

                     				<?php 

                     				if ($s==$sayfa) {?>

                     				<li class="active">

                     					<a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                     				</li>

                     				<?php } else {?>


                     				<li>

                     					<a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                     				</li>

                     				<?php   }

                     			}

                     			?>

                     		</ul>
                     	</div>




            </div><!--Products-->
        </div>

        <?php include 'sidebar.php'; ?>
    </div>
    <div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>
