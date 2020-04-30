<?php
session_start();
    $Username =  $_SESSION['user'];
    //unset($_SESSION['user']); 
	//echo "$Username";
	$con = mysqli_connect("localhost","root","","research_conclave");
	$query = "SELECT * FROM Users WHERE Username='$Username'";
	$result = mysqli_query($con,$query); 
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>

.navbar-brand{
	font-size: 36px;
}

.navbar-nav{
	font-size: 20px;
}
</style>
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="NewHomePage.php">Research Conclave</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
<?php
		while ($res = mysqli_fetch_array($result)){
			if($res['Designation'] == "StudConvener"){
?>
			<li class="nav-item">
					<a class="nav-link" href="AddNotice.php">Post Notice<span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="ViewAbstracts.php">View/Assign Reviwers</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="ReportType.php">View reviewer report</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="ChangePassword.php">Change Password</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="LogOut.php">Log Out</a>
				  </li>
<?php
			}
			else if($res['Designation'] == "FacConvener"){
?>
				<li class="nav-item">
					<a class="nav-link" href="AddNotice.php">Post Notice<span class="sr-only">(current)</span></a>
				  </li>
				  
				  <li class="nav-item">
					<a class="nav-link" href="check.php">Approve reviewers</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="GradeReportType.php">View reviewer/grades report</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="AddReviewerUser.php">Add Reviwers</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="ChangePassword.php">Change Password</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="LogOut.php">Log Out</a>
				  </li>
<?php
			}
			else if($res['Designation'] == "OralReviewer" || $res['Designation'] == "PosterReviewer"){
?>
				<li class="nav-item">
					<a class="nav-link" href="Grade.php">Grade Abstracts<span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="ChangePassword.php">Change Password</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="LogOut.php">Log Out</a>
				  </li>
<?php				
			}
			else{
?>
				<li class="nav-item">
					<a class="nav-link" href="Upload.php">Upload Abstract<span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="ChangePassword.php">Change Password</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="LogOut.php">Log Out</a>
				  </li>
<?php
			}
		}
?>
		</ul>
	  </div>
	</nav>
</body>

</html>