<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$uname = $_SESSION['userID'];
	$student = $_REQUEST['stud'];
	$course = $_REQUEST['course'];
	$sem = $_REQUEST['sem'];
	$assign1 = $_REQUEST['assign1'];
	$assign2 = $_REQUEST['assign2'];
	$test = $_REQUEST['test'];
	$avg = ($assign1 + $assign2 + $test)/2;
	
	$count = 0;
	$id = 0;
	$query1 = "SELECT ID FROM coursewisestudmarks";
	$result1 = mysqli_query($con, $query1);
	while($row1 = mysqli_fetch_array($result1))
	{
		$count = $count + 1;
	}
	$id = $count + 1;

	$query3 = "SELECT ID FROM domainsemcourse WHERE COURSE='$course'";
	$result3 = mysqli_query($con, $query3);
	$row3 = mysqli_fetch_array($result3);
	$finalcourse = $row3[0];

	$query2 = "SELECT ID FROM userdetails WHERE USERNAME='$uname'";
	$result2 = mysqli_query($con, $query2);
	$row2 = mysqli_fetch_array($result2);
	$addedby = $row2[0];

	$query = "INSERT INTO coursewisestudmarks(ID, ADDEDBY, ENROLL, COURSE, SEM, ASSIGN1, ASSIGN2, TEST, AVG) VALUES('$id', '$addedby', '$student', '$finalcourse', '$sem', '$assign1', '$assign2', '$test', '$avg')";
	echo "$query";
	if(mysqli_query($con,$query))
	{
		echo "Row Inserted Successfully!!";
		header("location:StudentMarksCourseWise.php");
	}
	else
	{
		// echo "$query";
		echo "Row Not Inserted!!";
	}
?> 