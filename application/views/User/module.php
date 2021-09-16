<div class="container" style="padding-bottom: 30px">
 
<!--<div class="form-group row" style="margin-top:30px;font-size:18px;">
	<div class="col-md-8">
			<h2>DOT Hazmat: Takata Airbag Recall Shiping</h2>
	</div>
	<div class="col-md-4 text-right" style=" overflow: hidden; white-space: nowrap;">
			<a href="" class="btn btn-primary theme_btn">Countinue Courses</a>
	</div>
</div>-->
	<div class="form-group row" style="margin-top:20px;">
		<div class="col-md-6">
			<h1 style="font-size:22px"><?php echo $courses[0]['coursename']; ?></h1>
		</div>
		<div class="col-md-6 text-right" style="padding: 10px 30px;">
			<div class="col-md-12">
			<a href="" class="btn btn-primary theme_btn">Continue Courses</a>
			</div>
		</div>
	</div>
<div class="row" style="margin-top:20px;">
	<div class="col-md-3">
		<label><strong>Sign Up Date </strong> <?php echo date('Y-m-d', strtotime($courses[0]['createdat'])); ?></label>
	</div>
	<div class="col-md-3">
		<label><strong>status </strong> Complete</label>
	</div>
	<div class="col-md-6">
		<a href="javascript:void(0)" onClick="printDiv('printableArea');">Print Completion Certificate</a> | 
		<a href="javascript:void(0)" onClick="printDiv('printableAreaWallet');"> Wallet ID</a> | 
		<a href="javascript:void(0)" onClick="printDiv('receipt_div');">Print Receipt</a>
	</div>
</div>
  <div class="card-group"  style="margin-top:20px;">
	<div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px; border: 1px solid #eee;">
		<h3>Course Outline | Course Library</h3>
	</div>
	
	<?php
		if($userMarks != "" && $totMarks != "") {
			$per = ($userMarks*100)/$totMarks;
			$per = round($per, 2);
	?>
			<div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px; border: 1px solid #eee;">
				<h5>Score : <?php echo $userMarks ." / ". $totMarks; ?></h5>
				<h5>Percentage : <?php echo $per; ?>%</h5>
	<?php	
				if($per < $passing_per) {
	?>
					<a href="<?php echo base_url()."index.php/User/exam?cid=".$_GET['id']; ?>" class="btn btn-primary">Re-Exam</a>
	<?php
			}
			echo "</div>";
		}
	?>
	
	<?php 
		foreach($modules as $module) {
	?>
			<div class="card card_module">
				<div class="card-header">
					<a href="<?php echo base_url()."index.php/User/modulefile?id=".$module['id']."&cid=".$_GET['id']; ?>"><?php echo $module['modulename']; ?></a>
					<a href="<?php echo base_url()."index.php/User/exam?id=".$module['id']."&cid=".$_GET['id']; ?>" class="btn btn-primary">Exam</a>
				</div>
				<div class="card-body">
					<?php
						$CI =& get_instance();
						$CI->load->model('Main_model');
						$result = $CI->Main_model->get_table("section",array('courseid'=>$module['course_id'],'moduleid'=>$module['id']));
						foreach($result as $section) {
					?>
							<div class="row" style="padding-bottom:5px;">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<p><?php echo $section['sectiontitle']; ?></p>
								</div>
								<span class="col-md-3 col-sm-3 col-xs-3"><?php echo date('Y-m-d', strtotime($section['createdat'])); ?></span>
								<div class="col-md-3 col-sm-3 col-xs-3">
								<?php
									if($per < $passing_per) {
								?>
							<!-- MOVED TO LINE 63  -->
								<?php } ?>
								</div>
							</div>
					<?php
						}
					?>
						
				</div>
			</div>
	<?php
		}
	?>
	<?php 
		$videobtnshow = 1;
		foreach($videoseen as $videorow) {
			if($videorow['videoseen'] == 0) {
				$videobtnshow = 0;
			}
		}
		if($videobtnshow == 1) {
			if($per < $passing_per) {
	?>
	<?php } } ?>
  </div>
  
