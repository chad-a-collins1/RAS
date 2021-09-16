<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Module</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Add Module</h4>
				</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data">
						<?php if($this->session->flashdata('res') == 'success') { ?>
						<div class="row">
							<div class="alert alert-success alert-dismissable col-md-12">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								Record added successfully.
							</div>
						</div>
						<?php }else if($this->session->flashdata('res') == 'error') { ?>
						<div class="row">
							<div class="alert alert-danger alert-dismissable col-md-12">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								Error occurred.
							</div>
						</div>
						<?php }else if($this->session->flashdata('res') == 'update_success') {  ?>
						<div class="row">
							<div class="alert alert-success alert-dismissable col-md-12">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								Update Successfully.
							</div>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Section Title</label>
									<input type="text" class="form-control" name="section_title" placeholder="Section Title" value="<?php echo @$section[0]['sectiontitle'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Select Course</label>
									<select class="form-control" name="course_id" id="course_id">
										<?php 
											foreach($courses as $course) { 
												$sel = "";
												if($course['courseid'] == $section[0]['courseid']) {
													$sel = "selected";
												}
										?>
												<option value="<?php echo $course['courseid']; ?>" <?php echo $sel; ?>><?php echo $course['coursename']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Select Module</label>
									<select class="form-control" name="module_id" id="module_id">
										<?php 
											foreach($modules as $module) { 
												$sel = "";
												if($module['id'] == $section[0]['moduleid']) {
													$sel = "selected";
												}
										?>
												<option value="<?php echo $module['id']; ?>" <?php echo $sel; ?>><?php echo $module['modulename']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="button-group">
									<button type="submit" class="btn waves-effect waves-light btn-outline-primary" name="add_section">Add</button>
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

<script>
	$(document).ready(function() {
	
		$('#course_id').change(function() {
			var courseId = $(this).val();
			$.ajax({
				url: '<?php echo base_url()."index.php/Admin/getModuleAPI" ?>',
				method: 'POST',
				data: {
					'course_id': courseId
				},
				success: function(response) {
					var res = JSON.parse(response);
					$('#module_id').empty();
					$.each(res, function( key, value ) {
						console.log(res[key]['modulename']);
						$('#module_id').append('<option value="'+res[key]['id']+'">'+res[key]['modulename']+'</option>');
					});
				}
			});
		});
		
	});
</script>