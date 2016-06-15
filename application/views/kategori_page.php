<div class="container" >
  <div class="all-product-">
      <?php foreach($produk as $_produk) {?>
        <ul>
          <li class="product">
            <a href="<?php echo site_url('dashboard/konten/'.$_produk->id_kategori.'/'.$_produk->id_barang);?>">
              <img class="img-prod" src="<?php echo base_url('uploads/'.$_produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
            </a><br>
            <a href="<?php echo site_url('dashboard/konten/'.$_produk->id_kategori.'/'.$_produk->id_barang);?>">
            <div align='center'>
              <?php echo $_produk->nama; ?></a><br>
              <?php echo "Rp. ".$_produk->harga;?>
            </div>
          </li>
        </ul>
      <?php } ?>
  </div>
</div>