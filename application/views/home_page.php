<script type="text/javascript">
$('#myCarousel').carousel({
  interval: 4000
});

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>
<div class="container">
	<div class="banner">
		<div class="row" >
			 <div class="banner-1 col-md-12" >

			    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				    <!-- Indicators -->
				    <ol class="carousel-indicators">
				        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				    </ol>

				      <!-- Wrapper for slides -->
				    <div class="carousel-inner">
				        <div class="item active">
				          <img src="<?php echo base_url('asset/images/CA-wp3.jpg');?>" alt="...">
				          <div class="carousel-caption">
				          </div>
				        </div>
				        <div class="item">
				          <img src="<?php echo base_url('asset/images/CA-wp4.jpg');?>" alt="...">
				          <div class="carousel-caption">
				          </div>
				        </div>
				        <div class="item">
				          <img src="<?php echo base_url('asset/images/CA-wp5.jpg');?>" alt="...">
				          <div class="carousel-caption">
				        </div>
				    </div>
			      </div>

			      <!-- Controls -->
			      <!-- <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left"></span>
			      </a>
			      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			      </a> -->
			    </div>

			</div>
			<!-- <div class="col-md-7">
				<div class="row banner-2" >
				     <img class="col-md-12" src="<?php echo base_url('asset/images/CA-wp3.jpg');?>" alt="...">
				</div>
				<div class="row" >
					<img src="" class="col-md-6" style="background-color:yellow;height:200px">
					<img src="" class="col-md-6" style="background-color:#45a;height:200px">
				</div>
				<div class="row" >
					<img src="" class="col-md-6" style="background-color:grey;height:200px">
					<img src="" class="col-md-6" style="background-color:#987;height:200px">
				</div>
			</div> -->
		</div>
	</div><br><br>
</div>  



<div class="container">
	<!--<?php $tmpprod=array(); $i=1;?>
	<?php foreach ($daftar_produk as $produk) { ?>
		<?php foreach ($produk as $prod) { ?>
			<?php if($i<=1) echo '<h3><strong>'.$prod->id_kategori.'</strong></h3> Baru ditambahkan'.
   			'<strong style="float:right"><a href="'.site_url('produk/kategoriView/'.$prod->id_kategori).'">Lihat semua</a></strong><hr>';?>
			<?php $i++;?>
			<a href="<?php echo site_url('dashboard/konten/'.$prod->id_kategori.'/'.$prod->id_barang);?>">
				<li class="product hovereffect">
              		<img class="img-prod" src="<?php echo base_url('uploads/'.$prod->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
					<br>
					<div>
						<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$prod->id_kategori.'/'.$prod->id_barang);?>">
						<strong><?php echo $prod->nama; ?></strong></a><br>
	                    <?php echo "Rp. ";
		                 	echo number_format($prod->harga,2);?><br>
	                </div>

			        <div class="overlay">
			           <a class="info" href="<?php echo site_url('dashboard/konten/'.$prod->id_kategori.'/'.$prod->id_barang);?>">Lihat produk</a>
			        </div>
				</li>
			</a>
		<?php } ?>
	<?php } ?>-->
	<div class="all-product">
		<?php  foreach($daftar_kategori2 as $kategori) {?>
			<div style="clear:both;">
				<br>
		        <?php $i=1;?>
				<?php foreach ($daftar_produk as $produk) {?>
					<?php foreach ($produk as $prod) {?>
						<?php if($i==6)break; ?>
						<?php if($kategori['id_kategori']==$prod->id_kategori){?>
							<?php if($i<=1) echo '<h3><strong>'.$kategori['nama_kategori'].'</strong></h3> Baru ditambahkan'.
			       			'<strong style="float:right"><a href="'.site_url('produk/kategoriView/'.$kategori['id_kategori']).'">Lihat semua</a></strong><hr>';?>
							<?php $i++;?>
							<a href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">
								<li class="product hovereffect">
			                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$prod->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
									<br>
									<div>
										<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">
										<strong><?php echo $prod->nama; ?></strong></a><br>
										<?php echo $kategori['nama_kategori']."-".$sub1['nama_kategori'];?><br/><br/>
					                    <?php echo "Rp. ";
						                 	echo number_format($prod->harga,2);?>
					                </div>

							        <div class="overlay">
							           <a class="info" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">Lihat produk</a>
							        </div>
								</li>
							</a>
						<?php }?>
						<?php foreach ($kategori['sub_categories'] as $sub1){?>
							<ul>
				                <?php if($sub1['id_kategori']==$prod->id_kategori){?>
									<?php if($i<=1) echo '<h3><strong>'.$kategori['nama_kategori'].'</strong></h3> Baru ditambahkan'.
					       			'<strong style="float:right"><a href="'.site_url('produk/kategoriView/'.$kategori['id_kategori']).'">Lihat semua</a></strong><hr>';?>
				                	<?php $i++;?>
									<a href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">
										<li class="product hovereffect">
					                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$prod->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
											<br>
											<div>
												<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">
												<strong><?php echo $prod->nama; ?></strong></a><br>
												<?php echo $kategori['nama_kategori']."-".$sub1['nama_kategori'];?><br/><br/>
							                    <?php echo "Rp. ";
								                 	echo number_format($prod->harga,2);?>
							                </div>

									        <div class="overlay">
									           <a class="info" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">Lihat produk</a>
									        </div>
										</li>
									</a>
								<?php }?>
							</ul>
							<?php foreach ($sub1['sub_categories'] as $sub2){?>
			        			<ul>
					                <?php if($sub2['id_kategori']==$prod->id_kategori){?>
										<?php if($i<=1) echo '<h3><strong>'.$kategori['nama_kategori'].'</strong></h3> Baru ditambahkan'.
						       			'<strong style="float:right"><a href="'.site_url('produk/kategoriView/'.$kategori['id_kategori']).'">Lihat semua</a></strong><hr>';?>
					                	<?php $i++;?>
										<a href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">
											<li class="product hovereffect">
						                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$prod->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
												<br>
												<div>
													<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">
													<strong><?php echo $prod->nama; ?></strong></a><br>
													<?php echo $kategori['nama_kategori']."-".$sub1['nama_kategori']."-".$sub2['nama_kategori'];?><br/><br/>
								                    <?php echo "Rp. ";
								                    echo number_format($prod->harga,2);?>
								                </div>

										        <div class="overlay">
										           <a class="info" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$prod->id_barang);?>">Lihat produk</a>
										        </div>
											</li>
										</a>
									<?php }?>
								</ul>
			        		<?php }?>
						<?php }?>
					<?php } ?>
				<?php }?>		        
		    </div>
	    <?php }?>
	</div> 
</div>
	