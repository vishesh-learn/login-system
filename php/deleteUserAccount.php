<?php
//error_reporting(0);
require_once "utility.php";

$conn = openConnection();

$conn->query("USE $db_name");

if(isset($_COOKIE["token"])){
	$clientToken = $_COOKIE["token"];
} else {
	die('{"message": "not logged in"}');
}

$userId = getTokenUser($conn, $clientToken);

if(isset($userId)){
    echo deleteUserAccount($conn, $userId);
}else {
    die('{"message":"not logged in"}');
}
	
$sql = "DELETE FROM rememberedLogin WHERE token LIKE '$clientToken'";
$conn->query($sql);

setcookie("token", "", 0, "/");
	
echo '{"message":"not logged in"}';

$conn->close();
?>