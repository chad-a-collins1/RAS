<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Users</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Removed Users List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="viewuser_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Organization</th>
									<th>phone No.</th>
									<th>Created Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($users as $key=>$user)
									{
								?>
										<tr class="user_row_<?php echo $user['user_id']; ?>">
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $user['name']; ?></td>
											<td><?php echo $user['email']; ?></td>
											<td><?php echo $user['organization']; ?></td>
											<td><?php echo $user['phoneno']; ?></td>
											<td><?php echo $user['createdat']; ?></td>
											<td>
												<a href="#" class="restore_user" data-id="<?php echo $user['user_id']; ?>"><i class="fa fa-repeat" aria-hidden="true"></i></a> | 
												<a href="#" class="delete_tbl_row delete_user" data-id="<?php echo $user['user_id']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
	$('#viewuser_table').DataTable();
	
	$(".delete_user").click(function() {
		var id= $(this).data('id');
		
		var r = confirm("Are you sure to want to delete this record ?");
		if(r == true) {
			$.ajax({
				url: "<?php echo base_url().'index.php/Admin/removerecordAPI'; ?>",
				data: {
					'tbl_name': 'user',
					'id': id,
					'wh_field': 'user_id'
				},
				method: "POST",
				success: function(response) {
					if(response == 1) {
						alert("Delete Successfully.");
						$(".user_row_"+id).remove();
					}else {
						alert("Error Occured...");
					}
				}
			});
		}
	});
	
	$(".restore_user").click(function() {
		var id= $(this).data('id');
		
		var r = confirm("Are you sure to want to testore this record ?");
		if(r == true) {
			$.ajax({
				url: "<?php echo base_url().'index.php/Admin/restorerecordAPI'; ?>",
				data: {
					'tbl_name': 'user',
					'id': id,
					'wh_field': 'user_id'
				},
				method: "POST",
				success: function(response) {
					if(response == 1) {
						alert("Restore Successfully.");
						$(".user_row_"+id).remove();
					}else {
						alert("Error Occured...");
					}
				}
			});
		}
	});
	
});

	
</script>
			