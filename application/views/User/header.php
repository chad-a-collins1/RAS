<!DOCTYPE html>
<html lang="en">
	<head>
		<!--<link rel="icon" href="assets/images/favicon.ico">-->
		
		<title>Index</title>
		
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-icons/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
 </head>
   
<body>
   <div class="container">
	<!--<div class="row" style="margin-top:10px; margin-bottom:20px;">
		<div class="col-md-3" style="color:green">
			<h1>eComply</h1>
		</div>
		<div class="col-md-9 col-sm-12 text-right">
			
				<h4>First name Last name</h4>
				<h4>Account number</h4>
			
		</div>
		
	</div>-->
	<div class="row" style="margin-top:30px;">
		<div class="col-md-3" style="color:green;">
			<img src="<?php echo base_url(); ?>assets/images/eComply-Logo.png" style="width:250px;" />
			
		</div>
		<div class="col-md-9 text-right" style="padding: 10px 50px;">
			<div class="col-md-12">
				<h4>Hello, <?php echo $_SESSION['user_name']; ?></h4>
				<!--<h4>Account number</h4>-->
			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-dark" style="padding: 0; margin-bottom: 20px;">
	<div class="container">
		<div class="row" style="margin-top:30px;">
			<div class="col-md-12">
				<header class="header">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top"  style="padding-left: 0; padding-right: 0; font-size: 17px;">
						
							<a class="navbar-brand" href="#" style="margin-right: 0;">
							<!--  <img src="http://placehold.it/150x50?text=Logo" alt="">-->
							</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarResponsive">
								<ul class="nav navbar-nav">
									<li class="nav-item"><a  class="nav-link" href="<?php echo base_url(); ?>index.php/User/dashboard">Student Home</a></li>
									<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/User/courses">Register For Courses</a></li>
									<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/User/profile">My Account</a></li>
								</ul>
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link" href="<?php echo base_url(); ?>index.php/User/help">Customer Service
										<span class="sr-only">(current)</span>
										</a>
									</li>
									<!--<li class="nav-item active">
										<a class="nav-link" href="<?php echo base_url();?>User/Profile">My Profile
										<span class="sr-only">(current)</span>
										</a>
									</li>-->
									<li class="nav-item">
										<a class="nav-link" href="<?php echo base_url();?>index.php/Login/logout">Logout</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo base_url();?>index.php/User/change_password">Change Password</a>
									</li>
								</ul>
							</div>
					</nav>
				</header>
			</div>
		</div>
	</div>
</div>
<style>
.collapse.in{
	display:block !important;
	}
</style>
