<?php
include('db_connect.php');
 //SELECT  
 $uid=$_SESSION["id"];
 $query = "SELECT senderid,message from user_table WHERE id=".$uid;
 $result = $conn->query($query);
 //echo $result;
 if( $result )
 {
 	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
        echo '<td>'.$row["message"].'</td>';
        echo '<td>'.$row["senderid"].'</td>';
        echo '<td><a class="btn btn-app" href="../../index.php#quick-edit-msg">
              <i class="fa fa-edit"></i> Edit
              </a></td>';
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