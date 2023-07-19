<div class="f-widget"><!--footer Widget-->
		<div class="container">
			<div class="row">
				<div class="col-md-4"><!--footer twitter widget-->
					<div class="title-widget-bg">
						<div class="title-widget">Müşteri Hizmetleri</div>
					</div>
					<ul class="tweets">
						<li> Bize Ulaşın 
					</li>
						<li class="lastone"> Sipariş ve Gönderim
					 <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
					</ul>
					<ul class="tweets">
						<li> İptal ve İade Koşulları
				 <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
						<li class="lastone"> Sıkça Sorulan Sorular
						<span>10 minute ago</span></li>
					</ul>
					<div class="clearfix"></div>
					<a href="#" class="btn btn-default btn-follow"><i class="fa fa-twitter fa-2x"></i><div>Bizi Twitter'dan takip edin</div></a>
				</div><!--footer twitter widget-->
				<div class="col-md-4"><!--footer newsletter widget-->
					<div class="title-widget-bg">	
					</div>		
<?php  
$iletisim_ayar=$db->prepare("SELECT * FROM iletisim_ayar where id=1");
$iletisim_ayar->execute();
$iletisimgetir=$iletisim_ayar->fetch(PDO::FETCH_ASSOC);
?>
				</div><!--footer newsletter widget-->
				<div class="col-md-4"><!--footer contact widget-->
					<div class="title-widget-bg">
						<div class="title-widget-cursive">Shopping</div>
					</div>
					<ul class="contact-widget">		
<li class="fphone"> <?php echo $iletisimgetir['tel'];?>  <br> <?php echo $iletisimgetir['faks'];?></li>
<li class="fmobile"><?php echo $iletisimgetir['gsm'];?><br><?php echo $iletisimgetir['gsm'];?></li>
<li class="fmail lastone"><?php echo $iletisimgetir['mail'];?></li>
					</ul>
				</div><!--footer contact widget-->
			</div>
			<div class="spacer"></div>
		</div>
	</div><!--footer Widget-->
	<div class="footer"><!--footer-->
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<ul class="footermenu"><!--footer nav-->
						<li><a href="index.php">Anasayfa</a></li>
						<li><a href="sepet.php">Sepetim</a></li>
						<li><a href="logout.php">Çıkış Yapın</a></li>
						<li><a href="siparislerim.php">Tamamlanan Siparişler</a></li>
						<li><a href="contact.htm">Bize Ulaşın</a></li>
					</ul><!--footer nav-->
<?php  
  $genel_ayar=$db->prepare("SELECT * FROM genel_ayar where id=0");
  $genel_ayar->execute();
  $genelayarlarigetir=$genel_ayar->fetch(PDO::FETCH_ASSOC);
  ?>
<div class="f-credit">&copy;<?php echo $genelayarlarigetir['author'] ?> <a href="http:505.movart.com
">www.movart.com </a></div>
					<a href=""><div class="payment visa"></div></a>
					<a href=""><div class="payment paypal"></div></a>
					<a href=""><div class="payment mc"></div></a>
					<a href=""><div class="payment nh"></div></a>
				</div>
				<div class="col-md-3"><!--footer Share-->
					<div class="followon">Bizi Takip Edin</div>
					<div class="fsoc">
	<?php   
$sosyal_ayar=$db->prepare("SELECT * FROM sosyal_ayar where id=1"); 
$sosyal_ayar->execute();
$sosyalayarlar=$sosyal_ayar->fetch(PDO::FETCH_ASSOC);
?>
<a href="http:// <?php echo $sosyalayarlar['twitter'] ?>" class="ftwitter">Twitter</a>				
<a href= "http:// <?php echo $sosyalayarlar['facebook'] ?>" class="ffacebook">Facebook</a>
<a href= "http:// <?php echo $sosyalayarlar['youtube'] ?>"class="fflickr">Youtube</a>
<a href= "http:// <?php echo $sosyalayarlar['google'] ?>" class="ffeed">Google</a>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div><!--footer Share-->
</div>
</div>
</div><!--footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap\js\bootstrap.min.js"></script>
	
	<!-- map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
	<script type="text/javascript" src="js\jquery.ui.map.js"></script>
	<script type="text/javascript" src="js\demo.js"></script>
	
	<!-- owl carousel -->
    <script src="js\owl.carousel.min.js"></script>
	
	<!-- rating -->
	<script src="js\rate\jquery.raty.js"></script>
	<script src="js\labs.js" type="text/javascript"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- fancybox -->
    <script type="text/javascript" src="js\product\jquery.fancybox.js?v=2.1.5"></script>
	
	<!-- custom js -->
    <script src="js\shop.js"></script>
	</div>
  </body>
</html>

