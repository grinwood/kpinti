<div class="dropdown-kategori">
	<div class="kategori">
	    <ul class="list-kategori">
	        <?php foreach($daftar_kategori as $kategori){?>
	            <li>
	                <a href="<?php echo site_url('produk/kategoriView/'.$kategori->id_kategori);?>">
	                <p><?php echo ucfirst($kategori->nama_kategori); ?></p></a>
	            </li>
	        <?php } ?>
	    </ul>
	</div>
	<!--<div class="dropdown"  data-animations="fadeIn fadeIn fadeIn fadeIn">
		<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
	   	<h4>Kategori <span class="glyphicon glyphicon-list"></span></h4>
	  	</button>
	  	<ul class="dropdown-menu">
	  		<?php foreach($daftar_kategori as $kategori){?>
	        <li>
                <a href="<?php echo site_url('produk/kategoriView/'.$kategori->id_kategori);?>">
                <?php echo $kategori->nama_kategori; ?></a>
	        </li>
	        <?php } ?>
		    <li><a href="#">Action</a></li>
		    <li><a href="#">Another action</a></li>
		    <li class="dropdown">
		      <a href="#">One more dropdown</a>
		      <ul class="dropdown-menu">
		        <li><a href="#">Action</a></li>
		        <li><a href="#">Another action</a></li>
		        <li class="dropdown">
		          <a href="#">One more dropdown</a>
		          <ul class="dropdown-menu">
		          ...
		          </ul>
		        </li>
		        <li><a href="#">Something else here</a></li>
		        <li><a href="#">Separated link</a></li>
		       </ul>
		    </li>
		    <li><a href="#">Something else here</a></li>
		    <li><a href="#">Separated link</a></li>
		</ul>
	</div>-->
</div>