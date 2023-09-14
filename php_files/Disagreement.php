<?php
    include 'MysqlConnectionCreated.php';
    include 'SessionCreatedCheck.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Disagreement Resolver</title>
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
        <!--    <link rel="stylesheet" href="pi-activity-create-new.css">-->
        <link rel="stylesheet" href="chatwindow.css">
        <!-- jQuery 2.1.4 -->
        <script src="jquery-min.js"></script>
        <style>
            .button {
                width: 100px;
                padding: 10px;
                text-align: center;
                font-family: sans-serif;
                font-size: 15px;
                text-transform: uppercase;
                border: solid 1px #673ac7;
                margin-top: 35px;
    /*            display: block;*/
                color: #673ac7;
                background: #fff;

            }

            .button:hover {
                background: #673ac7;
                color: #fff;
                transition: background .7s;
                transition: color .7s;
            }

            .pull-left p {
                color: #fff;
                font-size: 18px;
                line-height: 30px;
            }

            form textarea {
                resize: none;
                width: 100%;
                height: 150px;

            }

            form input[type="text"] {
                padding: 0px 5px;
            }

            form input[type="number"] {
                width: 100%;
                padding: 10px;
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
                                            // echo "$user";
                                            $name = "";
                                            $name1 = null;
                                            $query = "SELECT FIRST_NAME, LAST_NAME FROM userdetails WHERE USERNAME='$user'";
                                            $result = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($result)) {
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
                                                echo $name;
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
                                    echo $name;
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
                <!--        <h3> Create PI Activity</h3>-->
                <div class="container">
                    <h3>Disagreement Resolver</h3><br>
                    <div class="chat-window">
                        <div class="display-area">
                           <ul class="search">
                                <li class="special">
                                    <form>
                                        <input type="text" placeholder="search">
                                    </form>
                                </li>
                           </ul>
                            <ul class="contacts">
                                <?php
                                    $query6 = "SELECT TOUSER FROM chatrecord WHERE FROMUSER='$name1'";
                                    $result6 = mysqli_query($con, $query6);
                                    while($row = mysqli_fetch_array($result6))
                                    {
                                        echo "<li>";
                                            echo "<a href='?name=$row[0]' name='$row[0]'>";
                                            // echo "<a>";
                                                echo "<img src='avatar.png' alt=''>";
                                                echo "<p>$row[0]</p>";
                                            echo "</a>";
                                        echo "</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="chat-section">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="avatar.png" alt="">
                                        <p>
                                            <?php
                                                $givenBy = null;
                                                $setNameOfUser = null;
                                                $receivedid = $_REQUEST['receivedId'];
                                                if($receivedid != null)
                                                {
                                                    // echo "inside if";
                                                    $query1 = "SELECT GIVENBY FROM givenreviews WHERE ID='$receivedid'";
                                                    $result1 = mysqli_query($con, $query1);
                                                    while($row = mysqli_fetch_array($result1))
                                                    {
                                                        $givenBy = $row[0];
                                                    }
                                                    $query2 = "SELECT * FROM chatrecord WHERE FROMUSER='$name1' AND TOUSER='$givenBy'";
                                                    echo "<input type='hidden' id='givenBy' value='$name1'>";
                                                    echo "<input type='hidden' id='givenTo' value='$givenBy'>";
                                                    $result2 = mysqli_query($con, $query2);
                                                    if(!($row = mysqli_fetch_array($result2)))
                                                    {
                                                        $query3 = "INSERT INTO chatrecord(FROMUSER, TOUSER) VALUES('$name1', '$givenBy')";
                                                        if($givenBy!=null && $name1!=null)
                                                        {
                                                            if(mysqli_query($con, $query3))
                                                            {
                                                                $query4 = "SELECT * FROM chatrecord WHERE FROMUSER='$givenBy' AND TOUSER='$name1'";
                                                                $result4 = mysqli_query($con, $query4);
                                                                if(!($row = mysqli_fetch_array($result4)))
                                                                {
                                                                    $query5 = "INSERT INTO chatrecord(FROMUSER, TOUSER) VALUES('$givenBy', '$name1')";
                                                                    if(mysqli_query($con, $query5))
                                                                    {
                                                                        echo "$givenBy";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo "$givenBy";
                                                }
                                                else
                                                {
                                                    $setNameOfUser = $_REQUEST['name'];
                                                    // echo "$setNameOfUser";
                                                    $query2 = "SELECT * FROM chatrecord WHERE FROMUSER='$name1' AND TOUSER='$setNameOfUser'";
                                                    echo "<input type='hidden' id='givenBy' value='$name1'>";
                                                    echo "<input type='hidden' id='givenTo' value='$setNameOfUser'>";
                                                    $result2 = mysqli_query($con, $query2);
                                                    if(!($row = mysqli_fetch_array($result2)))
                                                    {
                                                        $count = 0;
                                                        $id = 0;
                                                        $query6 = "SELECT ID FROM chatrecord";
                                                        $result6 = mysqli_query($con, $query6);
                                                        while($row6 = mysqli_fetch_array($result6))
                                                        {
                                                            $count = $count + 1;
                                                        }
                                                        $id = $count + 1;
                                                        $query3 = "INSERT INTO chatrecord(ID, FROMUSER, TOUSER) VALUES('$id', '$name1', '$setNameOfUser')";
                                                        if($givenBy!=null && $name1!=null)
                                                        {
                                                            if(mysqli_query($con, $query3))
                                                            {
                                                                $query4 = "SELECT * FROM chatrecord WHERE FROMUSER='$setNameOfUser' AND TOUSER='$name1'";
                                                                $result4 = mysqli_query($con, $query4);
                                                                if(!($row = mysqli_fetch_array($result4)))
                                                                {
                                                                    $count = 0;
                                                                    $id = 0;
                                                                    $query6 = "SELECT ID FROM chatrecord";
                                                                    $result6 = mysqli_query($con, $query6);
                                                                    while($row6 = mysqli_fetch_array($result6))
                                                                    {
                                                                        $count = $count + 1;
                                                                    }
                                                                    $id = $count + 1;
                                                                    $query5 = "INSERT INTO chatrecord(ID, FROMUSER, TOUSER) VALUES('$id', '$name1', '$name1')";
                                                                    if(mysqli_query($con, $query5))
                                                                    {
                                                                        echo "$setNameOfUser";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo "$setNameOfUser";
                                                }
                                            ?>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                            <div class="message-display">
                                <ul>
                                    <ul>
                                        <?php
                                            if($receivedid!=null)
                                            {
                                                $query7 = "SELECT * FROM sentmessage WHERE FROMUSER='$name1' ORDER BY TIMESTAMP ASC ";
                                                $result7 = mysqli_query($con, $query7);
                                                while($row7 = mysqli_fetch_array($result7))
                                                {
                                                    if(strcmp($row7[1],$name1) == 0)
                                                    {
                                                        echo "<li class='recieve clear'>$row7[3]</li>";
                                                    }
                                                    else if(strcmp($row7[1],$setNameOfUser) == 0)
                                                    {
                                                        echo "<li class='sending clear'>$row7[3]</li>";
                                                    }
                                                }
                                            }
                                            else if(strcmp("",$setNameOfUser)!=null)
                                            {
                                                $query7 = "SELECT * FROM sentmessage WHERE FROMUSER='$setNameOfUser' ORDER BY TIMESTAMP ASC ";
                                                $result7 = mysqli_query($con, $query7);
                                                while($row7 = mysqli_fetch_array($result7))
                                                {
                                                    if(strcmp($row7[1],$name1) == 0)
                                                    {
                                                        echo "<li class='recieve clear'>$row7[3]</li>";
                                                    }
                                                    else if(strcmp($row7[1],$setNameOfUser) == 0)
                                                    {
                                                        echo "<li class='sending clear'>$row7[3]</li>";
                                                    }
                                                }
                                            }
                                            echo "<div id='receivedMesg'></div>";
                                        ?> 
                                    <div id="sentMesg"></div>
                                    </ul>
                                </ul>
                            </div>
                            <form class="textfield">
                                <!-- <div class="textfield"> -->
                                    <input type="text" name='mesgToSend' id="mesgToSend">
                                    <div class="inline-block send" id="pleaseSend">Send</div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <button id="testbutton">test</button> -->
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#pleaseSend").click(function(){
                        var mesg = document.getElementById('mesgToSend').value;
                        var givenTo = document.getElementById('givenTo').value;
                        var givenBy = document.getElementById('givenBy').value;
                        $.ajax({
                            url:"http://localhost:8080/Projects/final_year/InsertIntoMessage.php?messageIn="+mesg+"&mesgTo="+givenTo+"&mesgBy="+givenBy,
                            success: function(data,status){
                                var sendMesg = "<li class='recieve clear'>"+mesg+"</li>";
                                $("#sentMesg").html(sendMesg);
                            },
                            error: function(error){
                                console.log(error);
                                console.trace(error);
                            }
                        })
                        $('#mesgToSend').val("");
                    })
                })
            </script>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!--To the right -->
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
    </body>
</html>