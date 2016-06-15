<html>
<head>
    <script type="text/javascript">
        var cboxOptions = {
          width: '450px',
          height: '320px',
          inline :true,
          scrolling   : false,
           }

        jQuery(document).ready(function () {
            jQuery('.login').colorbox(cboxOptions);            
            jQuery('.signup').colorbox(cboxOptions);
            jQuery('.inline').colorbox({inline:true, width:"50%"});
        });
       
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>">T.corp</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--
                <ul class="nav navbar-nav navbar-left">
                    <li><a href=""><span class="glyphicon glyphicon-list"></span> Topics</a></li>
                </ul>
                -->
                
                <div>
                    <div class="navbar-form navbar-left">
                        <?php echo form_open('produk/cariProduk');?>
                        <input class="form-control" type="text" placeholder="Cari Produk" name="search" size="70"/>
                        <button type="submit" class="form-control">
                        <span style="color:#999" class="glyphicon glyphicon-search"></span></button>
                        <?php echo form_close();?>
                    </div>
                    <div class="navbar-form navbar-right">
                        <a href="#login_content" class ="login"><button type="button" class="btn btn-login">Login</button></a>
                        <a href="<?php echo site_url('penjual/register');?>" class = ""><button type="button" class="btn btn-signup">Sign Up</button></a>
                        <a style="color:#999;margin-left:10px" href="#inline_content"  class = "inline"><span class="glyphicon glyphicon-plus"></span> Add Product</a>
                        <a style="color:#999 ; margin-left:10px" href="<?php echo site_url('cart/viewall');?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (<?=$this->cart->total_items();?>)</a>
                    </div>
                </div>   
            </div>


            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div style='display:none'>
        <div id='inline_content' style='padding:10px; background:#fff;'>
            <p><strong>Untuk menambah barang, Anda harus login terlebih dahulu</strong></p>
            <p><a class="login" href="#login_content">Klik di sini untuk login</a></p>
            
            <p><strong>Jika Anda belum memiliki akun, maka Anda dapat melakukan pendaftaran </strong></p>
            <p><a href="<?php echo site_url('penjual/register');?>">Klik di sini untuk signup</a></p>
        </div>
        <div id='login_content' class="login_content" >
            <?php $kelas = array('class'=>'form-signin');?>
            <?php echo form_open('penjual/login',$kelas);?>
            <h4 align="center">Masuk</h4>
            <p style="color:red; text-align:center" id="notif"><?php echo $this->session->flashdata('notification')?></p>
            <input type="text" class="form-control" name="username"placeholder="Username" required >
            <input type="password" class="form-control" name="password"placeholder="Password" required >
            <p style="float:left"><input type="checkbox" name"ingat"/> Ingat Saya</p>
            <input style="float:right" type="submit" value="Login" class="btn btn-success">
            <?php echo form_close();?><br><hr>
            <p style="clear:both" align="center">Belum punya akun? <a href="<?php echo site_url('penjual/register');?>">Daftar</a></p>
            <script type="text/javascript">
                function myFunction() {
                    var x = document.getElementById("notif").innerHTML;
                    if(x != "" && x!="Berhasil Login"){
                     $.colorbox({width: '450px',height: '350px',inline :true,scrolling   : false, href:".login_content"});
                    }
                }
                window.onload = myFunction();
            </script>
        </div>
        <div id='signup_content' class="signup_content">
            <?php $kelas = array('class'=>'form-signin') ?>
            <?php echo form_open('penjual/register',$kelas);?>
            <?php echo validation_errors(); ?>
            <input type="text" placeholder="Username" name="username"class="form-control" required>
            <input type="password" placeholder="Password" name="password" class="form-control" required>
            <input type="submit" value="Sign Up" class="btn btn-success" style="width:100%" onclick="return confirm('Apakah Anda yakin?')"><br>
            <?php echo form_close();?>
        </div>
    </div>
</body>
</html>
    




	

