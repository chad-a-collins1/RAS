<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="icon" href="assets/images/favicon.ico">
		<title>Index</title>

		<!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-icons/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
	</head>
   
	<body>
	
		<div class="container">
			<div class="row" style="margin-top:30px;">
				<div class="col-md-3" style="color:green;">
					<h1>eComply</h1>
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 text-center" style="color:#434544;">
					<h1>Change Password</h1>
				</div>
			</div>
			
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-12">
				<form method="POST" id="register">
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Current password</label>
							<div class="col-sm-4">
								<input type="password" id="current_pw" name="current_pw" class="form-control" value="" placeholder="Old Password">
								<?php echo form_error('current_pw', '<div class="error">', '</div>')?>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">new Password</label>
							<div class="col-sm-4">
								<input type="password" id="new_pw" name="new_pw" class="form-control" value="" placeholder="new Password">
								<?php echo form_error('new_pw', '<div class="error">', '</div>')?>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Confirm Password</label>
							<div class="col-sm-4">
								<input type="password" id="confirm_pw" name="confirm_pw" class="form-control" value="" placeholder="Confirm Password">
								<?php echo form_error('confirm_pw', '<div class="error">', '</div>')?>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<div class="col-sm-6 justify-content-center">
								<button type="submit" name="submit" class="btn-submit btn btn-primary theme_btn">submit</button>
							</div>
						</div>
					</div>
					
				</form>
				</div>
			</div>
		</div>
	
	<!-- Imported JS on this page -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>		
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

	</body>
</html>