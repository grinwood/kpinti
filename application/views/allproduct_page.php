<div class="container" >
	<div class="all-product">
		<?php  foreach($daftar_kategori as $kategori) {?>
			<div style="clear:both">
		        <h4 class="kategori"><?php echo $kategori->nama_kategori;?></h4><hr>
		        <?php foreach($daftar_produk as $produk) {?>
		        	<ul>
		                <?php if($kategori->id_kategori==$produk->id_kategori){?>
							<a href="<?php echo site_url('dashboard/konten/'.$kategori->id_kategori.'/'.$produk->id_barang);?>">
								<li class="product">
			                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
									<br>
									<div align='center'>
										<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori->id_kategori.'/'.$produk->id_barang);?>">
										<strong><?php echo $produk->nama; ?></strong></a><br>
										<?php echo $kategori->nama_kategori; ?><br>
					                    <?php echo "Rp. ".$produk->harga;?>
					                </div>

								</li>
							</a>
						<?php }?>
					</ul>
		        <?php } ?>
		    </div>
	    <?php } ?>
	</div>
</div>