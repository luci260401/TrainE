<?php
	// include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$email = $_POST['username'];
	$flag = 0;
	$response = null;
	if(strcmp("",$email)==0)
	{
		// code
	}
	else
	{
		$response = "<span style='color: white;'><h3>Available.</h3></span>";
		$query = "SELECT USERNAME FROM userdetails";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result))
		{
			if(strcmp($email,$row[0])==0)
			{
				$flag++;
			}
		}
		if($flag>0)
		{
			$response = "<span style='color: red;'><h3>Not Available.</h3></span>";
		}
	}
	echo "$response";
?>