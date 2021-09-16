<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="icon" href="assets/images/favicon.ico">
		<title>Index</title>

		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-icons/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
	</head>
   
	<body>
	
		<div class="container">
			<div class="row" style="margin-top:30px;">
				<div class="col-md-3" style="color:green;">
					<img src="<?php echo base_url(); ?>assets/images/eComply-Logo.png" style="width:250px;" />
				</div>
			</div>
			
			<div class="row" style="margin-top:30px;">
				<div class="col-md-12 text-center" style="color: #434544;">
					<h1>Login</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" id="success" style="display:none"  role="alert">
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
				</div>
			</div>
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-12 ">
				<form method="POST">
					<div class="col-md-12">
					<div class="form-group row justify-content-center">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-4">
							<input type="email" name="email" id="email" class="form-control">
						</div>
					</div>
					</div>
					
					<div class="col-md-12">
					<div class="form-group row justify-content-center">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-4">
							<input type="password" name="password" id="password"  class="form-control">
						</div>
					</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<div class="col-sm-6">
								<button type="submit" name="login" class=" btn-login btn btn-primary theme_btn">Login</button>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<div class="col-sm-6">
								<a href="javascript:void(0)" data-toggle="tooltip" class="theme-cl" id="forget_password">Forgot Password?</a>
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
<script>

var baseurl = "<?php echo base_url(); ?>";

</script>
<script>
$(document).ready(function() {
  $('.btn-login').click(function() {
   
    var email = $('#email').val();
    var password = $('#password').val();
 
    $(".error").remove();
 
    if (email.length > 1) {
		var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var validEmail = regEx.test(email);
		if (!validEmail) {
			alert("enter valid user name");
		}else {
			
			if (password.length != 0) {
				$.ajax({
						url: baseurl + 'index.php/Login/login',
						method: 'POST',
						data: {
							//role: $("input#subselect").val(),
							email: $("#email").val(),
							password: $("#password").val(),
						},
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							if(response == 'invalid_password')
							{
								// console.log(response);
								$(".form-login-error").show();
								// $(".form-register-success").hide();
							}
							if(response == 'invalid_email')
							{
								// console.log(response);
								$(".form-login-error").show();
								// $(".form-register-success").hide();
							}
							if(response == 'success')
							{
								window.location.href = baseurl + 'index.php/User/dashboard';
							}
						}
					});
			}else {
				alert("Enter Password");
			}
		}
    } else {	
		alert("Enter Email");
    }
    
  });
  
  $('#forget_password').click(function() {
		$("#success").hide();
		$("#fail").hide();
		$("#mail_not_found").hide();
		var email = $('#email').val();
		if(email == "") {
			$('#email').css({'border-color': 'red'});
			return false;
		}
		
		$.ajax({
			url: "<?php echo base_url().'index.php/Login/forget_password_API'; ?>",
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
</html>