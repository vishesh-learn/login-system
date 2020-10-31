<?php
function getuserdata($conn, $s_userid){
	$query = "SELECT userid, name, dob, country, favcolor, datetime
			FROM userdata WHERE userid LIKE '$s_userid'";

	$userdataQ = $conn->query($query);
		
	if($row = mysqli_fetch_array($userdataQ)){
		$message = "logged in";
		$userid = $row["userid"];
		$name = $row["name"];
		$dob = $row["dob"];
		$country = $row["country"];
		$favcolor = $row["favcolor"];
		$datetime = $row["datetime"];

		$userData = new UserData();

		$userData->message = $message;
		$userData->name = $name;
		$userData->dob = $dob;
		$userData->country = $country;
		$userData->favcolor = $favcolor;
		$userData->datetime = $datetime;

		if(isset($userid))
			return $userData;
	}

	return false;
}
?>