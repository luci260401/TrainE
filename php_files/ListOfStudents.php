<?php
    include 'SessionCreatedCheck.php';
    include 'MysqlConnectionCreated.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List Of Students</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE.css">
    <link rel="stylesheet" href="skin-yellow-light.css">
    <link rel="stylesheet" href="ionicons.min.css">
    <!--    <link rel="stylesheet" href="materialize.min.css">-->
    <link rel="stylesheet" href="PI-activity-create.css">
    <link rel="stylesheet" href="custom-for-myActivities.css">
    <style>
        .container {
            padding: 5%;
        }
        .pull-left p {
            color: #fff;
            font-size: 18px;
            line-height: 30px;
        }
        td span.fa {
            color: red;
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
                                <?php
                                    $user = $_SESSION['userID'];
                                    error_reporting(0);
                                    $getName=mysqli_query($con,"SELECT FIRST_NAME, LAST_NAME FROM userdetails WHERE USERNAME='$user'");
                                    while($row=mysqli_fetch_array($getName))
                                    {
                                        $name=$row['FIRST_NAME']." ".$row['LAST_NAME'];
                                    }
                                ?>
                                <span class="hidden-xs">
                                    <?php
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
                <h3>List Of Students</h3>
                <button class="button" onclick="location.href='AddStudent.php'">Add Student</button><br><br>
                <table class="striped centered responsive-table">
                    <thead>
                        <tr>
                            <!-- <th>Check</th> -->
                            <th>Enrollment Number</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Number of KT</th>
                            <th>Average of Coded</th>
                            <th>Edit</th>
                            <th>Remove</th>
                            <!-- <th>View</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $uname = $_SESSION['userID'];
                            $myquery = "SELECT ID FROM userdetails WHERE USERNAME='$uname'";
                            $myresult = mysqli_query($con, $myquery);
                            $myrow = mysqli_fetch_array($myresult);
                            $myid = $myrow[0];
                            $query = "SELECT * FROM listofstudents WHERE ADDEDBY='$myid'";
                            $result = mysqli_query($con,$query);
                            // ini_set("display_errors", 0);
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<tr>";
                                    // echo "<td>heyy</td>";
                                    echo "<td>$row[1]</td>";
                                    echo "<td>$row[3]</td>";
                                    echo "<td>$row[4]</td>";
                                    echo "<td>$row[5]</td>";
                                    $dept = $row[6];
                                    $query1 = "SELECT DOMAIN FROM domaintable WHERE ID=$dept";
                                    $result1 = mysqli_query($con, $query1);
                                    // while()
                                    // {
                                    $row1 = mysqli_fetch_array($result1);
                                    $finaldept = $row1[0];
                                    // }
                                    echo "<td>$finaldept</td>";
                                    echo "<td>$row[7]</td>";
                                    $semval = $row[8];
                                    $query2 = "SELECT SEM FROM semister WHERE ID=$semval";
                                    $result2 = mysqli_query($con, $query2);
                                    $row2 = mysqli_fetch_array($result2);
                                    $finalsem = $row2[0];
                                    echo "<td>$finalsem</td>";
                                    echo "<td>$row[9]</td>";
                                    echo "<td>$row[10]</td>";
                                    echo "<td><button id='Remove' onclick=\"location.href='EditStudentAction.php?StudentId=$row[0]'\">Edit</button></td>";
                                    echo "<td><button id='Remove' onclick=\"location.href='RemoveStudentAction.php?StudentId=$row[0]&enroll=$row[1]'\">Remove</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table><br><br>
            </div>
        </div><!-- /.content-wrapper -->
        <!-- Main Footer -->
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
</body>
</html>