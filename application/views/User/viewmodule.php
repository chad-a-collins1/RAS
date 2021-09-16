<div class="container">
	<div class="row">
	<?php 
		foreach($modules as $module) {
	?>
		<div class="col-md-6">
			<div class="col-md-12">
				<a href="#"><?php echo $module['modulename']; ?></a>
			</div>
			<div class="col-md-12">
				<?php echo $module['description']; ?>
			</div>
		</div>
			
	<?php
		}
	
	?>
	</div>
</div>