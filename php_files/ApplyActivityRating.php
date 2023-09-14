<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$idOfAct = $_REQUEST['activityID'];
	$typeOfAct = $_REQUEST['activityType'];
	$rating = $_REQUEST['ratingVal'];
	$givenBy = $_SESSION['username'];
	// echo "$idOfAct";
	// echo "$rating";
	$pi = "PI";
	$tps = "TPS";
	$theory = "THEORY_PAPER";
	$prevRating = null;
	$prevNoOfRaters = null;
	$newRating = null;
	$newNoOfRaters = null;
	$finalid=0;
	$count = 0;
	$myquery = "SELECT ID FROM givenreviews";
	$myresult = mysqli_query($con, $myquery);
	while($myrow = mysqli_fetch_array($myresult))
	{
		$count = $count + 1;
	}
	$finalid = $count + 1;
	$finalid2 = 0;
	$count2 = 0;
	$myquery1 = "SELECT ID FROM ratingrecord";
	$myresult1 = mysqli_query($con, $myquery1);
	while($myrow1 = mysqli_fetch_array($myresult1))
	{
		$count2 = $count2 + 1;
	}
	$finalid2 = $count2 + 1;
	if(strcmp($pi,$typeOfAct)==0)
	{
		$query = "SELECT RATING, NOOFRATERS FROM givenreviews WHERE ACTIVITYID='$idOfAct' AND ACTIVITY_TYPE='$typeOfAct'";
		$result = mysqli_query($con, $query);
		if($row = mysqli_fetch_array($result))
		{
			echo "Already review given!!";
		}
		else
		{
			$query1 = "SELECT * FROM piactivity WHERE ID='$idOfAct'";
			$result1 = mysqli_query($con, $query1);
			while($row1 = mysqli_fetch_array($result1))
			{
				$query2 = "INSERT INTO givenreviews(ID, DOMAIN, COURSE, TOPIC, GIVENBY, GIVENTO, ACTIVITY_TYPE, ACTIVITYID, SCORE) VALUES('$finalid', '$row1[2]', '$row1[3]', '$row1[4]' ,'$givenBy' ,'$row1[1]', '$typeOfAct', '$idOfAct', '$rating')";
				if(mysqli_query($con, $query2))
				{
					echo "Row inserted Successfully!!";
					$query2 = "SELECT * FROM ratingrecord WHERE ACTIVITYID='$idOfAct' AND ACTIVITY_TYPE='$typeOfAct'";
					$result2 = mysqli_query($con, $query2);
					if($row2 = mysqli_fetch_array($result2))
					{
						echo "already given review";
						header('Location:browseActivity.php');
					}
					else
					{
						$newNoOfRaters = 1;
						$type = 0;
						$query4 = "SELECT ID FROM activitytypetable WHERE TYPE='$typeOfAct'";
						$result4 = mysqli_query($con, $query4);
						while($row3 = mysqli_fetch_array($result4))
						{
							$type = $row3[0];
						}
						// echo "New rating not updated successfully!!";
						$query3 = "INSERT INTO ratingrecord(ID, ACTIVITYID, ACTIVITY_TYPE, SCORE, NOOFRATERS) VALUES('$finalid2', '$idOfAct', '$type', '$rating', '$newNoOfRaters')";
						if(mysqli_query($con, $query3))
						{
							echo "Row Inserted Successfully!!";
							header("Location:browseActivity.php");
						}
						else
						{
							echo "NoOfraters not updated successfully!!";
						}
					}
				}
			}
		}
	}
	elseif(strcmp($tps,$typeOfAct)==0)
	{
		$query = "SELECT RATING, NOOFRATERS FROM givenreviews WHERE ACTIVITYID='$idOfAct' AND ACTIVITY_TYPE='$typeOfAct'";
		$result = mysqli_query($con, $query);
		if($row = mysqli_fetch_array($result))
		{
			echo "Already review given!!";
		}
		else
		{
			$query1 = "SELECT * FROM piactivity WHERE ID='$idOfAct'";
			$result1 = mysqli_query($con, $query1);
			while($row1 = mysqli_fetch_array($result1))
			{
				$query2 = "INSERT INTO givenreviews(ID, DOMAIN, COURSE, TOPIC, GIVENBY, GIVENTO, ACTIVITY_TYPE, ACTIVITYID, SCORE) VALUES('$finalid', '$row1[2]', '$row1[3]', '$row1[4]' ,'$givenBy' ,'$row1[1]', '$typeOfAct', '$idOfAct', '$rating')";
				if(mysqli_query($con, $query2))
				{
					echo "Row inserted Successfully!!";
					$query2 = "SELECT * FROM ratingrecord WHERE ACTIVITYID='$idOfAct' AND ACTIVITY_TYPE='$typeOfAct'";
					$result2 = mysqli_query($con, $query2);
					if($row2 = mysqli_fetch_array($result2))
					{
						echo "already given review";
						header('Location:browseActivity.php');
					}
					else
					{
						$newNoOfRaters = 1;
						$type = 0;
						$query4 = "SELECT ID FROM activitytypetable WHERE TYPE='$typeOfAct'";
						$result4 = mysqli_query($con, $query4);
						while($row3 = mysqli_fetch_array($result4))
						{
							$type = $row3[0];
						}
						// echo "New rating not updated successfully!!";
						$query3 = "INSERT INTO ratingrecord(ID, ACTIVITYID, ACTIVITY_TYPE, SCORE, NOOFRATERS) VALUES('$finalid2', '$idOfAct', '$type', '$rating', '$newNoOfRaters')";
						if(mysqli_query($con, $query3))
						{
							echo "Row Inserted Successfully!!";
							header("Location:browseActivity.php");
						}
						else
						{
							echo "NoOfraters not updated successfully!!";
						}
					}
				}
			}
		}	
	}
	elseif(strcmp($theory,$typeOfAct)==0)
	{
		$query = "SELECT RATING, NOOFRATERS FROM givenreviews WHERE ACTIVITYID='$idOfAct' AND ACTIVITY_TYPE='$typeOfAct'";
		$result = mysqli_query($con, $query);
		if($row = mysqli_fetch_array($result))
		{
			echo "Already review given!!";
		}
		else
		{
			$query1 = "SELECT * FROM piactivity WHERE ID='$idOfAct'";
			$result1 = mysqli_query($con, $query1);
			while($row1 = mysqli_fetch_array($result1))
			{
				$query2 = "INSERT INTO givenreviews(ID, DOMAIN, COURSE, TOPIC, GIVENBY, GIVENTO, ACTIVITY_TYPE, ACTIVITYID, SCORE) VALUES('$finalid', '$row1[2]', '$row1[3]', '$row1[4]' ,'$givenBy' ,'$row1[1]', '$typeOfAct', '$idOfAct', '$rating')";
				if(mysqli_query($con, $query2))
				{
					echo "Row inserted Successfully!!";
					$query2 = "SELECT * FROM ratingrecord WHERE ACTIVITYID='$idOfAct' AND ACTIVITY_TYPE='$typeOfAct'";
					$result2 = mysqli_query($con, $query2);
					if($row2 = mysqli_fetch_array($result2))
					{
						echo "already given review";
						header('Location:browseActivity.php');
					}
					else
					{
						$newNoOfRaters = 1;
						$type = 0;
						$query4 = "SELECT ID FROM activitytypetable WHERE TYPE='$typeOfAct'";
						$result4 = mysqli_query($con, $query4);
						while($row3 = mysqli_fetch_array($result4))
						{
							$type = $row3[0];
						}
						// echo "New rating not updated successfully!!";
						$query3 = "INSERT INTO ratingrecord(ID, ACTIVITYID, ACTIVITY_TYPE, SCORE, NOOFRATERS) VALUES('$finalid2', '$idOfAct', '$type', '$rating', '$newNoOfRaters')";
						if(mysqli_query($con, $query3))
						{
							echo "Row Inserted Successfully!!";
							header("Location:browseActivity.php");
						}
						else
						{
							echo "NoOfraters not updated successfully!!";
						}
					}
				}
			}
		}
	}
?>