<h1 class="text-center">Registrasi</h1>
<div class="container">
    <hr>
    <div style="margin:30px 50px 50px 50px">
        <?php $kelas = array('class'=>'') ?>
        <?php echo form_open('penjual/register',$kelas);?>
        <h5 align="center"><?php echo validation_errors(); ?></h5>
        <div class="form-identitas">
            <label>Nama</label><input type="text" placeholder="Masukkan nama lengkap Anda" name="nama" class="form-control" ><br>
            <label>Email</label><input type="email" placeholder="Masukkan alamat email aktif Anda" name="email" class="form-control" ><br>
            <label>Nomor Telepon</label><input type="text" placeholder="Masukkan nomor telepon aktif Anda" name="telepon" class="form-control" ><br>
        </div>
        <div class="form-akun">
            <label>Username</label><input type="text" placeholder="Masukkan nama pengguna Anda" name="username"class="form-control" ><br>
            <label>Password</label><input type="password" placeholder="Masukkan kata kunci Anda" name="password" class="form-control" ><br>
            <label>Konfirmasi Password</label><input type="password" placeholder="Ketik ulang kata kunci Anda" name="conf_password" class="form-control" ><br>
            <input id="btn-signup" type="submit" value="Sign Up" class="btn btn-success"><br>
        </div>
        <?php echo form_close();?>
    </div>
</div>