</div>
<div id="printableArea" style="display:none">
	<div align="center">
		<div style="width:800px; height:640px; padding:20px; text-align:center; border: 10px solid #cca300 ; background-color: white;">
			<div style="width:750px; height:590px; padding:20px; text-align:center; border: 5px solid #e6b800">
				<span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
				<br><br>
				<span style="font-size:25px"><i>This is to certify that</i></span>
				<br><br>
				<span style="font-size:30px"><b><?php echo $username; ?></b></span><br /><br />
				<span style="font-size:25px"><i>has completed the course</i></span> <br /><br />
				<span style="font-size:30px; font-weight: bold; color: darkgreen;"><?php echo $courses[0]['coursename']; ?></span> <br /><br />
				<span style="font-size:20px">with score of <b><?php echo $per; ?>%</b></span> <br /><br /><br />
				<span style="font-size:25px"><i>date completed</i></span><br>
				<span style="font-size:28px"><?php echo date("l jS \of F Y"); ?></span><br />
				<div align="right"><img src="https://ecomply-cert-training.com/assets/images/eComply-Logo.png" style="height:45px; width:180px; align:right"></div><br /><br />
			</div>
		</div>
	</div>
</div>



<div id="printableAreaWallet" style="display:none">
	<div align="center">
		<div style="width:220px; height:400px; padding:20px; text-align:center; border: 4px solid #cca300; background-color: white;">
			<div style="width:180px; height:360px; padding:20px; text-align:center; border: 2px solid #cca300">
				<span style="font-size:10px; font-weight:bold">Certificate of Completion</span>
				<br><br>
				<span style="font-size:10px"><i>This is to certify that</i></span>
				<br>
				<span style="font-size:10px"><b><?php echo $username; ?></b></span><br />
				<span style="font-size:8px"><i>has completed the course</i></span> <br />
				<span style="font-size:10px; font-weight: bold; color: darkgreen;"><?php echo $courses[0]['coursename']; ?></span> <br />
				<span style="font-size:7px">with score of <b><?php echo $per; ?>%</b></span> <br />
				<span style="font-size:8px"><i>date completed</i></span><br>
				<span style="font-size:9px"><?php echo date("l jS \of F Y"); ?></span><br /><br /><br /><br />
				<div align="right"><img src="https://ecomply-cert-training.com/assets/images/eComply-Logo.png" style="height:15px; width:70px; align:right"></div><br /><br />
			</div>
		</div>
	</div>
</div>



<div class="container" id="receipt_div" style="display: none;">
	<div class="row invoice row-printable">
    <div class="col-md-12">
        <!-- col-lg-12 start here -->
        <div class="panel panel-default plain" id="dash_0">
            <!-- Start .panel -->
            <div class="panel-body p30">
                <div class="row">
                    <!-- Start .row -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-logo"><img src="<?php echo base_url(); ?>assets/images/eComply-Logo.png" style="width: 250px;" alt="Invoice logo"></div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <!--<div class="col-lg-6">
                        <div class="invoice-from">
                            <ul class="list-unstyled text-right">
                                <li>Dash LLC</li>
                                <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                <li>Austin TX 78754</li>
                                <li>VAT Number EU826113958</li>
                            </ul>
                        </div>
                    </div>-->
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-to mt25">
                            <ul class="list-unstyled">
                                <li><strong>Invoiced To</strong></li>
                                <li><?php echo $username; ?></li>
								<li><strong>Due Date:</strong><?php echo date('Y-m-d'); ?></li>
                            </ul>
                        </div>
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="per70 text-center">Course Name</th>
                                            <th class="per5 text-center">Price</th>
                                            <th class="per25 text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $courses[0]['coursename']; ?></td>
                                            <td class="text-center">$<?php echo $courses[0]['price']; ?></td>
                                            <td class="text-center">$<?php echo $courses[0]['price']; ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-right">Sub Total:</th>
                                            <th class="text-center">$<?php echo $courses[0]['price']; ?></th>
                                        </tr>
                                        <!--<tr>
                                            <th colspan="2" class="text-right">20% VAT:</th>
                                            <th class="text-center">$47.40 USD</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-right">Credit:</th>
                                            <th class="text-center">$00.00 USD</th>
                                        </tr>-->
                                        <tr>
                                            <th colspan="2" class="text-right">Total:</th>
                                            <th class="text-center">$<?php echo $courses[0]['price']; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
</div>

<script type="text/javascript">

function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
}

</script>
