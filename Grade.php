<?php include 'AfterLogin.php'; 
$user =  $_SESSION['user'];
?>
<!DOCTYPE html>
<html>

<body>
<?php
		global $user;
		$temp =0;
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "SELECT * FROM Abstract  WHERE IsApproved = 1 AND (Reviewer1='$user' OR Reviewer2='$user')";
		$result = mysqli_query($con,$query);	
		$rows = mysqli_num_rows($result);
		if($rows > 0){
			while($res = mysqli_fetch_array($result)){
			if($temp%2==0){
	?>
				<div class="row" align="center">
				  <div class="col-sm-6">
					<div class="card">
					  <div class="card-body">
						<h5 class="card-title">Title: <?php echo $res['Title']?></h5>
						<p class="card-text">Participant name: <?php echo $res['Fullname']?><br>
						Status: <?php if(($res['IsGraded1'] == 1 && $res['Reviewer1'] == $user) || ($res['IsGraded2'] == 1 && $res['Reviewer2'] == $user)){
							$str = "Already Graded (Re-grading would update the grade)"; echo "$str";
							} 
							else echo "Not yet graded";?>
						</p>
						<a target="blank" href=<?php echo "Abstract/".$res["UploadedItem"];?> class="btn btn-primary">View Submission</a>
						<input type="button" name="grade" value="Grade Presentation" id="<?php echo $res["Id"]; ?>" class="btn btn-primary grade_pres" /></td>
					  </div>
					</div>
				  </div>
	<?php
			}
			else{
	?>
				  <div class="col-sm-6">
					<div class="card">
					  <div class="card-body">
						<h5 class="card-title">Title: <?php echo $res['Title']?></h5>
						<p class="card-text">Participant name: <?php echo $res['Fullname']?><br>
						Status: <?php if(($res['IsGraded1'] == 1 && $res['Reviewer1'] == $user) || ($res['IsGraded2'] == 1 && $res['Reviewer2'] == $user)){
							$str = "Already Graded (Re-grading would update the grade)"; echo "$str";
							} 
							else echo "Not yet graded";?>
						</p>
						<a target="blank" href=<?php echo "Abstract/".$res["UploadedItem"];?> class="btn btn-primary">View Submission</a>
						<input type="button" name="grade" value="Grade Presentation" id="<?php echo $res["Id"]; ?>" class="btn btn-primary grade_pres" /></td>
					  </div>
					</div>
				  </div>
				</div>
	<?php
			}
			$temp = $temp+1;
		}
		}

	?>
</body>

</html>

<div class="modal fade" id="add_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Grade Presentation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <form method="post" id="insert_form">
			  <label>Please enter your grade (out of 10)</label>  
			  <br>
				  <input type="number" name="grade" id="grade" class="form-control" min="0" max="10"/>
			  <br>
			  <br>
			  <input type="hidden" name="uni_id" id="uni_id" />
			  <input type="hidden" name="name_uni_id" id="name_uni_id" />
			  <input type="submit" name="insert" id="insert" value="Submit Grade" class="btn btn-primary" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script>  
 $(document).ready(function(){   
      $(document).on('click', '.grade_pres', function(){ 
		   var val_id = $(this).attr("id");
		   $('#uni_id').val(val_id);
		   
		   $('#add_data_modal').modal('show');
      });
	  $('#insert_form').on("submit", function(event){
		  event.preventDefault();
		  $.ajax({
                     url:"GradePres.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     success:function(data){ 
						  $('#insert_form')[0].reset();
						  $('#add_data_modal').modal('hide');
						  alert(data);
                     }
					 
                });
	  });
	  
 });  
 </script>