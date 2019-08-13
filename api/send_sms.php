<?php

if(isset($_POST['phone1']) && isset($_POST['msg1']))
{
$key=$_POST["akey"];
$senderid1=$_POST['senderid1'];
$phone1=$_POST['phone1'];
$msg1=$_POST['msg1'];
//$msg1=urlencode($msg_post);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.pingsms.in/api/sendsms?key=".$key."&sender=".$senderid1."&mobile=".$phone1."&language=1&product=1&message=".$msg1,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "X-Authorization: ".$key
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
		include 'db_connect.php';
		$id2=$_POST['id1']; 	
		$phone_no2=$_POST['phone1'];  	
		$msg2=$_POST['msgd'];  	 
		$sql = "INSERT INTO report (id, phone_no, msg) VALUES (".$id2.",".$phone_no2.",'".$msg2."')";
		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
			} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
					}

		$conn->close();
  }
}
}			
else
	echo 'Outside if';
?>

