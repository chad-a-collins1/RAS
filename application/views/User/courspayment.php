<div class="row">
	<div class="col-md-6 offset-md-3">
		<?php 
			if($err == 1) {
		?>
				<div class="alert alert-danger p-2 pb-3">
					<a class="close font-weight-normal initialism" data-dismiss="alert" href="#"><samp>×</samp></a> 
					Payment not successfully done.
				</div>
		<?php
			}
		?>
		
		<!-- form card cc payment -->
		<div class="card card-outline-secondary">
			<div class="card-body">
				<form class="form" method="POST" autocomplete="off">
					<div class="form-group">
						<label for="cc_name">Name</label>
						<input type="text" class="form-control" id="cc_name" name="name" pattern="\w+ \w+.*" title="First and last name" required="required">
					</div>
					<div class="form-group">
						<label>Card Number</label>
						<input type="text" class="form-control" name="card_no" autocomplete="off" maxlength="20" pattern="\d{16}" title="Credit card number" required="">
					</div>
					<div class="form-group row">
						<label class="col-md-12">Card Exp. Date</label>
						<div class="col-md-4">
							<select class="form-control" name="month" size="0">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control" name="year" size="0">
							<?php
								$cr_year = date('Y');
								for($i=0; $i<=5; $i++ )
								{
							?>					
								<option value="<?php echo ($cr_year + $i); ?>"><?php echo ($cr_year + $i); ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="col-md-4">
							<input type="text" name="cvv_no" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" placeholder="CVC">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<label for="cc_name">Billing Address</label>
							<input type="text" class="form-control" name="address" >
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<input type="text" class="form-control" name="city" placeholder="City">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="state" placeholder="State">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="zip" placeholder="Zip">
						</div>
					</div>
					
					<hr>
					<div class="form-group row">
						<div class="col-md-6">
							<button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
						</div>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success btn-lg btn-block" name="payment">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- /form card cc payment -->
	</div>
</div>