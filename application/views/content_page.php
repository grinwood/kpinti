<div class="container" style="margin-top:50px">
  <hr>
   <div class="panel panel-success">
        <div class="panel-heading">
            <?php $kategori; ?>
            <h3 class="panel-title"><?php echo $kategori->nama_kategori; ?></h3>
        </div> 
        <div class="panel-body">
        <td> <h3><?php echo $produk->nama;?></h3>
          <img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
        </td><br><br>
        <?php
           $produk; 
           echo "<label>Harga: Rp. </label> ".$produk->harga."<br>";
           echo "<label>Jumlah: </label> ".$produk->jumlah."<br>";
           echo "<label>Deskripsi: </label> ".$produk->deskripsi."<br>";
        ?>
        <br> <a href="<?php echo site_url('cart/tambahBarang/'.$username.'/'.$produk->id_barang);?>"><button class="btn btn-success">Add to Chart</button></a></br>
  </div>
</div>