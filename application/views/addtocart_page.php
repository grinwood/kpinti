<script type="text/javascript">
    var cboxOptions = {
      width: '500px',
      height: '350px',
      inline :true,
      scrolling   : false,
       }

    jQuery(document).ready(function () {
        jQuery('.tocart').colorbox(cboxOptions);
    });
       
</script>
<div class='form-cart'>
	<object class="img-prod" data="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" type="image/png">
    	<img class="img-prod" src="<?php echo base_url('asset/images/noimage.png');?>"/>
	</object>
	<!--<h3><?php //echo $kategori->nama_kategori; ?></h3>-->
	<h3><?php echo $produk->nama;?></h3>
	<p><?php echo $produk->deskripsi;?></p>
	<p><?php echo $produk->jumlah;?></p>
	<p><?php echo $produk->harga;?></p>
</div>