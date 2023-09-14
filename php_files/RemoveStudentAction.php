<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$studentId = $_REQUEST['StudentId'];
	$enroll = $_REQUEST['enroll'];
	$query = "DELETE FROM listofstudents WHERE ID='$studentId' AND ENROLLNO='$enroll'";
	if ($con)
	{
		$getData1 = mysqli_query($con,"SELECT * FROM student");
		while ($row = mysqli_fetch_array($getData1))
		{
			$count++;
		}
		$i = $studentId;
		$j = $studentId;
		echo "$query";
		if (mysqli_query($con,$query))
		{
			$query2 = "DELETE FROM coursewisemarks WHERE ID='$studentId'";
			if (mysqli_query($query2)) {
				echo "child row deleted successfully";
			}
			while ($j <= $count)
			{
				$query1 = "UPDATE listofstudents SET ID = $i where ID = $i+1";
				mysqli_query($con,$query1);
				$j++;
				$i++;
			}
			echo "student deleted successfully!!";
			header("location:listofStudents.php");
		}
		else {
			echo "error";
		}
	}
	else
	{
		header("location:ListOfStudents.php");
		echo "Some error occurred please try again after sometime!!";
	}
?>