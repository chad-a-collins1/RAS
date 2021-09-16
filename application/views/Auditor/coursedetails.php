<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Course Details</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Course Details</h4>
				</div>
				<div class="card-body">
					<?php 
						foreach($modules as $module) {
					?>
							<div class="col-sm-6 col-md-6" style="float: left;">
								<div class="card">
									<div class="card-header">
										<h4><?php echo $module['modulename']; ?></h4>
									</div>
									<div class="card-body">
										<table class="table table-striped">
											<tbody>
											<?php
												$CI =& get_instance();
												$CI->load->model('Main_model');
												$result = $CI->Main_model->get_table("section",array('courseid'=>$_GET['cid'],'moduleid'=>$module['id']));
												foreach($result as $res) {
											?>
													<tr>
														<td><?php echo $res['sectiontitle']; ?></td>
														<?php 
															$where['userid'] = $_GET['uid'];
															$where['course_id'] = $_GET['cid'];
															$where['moduleid'] = $module['id'];
															$where['sectionid'] = $res['id'];
															$ans_data = $CI->Main_model->get_table("examanswers", $where);
															if(!empty($ans_data)) {
																echo '<td><a href="'.base_url().'index.php/Admin/submittedanswer?uid='.$_GET['uid'].'&cid='.$_GET['cid'].'&mid='.$module['id'].'&sid='.$res['id'].'" class="btn waves-effect waves-light btn-outline-primary primary_btn_hover">Submitted Answer</a></td>';
															}else {
																echo '<td><label class="text-danger"><b>* Not Submited</b></label></td>';
															}
														?>
														
													</tr>
											<?php
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
					<?php
						}
					?>
					
				</div>
			</div>
		</div>
	</div>
</div>  
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {
	$('#coursedetail_table').DataTable();
	

	
});
</script>
			