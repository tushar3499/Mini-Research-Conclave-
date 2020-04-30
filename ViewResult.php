<?php include 'home.php' ?>
<!DOCTYPE html>
<html>
<?php 
  include 'connection.php';
  $conn = OpenCon();
  $Sql = "SELECT ReviewDate FROM Date"; 
$result = $conn->query($Sql);

$reviewdate = '';

while($row = $result->fetch_assoc()) {
        $reviewdate = $row["ReviewDate"];
}

$reviewdate = strtotime($reviewdate);
date_default_timezone_set('Asia/Kolkata');
$currdate = date('d-m-Y h:i:s');
$currdate = strtotime($currdate);
if($currdate <= $reviewdate){
	echo '<br><div align="center"><label align="center">Results will be Declared Shortly</label></div>';
}else{
?>
<body>
<br>
<p align ="center">
	<a class="btn btn-primary" href='Result.php?value=Oral' role="button" >Oral Presentation</a>
	<a class="btn btn-primary" href='Result.php?value=Poster' role="button" >Poster Presentation</a>
	</p>
</body>

</html>

<?php } ?>