<?php
	header("Content-Type: application/json");
	include 'MysqlConnectionCreated.php';
	include 'SessionCreatedCheck.php';
	include 'TempHeader.php';
	$courseIn = $_REQUEST['CourseIn'];
	$json = array();
	$uname = $_SESSION['userID'];
	// echo "$courseIn";
	$myquery = "SELECT ID FROM userdetails WHERE USERNAME='$uname'";
	$myresult = mysqli_query($con, $myquery);
	$myrow = mysqli_fetch_array($myresult);
	$addedby = $myrow[0];
	$query = "SELECT * FROM coursewisestudmarks WHERE COURSE = '$courseIn' && ADDEDBY='$addedby'";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result))
	{
		$idret = $row[0];
		$enrollret = $row[2];
		$course = $row[3];
		$courseret = "";
		$query2 = "SELECT COURSE FROM domainsemcourse WHERE ID='$course'";
		$result2 = mysqli_query($con, $query2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$courseret = $row2[0];
		}
		$sem = $row[4];
		$semret = "";
		$query3 = "SELECT SEM FROM semister WHERE ID='$sem'";
		$result3 = mysqli_query($con, $query3);
		while($row3 = mysqli_fetch_array($result3))
		{
			$semret = $row3[0];
		}
		$assign_1 = $row[5];
		$assign_2 = $row[6];
		$test = $row[7];
		$avg = $row[8];
		$data=array(
			'idret' => $idret,
			'enroll' => $enrollret,
			'courseRet' => $courseret,
			'semRet' => $semret,
			'assign1Ret' => $assign_1,
			'assign2Ret' => $assign_2,
			'testRet' => $test,
			'avgRet' => $avg
		);
		array_push($json, $data);
	}
	echo json_encode($json);
?>