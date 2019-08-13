 <?php
// if(isset($_POST['id']))
//{
	include 'db_connect.php';
    $msg=$_POST["msg"];
    $id=$_POST["id"];
	//$sql = "UPDATE user_table SET message='".$_POST["msg"]."' WHERE id=".$_POST["id"];
    $sql = "UPDATE user_table SET message='".$msg."' WHERE id=".$id;
	if ($conn->query($sql) === TRUE) {
    	echo "Record updated successfully";
	} else {
    	echo "Error updating record: " . $conn->error;
	}

	$conn->close();
//}
?> 