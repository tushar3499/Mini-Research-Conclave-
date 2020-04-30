<?php include 'AfterLogin.php';
$Username =  $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
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
  
<body>
<br>
<form action="project.php" method="POST" enctype="multipart/form-data">
	<input type="text" placeholder="Enter Full name" name="Fullname" required>
	<br>
	<input type="text" placeholder="Enter Email" name="email" required>
	<br>
	<input type="text" placeholder="Enter Title" name="title" required>
	<br>
  <select name = "presentation" id = "presentation" class="custom-select" required >
  <option value="" disabled selected hidden>Please Choose Presentation type</option>
    <option value="Oral">Oral Presentation</option>
     <option value="Poster">Poster Presentation</option>
  </select>
	<br> <br>
    <input type="file" name="file"/> <br> <br>
    <input type="submit" name="submit" value="Submit" /> <br>
</form>
</body>
</html>
