<?php
include('db_connect.php');
 //SELECT  
 $uid=$_SESSION["id"];
 $query = "SELECT * from report WHERE id=".$uid." ORDER BY TIMESTAMP(time) DESC";
 $result = $conn->query($query);
 //echo $result;
 if( $result )
 {
 	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
        echo '<td>'.$row["phone_no"].'</td>';
        echo '<td>'.$row["msg"].'</td>';
        echo '<td>'.$row["time"].'</td>';
        echo '</tr>';

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