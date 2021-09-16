<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Payments</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Payment List</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"> 
						<table id="viewpayment_table" class="table table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>User Name</th>
									<th>User Phone</th>
									<th>Course Name</th>
									<th>Amount</th>
									<th>Payment Status</th>
									<th>Payment Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($payment_data as $key=>$payment_rec)
									{
								?>
										<tr class="course_row_<?php echo $payment_rec['id']; ?>">
											<td><?php echo ($key+1); ?></td>
											<td><?php echo $payment_rec['name']; ?></td>
											<td><?php echo $payment_rec['phoneno']; ?></td>
											<td><?php echo $payment_rec['coursename']; ?></td>
											<td><?php echo $payment_rec['amount']; ?></td>
											<td><?php echo $payment_rec['payment_status']; ?></td>
											<td><?php echo $payment_rec['createdat']; ?></td>
											<!--<td>
												<a href="<?php echo base_url().'index.php/Admin/addcourse?id='.$course['courseid']; ?>"><i class="fa fa-fw fa-pencil-square-o"></i></a>
												<a href="#" class="delete_tbl_row delete_course" data-id="<?php echo $course['courseid']; ?>"><i class="fa fa-fw fa-trash-o"></i></a>
											</td>-->
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
	$('#viewpayment_table').DataTable();	
});
</script>
			