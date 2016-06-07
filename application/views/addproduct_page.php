<h2 class="text-center" >Tambah Barang</h2><hr>
<div class="container">
    <?php $kelas = array(
    'style'=>'margin:50px');?>
    <?php echo form_open_multipart('produk/tambahProduk',$kelas);?>
    <h6 class="text-center"><?php echo validation_errors(); ?></h6>
    <?php $selected = ($this->input->post('kategori')) ? $this->input->post('kategori') : ''; ?>
    <?php echo form_dropdown('kategori',$this->kategori_model->getDropdown(),$selected,array('class'=>'form-control')); ?><br/>
    <?php echo form_input(array('name'=>'nama','placeholder'=>'Nama Barang','class'=>'form-control')); ?><br/>
    <?php echo form_input(array('name'=>'jumlah','placeholder'=>'Jumlah Barang','class'=>'form-control','style'=>'width:15%')); ?><br/>
    <?php echo form_input(array('name'=>'harga','placeholder'=>'Harga Barang','class'=>'form-control','style'=>'width:15%')); ?><br/>
    <label>Pasang Gambar</label>
    <input type='file' name='userfile' size='20'/> <br/>
    <?php echo form_textarea(array('name'=>'deskripsi','placeholder'=>'Deskripsi','class'=>'form-control'));?>
    <hr>
    <div class="navbar-right">
    	<a href="<?php echo site_url('dashboard');?>"><button type="button" class="btn btn-success">Batal</button></a>
    	<input type="submit" value="Tambah" class="btn btn-success" />
	</div>
    <?php echo form_close();?>
</div>