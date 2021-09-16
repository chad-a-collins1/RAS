<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Settings</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4>Percentage</h4>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Percentage</label>
									<input type="text" class="form-control" name="percentage" placeholder="Percentage" value="<?php echo $percentage[0]['setting_value'] ?>" required />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="button-group">
									<button type="submit" class="btn waves-effect waves-light btn-outline-primary" name="add_percentage">Save</button>
								</div>
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>  
<!-- /.content-wrapper -->

			