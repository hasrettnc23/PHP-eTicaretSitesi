		<div class="col-md-3"><!--sidebar-->

		<div class="title-bg">
				<div class="title" style="text-align: center;">KATEGORİLER</div>
				</div>
				
				<div class="categorybox">
					<ul>
					
						<?php 
			$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
			$kategorisor->execute();
			while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
			
			<li><a href="kategori-<?=seo($kategoricek["kategori_ad"]) ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>

			<?php } ?>
	
					</ul>
				</div>

				</br>
</br>
</br>

				<div class="title-bg">
					<div class="title">Fiyat </div>
					</div>
					<div class="categorybox-2">
					<ul>
				
						<li><a href="category.htm">100 TL- 1.000 TL</a></li>
						<li><a href="category.htm">1.000 TL- 2.500 TL</a>
						<li><a href="category.htm">2.500 TL-5.000 TL</a></li>
						<li><a href="category.htm">5.000 TL- 10.000 TL</a>
						<li><a href="category.htm">10.000 TL-20.000 TL</a></li>
						</ul>
				</div>

			</div>
					</ul>
				</div>
				
			</div><!--sidebar-->