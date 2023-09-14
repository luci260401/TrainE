<?php
	header("Content-Type: application/json");
	include 'MysqlConnectionCreated.php';
	include 'SessionCreatedCheck.php';
	$json = array();
	$uname = $_SESSION['userID'];
	$query = "SELECT PASSWORD FROM userdetails WHERE USERNAME='$uname'";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result))
	{
		// echo "$row[0]";
		$pwd = $row[0];
		$data=array(
				'pwdret' => $pwd
		);
		array_push($json, $data);
	}
	echo json_encode($json);
?>