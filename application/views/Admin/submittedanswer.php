<div class="container-fluid">
	<!-- Title & Breadcrumbs-->
	<div class="row page-titles">
		<div class="col-md-12 align-self-center">
			<h4 class="theme-cl">Submitted Answers</h4>
		</div>
	</div>
	<!-- Title & Breadcrumbs-->
	
	<div class="row">
		<!-- col-md-12 -->
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card-group"  style="margin-top:20px;">
				<div class="card">
					<div class="card-header">
						<h4><?php echo $modules[0]['modulename']; ?></h4>
					</div>
					<div class="card-body">
						<?php 
							foreach($answers as $key=>$answer) {
								
								if($answer['typeofquestion'] == "multiplechoice") {
						?>
									<div class="col-md-12">
										<h6 style="font-size: 18px; font-weight: 700;"><?php echo ($key+1).". ".$answer['question']; ?></h6>
										<div class="col-md-12">
											<p><b><i>Ans.</i></b> <?php echo $answer['option_'.strtolower($answer['submitted_answer'])]; ?></p>
										</div>
									</div>
						<?php
								}else if($answer['typeofquestion'] == "truefalse") {
						?>
									<div class="col-md-12">
										<h6 style="font-size: 18px; font-weight: 700;"><?php echo ($key+1).". ".$answer['question']; ?></h6>
										<div class="col-md-12">
											<p><b><i>Ans.</i></b> <?php echo $answer['submitted_answer']; ?><p>
										</div>
									</div>
						<?php
								}
						
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>  
<!-- /.content-wrapper -->

			