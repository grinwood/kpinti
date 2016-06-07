<div class="container" >
	<div class="all-product">
		<?php foreach($daftar_result as $produk) {?>
        	<ul>         
				<li class="product">
                    <a href="">
                    	<img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
					</a><br>
					<a href="">
					<div align='center'>
						<?php echo $produk->nama; ?></a><br>
	                    <?php echo "Rp. ".$produk->harga;?>
	                </div>
				</li>
			</ul>
        <?php } ?>
	</div>
</div>