 <?php  
 include 'connection.php';
 $connect = OpenCon();
 $val = $_POST['param1'];
$sql = "UPDATE abstract SET IsApproved='1' WHERE Username='$val'";

if ($connect->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connect->error;
}
 ?>