<?php include 'AfterLogin.php' ;

$Username =  $_SESSION['user'];
?>
<html>
<head>
<style>
/* Bordered form */


/* Full-width inputs */
input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}


/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 20%;
  height: 30%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
  
}

form {
  text-align: center;
}

.custom-select {
  width: 50%;
  
}

</style>
</head>
<body>
<form action="#" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Add Notice</h1>
    <hr>

    
    <input type="text" placeholder="Notice Title" name="NoticeTitle" required>
	<br>
    
    <input type="text" placeholder="Notice body" name="NoticeBody" required>
	<br>
    <select class="custom-select" name="Tag" required>
        <option value="" disabled selected hidden>Please Choose notice tag</option>
        <option >Deadlines</option>
        <option >Results</option>
		<option >Others</option>
    </select>

    <div class="clearfix">
      
      <button type="submit" class="signupbtn" name="AddNoticeBtn">Add Notice</button>
    </div>
  </div>
</form>
</body>
</html>

<?php
	if(isset($_POST['AddNoticeBtn'])){
		$title = $_POST['NoticeTitle'];
		$body = $_POST['NoticeBody'];
		//date_default_timezone_set ['Asia/Kolkatta'];
		$tim = date('d-m-Y H:i:s');
		$notice_tag = $_POST['Tag'];
		$title = trim($title);
		$body = trim($body);
		$author = $_SESSION['user'];
		
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "INSERT INTO Notices (Title, NoticeBody,AddDate,Tag,Author) VALUES ('$title', '$body','$tim','$notice_tag','$author')";
		if(strlen($title)>0&&strlen($body)>0){
			if (mysqli_query($con, $query)) {
			   
			   header("Location: AddNotice.php");
			}
		}
	}
	
?>