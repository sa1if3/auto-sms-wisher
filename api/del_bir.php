<?php


require('db_connect.php');
//id is phone_no
//uid is session id

if(isset($_POST['id']))

{
     $sql = "DELETE FROM customer_no WHERE phone_no=".$_POST['id']." AND id=".$_POST['uid'];

     $conn->query($sql);

	 if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

}
$conn->close();

?>