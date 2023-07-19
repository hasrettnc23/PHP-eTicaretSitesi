<head>
    <title>Hakkımızda Sayfası</title>
</head>

<?php include 'header.php';

$hakkimizda_ayar=$db->prepare ("SELECT * FROM hakkimizda_ayar where id=0");
$hakkimizda_ayar->execute();
$hakabout=$hakkimizda_ayar->fetch(PDO::FETCH_ASSOC);
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle">Hakkımızda</div>
						</div>
						
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">  <!--Main content-->

            <div class="title-bg">
					<div class="title"> Tanıtım Videosu</div>
		    </div>

<!-- asagıda src'nin sonundaki videonun kimlik adresi bunu arkaplandan cekmek için şöyle yapabilirsin!

<iframe width="560" height="315" src="https://www.youtube.com/embed/ <?//php echo $hakabout['video']; ?>"  
title="YouTube

-->

<iframe width="560" height="315" src="https://www.youtube.com/embed/12eHPGr2TaE" title="YouTube
     video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;
      gyroscope; picture-in-picture; web-share" allowfullscreen>
</iframe>

            <div class="title-bg">
					<div class="title"> Misyon </div>
		    </div>
             <blockquote> <?php echo $hakabout['misyon']; ?> </blockquote>

            <div class="title-bg">
					<div class="title"> Vizyon </div>
		    </div>
            <blockquote> <?php echo $hakabout['vizyon']; ?> </blockquote>
            <div class="title-bg">
					<div class="title"> <?php echo $hakabout['baslik']; ?> </div>
		    </div>

				<div class="page-content">
					<p>
                    <?php echo $hakabout['icerik']; ?>
					</p>
				</div>

			</div>
	

<!-- Sidebar buraya gelecek -->
<?php include 'sidebar.php'; ?>

		</div>
		<div class="spacer"></div>
	</div>


   <?php include 'footer.php' ;?>
