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
        <title>Add Student</title>
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
                    <form action="EditStudentAction1.php">
                        <?php
                            $id = $_REQUEST['StudentId'];
                            $query = "SELECT * FROM listofstudents where ID=$id";
                            $result = mysqli_query($con, $query);
                            while($row = mysqli_fetch_array($result))
                            {
                                $enroll = $row[1];
                                $fname = $row[3];
                                $mname = $row[4];
                                $lname = $row[5];
                                $dept = $row[6];
                                $year = $row[7];
                                $sem = $row[8];
                                $nokt = $row[9];
                                $avg = $row[10];
                            }
                        ?>
                        <input type="hidden" name="edittoedit" value="<?php echo"$id" ?>">
                        <h3> Edit Student </h3>
                        <div class="row">
                            <label for="enrollNo">Enrollment Number :</label>
                            <input type="text" name="enrollNo" class="browser-default" placeholder="<?php echo"$enroll" ?>">
                        </div>
                        <div class="row">
                            <label for="fname">First Name :</label>
                            <input type="text" name="fname" class="browser-default" placeholder="<?php echo"$fname" ?>">
                        </div>
                        <div class="row">
                            <label for="mname">Middle Name:</label>
                            <input type="text" name="mname" class="browser-default" placeholder="<?php echo"$mname" ?>">
                        </div>
                        <div class="row">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" class="browser-default" placeholder="<?php echo"$lname" ?>">
                        </div>
                        <div class="row">
                            <label for="dept">Department:</label>
                            <select name="dept" id="dept" class="inline-block">
                                <?php
                                    echo "<option id='0' value='0'> Choose Department </option>";
                                    $uname = $_SESSION['userID'];
                                    $query = "SELECT * FROM domaintable";
                                    $result = mysqli_query($con, $query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $domainId = $row[0];
                                        $domainName = $row[1];
                                        if($domainId == $dept){
                                            echo "<option id='$domainId' value='$domainId' selected> $domainName </option>";
                                        }
                                        else
                                        {
                                            echo "<option id='$domainId' value='$domainId'> $domainName </option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <label for="year">Choose Year</label>
                            <select name="year" id="year" class="inline-block">
                                <?php
                                    $count = 1;
                                    $arr = array("Choose Year","FIRST YEAR","SECOND YEAR","THIRD YEAR");
                                    while($count<4){
                                        if ($count == $year) {
                                            echo "<option value='$count' selected> $arr[$count] </option>";
                                        }
                                        else
                                        {
                                            echo "<option value='$count'> $arr[$count] </option>";
                                        }
                                        $count = $count + 1;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <label for="sem">Semester :</label>
                            <select name="sem" id="sem" class="inline-block" placeholder="<?php echo"$sem" ?>">
                                <?php
                                    echo "<option id='0' value='0'> Choose Semester </option>";
                                    $uname = $_SESSION['userID'];
                                    $query = "SELECT * FROM semister";
                                    $result = mysqli_query($con, $query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $domainId = $row[0];
                                        $domainName = $row[1];
                                        if($domainId == $sem){
                                            echo "<option id='$domainId' value='$domainId' selected> $domainName </option>";
                                        }
                                        else{
                                            echo "<option id='$domainId' value='$domainId'> $domainName </option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <label for="nokt">Number of KTs :</label>
                            <input type="text" name="nokt" id="nokt" class="browser-default" placeholder="<?php echo"$nokt" ?>">
                        </div>
                        <div id="nokt_response"></div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#nokt').keyup(function(){
                                    var inputVal = document.getElementById('nokt').value;
                                    var checkString = "<span style='color: red;'>Please Enter Valid Number.</span>";
                                    var response = "";
                                    if("".localeCompare(inputVal)!=0)
                                    {
                                        if(/^\d+$/.test(inputVal))
                                        {
                                            response = "";
                                        }
                                        else
                                        {
                                            response = checkString;
                                            document.getElementById('submitButton').disabled=true;
                                        }
                                    }
                                    $('#nokt_response').html(response);
                                })
                            })
                        </script>
                        <div class="row">
                            <label for="avgcode">Average Of Coded :</label>
                            <input type="text" name="avgcode" id="avgcode" class="browser-default" value="<?php echo"$avg" ?>">
                        </div>
                        <div id="avgcode_response"></div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#avgcode').keyup(function(){
                                    var inputVal = document.getElementById('avgcode').value;
                                    var checkString = "<span style='color: red;'>Please Enter Valid Number.</span>";
                                    var letters = /^[A-Za-z]*$/;
                                    var numbers = /^[0-9]+$/;
                                    var response = "";
                                    if("".localeCompare(inputVal)!=0)
                                    {
                                        if(/^\d+$/.test(inputVal))
                                        {
                                            response = "";
                                        }
                                        else
                                        {
                                            response = checkString;
                                            document.getElementById('submitButton').disabled=true;
                                        }
                                    }
                                    $('#avgcode_response').html(response);
                                })
                            })
                        </script>
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