<?php
	include 'MysqlConnectionCreated.php';
	// include 'SessionCreatedCheck.php';
	$username = $_REQUEST['uname'];
	$flag = 0;
	$query1 = "SELECT USERNAME FROM userdetails";
	$result1 = mysqli_query($con, $query1);
	while($row1 = mysqli_fetch_array($result1))
	{
		if(strcmp($username,$row1[0])==0)
		{
			$flag++;
		}
	}
	if($flag>0)
	{
		die("Enter other username this username is already taken");
	}
	$count = 0;
	$finalid = 0;
	$query2 = "SELECT ID FROM userdetails";
	$result2 = mysqli_query($con, $query2);
	while($row = mysqli_fetch_array($result2)) {
		$count = $count + 1;
	}
	$finalid = $count + 1;
	$password = $_REQUEST['pass'];
	$repass = $_REQUEST['repass'];
	$fname = $_REQUEST['fname'];
	$mname = $_REQUEST['mname'];
	$lname = $_REQUEST['lname'];
	$gender = $_REQUEST['gender'];
	$clg = $_REQUEST['college'];
	$state = $_REQUEST['state'];
	$city = $_REQUEST['city'];
	$domain = $_REQUEST['domain'];
	$course = $_REQUEST['course'];
	$expr = $_REQUEST['experience'];
	$contact = $_REQUEST['contact'];
	$mail = $_REQUEST['mailId'];
	if(strcmp($password,$repass)==0)
	{
		$query = "INSERT INTO userdetails (ID,FIRST_NAME,MIDDLE_NAME,LAST_NAME,GENDER,USERNAME,PASSWORD,DOMAIN,COURSES_TAUGHT,STATE,CITY,COLLEGEOFTEACHING,EXPERIENCE,CONTACT,EMAIL) VALUES('$finalid','$fname','$mname','$lname','$gender','$username','$password','$domain','$course','$state','$city','$clg','$expr','$contact','$mail')";
		if(mysqli_query($con,$query))
		{
			echo "Row Inserted Successfully!!";
			header("location:LoginPage.html");
		}
		else
		{
			echo "Row not inserted";
		}
	}
?>