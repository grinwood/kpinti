<script>
    $(document).ready(function(){
        var keranjang = '<?=$this->cart->total_items();?>';
        $('#frmupdate').validator();

        if(keranjang == 0)
        {
            document.getElementById("proses-checkout").style.display = 'none';
            document.getElementById("update").style.display = 'none';
            document.getElementById("update1").style.display = 'none';
        }
        $(function() {
		    // gather all inputs of selected types
		    var inputs = $('input'), inputTo;
		    // bind on keydown
		    inputs.on('keyup', function(e) {
			    var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  	$(this).val(sanitized);
		    });
		});
    });
    function clear_cart() {
            var result = confirm('Are you sure want to clear all item?');
            if (result) {
                window.location = "<?php echo site_url('cart/remove/all'); ?>";
            } else {
                return false; // cancel button
            }
        }

</script>

            <!-- START Shop Content -->
            <section class="section">
                <div class="container">
                    <!-- START Section Header -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header text-center">
                                <h1 class="section-title font-alt mb25">Keranjang Belanja</h1>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h4 class="thin text-muted text-center mb30">Cek kembali Keranjang belanja anda di bawah ini</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ END Section Header -->

                    <!-- START row -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel nm" style="border-bottom-width:1px;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="15%">Gambar</th>
                                            <th>Nama Produk</th>
                                            <th width="15%">Kuantiti</th>
                                            <th width="15%">Harga</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($this->cart->total_items() == 0): ?>
                                        <tr>
                                            <td colspan="5"><h3 class="thin text-muted text-center mb30">Keranjang Kosong</h3></td>
                                        </tr>
                                        <?php 
                                            endif;
                                            $kelas = array(
                                            'id'=>'frmupdate',
                                            'data-toggle'=>'validator'
                                            );
                                            echo form_open('cart/update_cart/besar',$kelas);
                                            $i = 1;
                                            $total_harga = 0;
                                            foreach($this->cart->contents() as $items):
                                            //$gambar	= $this->Model_produk->ambil_gambar($items['id']);
                                            //$pecah  = explode(',', $gambar->gambar);
                                                echo form_hidden('cart[' . $items['id'] . '][id]', $items['id']);
                                                echo form_hidden('cart[' . $items['id'] . '][rowid]', $items['rowid']);
                                                echo form_hidden('cart[' . $items['id'] . '][name]', $items['name']);
                                                echo form_hidden('cart[' . $items['id'] . '][price]', $items['price']);
                                                echo form_hidden('cart[' . $items['id'] . '][qty]', $items['qty']);
                                                
                                                $i++;
                                        ?>

                                        <tr>
                                            <td>
                                                <!-- thumbnail -->
                                                <div class="thumbnail nm">
                                                    <!-- media -->
                                                    <div class="media">
                                                        <!-- indicator -->
                                                        <div class="indicator"><span class="spinner"></span></div>
                                                        <!--/ indicator -->
							
                                                        <img data-toggle="unveil" src="<?=base_url('assets/front-end/image/shop/placeholder.jpg');?>" data-src="" alt="Photo" width="100%" />
                                                    </div>
                                                    <!--/ media -->
                                                </div>
                                                <!--/ thumbnail -->
                                            </td>
                                            <td>
                                                <h4 class="mt0"><?=$items['name'];?></h4>
                                            </td>
                                            <td>
										
                                                <h4 class="font-alt nm"><?php echo form_input('cart[' . $items['id'] . '][qty]', $items['qty'], 'class="form-control input-sm" maxlength="3" size="1" style="text-align:right;"'); ?></h4>
                                            </td>
                                            <td>
                                                <?php $total_harga = $total_harga + $items['subtotal'];?>
                                                <h4 class="font-alt text-primary nm"><?=$items['subtotal'];?></h4>
                                            </td>
                                            <td>
                                               <h5><td>
                                                 <?php 
                                        // cancle image.
												$path = "<img src='http://localhost/kp_templating/kp_master/asset/images/cart_cross.jpg' width='25px' height='20px'>";
												echo anchor('cart/remove/' . $items['rowid'], $path); ?>
											   </td>
                      											   
											   </h5>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <div class="row">
                                <div class="text-center">
                                    <div class="col-xs-9">
                                        <h6 class="text-right" id="update1">Added items?</h6>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-default btn-sm btn-block" id="update">
                                            Update cart
                                        </button>
                                        <?php echo form_close(); ?>
                                        <button type="button" class="btn btn-danger btn-sm btn-block" onclick="clear_cart()">
                                        <span class="glyphicon glyphicon-remove"></span> Clear Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
								  <div class="col-xs-9">
                                     <h4 class="text-right">Total <strong>Rp.<?php 
                                     //Grand Total.
                                     echo number_format($total_harga, 2); ?></strong></h4>
                                 </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h3 class="section-title font-alt mt0">Transfer & Pengiriman</h3>

                            <p class="mb15">Sebelum melakukan proses checkout</p>
                            <p>Harap melakukan pengecekan barang secara seksama </p>
                            <p>Perhatikan barang yang di keranjang benar benar barang anda</p>

                            <div class="clearfix">
                                <a href="<?php echo site_url('cart/billing_view');?>" id="proses-checkout" style="display: block" class="btn btn-primary pull-left">Proses Checkout</a>
                                <a href="<?=site_url();?>" class="btn btn-link pull-left">Lanjutkan Belanja</a>
                                <a> <img style="display: none"src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" align="left" style="margin-right:7px;"></a>
                            </div>
                        </div>
                    </div>
                    <!--/ END row -->
                </div>
            </section>
            <!--/ END Shop Content -->
