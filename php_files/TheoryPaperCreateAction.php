<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	include 'TempHeader.html';
	$noOfQuests = $_REQUEST['noOfQuests'];
	$quest = $_REQUEST['quest'];
	$ans = $_REQUEST['ans'];
	$marks = $_REQUEST['marksForQuestion'];
	$nameOfUser = $_SESSION['username'];
	$domainOfUser = null;
	$courseOfUser = null;
	$flag = 0;
	$uname = $_SESSION['userID'];
	$query1 = "SELECT DOMAIN,COURSES_TAUGHT FROM userdetails WHERE USERNAME='$uname'";
	$result1 = mysqli_query($con, $query1);
	while($row = mysqli_fetch_array($result1))
	{
		$domainOfUser = $row[0];
		$courseOfUser = $row[1];
	}
	$count = 0;
	$count1 = 1;
	$query4 = "SELECT ID FROM theorypaper";
	$noOfRows = null;
	$result4 = mysqli_query($con, $query4);
	while($row = mysqli_fetch_array($result4))
	{
		$noOfRows = $noOfRows + 1;
	}
	$count2 = $noOfRows + 1;
	$count3 = 0;
	$query5 = "SELECT ID FROM theoryquest";
	$result5 = mysqli_query($con, $query5);
	while($row = mysqli_fetch_array($result5))
	{
		$count3 = $count3 + 1;
	}
	$finalid = $count3 + 1;
	$query2 = "INSERT INTO theorypaper (ID, NAME_OF_PROFESSOR, DOMAIN, COURSE, NOOFQUEST) VALUES('$count2','$nameOfUser', '$domainOfUser', '$courseOfUser', '$noOfQuests')";
	if(mysqli_query($con,$query2))
	{
		while($count<$noOfQuests)
		{
			$query3 = "INSERT INTO theoryquest(ID, PAPERID, QUESTS, ANS, MARKS) VALUES('$finalid', '$count2','$quest[$count]','$ans[$count]','$marks[$count]')";
			if(mysqli_query($con, $query3))
			{
				echo "RowInserted";
				$flag = $flag + 1;
				echo "$flag";
			}
			// echo "final : $finalid";
			$finalid = $finalid + 1;
			$count = $count + 1;
		}
	}
	if($flag>=$noOfQuests)
	{
		$query = "SELECT * FROM theorypaper";
        $count = 0;
        $acttype = null;
        $query2 = "SELECT ID FROM activitytypetable WHERE TYPE='THEORY_PAPER'";
        $result2 = mysqli_query($con, $query2);
        while($row1 = mysqli_fetch_array($result2))
        {
        	$acttype = $row1[0];
        }
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))
        {
            $count++;
        }
        $query1 = "INSERT INTO activityrecord(ACTIVITYID, ACTIVITYTYPE) VALUES('$count', '$acttype')";
        if(mysqli_query($con, $query1))
        {
            echo "Row Inserted Successfully!!";
        }
		echo "Row Inserted Successfully!!!";
		header("Location:myActivities.php");
	}
	else
	{
		echo "Row Not Inserted";

	}
?>