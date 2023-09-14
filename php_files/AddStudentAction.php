<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$uname = $_SESSION['userID'];
	$enrol = $_REQUEST['enrollNo'];
	$fname = $_REQUEST['fname'];
	$mname = $_REQUEST['mname'];
	$lname = $_REQUEST['lname'];
	$dept = $_REQUEST['dept'];
	$year = $_REQUEST['year'];
	$sem = $_REQUEST['sem'];
	$nokt = $_REQUEST['nokt'];
	$avgcode = $_REQUEST['avgcode'];

	$count = 0;
	$query1 = "SELECT ID FROM listofstudents";
	$result1 = mysqli_query($con, $query1);
	while($row1 = mysqli_fetch_array($result1)) {
		$count = $count + 1;
	}
	$finalid = $count + 1;
	$query2 = "SELECT ID FROM userdetails WHERE USERNAME='$uname'";
	$result2 = mysqli_query($con, $query2);
	$row2 = mysqli_fetch_array($result2);
	$myid = $row2[0];

	$query = "INSERT INTO listofstudents(ID,ENROLLNO,ADDEDBY,FIRSTNAME,MIDDLENAME,LASTNAME,DEPARTMENT,YEAR,SEMISTER,NUMBEROFKT,AVERAGEOFCODED) VALUES('$finalid', '$enrol', '$myid', '$fname', '$mname', '$lname', '$dept', '$year', '$sem', '$nokt', '$avgcode')";
	if(mysqli_query($con,$query))
	{
		echo "Row Inserted Successfully!!";
		header("location:ListOfStudents.php");
	}
	else
	{
		// echo "$query";
		echo "Row Not Inserted!!";
	}
?> 