<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Course</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Add Course</h4>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Course Name</label>
									<input type="text" class="form-control" name="course_name" placeholder="Course Name" value="<?php echo @$course[0]['coursename'] ?>" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Course Description</label>
									<textarea class="form-control" placeholder="Description." rows=5 name="course_desc"><?php echo @$course[0]['coursedescription'] ?></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Course Price</label>
									<input type="text" class="form-control" name="course_price" value="<?php echo @$course[0]['price'] ?>" placeholder="Course Price" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="button-group">
									<button type="submit" class="btn waves-effect waves-light btn-outline-primary" name="add_course">Add</button>
								</div>
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content-wrapper -->
<?php 
	if($success == 1) {
		echo '<script>$(document).ready(function(){confirm("Update successfully.");});</script>';
	}
?>

			