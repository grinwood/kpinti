<script type="text/javascript">
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    <?php
        if ($sumber == 'akun'){
            ?>
                $("div.bhoechie-tab-menu>div.list-group>a.list-akun").addClass('active');
                $("div.bhoechie-tab>div.akun-content").addClass("active");
            <?php
        }else if($sumber == 'barang'){
            ?>
                $("div.bhoechie-tab-menu>div.list-group>a.list-barang").addClass('active');
                $("div.bhoechie-tab>div.barang-content").addClass("active");
            <?php
        }
    ?>
});
</script>
<h2 class="text-center">Data Akun</h2>
<hr>
<div class="akun">
    <div class="row">
        <div class="bhoechie-tab-menu">
          <div class="list-group">
            <a href="#" class="list-group-item list-akun">
              <h4 class="glyphicon glyphicon-user"></h4> Akun Saya
            </a>
            <a href="#" class="list-group-item list-barang">
              <h4 class="glyphicon glyphicon-list"></h4> Barang Saya
            </a>
          </div>
        </div>
        <div class="bhoechie-tab-container">
            <div class="bhoechie-tab">
                <div class="bhoechie-tab-content akun-content">
                    <div class="info-akun">
                        <h3>Informasi Akun</h3><br/>
                        <?php echo form_open('penjual/ubahPassword');?>
                        <p><label>Username: </label><br><?php echo $user->username;?></p>
                        <p style="float:left"><input type='password' name='password' placeholder='Ubah Password' size="40%" class='form-control'/></p>
                        <p style="float:left;margin-left:5px"><input  type="submit" value="Ubah" class="btn btn-success" /></p>
                        <?php echo form_close();?>
                    </div>
                    <div class="info-identitas">
                        <h3>Identitas Akun</h3><br/>
                        <?php echo form_open('penjual/ubahProfil');?>
                        <label>Nama Lengkap</label><input  type='text' name='nama' value="<?php echo $user->nama;?>" class='form-control'/>
                        <label>Email</label><input type="email" value="<?php echo $user->email;?>" name="email" class="form-control" />
                        <label>Nomor Telepon</label><input type="text" value="<?php echo $user->telepon;?>" name="telepon" class="form-control" /><br/>
                        <p style="float:left"><input  type="submit" value="Simpan" class="btn btn-success" /></p>
                        <?php echo form_close();?>               
                    </div>
                </div>
                <div class="bhoechie-tab-content barang-content">
                    <h3>Daftar Barang</h3><br/>
                    <table class="table table-striped table-bordered">
                        <?php foreach($produk as $_produk){
                            echo "<tr>";
                            echo "<td><img style='height:200px;width:200px;margin-top:15px' src='".base_url('uploads/'.$_produk->nama_gbr)."' onerror='this.src='http://kpinti.hol.es/asset/images/noimage.png''>";
                            echo "</td><td><a class='pull-right' href='".site_url('produk/deleteProduk/'.$_produk->id_barang."/".$user->username)."'><span class='glyphicon glyphicon-trash'></span> Hapus</a><h3>".$_produk->nama."</h3>";
                            echo form_open('produk/ubahProduk/'.$_produk->id_barang.'/'.$user->username);
                            echo "<label>Harga Produk </label><input type='text' value='".$_produk->harga."' name='harga' class='form-control'/>";
                            echo "<label>Stok Produk </label><input type='text' value='".$_produk->jumlah."' name='jumlah' class='form-control' />";
                            echo "<br><input type='submit' value='Ubah' class='btn btn-success' /><a href='' style='margin-left:10px'>Lebih rinci</a>";
                            echo form_close();
                            echo "</td></tr>";
                        }?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
