<?php  
session_start();
 $Username =  $_SESSION['user'];
 $connect = mysqli_connect("localhost", "root", "", "Research_Conclave");  
 if(!empty($_POST))  
 {    //echo "Hello";
	  $message = ''; 
      $grade = mysqli_real_escape_string($connect, $_POST['grade']);  
      $uni = mysqli_real_escape_string($connect, $_POST['uni_id']);
	  $name = mysqli_real_escape_string($connect, $Username);
	  $query = "SELECT * FROM Abstract WHERE Id='$uni'";
	  $result = mysqli_query($connect,$query);
	  while($res = mysqli_fetch_array($result)){
		  if($res['Reviewer1']==$name){
			  $query1 = "  
           UPDATE Abstract   
           SET Grade1='$grade',IsGraded1 = 1  
           WHERE Id='$uni'";  
		   mysqli_query($connect, $query1);
		  }
		  else{
			 $query1 = "  
           UPDATE Abstract   
           SET Grade2='$grade',IsGraded2 = 1 
           WHERE Id='$uni'";  
		   mysqli_query($connect, $query1); 
		  }
	  }
	  
        $message = 'Graded Succesfully';
		echo "$message";
 }  
 ?>