<!-- Navigation -->	
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
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
                    <input class="form-control" type="text" placeholder="Cari Produk" name="search" size="75" value="<?php echo set_value('search');?>"/>
                    <button type="submit" class="form-control">
                    <span style="color:#999" class="glyphicon glyphicon-search"></span></button>
                    <?php echo form_close();?>
                </li>
			</div>   
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
		          <a href="#/" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $user->username;?></a>
		          <ul class="dropdown-menu ">
		            <li><a href="<?php echo site_url('penjual/viewAkun/'.$user->username.'/akun');?>"><span class="glyphicon glyphicon-user pull-right"></span>Akun Saya</a></li>
		            <li class="divider"></li>
		            <li><a href="<?php echo site_url('penjual/viewAkun/'.$user->username.'/barang');?>"><span class="glyphicon glyphicon-list pull-right"></span>Barang Saya</a></li>
	              	<li class="divider"></li>
		            <li><a href="<?php echo site_url('penjual/logout');?>"><span class="glyphicon glyphicon-log-out pull-right"></span>Logout </a></li>
		          </ul>
		        </li>
				<li><a href="<?php echo site_url('produk/tambahProduk');?>"><span class="glyphicon glyphicon-plus"></span> Add Product</a></li>
				<li><a href="<?php echo site_url('cart/viewall');?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (<?=$this->cart->total_items();?>)</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
	<div class="kategori">
        <?php $this->load->view('template/menu_kategori');?>
    </div>
</nav>