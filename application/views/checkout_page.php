<script src="<?php echo base_url('asset/js/validator.js');?>"></script>
<script>
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);
        cekvalid();

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
    function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
    $('#order').validator();
    function cekvalid(){
        if ($("#submit").hasClass("disabled")) {
            document.getElementById("notif_danger").style.display = 'block';
            document.getElementById("submit").style.display = 'none';
        } else {
            document.getElementById("notif_danger").style.display = 'none';
        }
    }

    $('#order').submit(function (event) {
      dataString = $("#order").serialize();
      $.ajax({
        type:"POST",
        url:"<?php echo site_url('cart/save_order'); ?>",
        data:dataString,
        success:function (data) {
            //alert('test');
        }
      });
      event.preventDefault();
      document.getElementById("notif_sukses").style.display = 'block';
      document.getElementById("submit").style.display = 'none';
    });
    $("#provinsi").change(function (){
        var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
        $('#kabupaten').load(url);
        return false;
    })
      
      $("#kabupaten").change(function (){
          var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
          $('#kecamatan').load(url);
          return false;
      })
      
      $("#kecamatan").change(function (){
          var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
          $('#desa').load(url);
          return false;
      })
});
</script>
<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data Pembelian">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Metode Pembayaran">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-tags"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Konfirmasi">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div id="notif_sukses" class="alert alert-dismissible alert-success fade in text-center" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Well done!</strong><br> Order anda sudah di proses <br><a href="<?php echo base_url();?>" class="alert-link"> kembali belanja</a>.
                </div>
                <div id="notif_danger" class="alert alert-dismissible alert-danger fade in text-center" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Oh snap!</strong><br> ada data yang tidak lengkap, mohon di cek..
                </div>
            </div>
            
            <?php 
            $att =array('id' => 'order',
                    'class'=>"form-horizontal"
                );
            echo form_open('',$att);?>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <center><h3>Data Pembeli</h3></center><br/>
                          <fieldset>
                            <div class="form-group">
                              <label for="inputName" class="col-lg-2 control-label">Nama</label>
                              <div class="col-lg-10">
                                <input class="form-control" id="inputName" placeholder="Masukkan nama penerima" type="text" name="nama" pattern="[\w\s]{1,}" required><br/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-lg-2 control-label">E-mail</label>
                              <div class="col-lg-10">
                                <input type="email" class="form-control" placeholder="Masukkan alamat email aktif Anda" name="email" id="inputEmail" data-error="mohon masukan alamat email yang valid" required>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="provinsi" class="col-lg-2 control-label">Provinsi</label>
                                <div class="col-lg-10">
                                    <select name="provinsi" id="provinsi" class="form-control" required>
                                            <option disabled selected value>Pilih Provinsi</option>
                                            <?php foreach($provinsi as $prov){
                                                echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                                              } ?>
                                    </select><br/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kota" class="col-lg-2 control-label">Kota</label>
                                <div class="col-lg-10">
                                    <select name="kota" id="kabupaten" class="form-control" required>
                                        <option disabled selected value>Pilih Kota / Kabupaten</option>
                                    </select><br/>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="alamat" class="col-lg-2 control-label">Alamat</label>
                              <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="alamat" placeholder="Masukkan detil alamat" name="alamat" form="order" required></textarea><br/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPos" class="col-lg-2 control-label">Kode Pos</label>
                              <div class="col-lg-10">
                                <input class="form-control" id="inputPos" placeholder="Masukkan kode pos" type="text" name="kodePos" pattern="[0-9]{3,}" required ><br/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="alamat" class="col-lg-2 control-label">Keterangan Barang</label>
                              <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="alamat" placeholder="Masukkan keterangan tambahan pada barang (ukuran,warna, dll)"></textarea>                        
                              </div>
                            </div>
                          </fieldset>
                        <br/>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step" id="btn_step1">Lanjut</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <center><h3>Metode Pembayaran</h3></center><br/>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Pilih Kurir</label>
                          <div class="col-lg-10">
                          <form>
                            <div class="radio">
                              <label>
                                <input name="kurir" id="optionsRadios1" value="JNE" checked="" type="radio">
                                JNE
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input name="kurir" id="optionsRadios2" value="Pos" type="radio">
                                Pos
                              </label>
                            </div>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Pilih Metode Bayar</label>
                          <div class="col-lg-10">
                            <div class="radio">
                              <label>
                                <input name="caraBayar" id="optionsRadios1" value="COD" checked="" type="radio">
                                Cash on Delivery        
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input name="caraBayar" id="optionsRadios2" value="another way" type="radio">
                                another way
                              </label>
                            </div>
                          </div>
                        </div> 
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Kembali</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Lanjut</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <center><h3>Konfirmasi</h3></center><br/>
                        <p>You have successfully completed all steps.</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Kembali</button></li>
                            <li><button type="submit" class="btn btn-primary complete" id="submit">Selesai</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php echo form_close();?>
        </div>
    </section>
   </div>
</div>