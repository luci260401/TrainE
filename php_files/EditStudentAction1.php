<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$enrol = $_REQUEST['enrollNo'];
	$fname = $_REQUEST['fname'];
	$mname = $_REQUEST['mname'];
	$lname = $_REQUEST['lname'];
	$dept = $_REQUEST['dept'];
	$year = $_REQUEST['year'];
	$sem = $_REQUEST['sem'];
	$nokt = $_REQUEST['nokt'];
	$avgcode = $_REQUEST['avgcode'];
	$id = $_REQUEST['edittoedit'];
	// echo "$query";

	if (!empty($enrol)) {
		$query = "UPDATE listofstudents SET ENROLLNO='$enrol' WHERE ID='$id'";
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
	if (!empty($fname)) {
		$query = "UPDATE listofstudents SET FIRSTNAME='$fname' WHERE ID='$id'";
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
	if (!empty($mname)) {
		// echo "hello";
		$query = "UPDATE listofstudents SET MIDDLENAME='$mname' WHERE ID='$id'";
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
	if (!empty($lname)) {
		$query = "UPDATE listofstudents SET LASTNAME='$lname' WHERE ID='$id'";
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
	if (!empty($dept)) {
		$query = "UPDATE listofstudents SET DEPARTMENT='$dept' WHERE ID='$id'";
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
	if (!empty($year)) {
		$query = "UPDATE listofstudents SET YEAR='$year' WHERE ID='$id'";
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
	if (!empty($sem)) {
		$query = "UPDATE listofstudents SET SEMISTER='$sem' WHERE ID='$id'";
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
	if (!empty($nokt)) {
		$query = "UPDATE listofstudents SET NUMBEROFKT='$nokt' WHERE ID='$id'";
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
	if (!empty($avg)) {
		$query = "UPDATE listofstudents SET AVERAGEOFCODED='$avg' WHERE ID='$id'";
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
	header("location:ListOfStudents.php");
?> 