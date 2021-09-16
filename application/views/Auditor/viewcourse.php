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
					<h4>Course List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="viewcourse_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Course Name</th>
									<th>Description</th>
									<th>Price</th>
									<th>Create Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($courses as $key=>$course)
									{
								?>
										<tr class="course_row_<?php echo $course['courseid']; ?>">
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $course['coursename']; ?></td>
											<td><?php echo $course['coursedescription']; ?></td>
											<td><?php echo $course['price']; ?></td>
											<td><?php echo $course['createdat']; ?></td>
											<td>
												<a href="<?php echo base_url().'index.php/Admin/addcourse?id='.$course['courseid']; ?>"><i class="fa fa-fw fa-pencil-square-o"></i></a>
												<a href="#" class="delete_tbl_row delete_course" data-id="<?php echo $course['courseid']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
	$('#viewcourse_table').DataTable();
	
	$(".delete_course").click(function() {
		var id= $(this).data('id');
		
		var r = confirm("Are you sure to want to delete this record ?");
		if(r == true) {
			$.ajax({
				url: "<?php echo base_url().'index.php/Admin/deleterecord'; ?>",
				data: { 
					'tbl_name': 'courses',
					'id': id,
					'wh_field': 'courseid'
				},
				method: "POST",
				success: function(response) {
					if(response == 1) {
						alert("Delete Successfully.");
						$(".course_row_"+id).remove();
					}else {
						alert("Error Occured...");
					}
				}
			});
		}
	});
	
});
</script>
			