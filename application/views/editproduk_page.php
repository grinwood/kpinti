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
        $('#edit-kat').click(function(){
            $('.kategori-edit').toggle(300);
        });
    });
</script>
<h2 class="text-center" >Ubah Barang</h2><hr>
<div class="container">
    <?php $kelas = array(
    'style'=>'margin:50px',
    'id'=>'add'
    );?>
    <?php echo form_open_multipart('produk/ubahProdukDetail/'.$produk->id_barang."/".$user->username,$kelas);?>
    <label>Kategori</label><br/>
    <?php 
    if($kate1==null)
        echo "  ".$kate2->nama_kategori."-".$kate3->nama_kategori; 
    else 
        echo "  ".$kate1->nama_kategori."-".$kate2->nama_kategori."-".$kate3->nama_kategori;
    ?>
    <a href="#/" id="edit-kat">Ubah</a>
    <h6 class="text-center"><?php echo validation_errors(); ?></h6>
    <div class='kategori-edit' style="display:none">
        <div class="form-group">
            <select name="kategori" id="kategori" class="form-control">
                <option disabled selected value>Pilih Kategori</option>
                <?php foreach($chain_kategori as $kat){
                    echo '<option value="'.$kat->id_kategori.'">'.$kat->nama_kategori.'</option>';
                  } ?>
            </select><br/>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <select name="kategori2" id="kategori2" class="form-control">
                <option disabled selected value>Pilih Sub Kategori</option>
            </select><br/>
        </div>
        <div class="form-group">
            <select name="kategori3" id="kategori3" class="form-control">
                <option disabled selected value>Pilih Sub Kategori</option>
            </select><br/>
        </div>
    </div>
    <div class="form-group">
        <label>Nama Barang</label>
        <?php echo form_input(array('name'=>'nama','value'=>$produk->nama,'placeholder'=>'Nama Barang','class'=>'form-control','required'=>'""')); ?><br/>
    </div>
    <div class="form-group">
        <label>Jumlah Barang</label>
        <?php echo form_input(array('name'=>'jumlah','value'=>$produk->jumlah,'placeholder'=>'Jumlah Barang','class'=>'form-control','style'=>'width:15%','type'=>'text','pattern'=>'[0-9]{1,}','required'=>'""')); ?><br/>
    </div>
    <div class="form-group">
        <label>Harga Barang</label>
        <?php echo form_input(array('name'=>'harga','value'=>$produk->harga,'placeholder'=>'Harga Barang','class'=>'form-control','style'=>'width:15%','type'=>'text','pattern'=>'[0-9]{2,}','required'=>'""')); ?><br/>
    </div>
    <img style='height:200px;width:200px;margin-top:15px' src="<?php echo base_url('uploads/'.$produk->nama_gbr); ?>" onerror="this.src='http://kpinti.hol.es/asset/images/noimage.png'"><br/><br/>
    <label>Ubah Gambar</label>
    <input type='file' name='userfile' size='20'/> <br/>
    <label>Deskripsi Barang</label>
    <?php echo form_textarea(array('name'=>'deskripsi','value'=>$produk->deskripsi,'placeholder'=>'Deskripsi','class'=>'form-control'));?>
    <hr>
    <div class="navbar-right">
        <a href="<?php echo site_url('penjual/viewAkun/'.$user->username.'/barang');?>"><button type="button" class="btn btn-success">Batal</button></a>
        <input type="submit" value="Ubah" class="btn btn-primary" />
    </div>
    <?php echo form_close();?>
</div>