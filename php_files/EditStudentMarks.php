<?php
    include 'SessionCreatedCheck.php';
    include 'MysqlConnectionCreated.php';
?>
<html>
    <head>
        <!-- jQuery 2.1.4 -->
        <script src="jquery-min.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Student</title>
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
        <!--<link rel="stylesheet" href="custom2.css">-->
        <link rel="stylesheet" href="PI-activity-create-new.css">
        <!--<link rel="stylesheet" href="custom-for-myActivities.css">-->
        <style>
            .pull-left p
            {
               color: #fff;
                font-size: 18px;
                line-height: 30px;
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
                                            error_reporting(0);
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
                <!--<h3> Create PI Activity</h3>-->
                <div class="container">  
                    <form action="EditStudentMarksAction.php">
                        <h3> Edit Student Marks </h3>
                        <div class="row">
                        	<label for="stud"> Student Name :</label>
                            <?php
                            	$id = $_REQUEST['StudentId'];
                            	// echo "";
                            	$uname = $_SESSION['userID'];
                                $query2 = "SELECT ID FROM userdetails WHERE USERNAME='$uname'";
                                $result2 = mysqli_query($con, $query2);
                                $row2 = mysqli_fetch_array($result2);
                                $user = $row2[0];
                                $query = "SELECT * FROM coursewisestudmarks WHERE ID='$id'";
                                $result = mysqli_query($con, $query);
                                // $enrol;
                                while($row = mysqli_fetch_array($result))
                                {
                                	$enrol = $row[2];
                                	$course = $row[3];
                                	$sem = $row[4];
                                	$assign1 = $row[5];
                                	$assign2 = $row[6];
                                	$test = $row[7];
                                }
                                $query1 = "SELECT FIRSTNAME FROM listofstudents WHERE ENROLLNO='$enrol' && ADDEDBY='$user'";
                                $result1 = mysqli_query($con, $query1);
                                $row1 = mysqli_fetch_array($result1);
                                $stud = $row1[0];
                                echo "<input type='text' name='stud' id='stud' class='inline-block' value='$stud' readonly>";
                            ?>
                         	<input type="hidden" id="edipiid" name="edipiid" value='<?php echo"$id" ?>'>
                        </div>
                        <div class="row">
                        	<label for="course">Course :</label>
                            <?php
                                $query2 = "SELECT COURSE FROM domainsemcourse WHERE ID='$course'";
                                $result2 = mysqli_query($con, $query2);
                                while($row2 = mysqli_fetch_array($result2))
                                {
                                    $courseName = $row2[0];
                                }
                                echo "<input type='text' name='course' id='course' class='inline-block' value='$courseName' readonly>";
                            ?>
                        </div>
                        <div class="row">
                            <label for="sem">Semester :</label>
                            <?php
                                $query3 = "SELECT SEM FROM semister WHERE ID='$sem'";
                                $result3 = mysqli_query($con, $query3);
                                while($row3 = mysqli_fetch_array($result3))
                                {
                                    $semName = $row3[0];
                                }
                                echo "<input type='text' id='$semName' value='$semName' class='inline-block' readonly>";
                            ?>
                        </div>
                        <div class="row">
                        	<label for="assign1">Assignment 1 :</label>
                            <input type="number" name="assign1" placeholder="<?php echo "$assign1" ?>" class="browser-default" style="width: 100%; height: 48px">
                        </div>
                        <div class="row">
                        	<label for="assign2">Assignment 2 :</label>
                            <input type="number" placeholder="<?php echo "$assign2" ?>" name="assign2" class="browser-default" style="width: 100%; height: 48px">
                        </div>
                        <div class="row">
                        	<label for="test">Test :</label>
                            <input type="number" name="test" placeholder="<?php echo "$test" ?>" class="browser-default" style="width: 100%; height: 48px">
                        </div>
                        <div class="row">
                            <input type="submit" id="submitButton" value="submit">
                        </div>
                    </form>
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