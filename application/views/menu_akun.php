<h2 class="text-center">Data Akun</h2>
<hr>
<div>
    <div class="sidemenu">
        <ul>
            <li><a href="">Akun Saya</a></li><hr>
            <li><a href="">Barang Saya</li></a><hr>
        </ul>
    </div>
    <div class="contentmenu">
        <div id="akun-content">
            <img class="img-prod" src="<?php echo base_url('uploads/'.$produk->nama_gbr);?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimageuser.png'">
            <div style="margin-left:10px">
                <p>Username: <?php echo $username;?></p>
                <?php echo form_open('penjual/ubahPassword');?>
                <p style="float:left"><input  type='password' name='password' placeholder='Ubah Password' class='form-control'/></p>
                <p style="float:left"><input  type="submit" value="Ubah" class="btn btn-success" /></p>
                <?php echo form_close();?>
            </div>
        </div>
        <div id="barang-content">
        </div>
    </div>
</div>