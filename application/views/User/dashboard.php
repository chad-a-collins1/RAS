
<!--<div class="container">
	<div class="row" style="margin-top:10px;">
		<div class="col-md-3" style="color:green">
			<h1>eComply</h1>
		</div>
		
	</div>
</div>-->

<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <!-- <a class="navbar-brand" href="#">WebSiteName</a>-->
   <!-- </div>
    <ul class="nav navbar-nav">
   
      <li><a href="#">Stundet Home</a></li>
      <li><a href="#">Register For Courses</a></li>
      <li><a href="#">My Account</a></li>
    </ul>
	<!--<button class="btn btn-danger navbar-btn">Button</button>-->
<!--<ul class="nav navbar-nav navbar-right">
   
	  <li><a href="#">Help</a></li>
      <li><a href="#">LogOut</a></li>
    </ul>
	<!--<form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>-->
  <!--</div>
</nav>-->

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h1 style="color:green;" class="text-left">Welcome <?php echo substr($_SESSION['user_name'], 0, strpos($_SESSION['user_name'], ' ')) ?>!</h1>
		<h4 class="text-left" style="font-size:18px;">You have succesfully signed into your student Account.</h4>
		<h4 class="text-left" style="font-size:18px;">Below is the list of courses in which you have enrolled. Click on any of these courses to begin, or to continue the courses. If you wish to edit your Account information
		click on the "My Account" link on the left. If you need assistance,click on the "Customer Service" link.</h4>
		</div>
	</div>
	
	<!--<div class="form-group row" style="margin-top:30px;font-size:18px;">
		<div class="col-md-6">
			<h1 class="text-primary">My Courses</h1>
			<h2 class="text-primary">Completed Courses</h2>
		</div>
		<div class="col-md-6 text-right" style="overflow: hidden; white-space: nowrap;">
			<a href="" class="btn btn-primary theme_btn">Sign Up For More Courses</a>
		</div>
	</div>-->
	<div class="form-group row" style="margin-top:30px;">
		<div class="col-md-3">
			<h1 class="text-primary" style="font-size:22px">My Courses</h1>
			<h2 class="text-primary" style="font-size:22px">Completed Courses</h2>
			
		</div>
		<div class="col-md-9 text-right" style="padding:20px 40px;">
			<div class="col-md-12">
			<a href="<?php echo base_url(); ?>index.php/User/courses" class="btn btn-primary theme_btn">Sign Up For More Courses</a>	
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<?php //print_r($courses); ?>
			<table id="course" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
				<thead>
					<tr>
						<th class="text-center"><b>Action</b></th>
						<th class="text-center"><b>Course name</b></th>
						<th class="text-center"><b>Status</b></th>
						<th class="text-center"><b>Sign Up Date</b></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($courses as $course) {
					?>
							<tr>
								<td><a href="<?php echo base_url()."index.php/User/module?id=".$course['course_id']; ?>" class="btn btn-primary" type="sbumit">Review</a></td>
								<td><?php echo $course['coursename']; ?></td>
								<td>In Progress</td>
								<td><?php echo date("Y-m-d",strtotime($course['createdat'])); ?></td>
							</tr>
					<?php
						}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
	
</div>

 </body>
 </html>
 <style>
.collapse.in{
	display:block !important;
	}
</style>
