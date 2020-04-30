<?php include 'AfterLogin.php'; 
$username = $_SESSION['user'];
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

</style>
</head>
<body>
<form action="#" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Change your password</h1>
    
    <input type="password" placeholder="Enter Current Password" name="CurPassword" required>
	<br>
    <input type="password" placeholder="Enter new Password" name="NewPassword" required>
	<br>
    <input type="password" placeholder="Confirm new Password" name="psw-repeat" required>
	<br>
	<p> (Do not use blank spaces in any field)</p>

    <div class="clearfix">
      
      <button type="submit" class="changepwdbtn" name="password_button">Change Password</button>
    </div>
  </div>
</form>
</body>
</html>

<?php
	if (isset($_POST['password_button'])){
		$user = $_SESSION['user'];
		$curpass = $_POST['CurPassword'];
		$newpass = $_POST['NewPassword'];
		$passrep = $_POST['psw-repeat'];
		$newpass = trim($newpass);
		$curpass = trim($curpass);
		$passrep = trim($passrep);
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "SELECT * FROM Users WHERE Username='$user'";
		$rows = mysqli_num_rows($result);
		$result = mysqli_query($con,$query);	
		while($res = mysqli_fetch_array($result)){
			//echo $user;
			if ($res['Password']!= $curpass) echo '<div align="center"><label align="center">Your old password entered was incorrect</label></div>';
			else{
				if ($newpass != $passrep){
					echo '<div align="center"><label align="center">Your new passwords do not match</label></div>';
				}
				else if ($newpass == "") echo '<div align="center"><label align="center">Password can not be empty</label></div>';
				else{
					$con = mysqli_connect("localhost","root","","research_conclave");
					$query = "UPDATE USERS SET Password = '$newpass' WHERE Username = '$user'";
					if (mysqli_query($con, $query)) {
						   echo '<div align="center"><label align="center">Password reset succesfully</label></div>';
					}
				}
			}
		}
	}
	
?>