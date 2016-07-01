<script type="text/javascript">
    $(document).ready(function () {
        $('#register').validator();
    });
</script>
<h1 class="text-center">Registrasi</h1>
<div class="container">
        <?php $kelas = array('id'=>'register'
                        ); ?>
        <?php echo form_open('penjual/register',$kelas);?>
        <div class="form-group">
            <label class="control-label">Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan nama lengkap Anda" name="nama" pattern="[\w\s]{1,}" data-minlength="2" required>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="control-label">Email</label>
            <input type="email" class="form-control" placeholder="Masukkan alamat email aktif Anda" name="email" id="inputEmail" data-error="mohon masukan alamat email yang valid" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="inputNoTel" class="control-label">Nomor Telepon</label>
            <input type="text" class="form-control" placeholder="Masukkan nomor telepon aktif Anda" name="telepon" id="inputNoTel" pattern="[0-9]{2,}" required>
        </div>
        <div class="form-group">
            <label for="inputUsername" class="control-label">Username</label>
            <input type="text" class="form-control" placeholder="Masukkan nama pengguna Anda" name="username" id="inputUsername" pattern="^[A-Za-z]+[A-Za-z0-9_]+[A-Za-z0-9]" data-minlength="6" required>
            <div class="help-block">Minimum of 6 Karakter</div>
        </div>
        <div class="form-group"> 
            <div class="form-group col-sm-6">
                <label for="inputPass" class="control-label">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan kata kunci Anda" name="password" id="inputPass" data-minlength="6" data-error="password minimum 6 karakter" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6 has-feedback">
                <label for="passCek" class="control-label">Konfirmasi Password</label>
                <input type="password" class="form-control" placeholder="Ketik ulang kata kunci Anda" name="conf_password" id="passCek" data-match="#inputPass" data-match-error="Ops, password tidak sama" required>

                <div class="help-block with-errors"><span class="glyphicon form-control-feedback" aria-hidden="true"></span></div>
            </div>
        </div>
        <div class="form-group col-sm-12" >
        <button type="submit" class="btn btn-primary"> Daftar</button>
        </div>
        <?php echo form_close();?>
</div>