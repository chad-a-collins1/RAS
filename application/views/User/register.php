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
					<img src="<?php echo base_url(); ?>assets/images/eComply-Logo.png" style="width:250px;" />
					
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
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-4">
								<input type="text" id="name" name="name" class="form-control" value="">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-4">
								<input type="email" id="email" name="email" class="form-control" value="">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Orgaization</label>
							<div class="col-sm-4">
								<input type="text" id="organization" name="organization" class="form-control" value="">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Phone no</label>
							<div class="col-sm-4">
								<input type="text" id="phoneno" name="phoneno" class="form-control" value="">
							</div>
						</div>
					</div>
					
					
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<label class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-4">
								<input type="password" id="password" name="password" class="form-control" value="">
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group row justify-content-center">
							<div class="col-sm-6 justify-content-center">
								<button type="submit" name="register" class="btn-login btn btn-primary theme_btn">Register</button>
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
<script>

/*$(document).ready(function(){
	$('.btn-login').click(function() {
		//alert('hello');
		var name = $('input#name').val();
		var email = $('input#email').val();
		var organization = $('input#organization').val();
		var phoneno = $('input#phoneno').val();
		var password = $('input#password').val();
		
		//var reg_url= '<?php echo base_url();?>login/register'
			//alert(reg_url);	
			
				$.ajax({
					url:'<?php echo base_url();?>index.php/login/register',
					method: 'POST',
					data : {
						'name' : name,
						'email' : email,
						'organization' : organization,
						'phoneno' : phoneno,
						'password' : password,
						},
							error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							console.log(response);
							/*if(response == 'invalid_password')
							{
								 console.log(response);
								$(".form-login-error").show();
								$(".form-register-success").hide();
							}
						
							if(response == 'success')
							{
								window.location.href = '<?php echo base_url(); ?>index.php/User/dashboard';
							}
						}
				});
				//return false;	
	});
});*/
/*$('#register').submit(function(event){
	event.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var organization = $('#organization').val();
		var phoneno = $('#phoneno').val();
		var password = $('#password').val();
	$.ajax({
		url:"<?php echo base_url('index.php/Login/register');?>",
		type:"POST",
		data : {
				'name' : name,
				'email' : email,
				'oganization' : organization,
				'phoneno' : phoneno,
				'password' : password
			},
		success: function(response)
		{  
		// $('#name').val("");
		 // $('#email').val("");
		 // $('#organization').val("");
		 // $('#phoneno').val("");
		 // $('#password').val("");
		console.log(response);
			if(response==1)
			{
				alert("register");
				window.location.href = '<?php echo base_url(); ?>index.php/User/dashboard';
			}
			else
			{
				alert("error");
			}
		}
	});
	return false;
});

		/*$("#register").submit(function(event) {
			event.preventDefault();
			$.ajax({
		            url: "<?php echo base_url('index.php/Login/register'); ?>",
		            data: $("#register").serialize(),
		            type: "post",
		            async: false,
		            dataType: 'json',
		            success: function(response){
		              
		               // $('#createModal').modal('hide');
		                $('#register')[0].reset();
		                alert('Successfully inserted');
		              // $('#exampleTable').DataTable().ajax.reload();
		              },
		           error: function()
		           {
		            alert("error");
		           }
          });
		});
*/
</script>