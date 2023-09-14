<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$id = $_REQUEST['edipiid'];
	$type = $_REQUEST['edipitype'];
	$pi = "PI";
	$tps = "TPS";
	$theory = "THEORY_PAPER";
	// echo "$type";
	if(strcmp($pi, $type) == 0) 
	{
		$topic = $_REQUEST['topicFromCourse'];
		$concept = $_REQUEST['concept'];
		$conceptQuest = $_REQUEST['conceptQuest'];
		$correctAns = $_REQUEST['correctAns'];
		$plausible = $_REQUEST['plausible'];
		if (!empty($topic)) {
			$query = "UPDATE piactivity SET TOPIC='$topic' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($concept)) {
			$query = "UPDATE piactivity SET CONCEPTBEINGADDRESSED='$concept' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($conceptQuest)) {
			// echo "hello";
			$query = "UPDATE piactivity SET CONCEPTQUESTION='$conceptQuest' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($correctAns)) {
			$query = "UPDATE piactivity SET CORRECTANSWER='$correctAns' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($plausible)) {
			$query = "UPDATE piactivity SET PLAUSIBLEDISTRACTORS='$plausible' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		header("location:myActivities.php");
	}
	elseif (strcmp($tps, $type) == 0) {
		$topic = $_REQUEST['topicFromCourse'];
		$duration1 = $_REQUEST['duration1'];
		$guideQuest1 = $_REQUEST['guideQuest1'];
		$desireOutput1 = $_REQUEST['desireOutput1'];
		$duration2 = $_REQUEST['duration2'];
		$guideQuest2 = $_REQUEST['guideQuest2'];
		$desireOutput2 = $_REQUEST['desiredOutput2'];
		$duration3 = $_REQUEST['duration3'];
		$guideQuest3 = $_REQUEST['guideQuest3'];
		$desireOutput3 = $_REQUEST['desiredOutput3'];
		// echo "$desireOutput2";
		if (!empty($topic)) {
			$query = "UPDATE tpsactivity SET TOPIC='$topic' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo " topic Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($duration1)) {
			$query = "UPDATE tpsactivity SET THINKTIME='$duration1' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo "duration1 Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($guideQuest1)) {
			$query = "UPDATE tpsactivity SET THINKQUEST='$guideQuest1' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo "guidequest1 Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($desireOutput1)) {
			$query = "UPDATE tpsactivity SET THINKANS='$desireOutput1' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo "desireoutput1 Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($duration2)) {
			$query = "UPDATE tpsactivity SET PAIRTIME='$duration2' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo "duration2 Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($guideQuest2)) {
			$query = "UPDATE tpsactivity SET PAIRQUEST='$guideQuest2' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo " guide quest 2 Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($desireOutput2)) {
			$query = "UPDATE tpsactivity SET PAIRANS='$desireOutput2' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($duration3)) {
			$query = "UPDATE tpsactivity SET SHARETIME='$duration3' WHERE ID='$id'";
			if(mysqli_query($con,$query))
			{
				echo " duration 3 Row Inserted Successfully!!";
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($guideQuest3)) {
			$query = "UPDATE tpsactivity SET SHAREQUEST='$guideQuest3' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		if (!empty($desireOutput3)) {
			$query = "UPDATE tpsactivity SET SHAREANS='$desireOutput3' WHERE ID='$id'";
			echo "$query";
			if(mysqli_query($con,$query))
			{
				echo "Row Inserted Successfully!!";
				
			}
			else
			{
				// echo "$query";
				echo "Row Not Inserted!!";
			}
		}
		header("location:myActivities.php");
	}
	elseif (strcmp($theory, $type)==0) {
		$questid = array();
		$dbquery = "SELECT ID FROM theoryquest WHERE PAPERID='$id'";
		$dbresult = mysqli_query($con, $dbquery);
		while($row = mysqli_fetch_array($dbresult)) {
			array_push($questid, $row[0]);
		}
		$quest = $_REQUEST['quest'];
		$ans = $_REQUEST['ans'];
		$marks = $_REQUEST['marks'];
		$noele = count($quest);
		$count = 0;
		while($count < $noele) {
			echo "$questid[$count]<br>";
			if (!empty($quest[$count])) {
				$query = "UPDATE THEORYQUEST SET QUESTS='$quest[$count]' WHERE ID='$questid[$count]'";
				if(mysqli_query($con,$query))
				{
					echo "quest ". $count ."Row Inserted Successfully!!";
				}
				else
				{
					echo "Row Not Inserted!!";
				}
			}
			if (!empty($ans[$count])) {
				$query = "UPDATE THEORYQUEST SET ANS='$ans[$count]' WHERE ID='$questid[$count]'";
				if(mysqli_query($con,$query))
				{
					echo "ans ". $count ."Row Inserted Successfully!!";
				}
				else
				{
					echo "Row Not Inserted!!";
				}
			}
			if (!empty($marks[$count])) {
				$query = "UPDATE THEORYQUEST SET MARKS='$marks[$count]' WHERE ID='$questid[$count]'";
				if(mysqli_query($con,$query))
				{
					echo "marks ". $count ."Row Inserted Successfully!!";
				}
				else
				{
					echo "Row Not Inserted!!";
				}
			}
			$count = $count + 1;
		}
		header("location:myActivities.php");
	}
?>