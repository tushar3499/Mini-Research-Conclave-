<?php include 'AfterLogin.php' ;
include 'connection.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html>
<head>  
		   <script src="pdf.object.min.js"></script>
        
</head>

<body>
<?php
   $sql = "SELECT * FROM abstract WHERE IsApproved = 0";
   $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$i = 1;
    while($row = $result->fetch_assoc()) {
		if($row["IsDone"] == 0) continue;
	?>
		<?php $i = $i + 1;?>
	    <div id = <?php echo "row".$i; ?> class="card add_row">
	    <h5 class="card-header user_name">Title: <?php echo $row["Title"];?></h5>
        <div class="card-body">
        <h5 class="card-title">Name: <?php echo $row["Fullname"];?></h5><br>
		<h6>Presentation Type: <?php echo $row['PresType'];?></h6>
		<h6>Reviewer 1: 
		<?php 
		$con1 = OpenCon();
		$str=$row['Reviewer1'];
		$sql1 = "SELECT * FROM Users Where Username = '$str'";
		$result1 = $con1->query($sql1);
		while($res = $result1->fetch_assoc()){
			echo $res["Fullname"];
		}
		?>
		<h6>Reviewer 2: 
		<?php 
		$str=$row['Reviewer2'];
		$sql1 = "SELECT * FROM Users Where Username = '$str'";
		$result1 = $con1->query($sql1);
		while($res = $result1->fetch_assoc()){
			echo $res["Fullname"];
		}
		?>
		</h6><br>
        <a href=<?php echo "Abstract/".$row["UploadedItem"];?>  class="btn btn-primary see_file" target = blank_>See Abstract</a>
		<button type="button" name=<?php echo $row["Username"];?> id=<?php echo $i; ?> class="btn btn-primary approve_abstract">Approve</button>
        </div>
		</div>
		<br>
		<?php
    }
	if($i == 1) echo "NO reviewer has been assigned to any of the abstract";
} else {
    echo '<br><div align="center"><label align="center">No more abstracts left for addition of reviewers.</label></div>';
}
 ?>
 </body>
 </html>

 <script>  
 $(document).ready(function(){   
      $(document).on('click', '.approve_abstract', function(){  
	         var button_id = $(this).attr("id");
             $.ajax({  
                url:"approve.php",  
				method:"POST",
                data:{param1: $(this).attr("name")},  
                success:function(data)  
                {  
                     alert("You have approved this abstract");  
                     $('#row'+button_id+'').remove();					 
                }  
           });
      });	
 });  
 </script>
   
