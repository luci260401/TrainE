<?php
	include 'MysqlConnectionCreated.php';
	include 'SessionCreatedCheck.php';
	$mesg = $_REQUEST['messageIn'];
	$toUser = $_REQUEST['mesgTo'];
	$fromUser = $_REQUEST['mesgBy'];
	$count = 0;
	$id = 0;
	$query1 = "SELECT ID FROM sentmessage";
	$result1 = mysqli_query($con, $query1);
	while ($row1 = mysqli_fetch_array($result1)) {
		$count = $count + 1;
	}
	$id = $count + 1;
	echo "message :$mesg<br>";
	echo "from :$fromUser<br>";
	echo "to :$toUser<br>";
	if($fromUser!=null && $toUser!=null && $mesg!=null)
	{
		$query = "INSERT INTO sentmessage(ID, FROMUSER, TOUSER, MESSAGE) VALUES('$id', '$fromUser', '$toUser', '$mesg')";
		// echo "$query";
		if(mysqli_query($con, $query))
		{
			# code...
		}
		// code
	}
	else
	{
		// code
	}
?>