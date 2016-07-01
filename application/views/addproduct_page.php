<script type="text/javascript">
    $(document).ready(function () {
        $('#add').validator();

        $("#kategori").change(function (){
            var url = "<?php echo site_url('chain/add_ajax_kat');?>/"+$(this).val();
            $('#kategori2').load(url);
            return false;
        });
          
        $("#kategori2").change(function (){
            var url = "<?php echo site_url('chain/add_ajax_kat2');?>/"+$(this).val();
            $('#kategori3').load(url);
        });        
    });
</script>
<h2 class="text-center" >Tambah Barang</h2><hr>
<div class="container">
    <?php $kelas = array(
    'style'=>'margin:50px',
    'id'=>'add'
    );?>
    <?php echo form_open_multipart('produk/tambahProduk',$kelas);?>
    <h6 class="text-center"><?php echo validation_errors(); ?></h6>
    <div class="form-group">
        <select name="kategori" id="kategori" class="form-control" required>
            <option disabled selected value>Pilih Kategori</option>
            <?php foreach($chain_kategori as $kat){
                echo '<option value="'.$kat->id_kategori.'">'.$kat->nama_kategori.'</option>';
              } ?>
        </select><br/>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
        <select name="kategori2" id="kategori2" class="form-control" required>
            <option disabled selected value>Pilih Sub Kategori</option>
        </select><br/>
    </div>
    <div class="form-group">
        <select name="kategori3" id="kategori3" class="form-control">
            <option disabled selected value>Pilih Sub Kategori</option>
        </select><br/>
    </div>
    <div class="form-group">
        <label class="control-label">Nama Barang</label>
        <?php echo form_input(array('name'=>'nama','placeholder'=>'Nama Barang','class'=>'form-control','required'=>'""')); ?><br/>
    </div>
    <div class="form-group">
        <label class="control-label">Jumlah Stok</label>
        <?php echo form_input(array('name'=>'jumlah','placeholder'=>'Jumlah Barang','class'=>'form-control','style'=>'width:15%','type'=>'text','pattern'=>'[0-9]{1,}','required'=>'""')); ?><br/>
    </div>
    <div class="form-group">
        <label class="control-label">Harga Barang</label>
        <?php echo form_input(array('name'=>'harga','placeholder'=>'Harga Barang','class'=>'form-control','style'=>'width:15%','type'=>'text','pattern'=>'[0-9]{2,}','required'=>'""')); ?><br/>
    </div>
    <label>Pasang Gambar</label>
    <input type='file' name='userfile' size='20'/> <br/>
    <?php echo form_textarea(array('name'=>'deskripsi','placeholder'=>'Deskripsi','class'=>'form-control'));?>
    <hr>
    <div class="navbar-right">
    	<a href="<?php echo site_url('dashboard');?>"><button type="button" class="btn btn-success">Batal</button></a>
    	<input type="submit" value="Tambah" class="btn btn-primary" />
	</div>
    <?php echo form_close();?>
</div>