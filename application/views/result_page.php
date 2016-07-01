
<div class="">
    <?php $this->load->view('tree_page',$daftar_kategori2);?>
</div>
<?php //echo var_dump($daftar_result); ?>
<div class="container"  style="width:85%;float:left">
	<?php if($this->session->userdata('search')!=null)
    echo "<h4>Hasil pencarian: ".$this->session->userdata('search')."</h4><br>"; ?>
	<div class="all-product">
		<?php if($daftar_result==null)
			echo "<h4>Produk tidak ditemukan</h4>";?>
        <?php if($daftar_result!=null){ ?>
            <div class="sorting container">
                <form id='sorted-form' method = 'post' action="<?php echo site_url('produk/sorting');?>">
                    <label>Atur berdasarkan</label>
                    <select name='sort-by' onchange='this.form.submit()'>
                        <option>Pilih</option>
                        <option value='1'>Terbaru</option>
                        <option value='2'>Harga Terendah</option>
                        <option value='3'>Harga Tertinggi</option>
                    </select>
                    <noscript><input type="submit" value="Submit"></noscript>
                </form>
            </div><hr>
    		<?php foreach($daftar_result as $produk) {?>
                <a href="<?php echo site_url('dashboard/konten/'.$produk['id_kategori'].'/'.$produk['id_barang']);?>">
                    <li class="product hovereffect">
                        <img class="img-prod" src="<?php echo base_url('uploads/'.$produk['nama_gbr']);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
                        <br>
                        <div>
                            <a style="color:black" href="<?php echo site_url('dashboard/konten/'.$produk['id_kategori'].'/'.$produk['id_barang']);?>">
                            <strong><?php echo $produk['nama']; ?></strong></a><br>
                            <?php foreach ($daftar_kategori2 as $kategori) {
                                foreach ($kategori['sub_categories'] as $sub1) {
                                    if($sub1['id_kategori']==$produk['id_kategori'])
                                        echo $kategori['nama_kategori']."-".$sub1['nama_kategori'];
                                    foreach ($sub1['sub_categories'] as $sub2) {
                                        if($sub2['id_kategori']==$produk['id_kategori'])
                                            echo $kategori['nama_kategori']."-".$sub1['nama_kategori']."-".$sub2['nama_kategori'];
                                    }
                                }
                            }?><br/><br/>
                            <?php echo "Rp. ";
                                echo number_format($produk['harga'],2);?>
                        </div>
                        <div class="overlay">
                           <a class="info" href="<?php echo site_url('dashboard/konten/'.$produk['id_kategori'].'/'.$produk['id_barang']);?>">Lihat produk</a>
                        </div>
                    </li>
                </a>
            <?php } ?>
        <?php } ?>
	</div>
</div>