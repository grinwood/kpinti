<div class="container" >
	<div class="all-product">
		<?php  foreach($daftar_kategori as $kategori) {?>
	        <h4 class="kategori"><?php echo $kategori->nama_kategori;?></h4><hr>
	        <?php foreach($daftar_produk as $produk) {?>
	        	<ul>
	                <?php if($kategori->id_kategori==$produk->id_kategori){?>
						<li class="product">
		                    <a href="<?php echo site_url('dashboard/konten/'.$kategori->id_kategori.'/'.$produk->id_barang);?>">
		                    	<img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
							</a><br>
							<a href="<?php echo site_url('dashboard/konten/'.$kategori->id_kategori.'/'.$produk->id_barang);?>">
							<div align='center'>
								<?php echo $produk->nama; ?></a><br>
			                    <?php echo "Rp. ".$produk->harga;?>
			                </div>
						</li>
					<?php }?>
				</ul>
	        <?php } ?>
	    <?php } ?>
	</div>
</div>