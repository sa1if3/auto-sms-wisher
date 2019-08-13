<?php
if($_SESSION["pword"])
{
$key=$_SESSION["akey"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.pingsms.in/api/getsmsbalance?key=".$key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array("X-Authorization: ".$key),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$data = json_decode($response);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  if($data->code===201)
  	echo $data->available_balance->transactional_balance;
  else
  	echo "Wrong Key";
}
} 
?>