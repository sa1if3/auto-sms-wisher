 <?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset ($_SESSION["uname"]);
unset ($_SESSION["pword"]);
unset ($_SESSION["senderid"]);
unset ($_SESSION["msg"]);
unset ($_SESSION["akey"]);
header("Location:../login.php");
?> 