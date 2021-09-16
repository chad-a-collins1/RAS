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
					<h4>Module List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="viewmodule_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Module Name</th>
									<th>Video File</th>
									<th>Course</th>
									<th>Create Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($modules as $key=>$module)
									{
								?>
										<tr class="module_row_<?php echo $module['id']; ?>">
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $module['modulename']; ?></td>
											<td>
												<div class="embed-responsive embed-responsive-21by9" style="width: 160px; height: 75px;">
													<iframe class="embed-responsive-item" src="<?php echo base_url().'uploads/module/videos/'.$module['videofilepath']; ?>"></iframe>
												</div>
											</td>
											<td><?php echo $module['coursename']; ?></td>
											<td><?php echo $module['createdat']; ?></td>
											<td>
												<a href="<?php echo base_url().'index.php/Admin/addmodule?id='.$module['id']; ?>"><i class="fa fa-fw fa-pencil-square-o"></i></a>
												<a href="#" class="delete_tbl_row delete_module" data-id="<?php echo $module['id']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
	$('#viewmodule_table').DataTable();
	
	$(".delete_module").click(function() {
		var id= $(this).data('id');
		
		var r = confirm("Are you sure to want to delete this record ?");
		if(r == true) {
			$.ajax({
				url: "<?php echo base_url().'index.php/Admin/deleterecord'; ?>",
				data: { 
					'tbl_name': 'modules',
					'id': id,
					'wh_field': 'id'
				},
				method: "POST",
				success: function(response) {
					if(response == 1) {
						alert("Delete Successfully.");
						$(".module_row_"+id).remove();
					}else {
						alert("Error Occured...");
					}
				}
			});
		}
	});
	
});
</script>
			