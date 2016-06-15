<head>
    <script type="text/javascript">
        jQuery(document).ready(function () {          
            $('#add').submit(function (event) {
              dataString = $("#add").serialize();
              $.ajax({
                type:"POST",
                url:"<?php echo site_url('cart/add'); ?>",
                data:dataString,
                success:function (data) {
                    //alert('test');
                }
              });
              event.preventDefault();
              $.colorbox({href:"<?php echo site_url('cart/view/'.$produk->id_barang);?>" ,iframe :true,width: '800px',
              height: '480px',scrolling   : false});
            });
        });
    </script>
</head>
<div class="container" style="margin-top:50px">
  <hr>
   <div class="panel panel-success">
        <div class="panel-heading">
            <?php $kategori; ?>
            <h3 class="panel-title"><?php echo $kategori->nama_kategori; ?></h3>
        </div> 
        <div class="panel-body">
        <h3><?php echo $produk->nama;?></h3>
          <img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'">
        <br><br>
        <?php
           echo "<label>Harga: Rp. </label> ".$produk->harga."<br>";
           echo "<label>Jumlah: </label> ".$produk->jumlah."<br>";
           echo "<label>Deskripsi: </label> ".$produk->deskripsi."<br>";
           echo "<label>Penjual:</label> <a href=''>".$penjual->nama."</a><br>";
           $att =array('id' => 'add'); 
           $id = $produk->id_barang;
           echo form_open('',$att);
            echo form_hidden('id', $produk->id_barang);
            echo form_hidden('name', $produk->nama);
            echo form_hidden('price', $produk->harga)
        ?>
        <br> <a><button class="btn btn-success" input type="submit">Beli</button></a></br>
        <?php echo form_close();?>
      </div>
  </div>
</div>