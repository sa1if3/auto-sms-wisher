 <?php

if(isset($_POST['uid']))
{ 	
	include 'db_connect.php';
	$sql = "INSERT INTO customer_no (id,name, dob, phone_no) VALUES (".$_POST['uid'].",'".$_POST['name']."', '".$_POST['dob']."','".$_POST['mob']."')";

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}	
?> 