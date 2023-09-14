<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Create Theory Paper</title>
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
        <link rel="stylesheet" href="theory-paper-create.css">
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
                                    	$name = "";
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
                <label for="number">Number of questions</label>
                <input type="number" name="noOfQuest" id="noOfQuest" name="number">
                <button id="nextStep" class="button"> Next </button>
                <div id="htmlCode"></div>
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <!-- Control Sidebar -->
            <!-- Tab panes -->
            <!-- REQUIRED JS SCRIPTS -->
            <!-- jQuery 2.1.4 -->
            <script src="jquery-min.js"></script>
            <script type="text/javascript">
				$(document).ready(function(){
					$("#nextStep").click(function(){
						var count = 0;
						var count1 = 1;
						var flag = 0;
						var noOfQuest = document.getElementById("noOfQuest").value;
						if(noOfQuest == 0)
						{
							flag++;
						}
						if(flag == 0)
						{
							$.ajax({
							  	success: function(data, status){
							  		var htmlCode = "<form action='TheoryPaperCreateAction.php'><input type='hidden' name='noOfQuests' value="+noOfQuest+">";
							  		while(count<noOfQuest)
							  		{
							  			htmlCode = htmlCode + "<div class='question'><div class='row'><label for='quest'>Q"+count1+":</label><textarea name='quest[]' cols='2' rows='2'></textarea></div><div class='row'><label for='marks'>Marks:</label><input name='marksForQuestion[]' type='number'></div><div class='row'><label for='ans'>Ans"+count1+".</label><textarea name='ans[]' cols='2' rows='2'></textarea></div></div>";
							  			// htmlCode = htmlCode + "Q"+count1+" : <input type='text' name='quest[]'> -- <input type='number' name='marksForQuestion[]'><br><br>A"+count1+" : <input type='text' name='ans[]'><br><br>";
							  			count++;
							  			count1++
							  		}
								  	htmlCode = htmlCode + "<div class='row'><input type='submit' class='button' name='submit' value='Next'></div></form>";
								  	$('#htmlCode').html(htmlCode);
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