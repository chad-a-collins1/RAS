<!DOCTYPE html>
<html lang="en">

	
<!-- Mirrored from codeminifier.com/new-glovia/glovia/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 15:52:47 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>ecomply</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/themify/css/themify.css" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/plugins/angular-tooltip/angular-tooltips.css" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/dist/css/animate.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="<?php echo base_url(); ?>assets/admin/assets/dist/css/glovia.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/admin/assets/dist/css/glovia-responsive.css" rel="stylesheet">
		
		<!-- Custom styles for Color -->
		<link id="jssDefault" rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/dist/css/skins/default.css">
	</head>

	<body class="red-skin">
	
		<div class="container-fluid">
			<div class="row">
				<div class="hidden-xs hidden-sm col-lg-6 col-md-6 theme-bg">
					<div class="clearfix">
						<div class="logo-title-container text-center">
							<h3 class="cl-white text-upper">Welcome To</h3>
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/eComply-Logo.png" style="width: 228px;" alt="Logo Icon">
						</div> <!-- .logo-title-container -->
					</div>
				</div>

				<div class="col-12 col-sm-12 col-md-6 col-lg-6 login-sidebar animated fadeInRightBig">
					
					<div class="login-container animated fadeInRightBig">
						
						<div class="alert alert-danger alert-dismissible fade show" id="login_detail" style="display:none" role="alert">
							<p>Incorrect login detail</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="alert alert-success alert-dismissible fade show" id="success" style="display:none" role="alert">
							<p><b>Password</b> sent to your email.</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="alert alert-danger alert-dismissible fade show" id="fail" style="display:none" role="alert">
							<p><b>Password</b> not sent to your email.</p>
							<p>Some Eror occured.</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="alert alert-danger alert-dismissible fade show" id="mail_not_found" style="display:none" role="alert">
							<p><b>Email</b> not found.</p>
							<p>Please check Your Email.</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<h2 class="text-center text-upper">Login To eComply</h2>
						<form class="form-horizontal">
							<div class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Email or Username">
								<i class="fa fa-user"></i>
							</div>
							<div class="form-group help">
								<input type="password" class="form-control" id="password" placeholder="Password">
								<i class="fa fa-lock"></i>
								<a href="#" class="pass-view fa fa-eye"></a>
							</div>
							
							<div class="form-group">
								<div class="flexbox align-items-center">
									<!--<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1">Remember me</label>
									</span>-->
									<a href="javascript:void(0)" data-toggle="tooltip" class="theme-cl" id="forget_password">Forgot Password?</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="flexbox align-items-center">
									<button type="button" class="btn theme-bg" id="login">log in</button>
								</div>
							</div>
						
						</form>
					</div> 
					<!-- .login-container -->
					
				</div> <!-- .login-sidebar -->
			</div> <!-- .row -->
		</div>
		

		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/jquery-easing/jquery.easing.min.js"></script>
		
		 <!-- Slick Slider Js -->
		<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/slick-slider/slick.js"></script>
		
		<!-- Slim Scroll -->
		<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/slim-scroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/glovia.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/assets/dist/js/jQuery.style.switcher.js"></script>
		
		<script>
		  $('.dropdown-toggle').dropdown();
		  
			$(document).ready(function() {
				$('#login').click(function() {
					$("#success").hide();
					$("#fail").hide();
					var email = $('#email').val();
					var password = $('#password').val();
					$('#email').css({'border-color': '#eaeff5'});
					$('#password').css({'border-color': '#eaeff5'});
					if(email == "" && password == "") {
						$('#email').css({'border-color': 'red'});
						$('#password').css({'border-color': 'red'});
						return false;
					}
					if(email == "") {
						$('#email').css({'border-color': 'red'});
						return false;
					}
					if(password == "") {
						$('#password').css({'border-color': 'red'});
						return false;
					}
					$.ajax({
						url: "<?php echo base_url().'index.php/Admin/do_login'; ?>",
						method: "POST",
						data: {
							"email": email,
							"password": password
						},
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response) {
							if(response == "success") {
								window.location.replace('<?php echo base_url()."index.php/Admin" ?>');
							}
							
							if(response == "unsuccess") {
								$("#login_detail").show();
							}
						}
					});
				});
				$('#forget_password').click(function() {
					$("#success").hide();
					$("#fail").hide();
					$("#login_detail").hide();
					$("#mail_not_found").hide();
					var email = $('#email').val();
					if(email == "") {
						$('#email').css({'border-color': 'red'});
						return false;
					}
					
					$.ajax({
						url: "<?php echo base_url().'index.php/Admin/forget_password_API'; ?>",
						method: "POST",
						data: {
							"email": email
						},
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response) {
							if(response == "mail_send") {
								$("#success").show();
							}
							
							if(response == "fail") {
								$("#fail").show();
							}
							
							if(response == "mail_not_found") {
								$("#mail_not_found").show();
							}
							
							
						}
					});
				});
			});
		</script>
	  
	</body>

<!-- Mirrored from codeminifier.com/new-glovia/glovia/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 15:52:47 GMT -->
</html>
