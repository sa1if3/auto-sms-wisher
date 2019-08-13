<?php
session_start();
$message="";
if(count($_POST)>0) {
$con = mysqli_connect('localhost','root','','bday') or die('Unable To connect');
$password_string=mysqli_real_escape_string($con,$_POST["password"]);

$result = mysqli_query($con,"SELECT * FROM user_table WHERE username='" . $_POST["username"]."'");

$row = mysqli_fetch_array($result);
if(is_array($row)) {
	
	$password_user=md5($password_string);
	$password_hash = $row["password"];

		if (md5($password_string)===$password_hash)
		{		//echo '<script language="javascript">';
				//echo 'alert("User Succefully Added")';
				//echo '</script>';
			session_regenerate_id();	
			$_SESSION["id"] = $row["id"];
			$_SESSION["name"] = $row["name"];
			$_SESSION["uname"] = $row["username"];
			$_SESSION["pword"] = $row["password"];
			$_SESSION["senderid"] = $row["senderid"];
			$_SESSION["msg"] = $row["message"];
			$_SESSION["akey"] = $row["apikey"];
		}
		else{echo "Fail"; header("Location:../fail.php");}
	}
else {
$message = "Invalid Username or Password!";
header("Location:../fail.php");
}
}
if(isset($_SESSION["id"])) {
header("Location:../index.php");
}
?>