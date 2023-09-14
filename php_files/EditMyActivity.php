<?php
    include 'SessionCreatedCheck.php';
    include 'MysqlConnectionCreated.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit My Activity</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="AdminLTE.css">
        <link rel="stylesheet" href="skin-yellow-light.css">
        <link rel="stylesheet" href="ionicons.min.css">
        <!--    <link rel="stylesheet" href="custom2.css">-->
        <link rel="stylesheet" href="pi-activity-create-new.css">
        <style>
            .button
            {
                width: 100px;
                padding: 10px;
                text-align: center;
                font-family: sans-serif;
                font-size: 15px;
                text-transform: uppercase;
                border: solid 1px #673ac7;
                margin-top: 35px;
                display: block;
                color: #673ac7;
                background: #fff;
                
            }
            .button:hover{
                background: #673ac7;
                color: #fff;
                transition: background .7s;
                transition: color .7s;
            }
            .pull-left p
            {
               color: #fff;
                font-size: 18px;
                line-height: 30px;
            }
            form textarea
            {
                resize: none;
                width: 100%;
                height: 150px;
                
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-yellow-light sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">TE</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>TrainE</b></span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->  
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="avatar.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->  
                                    <span class="hidden-xs">
                                        <?php
                                            $user = $_SESSION['userID'];
                                            $name = "";
                                            $query = "SELECT FIRST_NAME, LAST_NAME FROM userdetails WHERE USERNAME='$user'";
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $name = $row[0]." ".$row[1];
                                            }
                                            echo "$name";
                                        ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="avatar.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?php
                                                echo "$name";
                                            ?>
                                        </p>
                                    </li>  
                                    <!-- Menu Footer-->
                                    <li class="user-footer">    
                                        <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->  
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="avatar.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>
                                <?php
                                    echo "$name";
                                ?>
                            </p>
                            <!-- Status -->
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <!-- Optionally, you can add icons to the links -->
                        <li>
                            <a href="Dashboard.php">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <!-- code -->
                        </li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">   
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <div class="container">
                    <?php
                        $actId = $_REQUEST['activityID'];
                        $actType = $_REQUEST['activityType'];
                        $pi = "PI";
                        $tps = "TPS";
                        $theory = "THEORY_PAPER";
                        // echo "strcmp($pi,$typeOfActivity)";
                        if(strcmp($pi,$actType)==0)
                        {
                            echo "<form method='get' action='EditMyActivityAction.php'>";
                                echo "<input type='hidden' name='edipitype' value='$actType'>";
                                echo "<input type='hidden' name='edipiid' value='$actId'>";
                                $query = "SELECT * FROM piactivity WHERE ID='$actId'";
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<div class='row'>";
                                        echo "<label for='nameOfProfessor'>Name Of Professor</label>";
                                        echo "<input type='text' name='nameOfProfessor' value='$row[1]' readonly>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        $dbquery = "SELECT DOMAIN FROM domaintable WHERE ID=$row[2]";
                                        $dbresult = mysqli_query($con, $dbquery);
                                        $dbrow = mysqli_fetch_array($dbresult);
                                        $domainName = $dbrow[0];
                                        echo "<label for='domain'>Domain</label>";
                                        echo "<input type='text' value='$domainName' name='domain' readonly>";
                                    echo "</div>";
                                    $dbquery1 = "SELECT COURSE FROM domainsemcourse WHERE ID=$row[3]";
                                    $dbresult1 = mysqli_query($con, $dbquery1);
                                    $dbrow1 = mysqli_fetch_array($dbresult1);
                                    $courseName = $dbrow1[0];
                                    echo "<div class='row'>";
                                        echo "<label for='course'>Course</label>";
                                        echo "<input type='text' value='$courseName' name='course'>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='topicFromCourse'>Topic:</label>";
                                        echo "<select name='topicFromCourse' id='' class='inline-block'>";
                                                $IDOfCoursetaught = 0;
                                                $query1 = "SELECT COURSES_TAUGHT FROM userdetails WHERE USERNAME='$row[1]'";
                                                $result1 = mysqli_query($con, $query1);
                                                while($row1 = mysqli_fetch_array($result1))
                                                {
                                                    $IDOfCoursetaught = $row1[0];
                                                }
                                                $query2 = "SELECT * FROM coursewisetopic WHERE COURSE='$IDOfCoursetaught'";
                                                $result2 = mysqli_query($con, $query2);
                                                while($row2 = mysqli_fetch_array($result2))
                                                {
                                                    $id = $row2[0];
                                                    $name = $row2[2];
                                                    $i++;
                                                    if($id == $row[3]){
                                                        echo "<option id='$id' value='$id' selected> $name </option>";
                                                    }
                                                    else{
                                                        echo "<option id='$id' value='$id'> $name </option>";
                                                    }
                                                }
                                        echo "</select>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='type'>Type</label>";
                                        echo "<input type='text' value='$row[5]' readonly>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='concept'>Concept Being Addressed</label>";
                                        echo "<input type='text' placeholder='$row[6]' name='concept'>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='conceptQuest'>Concept Question</label>";
                                        echo "<input type='text' placeholder='$row[7]' name='conceptQuest'>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='correctAns'>Correct Answer</label>";
                                        echo "<input type='text' placeholder='$row[8]' name='correctAns'>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='plausible'>Plausible Distractors</label>";
                                        echo "<input type='text' placeholder='$row[9]' name='plausible'>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<input type='submit' id='submitButton' value='submit'>";
                                    echo"</div>";
                                echo "</form>";
                            }
                        }
                        elseif(strcmp($tps,$actType)==0)
                        {
                            echo "<form method='get' action='EditMyActivityAction.php'>";
                                echo "<input type='hidden' name='edipitype' value='$actType'>";
                                echo "<input type='hidden' name='edipiid' value='$actId'>";
                                $query = "SELECT * FROM tpsactivity WHERE ID='$actId'";
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<div class='row'>";
                                        echo "<label for='nameOfProfessor'>Name Of Professor</label>";
                                        echo "<input type='text' value='$row[1]' >";
                                    echo "</div>";
                                    $domainName = null;
                                    $courseName = null;
                                    $topicName = null;
                                    $query1 = "SELECT DOMAIN FROM domaintable WHERE ID='$row[2]'";
                                    $result1 = mysqli_query($con, $query1);
                                    while($row1 = mysqli_fetch_array($result1))
                                    {
                                        $domainName = $row1[0];
                                    }
                                    echo "<div class='row'>";
                                        echo "<label for='domain'>Domain</label>";
                                        echo "<input type='text' value='$domainName' readonly>";
                                    echo "</div>";
                                    $query2 = "SELECT COURSE FROM domainsemcourse WHERE ID='$row[3]'";
                                    $result2 = mysqli_query($con, $query2);
                                    while($row2 = mysqli_fetch_array($result2))
                                    {
                                        $courseName = $row2[0];
                                    }
                                    echo "<div class='row'>";
                                        echo "<label for='course'>Course</label>";
                                        echo "<input type='text' value='$courseName' readonly>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='topicFromCourse'>Topic:</label>";
                                        echo "<select name='topicFromCourse' id='' class='inline-block'>";
                                                $IDOfCoursetaught = 0;
                                                $query1 = "SELECT COURSES_TAUGHT FROM userdetails WHERE USERNAME='$row[1]'";
                                                $result1 = mysqli_query($con, $query1);
                                                while($row1 = mysqli_fetch_array($result1))
                                                {
                                                    $IDOfCoursetaught = $row1[0];
                                                }
                                                $query2 = "SELECT * FROM coursewisetopic WHERE COURSE='$IDOfCoursetaught'";
                                                $result2 = mysqli_query($con, $query2);
                                                while($row2 = mysqli_fetch_array($result2))
                                                {
                                                    $id = $row2[0];
                                                    $name = $row2[2];
                                                    $i++;
                                                    if($id == $row[3]){
                                                        echo "<option id='$id' value='$id' selected> $name </option>";
                                                    }
                                                    else{
                                                        echo "<option id='$id' value='$id'> $name </option>";
                                                    }
                                                }
                                        echo "</select>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='type'>Type</label>";
                                        echo "<input type='text' value='$row[5]' readonly>";
                                    echo "</div>";
                                    echo "<h3> Think Phase </h3>";
                                    echo "<div class='row'>";
                                        echo "<label for='duration1'>Duration</label>";
                                        echo "<input type='text' name='duration1' placeholder='$row[6]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='guideQuest1'>Guiding Question</label>";
                                        echo "<input type='text' name='guideQuest1' placeholder='$row[7]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='desireOutput1'>Desired Output</label>";
                                        echo "<input type='text' name='desireOutput1' placeholder='$row[8]' >";
                                    echo "</div>";
                                    echo "<h3> Share Phase</h3>";
                                    echo "<div class='row'>";
                                        echo "<label for='duration2'>Duration</label>";
                                        echo "<input type='text' name='duration2' placeholder='$row[9]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='guideQuest2'>Guiding Question</label>";
                                        echo "<input type='text' name='guideQuest2' placeholder='$row[10]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='desiredOutput2'>Desired Output</label>";
                                        echo "<input type='text' name='desiredOutput2' placeholder='$row[11]' >";
                                    echo "</div>";
                                    echo "<h3> Pair Phase </h3>";
                                    echo "<div class='row'>";
                                        echo "<label for='duration3'>Duration</label>";
                                        echo "<input type='text' name='duration3' placeholder='$row[12]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='guideQuest3'>Guiding Question</label>";
                                        echo "<input type='text' name='guideQuest3' placeholder='$row[13]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='desiredOutput3'>Desired Output</label>";
                                        echo "<input type='text' name='desiredOutput3' placeholder='$row[14]' >";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<input type='submit' id='submitButton' value='submit'>";
                                    echo"</div>";
                                echo "</form>";
                            }
                        }
                        elseif(strcmp($theory,$actType)==0)
                        {
                            echo "<form method='get' action='EditMyActivityAction.php'>";
                                echo "<input type='hidden' name='edipitype' value='$actType'>";
                                echo "<input type='hidden' name='edipiid' value='$actId'>";
                                $count1 = 1;
                                $query = "SELECT * FROM theorypaper WHERE ID='$actId'";
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<div class='row'>";
                                        echo "<label for='nameOfProfessor'>Name Of Professor</label>";
                                        echo "<input type='text' value='$row[1]' readonly>";
                                    echo "</div>";
                                    $domainName = null;
                                    $courseName = null;
                                    $query1 = "SELECT DOMAIN FROM domaintable WHERE ID='$row[2]'";
                                    $result1 = mysqli_query($con, $query1);
                                    while($row1 = mysqli_fetch_array($result1))
                                    {
                                        $domainName = $row1[0];
                                    }
                                    echo "<div class='row'>";
                                        echo "<label for='domain'>Domain</label>";
                                        echo "<input type='text' value='$domainName' readonly>";
                                    echo "</div>";
                                    $query2 = "SELECT COURSE FROM domainsemcourse WHERE ID='$row[3]'";
                                    $result2 = mysqli_query($con, $query2);
                                    while($row2 = mysqli_fetch_array($result2))
                                    {
                                        $courseName = $row2[0];
                                    }
                                    echo "<div class='row'>";
                                        echo "<label for='course'>Course</label>";
                                        echo "<input type='text' value='$courseName' readonly>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<label for='type'>Type</label>";
                                        echo "<input type='text' value='$row[4]' readonly>";
                                    echo "</div>";
                                    $query2 = "SELECT * FROM theoryquest WHERE PAPERID='$row[0]'";
                                    $result2 = mysqli_query($con, $query2);
                                    while($row1 = mysqli_fetch_array($result2))
                                    {
                                        echo "<div class='row'>";
                                            echo "<label for='quest".$count1."'>Question"." ".$count1."</label>";
                                            echo "<input type='text' placeholder='$row1[2]' name='quest[]'>";
                                            echo "<label for='marks".$count1."'>Marks</label>";
                                            echo "<input type='text' placeholder='$row1[4]' name='marks[]'>";
                                        echo "</div>";
                                        echo "<div class='row'>";
                                            echo "<label for='ans".$count1."'>Answer"." "."". $count1."</label>";
                                            echo "<input type='text' placeholder='$row1[3]' name='ans[]'>";
                                        echo "</div>";
                                        $count1++;
                                    }
                                    echo "<div class='row'>";
                                        echo "<input type='submit' id='submitButton' value='submit'>";
                                    echo"</div>";
                                echo "</form>";
                            }
                        }
                    ?>
                </div>
            </div>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">      
                </div>
                <!-- Default to the left -->
                <strong>TrainE</strong>
            </footer>
            <!-- Control Sidebar -->
            <!-- Tab panes -->
            <!-- REQUIRED JS SCRIPTS -->
            <!-- jQuery 2.1.4 -->
            <script src="jQuery-2.1.4.min.js"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="app.min.js"></script>
            <!--
                Optionally, you can add Slimscroll and FastClick plugins.
                Both of these plugins are recommended to enhance the
                user experience. Slimscroll is required when using the
                fixed layout.
            -->
        </div>
    </body>
</html>