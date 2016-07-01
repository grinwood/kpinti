
<div class="">
	<?php $this->load->view('tree_page',$daftar_kategori2);?>
</div>
<div class="container"  style="width:85%;float:left">
	<div class="all-product">
		<?php  foreach($daftar_kategori2 as $kategori) {?>
			<div style="clear:both">
		        <!--<label ><?php echo $kategori['nama_kategori'];?></label>
		        <strong style="float:right"><a href="<?php echo site_url('produk/kategoriView/'.$kategori['id_kategori']);?>">Lihat semua</a></strong>--><hr>
		        <?php $i=1;?>
		        <?php foreach ($daftar_produk as $produk) {?>
		        <?php if($i==6)break; ?>
					<?php if($kategori['id_kategori']==$produk->id_kategori){?>
					<?php $i++;?>
						<a href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">
							<li class="product hovereffect">
		                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
								<br>
								<div>
									<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">
									<strong><?php echo $produk->nama; ?></strong></a><br>
									<?php echo $kategori['nama_kategori'];?><br/><br/>
				                    <?php echo "Rp. ";
					                 	echo number_format($produk->harga,2);?>
				                </div>

						        <div class="overlay">
						           <a class="info" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">Lihat produk</a>
						        </div>
							</li>
						</a>
					<?php }?>
					<?php foreach ($kategori['sub_categories'] as $sub1){?>
						<ul>
			                <?php if($sub1['id_kategori']==$produk->id_kategori){?>
			                <?php $i++;?>
								<a href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">
									<li class="product hovereffect">
				                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
										<br>
										<div>
											<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">
											<strong><?php echo $produk->nama; ?></strong></a><br>
											<?php echo $kategori['nama_kategori']."-".$sub1['nama_kategori'];?><br/><br/>
						                    <?php echo "Rp. ";
							                 	echo number_format($produk->harga,2);?>
						                </div>

								        <div class="overlay">
								           <a class="info" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">Lihat produk</a>
								        </div>
									</li>
								</a>
							<?php }?>
						</ul>
						<?php foreach ($sub1['sub_categories'] as $sub2){?>
		        			<ul>
				                <?php if($sub2['id_kategori']==$produk->id_kategori){?>
				                <?php $i++;?>
									<a href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">
										<li class="product hovereffect">
					                  		<img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
											<br>
											<div>
												<a style="color:black" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">
												<strong><?php echo $produk->nama; ?></strong></a><br>
												<?php echo $kategori['nama_kategori']."-".$sub1['nama_kategori']."-".$sub2['nama_kategori'];?><br/><br/>
							                    <?php echo "Rp. ";
							                    echo number_format($produk->harga,2);?>
							                </div>

									        <div class="overlay">
									           <a class="info" href="<?php echo site_url('dashboard/konten/'.$kategori['id_kategori'].'/'.$produk->id_barang);?>">Lihat produk</a>
									        </div>
										</li>
									</a>
								<?php }?>
							</ul>
		        		<?php }?>
					<?php }?>
				<?php }?>		        
		    </div>
	    <?php } ?>
	</div>
</div>