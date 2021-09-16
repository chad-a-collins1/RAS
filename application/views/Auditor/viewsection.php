<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Section</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Section List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="viewsection_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Section Title</th>
									<th>Course</th>
									<th>Module</th>
									<th>Create Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($sections as $key=>$section)
									{
								?>
										<tr class="section_row_<?php echo $section['id']; ?>">
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $section['sectiontitle']; ?></td>
											<td><?php echo $section['coursename']; ?></td>
											<td><?php echo $section['modulename']; ?></td>
											<td><?php echo $section['createdat']; ?></td>
											<td>
												<a href="<?php echo base_url().'index.php/Admin/addsection?id='.$section['id']; ?>"><i class="fa fa-fw fa-pencil-square-o"></i></a>
												<a href="#" class="delete_tbl_row delete_section" data-id="<?php echo $section['id']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
	$('#viewsection_table').DataTable();
	
	$(".delete_section").click(function() {
		var id= $(this).data('id');
		
		var r = confirm("Are you sure to want to delete this record ?");
		if(r == true) {
			$.ajax({
				url: "<?php echo base_url().'index.php/Admin/deleterecord'; ?>",
				data: { 
					'tbl_name': 'section',
					'id': id,
					'wh_field': 'id'
				},
				method: "POST",
				success: function(response) {
					if(response == 1) {
						alert("Delete Successfully.");
						$(".section_row_"+id).remove();
					}else {
						alert("Error Occured...");
					}
				}
			});
		}
	});
	
});
</script>
			