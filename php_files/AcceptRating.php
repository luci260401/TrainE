<?php
	include 'MysqlConnectionCreated.php';
	include 'SessionCreatedCheck.php';

	$activityID = $_REQUEST['receivedId'];
	// echo "$activityID <br>";
	$query = "UPDATE givenreviews SET STATUS=\"ACCEPTED\" WHERE ID='$activityID'";
	echo "$query";
	if(mysqli_query($con,$query))
	{
		$finalrating = 0;
		$count = 0;
		$query2 = "SELECT SCORE FROM ratingrecord WHERE ID='$activityID'";
		$result2 = mysqli_query($con, $query2);
		while ($row = mysqli_fetch_array($result2)) {
			$finalrating = $finalrating + $row[0];
			$count = $count + 1;
		}
		$finalrating = $finalrating/$count;
		$query1 = "UPDATE givenreviews SET RATING=$finalrating WHERE ID='$activityID'";
		echo "$query1";
		if (mysqli_query($con, $query1)) {
			echo "Status Changed!!";
			header("Location:ReceivedReviews.php");
		}
	}
	else
	{
		echo "Status Not Changed!!";
		header("Location:ReceivedReviews.php");
	}
?>