<?php
include 'connection.php';
include 'AfterLogin.php';
$username =  $_SESSION['user'];
$conn = OpenCon();
$statusMsg = '';

// File upload path
$presentationtype = $_POST['presentation'];
$Sql = "SELECT PresType FROM abstract WHERE PresType = '$presentationtype'"; 
$result = $conn->query($Sql);
$Count = $result->num_rows;
$Count = $Count + 1;
$fileName = $_FILES["file"]["name"];
if($presentationtype == "Oral") $fileName = "Oral".$Count.".pdf";
else $fileName = "Poster".$Count.".pdf";
$targetDir = "Abstract/";
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$Fullname = $_POST['Fullname'];
$email = $_POST['email'];
$title = $_POST['title'];

$Sql = "SELECT StartDate, EndDate FROM Date"; 
$result = $conn->query($Sql);

$srtdate = '';
$enddate = '';

while($row = $result->fetch_assoc()) {
        $srtdate = $row["StartDate"];
		$enddate = $row["EndDate"];
}

$srtdate = strtotime($srtdate);
$enddate = strtotime($enddate);
date_default_timezone_set('Asia/Kolkata');
$currdate = date('d-m-Y h:i:s');
$currdate = strtotime($currdate);


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]) && ($currdate <= $enddate && $currdate >= $srtdate)){
    // Allow certain file formats
     $allowTypes = array('pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
		$sql = "SELECT * FROM abstract WHERE Username = '$username'";
        $result = $conn->query($sql);
		if ($result->num_rows > 1) {
         // output data of each row
             $statusMsg = "You have Already Uploaded";
        } else if($result->num_rows == 1){
			 while($row = $result->fetch_assoc()) {
                $val = $row["PresType"];
          }
		  if($val == $presentationtype){
			  $statusMsg = "You hav Already Uploaded For".$presentationtype."Presentation";
		  }else {
         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into abstract (UploadedItem, Username, Title, Email, IsApproved, PresType, Fullname) VALUES ('$fileName', '$username', '$title', '$email', '0', '$presentationtype', '$Fullname')");
            if($insert){
                $statusMsg = "Abstract Submitted successfully";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
          }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
          }
         }
		}else {
         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into abstract (UploadedItem, Username, Title, Email, IsApproved, PresType, Fullname) VALUES ('$fileName', '$username', '$title', '$email', '0', '$presentationtype', '$Fullname')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
          }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
          }
        }
    }else{
        $statusMsg = 'Sorry, only PDF files are allowed to upload.';
    }
}else if($currdate < $srtdate){
	$statusMsg = 'Registration not started';
}else if($currdate > $enddate){
	$statusMsg = 'Registration ended';
}else{
    $statusMsg = 'Please select a file to upload.';
}
?>
<br>
<div align="center"><label align="center"><?php echo $statusMsg ;?></label></div>;
<?php
CloseCon($conn);
return;
?>