<html>
<head>
 

    <script type="text/javascript">
        var cboxOptions = {
          width: '500px',
          height: '300px',
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" style="">
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
                    <input class="form-control" type="text" placeholder="Cari Produk" name="search" size="80"/>
                    <button type="submit" class="form-control">
                    <span style="color:#999" class="glyphicon glyphicon-search"></span></button>
                    <a href="#login_content" class ="login"><button type="button" class="btn btn-success">Login</button></a>
                    <a href="#signup_content" class = "signup"><button type="button" class="btn btn-success">Sign Up</button></a>
                    <a style="color:#999" href="#inline_content" style="margin-left:10px" class = "inline"><span class="glyphicon glyphicon-plus"></span> Add Product</a>
                    <?php echo form_close();?>
                    </div>
                </div>   
            </div>


            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <div style='display:none'>
        <div id='inline_content' style='padding:10px; background:#fff;'>
            <p><strong>Untuk menambah barang anda harus login terlebih dahulu</strong></p>
            <p><a class="login" href="#login_content">Click disini untuk login</a></p>
            
            <p><strong>Jika anda belum memiliki akun, maka anda dapat melakukan pendaftaran </strong></p>
            <p><a class="signup" href="#signup_content">Click disini untuk signup</a></p>
        </div>
        <div id='login_content' class="login_content">
            <?php $kelas = array('class'=>'form-signin');?>
            <?php echo form_open('penjual/login',$kelas);?>
            <?php echo validation_errors(); ?>
            <p style="color:red; text-align:center" id="notif"><?php echo $this->session->flashdata('notification')?></p>
            <input type="text" class="form-control" name="username"placeholder="Username" required >
            <input type="password" class="form-control" name="password"placeholder="Password" required >
            <input type="submit" value="Login" class="btn btn-success" style="width:100%">
            <?php echo form_close();?>
            <script type="text/javascript">
                function myFunction() {
                    var x = document.getElementById("notif").innerHTML;
                    if(x != "" && x!="Berhasil Login"){
                     $.colorbox({width: '500px',height: '300px',inline :true,scrolling   : false, href:".login_content"});
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
    




	

