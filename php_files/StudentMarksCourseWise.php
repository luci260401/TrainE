<?php
    include 'SessionCreatedCheck.php';
    include 'MysqlConnectionCreated.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Marks</title>
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
        <link rel="stylesheet" href="pi-activity-create-new.css">
        <link rel="stylesheet" href="custom-for-myActivities.css">
        <style>
            .button
            {
                width: 100px;
                padding: 5px 10px;
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
                    <button class="button" style="width: 200px" onclick="location.href='AddStudentMarks.php'">Add Student Marks</button>
                    <div class="appearByDefault">
                        <label for="choose">Choose Semester</label>       
                        <select name="choose" id="Semister">
                            <option value="0">Choose Semester</option>
                            <?php
                                $query = "SELECT * FROM semister";
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                            ?>
                        </select>
                        <div class="button" id="ok">Next</div>
                        <div id="anotherDropdown"></div><br>
                        <div id="anotherButton"></div><br>
                        <div id="marksTable"></div>
                    </div><br><br>
                </div>
            </div>
        </div>
        <script src="jquery-min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#ok").click(function(){
                    var count = 0;
                    var flag = 0;
                    var sem = document.getElementById("Semister").value;
                    if(sem == 0)
                    {
                        flag++;
                    }
                    if(flag == 0)
                    {
                        $.ajax({
                            url: 'http://localhost:8080/Projects/final_year/GetCourse.php?SemisterIn='+sem,
                            success: function(data, status){
                                var anotherDropdown = "<label>Course</label><select id='Course' name='Course'><option value='0'>Choose Course</option>";
                                $.each(data, function(i){
                                    row = data[i];
                                    courseName = row.courseRet;
                                    courseId = row.idRet;
                                    anotherDropdown = anotherDropdown + "<option value="+ courseId +">"+ courseName +"</option>";
                                });
                                anotherDropdown = anotherDropdown + "</select>";
                                anotherButton = "<button id='ok2' class='button'>Next</button>";
                                $('#anotherButton').html(anotherButton);
                                $('#anotherDropdown').html(anotherDropdown);
                            },
                            error: function(error)
                            {
                                console.log(error);
                            }
                        });
                    }
                    else
                    {
                        // code...
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#anotherButton").click(function(){
                    var count = 0;
                    var flag = 0;
                    var courseIn = document.getElementById("Course").value;
                    console.log(courseIn);
                    if(courseIn == 0)
                    {
                        flag++;
                    }
                    if(flag == 0)
                    {
                        $.ajax({
                            url: 'http://localhost:8080/Projects/final_year/GetCourseMarks.php?CourseIn='+courseIn,
                            success: function(data, status){
                                var marksTable = "<table class='centered striped responsive-table'><thead><td>ENROLLMENT NUMBER</td><td>SEMESTER</td><td>COURSE</td><td>ASSIGNMENT1</td><td>ASSIGNMENT2</td><td>TEST</td><td>AVERAGE</td><td>EDIT</td></thead><tbody>";
                                $.each(data, function(i){
                                    row = data[i];
                                    id = row.idret;
                                    enroll = row.enroll;
                                    courseName = row.courseRet;
                                    semName = row.semRet;
                                    assign1 = row.assign1Ret;
                                    assign2 = row.assign2Ret;
                                    test = row.testRet;
                                    avg = row.avgRet;
                                    marksTable = marksTable + "<tr><td>"+enroll+"</td><td>"+semName+"</td><td>"+courseName+"</td><td>"+assign1+"</td><td>"+assign2+"</td><td>"+test+"</td><td>"+avg+"</td><td><button id='Remove' onclick=\"location.href='EditStudentMarks.php?StudentId="+id+"'\">Edit</button></td>";
                                });
                                marksTable = marksTable + "</tbody></table>";
                                $('#marksTable').html(marksTable);
                            },
                            error: function(error)
                            {
                                console.log(error);
                            }
                        });
                    }
                    else
                    {
                        // code...
                    }
                });
            });
        </script>
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