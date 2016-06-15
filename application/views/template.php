<!DOCTYPE html >
<html >
<head>
	<title>E-Commerce</title>

	
	<!--Bootstrap CSS-->
    <!--Custom CSS-->
	<!--<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/simplex/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Ib5WUYOh/fqe9wT9MDBX+VgUWQuUf8oDH3yuR9Kr+6Y5ejq92KR8LEuCbRiGZpG" crossorigin="anonymous">
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/style.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/colorbox.css');?>">
    <!--Script-->
    <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.colorbox.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap-dropdownhover.min.js');?>"></script>
    
	<meta http-equiv=”content-type” content=”text/html; charset=utf-″/>
	<script>
    $(document).ready(function(){
        $(window).scroll(function() { 
            if($(window).scrollTop()===0) {
                $('.dropdown-kategori').slideDown(300);
            	$('.navbar').addClass('top');
            }else{
                $('.dropdown-kategori').slideUp(300); 
            	$('.navbar').removeClass('top');
            }
        }); 
    });
    </script>
</head>
<body class="tp-body">
	<div id="wrap">
		<div id="tp-header">
		<!--Area Header-->
			<?php //echo $_header;?>
		</div>
		<div id="tp-menu">
		<!--Area Top Menu-->
			<?php echo $_top_menu;?>
		</div><!--
		<div style="margin-top:-50px" id="tp-kategori">
		<!Area Kategori Menu>
			<?php //echo $_kategori_menu;?>
		</div>-->
		<div id="tp-contentwrap">
			<div id="tp-content">
			<!--Area content-->
				<?php echo $_content;?>
			</div>
			<div id="tp-sidebar">
			<!--Area Right Menu-->
				<?php //echo $_right_menu;?>
			</div>
			<div style="clear: both;"></div>
			</div>
		</div>
		<div id="tp-footer" style="margin-top:50px	">
		<!--Area Footer-->
			<p>Copyright &copy;</p>
		</div>
	</body>
</html>