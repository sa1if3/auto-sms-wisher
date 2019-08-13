<?php

if (strcmp($_GET["key"], 'shshajh328jjkq91')==0) //if API Start
{	
//For Report
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bday";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

include('db_connect.php');
 //SELECT  
$sql = 'SELECT user_table.id,apikey,username,senderid,message,customer_no.name,customer_no.phone_no FROM user_table CROSS JOIN customer_no ON user_table.id = customer_no.id WHERE user_table.status=1 AND MONTH(dob) = MONTH(NOW()) AND DAY(dob) = DAY(NOW())';
 $result = $conn->query($sql);
 //$result = mysqli_query($conn, $query); 
 //echo $result;
 if($result)
 {
 	if ($result->num_rows > 0) {
    // output data of each row
 	$result1=$result;
    while($row = $result1-> fetch_assoc()) {
        //SMS Send Starts Here
    		if(preg_match('/{name}/',$row['message'], $matches)){
    			$text=$row['message'];
    			$text = preg_replace('/{name}/', $row['name'], $text);
    			$msg=urlencode($text);
    		}
    		else
            	$msg=urlencode($row['message']);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.pingsms.in/api/sendsms?key=".$row['apikey']."&sender=".$row['senderid']."&mobile=".$row['phone_no']."&language=1&product=1&message=".$msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "X-Authorization: ".$row['apikey']
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$data = json_decode($response);
curl_close($curl);
            
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  if($data->code===201)
  {
						$id2=$row['id']; 	
						$phone_no2=$row['phone_no'];  	
						$msg2=$msg;
						$date = date('Y-m-d H:i:s');  	 
						$sql = "INSERT INTO report (id, phone_no, msg) VALUES (".$id2.",".$phone_no2.",'".$msg2."')";
						if ($conn->query($sql) === TRUE) {
    						echo "Message Sent to ".$phone_no2." from account id=".$row['username'].". Record stored successfully in DB at ".$date."\n";
  }
}	
            
    }
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
$conn1->close();
} //if api close
?>