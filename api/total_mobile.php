<?php
include('db_connect.php');
 //SELECT  
$uid=$_SESSION["id"];
 $query = "SELECT COUNT(*) as total FROM customer_no WHERE id=".$uid."";
 $result = $conn->query($query);
 //echo $result;
 if( $result )
 {
 	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["total"];//fix later

    }
} 
else {
    echo "0 results";
}
 }
 else
 {
 	echo 'Query Failed';
 }
$conn->close();
?>