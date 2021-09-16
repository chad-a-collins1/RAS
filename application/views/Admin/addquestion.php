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
									<label>Question Title</label>
									<input type="text" class="form-control" name="question_title" placeholder="Question Title" value="<?php echo @$question[0]['question']; ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Type of Question</label>
									<select class="form-control" name="typeofque" id="typeofquestion">
										<option value="multipalchoice" <?php if(@$question[0]['typeofquestion'] == 'multiplechoice') {echo "selected";} ?>>Multiple Choice</option>
										<option value="truefalse" <?php if(@$question[0]['typeofquestion'] == 'truefalse') {echo "selected";} ?>>Truefalse</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<?php
								if(@$question[0]['typeofquestion'] == "truefalse") {
									$style = "style='display: none;'";
									$readonly = "readonly";
								}else if(@$question[0]['typeofquestion'] == "multiplechoice"){
									$style = "";
									$readonly = "";
								}else {
									$style = "";
									$readonly = "";
								}
							?>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<label>option A</label>
									<input type="text" class="form-control" name="option_a" id="option_a" placeholder="Option A" value="<?php echo @$question[0]['option_a']; ?>" <?php echo @$readonly; ?> />
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<label>option B</label>
									<input type="text" class="form-control" name="option_b" id="option_b" placeholder="Option B" value="<?php echo @$question[0]['option_b']; ?>" <?php echo @$readonly; ?> />
								</div>
							</div>
							<div class="col-lg-3 col-md-6" id="option_c_div" <?php echo @$style; ?>>
								<div class="form-group">
									<label>option C</label>
									<input type="text" class="form-control" name="option_c" id="option_c" placeholder="Option C" value="<?php echo @$question[0]['option_c']; ?>" />
								</div>
							</div>
							<div class="col-lg-3 col-md-6" id="option_d_div" <?php echo @$style; ?>>
								<div class="form-group">
									<label>option D</label>
									<input type="text" class="form-control" name="option_d" id="option_d" placeholder="Option D" value="<?php echo @$question[0]['option_d']; ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Correct Answer</label>
									<select class="form-control" name="correct_ans" id="correct_ans">
										<?php 
											if(@$question[0]['typeofquestion'] == "truefalse") {
										?>
												<option value="TRUE" <?php if(@$question[0]['correct_ans'] == "TRUE"){echo "selected";} ?>>True</option>
												<option value="FALSE" <?php if(@$question[0]['correct_ans'] == "FALSE"){echo "selected";} ?>>False</option>
										<?php
											}else {
										?>
												<option value="A" <?php if(@$question[0]['correct_ans'] == "A"){echo "selected";} ?>>A</option>
												<option value="B" <?php if(@$question[0]['correct_ans'] == "B"){echo "selected";} ?>>B</option>
												<option value="C" <?php if(@$question[0]['correct_ans'] == "C"){echo "selected";} ?>>C</option>
												<option value="D" <?php if(@$question[0]['correct_ans'] == "D"){echo "selected";} ?>>D</option>
										<?php
											}
										?>
										
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Select Course</label>
									<select class="form-control" name="course_id" id="course_id">
										<option selected disabled>Select Course</option>
										<?php 
											foreach($courses as $course) { 
												$sel = "";
												if($course['courseid'] == $question[0]['course_id']) {
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
										<option selected disabled>Select Module</option>
										<?php 
											foreach($modules as $module) { 
												$sel = "";
												if($module['id'] == $question[0]['module_id']) {
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
								<div class="form-group">
									<label>Select Section</label>
									<select class="form-control" name="section_id" id="section_id" required>
										<option selected disabled>Select Section</option>
										<?php 
											foreach($sections as $section) { 
												$sel = "";
												if($section['id'] == $question[0]['sectionid']) {
													$sel = "selected";
												}
										?>
												<option value="<?php echo $section['id']; ?>" <?php echo $sel; ?>><?php echo $section['sectiontitle']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="button-group">
									<button type="submit" class="btn waves-effect waves-light btn-outline-primary" name="add_question">Add</button>
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
					$('#section_id').empty();
					$('#module_id').append('<option selected disabled>Select Module</option>');
					$.each(res, function( key, value ) {
						console.log(res[key]['modulename']);
						$('#module_id').append('<option value="'+res[key]['id']+'">'+res[key]['modulename']+'</option>');
					});
				}
			});
		});
		
		$('#module_id').change(function() {
			var moduleId = $(this).val();
			var courseId = $('#course_id').val();
			// alert(courseId);
			$.ajax({
				url: '<?php echo base_url()."index.php/Admin/getSectionAPI" ?>',
				method: 'POST',
				data: {
					'course_id': courseId,
					'module_id': moduleId
				},
				success: function(response) {
					var res = JSON.parse(response);
					$('#section_id').append('<option selected disabled>Select Section</option>');
					$('#section_id').empty();
					$.each(res, function( key, value ) {
						$('#section_id').append('<option value="'+res[key]['id']+'">'+res[key]['sectiontitle']+'</option>');
					});
				}
			});
		});
		
		$('#typeofquestion').change(function() {
			var optionval = $(this).val();
			
			if(optionval == 'truefalse') {
				$('#option_a').val('TRUE');
				$('#option_a').attr('readonly', true);
				$('#option_b').val('FALSE');
				$('#option_b').attr('readonly', true);
				$('#option_c_div').hide();
				$('#option_d_div').hide();
				$('#correct_ans').empty();
				$('#correct_ans').append('<option value="TRUE">True</option><option value="FALSE">False</option>');
				$('#option_c').val("");
				$('#option_d').val("");
			}else if(optionval == 'multiplechoice') {
				$('#option_a').val('');
				$('#option_a').attr('readonly', false);
				$('#option_b').val('');
				$('#option_b').attr('readonly', false);
				$('#option_c_div').show();
				$('#option_d_div').show();
				$('#correct_ans').empty();
				$('#correct_ans').append('<option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option>');
			}
			
		});
		
		
		
	});
</script>