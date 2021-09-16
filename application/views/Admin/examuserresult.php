<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Result</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="examresult_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>User Name</th>
									<th>Course Name</th>
									<th>Score</th>
									<th>Percentage</th>
									<th>Exam Date</th>
									<!--<th>Action</th>-->
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($exam_users as $key=>$exam_user)
									{
										$CI =& get_instance();
										$CI->load->model('Main_model');
										$uid = $exam_user['userid'];
										$cid = $exam_user['course_id'];
										$user_data = $this->Main_model->get_UserCourse($uid, $cid);
										$exam_date = $this->Main_model->get_table('examanswers', array('userid'=>$uid, 'course_id'=>$cid));
										// print_r($user_data);
										if(!empty($user_data)) {
											$totMarks = $this->Main_model->get_totalScore("examanswers",array('userid'=>$uid, 'course_id'=>$cid));
											$userMarks = $this->Main_model->get_rightScore($uid, $cid);
											$user_per = ($userMarks * 100)/$totMarks;
								?>
											<tr>
												<td><?php echo ($key+1); ?></td>
												<td><?php echo $user_data[0]['name']; ?></td>
												<td><?php echo $user_data[0]['coursename']; ?></td>
												<td><?php echo $userMarks." / ".$totMarks; ?></td>
												<td><?php echo round($user_per, 2)."%"; ?></td>
												<td><?php echo $exam_date[0]['createdate']; ?></td>
												<!--<td>
													<a href="<?php echo base_url().'index.php/Admin/addcourse?id='.$course['courseid']; ?>"><i class="fa fa-fw fa-pencil-square-o"></i></a>
													<a href="#" class="delete_tbl_row delete_course" data-id="<?php echo $course['courseid']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
												</td>-->
											</tr>
								<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>  
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {
	$('#examresult_table').DataTable();	
});
</script>
			