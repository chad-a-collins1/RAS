<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Purchased Project</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Purchased Project List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="purchasedproject_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Course Name</th>
									<th>Purchase Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($projects as $key=>$project)
									{
								?>
										<tr>
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $project['coursename']; ?></td>
											<td><?php echo date('Y-m-d',strtotime($project['createdat'])); ?></td>
											<td>
												<!--<a href="#" class="delete_tbl_row"><i class="fa fa-fw fa-trash-o"></i></a> -->
												<a href="<?php echo base_url().'index.php/Admin/coursedetails?cid='.$project['course_id'].'&uid='.$_GET['uid']; ?>" class="btn waves-effect waves-light btn-outline-primary primary_btn_hover">Details</a> 
											</td>
										</tr>
								<?php
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
	$('#purchasedproject_table').DataTable();
});
</script>
			