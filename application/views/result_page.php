<div class="container" >
	<div class="all-product">
		<?php foreach($daftar_result as $produk) {?>
        	<ul>         
				<li class="product">
                    <a href="">
                    	<object class="img-prod" data="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" type="image/png">
                    	<img class="img-prod" src="<?php echo base_url('asset/images/noimage.png');?>"/>
						</object>
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