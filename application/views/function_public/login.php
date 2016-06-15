
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/global.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/colorbox.css');?>">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/costum.css');?>">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
</head>
			
				<div class="wrap">
					<div class ="centered">
			   			<?php $kelas = array('class'=>'form-signin');?>
						<?php echo form_open('penjual/login',$kelas);?>
		            	<?php echo validation_errors(); ?>
						<p style="color:red; text-align:center"><?php echo $this->session->flashdata('notification')?></p>
						<input type="text" class="form-control" name="username"placeholder="Username" required >
						<input type="password" class="form-control" name="password"placeholder="Password"  required>
						<input type="submit" value="Login" class="btn btn-success" style="width:100%" >
						<?php echo form_close();?>
					</div>
				</div>
			<!--application/views/function_public/login.php-->

