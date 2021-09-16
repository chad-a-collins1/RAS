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
					<h1>Registration</h1>
				</div>
			</div>
			
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-12">
				<form method="POST" id="register">
					<?php foreach($user as $row)
					{
					?>
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-4">
								<input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name'];?>">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-4">
								<input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Orgaization</label>
							<div class="col-sm-4">
								<input type="text" id="organization" name="organization" class="form-control" value="<?php echo $row['organization'];?>">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Phone no</label>
							<div class="col-sm-4">
								<input type="text" id="phoneno" name="phoneno" class="form-control" value="<?php echo $row['phoneno'];?>">
							</div>
						</div>
					</div>
					
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-4">
								<input type="password" id="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<div class="col-sm-6 justify-content-center">
								<button type="submit" name="update" class="btn-login btn btn-primary theme_btn">Update</button>
							</div>
						</div>
					</div>
					<?php } ?>
				</form>
				</div>
			</div>
		</div>
	
	<!-- Imported JS on this page -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>		
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

	</body>
</html>
