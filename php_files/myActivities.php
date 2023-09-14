<?php
    include 'SessionCreatedCheck.php';
    include 'MysqlConnectionCreated.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Activities</title>
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
        <!--<link rel="stylesheet" href="materialize.min.css">-->
        <link rel="stylesheet" href="pi-activity-create-new.css">
        <link rel="stylesheet" href="custom-for-myActivities.css">
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
                                            $name1 = null;
                                            $user = $_SESSION['userID'];
                                            $name = "";
                                            $query = "SELECT FIRST_NAME, LAST_NAME FROM userdetails WHERE USERNAME='$user'";
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $name = $row[0]." ".$row[1];
                                                $name1 = $row[0];
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
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">   
                <!-- Content Header (Page header) -->    
                <!-- Main content -->   
                <!--<h3> Create PI Activity</h3>-->
                <div class="container">  
                    <h3>PI</h3>
                    <table class="striped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Activity ID</th>
                                <th>Type of Activity</th>
                                <th>Rating</th>
                                <th>View</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nameOfUser = $_SESSION['username'];
                                $query = "SELECT ID,TYPE,RATING FROM piactivity WHERE NAME_OF_PROFESSOR = '$nameOfUser'";
                                $result = mysqli_query($con ,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                        echo "<td> $row[0] </td>";
                                        echo "<td> $row[1] </td>";
                                        echo "<td> $row[2] </td>";
                                        echo "<td> <a href='ViewMyActivity.php?activityID=$row[0]&activityType=$row[1]'>View</a> </td>";
                                        echo "<td> <a href='EditMyActivity.php?activityID=$row[0]&activityType=$row[1]'>Edit</a> </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>  
                    <h3>TPS</h3>
                    <table class="striped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Activity ID</th>
                                <th>Type of Activity</th>
                                <th>Rating</th>
                                <th>View</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nameOfUser = $_SESSION['username'];
                                $query = "SELECT ID,TYPE,RATING FROM tpsactivity WHERE NAME_OF_PROFESSOR = '$nameOfUser'";
                                $result = mysqli_query($con ,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                        echo "<td> $row[0] </td>";
                                        echo "<td> $row[1] </td>";
                                        echo "<td> $row[2] </td>";
                                        echo "<td> <a href='ViewMyActivity.php?activityID=$row[0]&activityType=$row[1]'>View</a> </td>";
                                        echo "<td> <a href='EditMyActivity.php?activityID=$row[0]&activityType=$row[1]'>Edit</a> </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <h3>Theory Paper</h3>
                    <table class="striped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Activity ID</th>
                                <th>Type of Activity</th>
                                <th>Rating</th>
                                <th>View</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nameOfUser = $_SESSION['username'];
                                $query = "SELECT ID,TYPE,RATING FROM theorypaper WHERE NAME_OF_PROFESSOR = '$nameOfUser'";
                                $result = mysqli_query($con ,$query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                        echo "<td> $row[0] </td>";
                                        echo "<td> $row[1] </td>";
                                        echo "<td> $row[2] </td>";
                                        echo "<td> <a href='ViewMyActivity.php?activityID=$row[0]&activityType=$row[1]'>View</a> </td>";
                                        echo "<td> <a href='EditMyActivity.php?activityID=$row[0]&activityType=$row[1]'>Edit</a> </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>  
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