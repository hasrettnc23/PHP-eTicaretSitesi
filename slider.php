
    <div class="main-slide">
	<div id="sync1" class="owl-carousel">
		<?php 
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();
	while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {
 ?>

	<div class="item">
	<div class="slide-desc">
	<div class="inner">
	</div>
	</div>
	<div class="slide-type-1">
<a href="<?php echo $slidercek['slider_link'] ?>"><img src="<?php echo $slidercek['slider_resimyol'] ?>" alt="" class="img-responsive"></a>
	</div>
	</div>
<?php } ?>
	</div>
</div>

		