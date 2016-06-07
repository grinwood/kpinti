
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
	   			<?php $kelas = array('class'=>'form-signin') ?>
        		<?php echo form_open('penjual/register',$kelas);?>
            	<?php echo validation_errors(); ?>
					<!--<input type="text" name="fname"placeholder="First Name"class="form-control" required>
					<input type="text" name="lname"placeholder="Last Name"class="form-control" required>
					<select class="form-control" name="gender"required>
					<option>Gender</option>
					<option value="Male">Pria</option>
					<option value="Female">Wanita</option>
					</select>-->
					<input type="text" placeholder="Username" name="username"class="form-control" required>
					<input type="password" placeholder="Password" name="password" class="form-control" required>
					<input type="submit" value="Sign Up" class="btn btn-success" style="width:100%" onclick="return confirm('Apakah Anda yakin?')"><br>
				<?php echo form_close();?>
				</div>
				</div>
			<!--application/views/function_public/login.php-->

