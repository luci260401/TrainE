<?php
    include 'SessionCreatedCheck.php';
    include 'TempHeader.html';
    include 'MysqlConnectionCreated.php';
    $topicFromCourse = $_REQUEST['topicFromCourse'];
    $conceptAddr = $_REQUEST['conceptAddr'];
    $conceptQuest = $_REQUEST['conceptQuest'];
    $conceptAns = $_REQUEST['correctAns'];
    $plausibleDistractor = $_REQUEST['plausibleDistractor'];
    $nameOfUser = $_SESSION['username'];
    $userID = $_SESSION['userID'];
    $domainOfUser = null;
    $courseOfUser = null;
    $topicChosen = null;
    $count = 0;
    $id = 0;
    $query3 = "SELECT ID FROM piactivity";
    $result3 = mysqli_query($con, $query3);
    while($row3 = mysqli_fetch_array($result3))
    {
        $count = $count + 1;
    }
    $id = $count + 1;
    $query1 = "SELECT DOMAIN,COURSES_TAUGHT FROM userdetails WHERE FIRST_NAME='$nameOfUser' AND USERNAME='$userID'";
    $result1 = mysqli_query($con, $query1);
    while($row = mysqli_fetch_array($result1))
    {
        $domainOfUser = $row[0];
        $courseOfUser = $row[1];
    }
    $query = "INSERT INTO piactivity(ID, NAME_OF_PROFESSOR, DOMAIN, COURSE, TOPIC, CONCEPTBEINGADDRESSED, CONCEPTQUESTION, CORRECTANSWER, PLAUSIBLEDISTRACTORS) VALUES('$id', '$nameOfUser', '$domainOfUser', '$courseOfUser', '$topicFromCourse', '$conceptAddr', '$conceptQuest', '$conceptAns', '$plausibleDistractor')";
    echo "$query";
    if(mysqli_query($con, $query))
    {
        $query = "SELECT * FROM piactivity";
        $count1 = 0;
        $acttype = 0;
        $query2 = "SELECT ID FROM activitytypetable WHERE TYPE='PI'";
        $result2 = mysqli_query($con, $query2);
        while($row1 = mysqli_fetch_array($result2))
        {
            // echo "Inside while";
            // echo "$row1[0]";
            $acttype = $row1[0];
        }
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))
        {
            $count1++;
        }
        $count3 = 0;
        $query4 = "SELECT ID FROM activityrecord";
        $result4 = mysqli_query($con, $query4);
        while($row4 = mysqli_fetch_array($result4))
        {
            $count3 = $count3 + 1;
        }
        $id2 = $count3 + 1;
        $query1 = "INSERT INTO activityrecord(ID, ACTIVITYID, ACTIVITYTYPE) VALUES('$id2', '$count1', '$acttype')";
        // echo "$query1";
        echo "$query1";
        if(mysqli_query($con, $query1))
        {
            echo "Row Inserted Successfully!!";
        }
        echo "Row Insertion Successful!!";
        header("Location:myActivities.php");
    }
    else
    {
        echo "Row Insertion Unsuccessful!!!";
    }
?>