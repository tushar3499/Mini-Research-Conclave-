<?php include 'home.php' ?>
<!DOCTYPE html>

<html>
<body>
	<h1>Public Notices</h1><br>
	<?php
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "SELECT * FROM Notices ORDER BY Id DESC";
		$result = mysqli_query($con,$query);	
		$rows = mysqli_num_rows($result);
		if($rows > 0){
			while($res = mysqli_fetch_array($result)){
				if($res['Tag'] == "Results"){
	?>
				<div class="alert alert-success">
				  <strong><font size="6"><?php echo $res['Title'] ;?></font></strong><br>
				  <font size="5">By: <?php 
					$con1 = mysqli_connect("localhost","root","","research_conclave");
					$str = $res['Author'];
					$query1 = "SELECT * FROM Users WHERE Username='$str'";
					$result1 = mysqli_query($con1,$query1);	
					while ($res1 = mysqli_fetch_array($result1)){
						echo $res1['Fullname'];
						if($res1['Designation'] == "StudConvener") echo "(Student Convener)";
						else echo "(Faculty Convener)";
					}
				  ?></font><br>
				  <font size="4"><?php echo $res['NoticeBody'] ;?></font><br>
				  <font size="4">Dated: <?php echo $res['AddDate'] ;?></font><br>
				</div>	
	<?php
				}
				else if($res['Tag'] == "Deadlines"){
	?>
				<div class="alert alert-danger">
				  <strong><font size="6"><?php echo $res['Title'] ;?></font></strong><br>
				  <font size="5">By: <?php 
					$con1 = mysqli_connect("localhost","root","","research_conclave");
					$str = $res['Author'];
					$query1 = "SELECT * FROM Users WHERE Username='$str'";
					$result1 = mysqli_query($con1,$query1);	
					while ($res1 = mysqli_fetch_array($result1)){
						echo $res1['Fullname'];
						if($res1['Designation'] == "StudConvener") echo "(Student Convener)";
						else echo "(Faculty Convener)";
					}
				  ?></font><br>
				  <font size="4"><?php echo $res['NoticeBody'] ;?></font><br>
				  <font size="4">Dated: <?php echo $res['AddDate'] ;?></font><br>
				</div>	
	<?php
				}
				else{
	?>
				<div class="alert alert-primary">
				  <strong><font size="6"><?php echo $res['Title'] ;?></font></strong><br>
				  <font size="5">By: <?php 
					$con1 = mysqli_connect("localhost","root","","research_conclave");
					$str = $res['Author'];
					$query1 = "SELECT * FROM Users WHERE Username='$str'";
					$result1 = mysqli_query($con1,$query1);	
					while ($res1 = mysqli_fetch_array($result1)){
						echo $res1['Fullname'];
						if($res1['Designation'] == "StudConvener") echo "(Student Convener)";
						else echo "(Faculty Convener)";
					}
				  ?></font><br>
				  <font size="4"><?php echo $res['NoticeBody'] ;?></font><br>
				  <font size="4">Dated: <?php echo $res['AddDate'] ;?></font><br>
				</div>	
	<?php
				}
			}
		}
		else echo "No notices made yet";
	?>
</body>

</html>