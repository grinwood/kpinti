<?php $this->load->view('akun_page');?>
    <div class="contentmenu">
        <div id="akun-content" >
                <?php echo form_open('penjual/ubahPassword');?>
                <div>
                    <p><label>Username: </label><br><?php echo $user->username;?></p>
                    <p style="float:left"><input  type='password' name='password' placeholder='Ubah Password' class='form-control'/></p>
                    <p style="float:left"><input  type="submit" value="Ubah" class="btn btn-success" /></p>
                </div>
                <div>
                    <p><label>Nama Lengkap</label><input  type='text' name='nama' value="<?php echo $user->nama;?>" class='form-control'/></p>
                    <p><label>Email</label><input type="email" value="<?php echo $user->email;?>" name="email" class="form-control" /></p>
                    <p><label>Nomor Telepon</label><input type="text" value="<?php echo $user->telepon;?>" name="telepon" class="form-control" /></p>               
                </div>
                <?php echo form_close();?>
        </div>
    </div>
</div>