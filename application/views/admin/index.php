<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="hayertech">
<title>GLADS - Admin</title>

<?php $this->load->view('admin/meta'); ?>

<style>
	div#my-login-box {
		border: 5px solid #969696;
		border-radius: 10px;
		padding: 50px;
		max-width: 550px;
		margin: 150px auto 0;
	}
	div#my-login-header {
		margin-bottom: 50px;
	}
	div#login-error-dv {
		background: #f58634;
		padding: 5px;
		margin-bottom: 5px;
		color: #fff;
	}
	.btn-yellow {
		background: #f58634;
	}
</style>
<script src="<?php echo base_url('front_assets/js/jquery-1.11.0.min.js'); ?>"></script>
<script>
$(document).on("ready",function() {
	$('input[name=email]').keyup(function(){
		$('#login-error-dv').slideUp(400);
	});
	$('input[name=password]').keyup(function(){
		$('#login-error-dv').slideUp(400);
	});
});
</script>
</head>
<body> 
 
<div class="container">
	<div id="my-login-box">
		<div id="my-login-header" class="text-center">
			<img src="<?php echo base_url('front_assets/images/logo.png'); ?>" >
		</div>
		<div id="my-login-form">
			 <form action="<?php echo base_url('admin/login'); ?>" method="post">
				<div class="text-center"><?php if($this->session->flashdata('adminlogin') != ''){ echo '<div id="login-error-dv">'.$this->session->flashdata('adminlogin').'</div>'; } ?></div>
				<div class="form-group">
					<input type="text" class="form-control" maxlength="100"  name="email" id="email" placeholder="USERNAME" required />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" maxlength="100" name="password" id="password" placeholder="PASSWORD" required /> 
				</div>
				<div class="form-group">
					<button type="submit" id="" class="btn btn-yellow">LOGIN</button>
				</div>
			  </form>	
		</div>
	</div>
</div>

</body>
</html>