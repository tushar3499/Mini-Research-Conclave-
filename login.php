<?php include 'home.php' ?>
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



</style>
</head>
<body>
<form action="#" method="POST">
  <div class="imgcontainer">
    <img src="login_image.png" alt="Avatar" class="avatar">
  </div>

  <div class="container" align="center">
    
    <input type="text" placeholder="Enter Username" name="Username" required><br>

    
    <input type="password" placeholder="Enter Password" name="Password"required>

    <button type="submit" name="LoginBtn">Login</button>
	<br><a href="signup.php"> Don't have an account? Register now for Research Conclave 2020</a>
  </div>

</form>
</body>
</html>

<?php
	if (isset($_POST['LoginBtn'])){
		$user = $_POST['Username'];
		$pass = $_POST['Password'];
		$pass = trim($pass);
		$user = trim($user);
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "SELECT * FROM Users WHERE Username='$user'and Password='$pass'";
		$result = mysqli_query($con,$query);	
		$rows = mysqli_num_rows($result);
		if ($rows ==1){
			session_start();
			$_SESSION['user'] = "$user";
			header("Location: NewHomePage.php");
		}
		else 
		{
			echo '<div align="center"><label align="center">Incorrect credentials</label></div>';
		}
	}
	
?>	