
<div class="">
    <?php $this->load->view('tree_page',$daftar_kategori2);?>
</div>
<?php //echo var_dump($daftar_produk); ?>
<div class="container"  style="width:85%;float:left">
    <div class='sorting panel'>
        <p ><h4>Atur berdasarkan</h4></p>
        <p><select name="sortby" class="form">
            <option value=" ">Pilih</option>
            <option value="harga-min">Harga terendah</option>
            <option value="harga-max">Harga tertinggi</option>
            <option value="nama">Nama barang</option>
            <option value="terbaru">Baru ditambahkan</option>
        </select></p>
    </div>
  <div class="all-product">
    <?php if($daftar_produk==null)
      echo "<h4>Produk tidak ditemukan</h4>";?>
    <?php foreach($daftar_produk as $produk) {?>
        <a href="<?php echo site_url('dashboard/konten/'.$produk->id_kategori.'/'.$produk->id_barang);?>">
            <li class="product hovereffect">
                <img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
                <br>
                <div>
                    <a style="color:black" href="<?php echo site_url('dashboard/konten/'.$produk->id_kategori.'/'.$produk->id_barang);?>">
                    <strong><?php echo $produk->nama; ?></strong></a><br>
                    <?php foreach ($daftar_kategori2 as $kategori) {
                        foreach ($kategori['sub_categories'] as $sub1) {
                            if($sub1['id_kategori']==$produk->id_kategori)
                                echo $kategori['nama_kategori']."-".$sub1['nama_kategori'];
                            foreach ($sub1['sub_categories'] as $sub2) {
                                if($sub2['id_kategori']==$produk->id_kategori)
                                    echo $kategori['nama_kategori']."-".$sub1['nama_kategori']."-".$sub2['nama_kategori'];
                            }
                        }
                    }?><br/><br/>
                    <?php echo "Rp. ";
                        echo number_format($produk->harga,2);?>
                </div>
                <div class="overlay">
                   <a class="info" href="<?php echo site_url('dashboard/konten/'.$produk->id_kategori.'/'.$produk->id_barang);?>">Lihat produk</a>
                </div>
            </li>
        </a>
    <?php } ?><!-- 
  </div>
  <div class="pagination">
    <ul>
        <?php foreach ($links as $link) {
            echo "<li>".$link."</li>";
        } ?>
    </ul>
  </div> -->
</div>