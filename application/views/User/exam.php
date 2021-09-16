<div class="container">
	<div class="card-group"  style="margin-top:20px;">
		<div class="card">
			<!--<div class="card-header">
				<h4><?php echo $modules[0]['modulename']; ?></h4>
		
			</div>-->
			<form method="POST">

				<div class="card-body">
					<?php 
						// echo "<pre>";
						// print_r($questions);
						// echo "</pre>";
						foreach($questions as $key=>$question) {
							
							if($question['typeofquestion'] == "multiplechoice") {
					?>
								<div class="col-md-12">
									<h6 style="font-size: 18px; font-weight: 700;"><?php echo ($key+1).". ".$question['question']; ?></h6>
									<div class="col-md-12">
										<input type="hidden" name="queId_<?php echo $key; ?>" value="<?php echo $question['questionid']; ?>">
										<input type="hidden" name="modId_<?php echo $key; ?>" value="<?php echo $question['module_id']; ?>">
										<input type="hidden" name="secId_<?php echo $key; ?>" value="<?php echo $question['sectionid']; ?>">
										<p><b><i>A.</i></b> <input type="radio" name="que_<?php echo $key; ?>" value="A"> <?php echo $question['option_a']; ?></p>
										<p><b><i>B.</i></b> <input type="radio" name="que_<?php echo $key; ?>" value="B"> <?php echo $question['option_b']; ?></p>
										<p><b><i>C.</i></b> <input type="radio" name="que_<?php echo $key; ?>" value="C"> <?php echo $question['option_c']; ?></p>
										<p><b><i>D.</i></b> <input type="radio" name="que_<?php echo $key; ?>" value="D"> <?php echo $question['option_d']; ?></p>
									</div>
								</div>
					<?php
							}else if($question['typeofquestion'] == "truefalse") {
					?>
								<div class="col-md-12">
									<h6 style="font-size: 18px; font-weight: 700;"><?php echo ($key+1).". ".$question['question']; ?></h6>
									<div class="col-md-12">
										<input type="hidden" name="queId_<?php echo $key; ?>" value="<?php echo $question['questionid']; ?>">
										<input type="hidden" name="modId_<?php echo $key; ?>" value="<?php echo $question['module_id']; ?>">
										<input type="hidden" name="secId_<?php echo $key; ?>" value="<?php echo $question['sectionid']; ?>">
										<p><b><i>A.</i></b> <input type="radio" name="que_<?php echo $key; ?>" value="TRUE"> <?php echo $question['option_a']; ?></p>
										<p><b><i>B.</i></b> <input type="radio" name="que_<?php echo $key; ?>" value="FALSE"> <?php echo $question['option_b']; ?></p>
									</div>
								</div>
					<?php
							}
					
						}
					?>
				</div>
				<div class="card-footer">
					<input type="hidden" name="totalque" value="<?php echo @$key; ?>" >
		
					<button type="submit" class="btn btn-primary" id="submitanswer" value="Submit" name="submitanswer">Submit</button>
					<!--<button type="button" class="btn btn-primary" name="esignature">eSignature</button>-->
				</div>
			</form>
		</div>
	</div>
</div>
