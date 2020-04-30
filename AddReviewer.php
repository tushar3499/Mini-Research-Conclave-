<?php  
 $connect = mysqli_connect("localhost", "root", "", "Research_Conclave");  
 if(!empty($_POST))  
 {    //echo "Hello";
	  $message = ''; 
      $name1 = mysqli_real_escape_string($connect, $_POST['L1uni_id']);  
      $name2 = mysqli_real_escape_string($connect, $_POST['L2uni_id']);
	  $query = "  
           UPDATE Abstract   
           SET Reviewer1='$name1',   
           Reviewer2='$name2',IsDone = 1 
           WHERE Id='".$_POST["uni_id"]."'";  
		   mysqli_query($connect, $query);
           $message = 'Reviewers added';
		echo "$message";
 }  
 ?>