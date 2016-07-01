<html>
<head>
	<title>keranjang</title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/colorbox.css');?>">
    <!--Script-->
    <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.colorbox.js');?>"></script>
    <script type="text/javascript">
        // To conform clear all data in cart.
        function clear_cart() {
            var result = confirm('Are you sure want to clear all item?');
            if (result) {
                window.location = "<?php echo base_url(); ?>index.php/cart/remove/all";
            } else {
                return false; // cancel button
            }
        }
        jQuery(document).ready(function () { 
            $('#order').click(function(){ 
                //alert("masuk");
                parent.$.colorbox.close(); 
                window.parent.location.href='<?php echo site_url('cart/viewall');?>';
            });
            $('#continue').click(function(){
                parent.$.colorbox.close();
                window.parent.location.reload();
            });
            $('#updatefield ').on('change keyup', function() {
              var sanitized = $(this).val().replace(/[^0-9]/g, '');
              $(this).val(sanitized);
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div id="cart" >
            <div id = "heading">
                <h2 align="center">Products on Your Shopping Cart</h2>
            </div>
            <div class="im-centered"> 
            <div class="row col-centered">
                <div class="col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                    </div>
                                    <div class="col-xs-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block" id="continue">
                                            <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                        <div id="text"> 
                    <?php  $cart_check = $this->cart->contents();
                    
                    // If cart is empty, this will show below message.
                     if(empty($cart_check)) {
                     echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
                     }  ?> </div>
                        <?php
                          // All values of cart store in "$cart". 
                          if ($cart = $this->cart->contents()): ?>
                            <?php
                                 // Create form and send all values in "shopping/update_cart" function.
                                echo form_open('cart/update_cart/kecil');
                                $grand_total = 0;
                                $i = 1;
                                end($cart);
                                $tes = key($cart);
                                $tes= $this->session->flashdata('cart');
                                foreach ($cart as $item):
                                    //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                    //  Will produce the following output.
                                    // <input type="hidden" name="cart[1][id]" value="1" />
                                if ($id_barang == $item['id']){
                                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                    
                                    $i++;
                            ?>
                            <div class="row">
                                <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong><?php echo $item['name']; ?></strong></h4><h4><small>Product description</small></h4>
                                </div>
                                <div class="col-xs-6">
                                    <div class="col-xs-6 text-right">
                                        <h6><strong><?php echo number_format($item['price'], 2); ?> <span class="text-muted">x</span></strong></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'class="form-control input-sm" maxlength="3" size="1" id="updatefield" style="text-align: right"'); ?>
                                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                    </div>
                                    <!--<div class="col-xs-2">
                                        <?php 
                                        // cancle image.
                                        $path = "<img src='http://localhost/kp_templating/kp_master/asset/images/cart_cross.jpg' width='25px' height='20px'>";
                                        echo anchor('cart/remove/' . $item['rowid'], $path); ?>
                                    </div> -->
                                </div>
                            </div>
                            <hr>
                            <?php } 
                            endforeach; ?>
                            <div class="row">
                                <div class="text-center">
                                    <div class="col-xs-9">
                                        <h6 class="text-right">Added items?</h6>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-default btn-sm btn-block">
                                            Update cart
                                        </button>
                                        <?php echo form_close(); ?>
                                        <!--<button type="button" class="btn btn-danger btn-sm btn-block" onclick="clear_cart()">
                                    <span class="glyphicon glyphicon-remove"></span> Clear Cart
                                    </button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row text-center">
                                <div class="col-xs-9">
                                    <h4 class="text-right">Sub Total <strong>Rp.<?php 
                                //Grand Total.
                                echo number_format($grand_total, 2); ?></strong></h4>
                                </div>
                                <div class="col-xs-3">
                                    <button type="button" class="btn btn-success btn-block" id = "order">
                                        Checkout
                                    </button>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>