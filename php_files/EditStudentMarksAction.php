<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$id = $_REQUEST['edipiid'];
	$assign1 = $_REQUEST['assign1'];
	$assign2 = $_REQUEST['assign2'];
	$test = $_REQUEST['test'];
	if (!empty($assign1)) {

		$query = "UPDATE coursewisestudmarks SET ASSIGN1='$assign1' WHERE ID='$id'";
		// echo "$query";
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
	if (!empty($assign2)) {
		$query = "UPDATE coursewisestudmarks SET ASSIGN2='$assign2' WHERE ID='$id'";
		// echo "$query";
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
	if (!empty($test)) {
		// echo "hello";
		$query = "UPDATE coursewisestudmarks SET TEST='$test' WHERE ID='$id'";
		// echo "$query";
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
	$query1 = "SELECT ASSIGN1, ASSIGN2, TEST FROM coursewisestudmarks WHERE ID='$id'";
	$result1 = mysqli_query($con, $query1);
	$row1 = mysqli_fetch_array($result1);
	$assign1 = $row1[0];
	$assign2 = $row1[1];
	$test = $row1[2];
	// echo "$assign1";
	// echo "$assign2";
	// echo "$test";
	$avg = ($assign1 + $assign2 + $test)/2;
	$query2 = "UPDATE coursewisestudmarks SET AVG='$avg' WHERE ID='$id'";
	// echo "$query2";
	if (mysqli_query($con, $query2)) {
		header("location:StudentMarksCourseWise.php");
	}
?>