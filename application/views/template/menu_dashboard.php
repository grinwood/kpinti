<script>
	$(document).ready(function(){
		$('#drop-akun').click(function(){
			$('#drop-akun-content').slideToggle(200);
		});
	});
</script>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="dashboard.php"></a>
		</div>
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo site_url('dashboard');?>">T.corp</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<div class="nav navbar-form navbar-left">
				<!--<li class="menu-kategori"><a href=""><span class="glyphicon glyphicon-collapse-down"></span> Kategori</a>
					
				</li>-->
                <li>
                    <?php echo form_open('produk/cariProduk');?>
                    <input class="form-control" type="text" placeholder="Cari Produk" name="search" size="80"/>
                    <button type="submit" class="form-control">
                    <span style="color:#999" class="glyphicon glyphicon-search"></span></button>
                    <?php echo form_close();?>
                </li>
			</div>      
			<ul class="nav navbar-nav navbar-right">
				<li><a id="drop-akun" href="#/" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a>
					<div id="drop-akun-content">
						<a href="<?php echo site_url('penjual/viewAkun');?>"><p>Akun Saya</p></a>
						<a href="#/"><p>Barang Saya</p></a>
						<a href="<?php echo site_url('penjual/logout');?>"><br><p><strong>Logout </strong><span class="glyphicon glyphicon-log-out"></span></p></a>
					</div>
				</li>
				<li><a href="<?php echo site_url('produk/tambahProduk');?>"><span class="glyphicon glyphicon-plus"></span> Add Product</a></li>
				<li><a href="<?php echo site_url('cart');?>" style="margin-left:10px">Cart</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>