<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bday";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $uid=$_SESSION["id"];
 $query = "SELECT apikey from user_table WHERE id=".$uid;
 $result = $conn->query($query);
 //echo $result;
 if( $result )
 {
 	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo trim($row["apikey"]," ");

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