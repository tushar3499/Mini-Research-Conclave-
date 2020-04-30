<?php include 'ViewAbstracts.php' ?>

<!DOCTYPE html>
<html>

<body>
	<?php
		$pres= $_GET['value'];
		$temp =0;
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "SELECT * FROM Abstract  WHERE PresType='$pres' AND IsApproved = 0";
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
						Status: <?php if($res['IsDone']==1) echo "Waiting for approval"; else echo "Reviewers not yet alloted"; ?><br>
						</p>
						<a href=<?php echo "Abstract/".$res["UploadedItem"];?> target="blank" class="btn btn-primary">View Submission</a>
						<input type="button" name="add" value="Add Reviewer" id="<?php echo $res["Id"]; ?>" class="btn btn-primary add_data" /></td>
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
						Status: <?php if($res['IsDone']==1) echo "Waiting for approval"; else echo "Reviewers not yet alloted"; ?><br>
						</p>
						<a target="blank" href=<?php echo "Abstract/".$res["UploadedItem"];?> class="btn btn-primary">View Submission</a>
						<input type="button" name="add" value="Add Reviewer" id="<?php echo $res["Id"]; ?>" class="btn btn-primary add_data" /></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Reviewer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <form method="post" id="insert_form">
			  <label>Select Reviewer 1</label>  
			  <br>
				  <select id="List1" value="List1">
					<?php
					$str = $pres."Reviewer";
					$con1 = mysqli_connect("localhost","root","","research_conclave");
					$query1 = "SELECT * FROM Users WHERE Designation='$str'";
					$result1 = mysqli_query($con1,$query1);
					while($res1 = mysqli_fetch_array($result1)){
					?>
						<option value="<?php echo $res1['Username'] ;?>"><?php echo $res1['Fullname'];?></option>
					<?php
					}
					?>
				  </select>
			  <br>
			<label>Select Reviewer 2</label><br>  
				  <select id="List2" value="List2">
					<?php
					$str = $pres."Reviewer";
					$con1 = mysqli_connect("localhost","root","","research_conclave");
					$query1 = "SELECT * FROM Users WHERE Designation='$str'";
					$result1 = mysqli_query($con1,$query1);
					while($res1 = mysqli_fetch_array($result1)){
					?>
						<option value='<?php echo $res1['Username'] ;?>'><?php echo $res1['Fullname'];?></option>
					<?php
					}
					?>
				  </select>
				  <br>
				  <br>
				  <input type="hidden" name="uni_id" id="uni_id" />
				  <input type="hidden" name="L1uni_id" id="L1uni_id" />
				  <input type="hidden" name="L2uni_id" id="L2uni_id" />
				  <input type="submit" name="insert" id="insert" value="Add Reviewer" class="btn btn-primary" />
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
      $(document).on('click', '.add_data', function(){ 
		   var val_id = $(this).attr("id");
		   $('#uni_id').val(val_id);
		   $('#add_data_modal').modal('show');
      });
	  $('#insert_form').on("submit", function(event){
		  event.preventDefault();
		  var v1 = document.getElementById("List1");
		  var result1 = v1.options[v1.selectedIndex].value;
		  var v2 = document.getElementById("List2");
		  var result2 = v2.options[v2.selectedIndex].value;
		  $('#L1uni_id').val(result1);
		  $('#L2uni_id').val(result2);
		  if(result1 == result2){
			  alert("Please select different reviewers");
		  }
		  else{	
			  $.ajax({
                     url:"AddReviewer.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     success:function(data){ 
						  $('#insert_form')[0].reset();
						  $('#add_data_modal').modal('hide');
						  alert(data);
                     }
					 
                });
		  }
	  });
 });  
 </script>