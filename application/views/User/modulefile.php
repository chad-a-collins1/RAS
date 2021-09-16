<div class="container">
	<video style="width: 100%;" id="myVideo" controls controlsList="nodownload">
		<source src="<?php echo base_url()."uploads/module/videos/".$media[0]['videofilepath']; ?>">
	</video>
	<input type="range" min="100" max="500" step="50" id="mySlider" value="0" onchange="document.getElementById('myVideo').width = this.value;" />
	


	
</div>
<div class="modal " id="exam_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to start Exam ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url(); ?>index.php/User/exam?cid=<?php echo $_GET["cid"] ?>" class="btn btn-primary">Start Exam</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('video').on('ended',function(){
	  var mid = '<?php echo $_GET["id"] ?>';
	  var cid = '<?php echo $_GET["cid"] ?>';
	  
	  $.ajax({
			url: '<?php echo base_url()."index.php/User/updatevideoseen" ?>',
			method: 'POST',
			data: {
				'course_id': cid,
				'module_id': mid,
				'user_id': <?php echo $_SESSION['user_id']; ?>
			},
			success: function(response) {
				if(response == 1) {
					window.history.back();
				}
			}
		});
	  
    });
  });
/*]]>*/


	document.getElementById('myVideo').addEventListener('ended', myHandler, false);

	function myHandler(e) {
		if (!e){
			e = window.event;
		}
		$("#exam_modal").modal('show');
		// window.open('https://ecomply-cert-training.com/index.php/User/exam?cid=<?php echo $_GET["cid"] ?>','_blank');
		//       document.getElementById("submit").disabled = false;
		//       alert("Video has ended, you may now submit the exam answers.");
		//       $submit.prop('disabled', false);
	}


    var video = document.getElementById('myVideo');

    var supposedCurrentTime = 0;
    video.addEventListener('timeupdate', function () {
        if (!video.seeking) {
            supposedCurrentTime = video.currentTime;
        }
    });
    // prevent user from seeking
    video.addEventListener('seeking', function () {
        // guard agains infinite recursion:
        // user seeks, seeking is fired, currentTime is modified, seeking is fired, current time is modified, ....
        
		var delta = video.currentTime - supposedCurrentTime;
        if (Math.abs(delta) > 0.01) {
            console.log("Seeking is disabled");
            video.currentTime = supposedCurrentTime;
        }
    });



</script>
