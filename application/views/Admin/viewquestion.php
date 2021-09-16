<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Questions</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Questions List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="viewquestion_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Question Title</th>
									<th>Type of question</th>
									<th>Option A</th>
									<th>Option B</th>
									<th>Option C</th>
									<th>Option D</th>
									<th>Correct Ans.</th>
									<th>Course Name</th>
									<th>Module Name</th>
									<th>Section Title</th>
									<th>Created At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($questions as $key=>$question)
									{
								?>
										<tr class="question_row_<?php echo $question['questionid']; ?>">
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $question['question']; ?></td>
											<td><?php echo $question['typeofquestion']; ?></td>
											<td><?php echo $question['option_a']; ?></td>
											<td><?php echo $question['option_b']; ?></td>
											<td><?php echo $question['option_c']; ?></td>
											<td><?php echo $question['option_d']; ?></td>
											<td><?php echo $question['correct_ans']; ?></td>
											<td><?php echo $question['coursename']; ?></td>
											<td><?php echo $question['modulename']; ?></td>
											<td><?php echo $question['sectiontitle']; ?></td>
											<td><?php echo $question['CreatedTS']; ?></td>
											<td>
												<a href="<?php echo base_url().'index.php/Admin/addquestion?id='.$question['questionid']; ?>"><i class="fa fa-fw fa-pencil-square-o"></i></a>
												<a href="#" class="delete_tbl_row delete_question" data-id="<?php echo $question['questionid']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
	$('#viewquestion_table').DataTable();
	
	$(".delete_question").click(function() {
		var id= $(this).data('id');
		
		var r = confirm("Are you sure to want to delete this record ?");
		if(r == true) {
			$.ajax({
				url: "<?php echo base_url().'index.php/Admin/deleterecord'; ?>",
				data: { 
					'tbl_name': 'question',
					'id': id,
					'wh_field': 'questionid'
				},
				method: "POST",
				success: function(response) {
					if(response == 1) {
						alert("Delete Successfully.");
						$(".question_row_"+id).remove();
					}else {
						alert("Error Occured...");
					}
				}
			});
		}
	});
	
});
</script>
			