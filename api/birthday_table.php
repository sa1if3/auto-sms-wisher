<?php
include('db_connect.php');
 //SELECT  
 $uid=$_SESSION["id"];
 $query = "SELECT * from customer_no WHERE id=".$uid." ORDER BY dob DESC";
 $result = $conn->query($query);
 //echo $result;
 if( $result )
 {
 	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo '<tr id='.$row["phone_no"].'>';
        echo '<td>'.$row["name"].'</td>';
        echo '<td>'.$row["dob"].'</td>';
        echo '<td >'.$row["phone_no"].'</td>';
        echo '<td><a class="btn btn-app" href="../../api/edit_bir.php?phone_no='.$row["phone_no"].'">
              <i class="fa fa-edit"></i> Edit
              </a><a class="btn btn-danger btn-sm remove">
              <i class="fa fa-trash"></i> Delete
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