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

form {
  text-align: center;
}

</style>
</head>
<body>
<form action="#" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    
    <input type="text" placeholder="Enter Username" name="Username" required>
	<br>
    
    <input type="password" placeholder="Enter Password" name="Password" required>
	<br>
    
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
	<br>
	<p> (Do not use blank spaces in any field)</p>


    <div class="clearfix">
      
      <button type="submit" class="signupbtn" name="signup_button">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>

<?php
	if (isset($_POST['signup_button'])){
		$user = $_POST['Username'];
		$pass = $_POST['Password'];
		$passrep = $_POST['psw-repeat'];
		
		$pass = trim($pass);
		$user = trim($user);
		$passrep = trim($passrep);
		$con = mysqli_connect("localhost","root","","research_conclave");
		$query = "SELECT * FROM Users WHERE Username='$user'";
		$result = mysqli_query($con,$query);	
		$rows = mysqli_num_rows($result);
		if ($rows ==1) echo '<div align="center"><label align="center">This username already exists. Please try another</label></div>';
		else if($passrep != $pass) echo '<div align="center"><label align="center">Passwords do not match</label></div>';
		else{
			if(strlen($user)>0 && strlen($pass)>0){
			$con = mysqli_connect("localhost","root","","research_conclave");
			$query = "INSERT INTO Users (Username, Password,Designation) VALUES ('$user', '$pass','Participant')";
			if (mysqli_query($con, $query)) {
				   echo '<div align="center"><label align="center">Registered Successfully for Research Conclave</label></div>';
				}
			}
		}
	}
	
?>