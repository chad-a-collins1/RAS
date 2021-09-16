<div class="container">
	<!--<div class="row">
		<div class="col-md-6">
			<h1 class="text-primary">Sign Up For Courses</h1>
		</div>
		<div class="col-md-6 text-right">
			<input type="text" name="x" placeholder="Search">
			<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                
		</div>
	</div>-->
	<div class="form-group row" style="margin-top:20px;">
		<div class="col-md-3">
			<h1 class="text-primary" style="font-size:22px">Sign Up For Courses</h1>
			
			
		</div>
		<div class="col-md-9 text-right" style="padding: 10px 30px;">
			<div class="col-md-12">
				<input type="text" name="x" placeholder="Search">
			<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table id="course" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
				<thead>
					<tr>
						<th>Course Name</th>
						<th>Course Description</th>
						<th>Action</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($courses as $cours) {
					?>
					<tr>
						<td><?php echo $cours['coursename']; ?></td>
						<td><a><?php echo $cours['coursedescription']; ?></a></td>
						<!--<td class="text-center">Dot hazmat</td>-->
						<td><a href="<?php echo base_url().'index.php/User/cours_payment?id='.$cours['courseid']; ?>" class="btn btn-primary">Select</a></td>
						<td>$<?php echo $cours['price']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	
				
	
</div>