<?php
	include 'MysqlConnectionCreated.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Magical Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script src="jquery-min.js"></script>
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);
            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- Custom Theme files -->
        <link href="cssForLogin/SignUpStyle.css" rel="stylesheet" type="text/css" media="all">
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css'>
        <!-- //web font -->
    </head>
    <body>
        <!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>SIGNUP</h1>
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <form id="form1" action="AddToUserDetails.php" method="post">
                        <input class="text" type="text" name="fname" placeholder="First Name" required="">
                        <input class="text" type="text" name="mname" placeholder="Middle Name" required="">
                        <input class="text" type="text" name="lname" placeholder="Last Name" required="">
                        <select id="gender" name="gender" required="">
                            <option value="0" selected disabled>Choose gender</option>
                            <?php
                                $query3 = "SELECT * FROM gendertable";
                                $result3 = mysqli_query($con, $query3);
                                while($row = mysqli_fetch_array($result3))
                                {
                                    $id = $row[0];
                                    $name = $row[1];
                                    $i++;
                                    echo "<option id=$id value=$id> $name </option>";
                                }
                            ?>
                        </select>
                        <input class="text" type="text" name="uname" id="uname" placeholder="Username" required="">
                        <div id="uname_response"></div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#uname').keyup(function(){
                                    var unameVal = document.getElementById('uname').value;
                                    unameVal = unameVal.trim();
                                    var checkString = "<span style='color: red;'><h3>Not Available.</h3></span>";
                                    if(unameVal!=null)
                                    {
                                        $.ajax({
                                            url: 'CheckEmail.php',
                                            type: 'post',
                                            data: {
                                                username: unameVal
                                            },
                                            success: function(response){
                                                if((response.localeCompare(checkString))==0)
                                                {
                                                    document.getElementById('submitButton').disabled=true;
                                                }
                                                else if((response.localeCompare(checkString))!=0)
                                                {
                                                    document.getElementById('submitButton').disabled=false;
                                                }
                                                $('#uname_response').html(response);
                                            }
                                        });
                                    }
                                    else
                                    {
                                        $("#uname_response").html("");
                                    }
                                });
                            })
                        </script>
                        <input class="text" id="pass" type="password" name="pass" placeholder="Password" required="">
                        <input class="text" id="repass" type="password" name="repass" placeholder="Re-Enter Password" required="">
                        <div id="pass_response1"></div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#repass').keyup(function(){
                                    var passVal = document.getElementById('pass').value;
                                    var repassVal = document.getElementById('repass').value;
                                    // repassVal = repassVal.trim();
                                    // passVal = passVal.trim();
                                    var checkString = "<span style='color: red;'><h3>Passwords Not matching.</h3></span>";
                                    var response = "";
                                    if(passVal!=null && repassVal!=null)
                                    {
                                        $.ajax({
                                            success: function(){
                                                if((passVal.localeCompare(repassVal))!=0)
                                                {
                                                    response = checkString;
                                                }
                                                if((response.localeCompare(checkString))==0)
                                                {
                                                    document.getElementById('submitButton').disabled=true;
                                                }
                                                else if((response.localeCompare(checkString))!=0)
                                                {
                                                    document.getElementById('submitButton').disabled=false;
                                                }
                                                $('#pass_response1').html(response);
                                            },
                                            error: function(error){
                                                console.log(error);
                                            }
                                        });
                                    }
                                })
                            });
                        </script>
                        <select name="college" id="college" required="">
                            <option value="0" selected disabled>Institue Of Teaching</option>
                            <?php
                                $query3 = "SELECT * FROM collegetable";
                                $result3 = mysqli_query($con, $query3);
                                while($row = mysqli_fetch_array($result3))
                                {
                                    $id = $row[0];
                                    $name = $row[1];
                                    $i++;
                                    echo "<option id=$id value=$id> $name </option>";
                                }
                            ?>
                        </select>
                        <select name="experience" id="experience" required="">
                            <option value="0" selected disabled>Experience</option>
                            <?php
                                $query3 = "SELECT * FROM experiencetable";
                                $result3 = mysqli_query($con, $query3);
                                while($row = mysqli_fetch_array($result3))
                                {
                                    $id = $row[0];
                                    $name = $row[1];
                                    $i++;
                                    echo "<option id=$id value=$id> $name </option>";
                                }
                            ?>
                        </select>
                        <select name="state" id="state" required="">
                            <option id="" value="" selected disabled>Select State</option>
                            <?php
                                $query3 = "SELECT * FROM statetable";
                                $result3 = mysqli_query($con, $query3);
                                while($row = mysqli_fetch_array($result3))
                                {
                                    $id = $row[0];
                                    $name = $row[1];
                                    $i++;
                                    echo "<option id=$id value=$id> $name </option>";
                                }
                            ?>
                        </select>
                        <select id="city" name="city" disabled="true">
                            <option value="0">Choose City</option>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#state').change(function(){
                                        // console.log("Changed!!");
                                        var selectedState = document.getElementById("state").value;
                                        document.getElementById("city").disabled = false;
                                        var count = 0;
                                        $.ajax({
                                            url: 'http://localhost:8080/Projects/final_year/GetCity.php?selectedState='+selectedState,
                                            success: function(data,status)
                                            {
                                                var anotherDropdown = "<option value="+count+">Choose City</option>";
                                                $.each(data, function(i){
                                                    row = data[i];
                                                    cityName = row.cityRet;
                                                    anotherDropdown = anotherDropdown + "<option value="+ (++count) +">"+ cityName +"</option>";
                                                });
                                                $('#city').html(anotherDropdown);
                                            },
                                            error: function(error){
                                                console.log(error);
                                            }
                                        })
                                    })
                                })
                            </script>
                        </select>
                        <select name="domain" id="domain" required="">
                            <option value="0" selected disabled>Select Domain</option>
                            <?php
                                $query3 = "SELECT * FROM domaintable";
                                $result3 = mysqli_query($con, $query3);
                                while($row = mysqli_fetch_array($result3))
                                {
                                    $id = $row[0];
                                    $name = $row[1];
                                    $i++;
                                    echo "<option id=$id value=$id> $name </option>";
                                }
                            ?>
                        </select>
                        <select id="course" name="course" disabled="true">
                            <option value="0">Choose Course</option>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#domain').change(function(){
                                        // console.log("Changed!!");
                                        var selectedDomain = document.getElementById("domain").value;
                                        // console.log(selectedDomain);
                                        document.getElementById("course").disabled = false;
                                        var count = 0;
                                        $.ajax({
                                            url: 'http://localhost:8080/Projects/final_year/GetCourseForSignUp.php?selectedDomain='+selectedDomain,
                                            success: function(data,status)
                                            {
                                                var anotherDropdown = "<option value="+count+">Choose Course</option>";
                                                $.each(data, function(i){
                                                    row = data[i];
                                                    id = row.idret;
                                                    courseName = row.courseRet;
                                                    anotherDropdown = anotherDropdown + "<option value="+ (id) +">"+ courseName +"</option>";
                                                });
                                                $('#course').html(anotherDropdown);
                                            },
                                            error: function(error){
                                                console.log(error);
                                            }
                                        })
                                    })
                                })
                            </script>
                        </select>
                        <input class="text" type="text" name="contact" placeholder="Contact" required="">
                        <input class="text" type="email" name="mailId" placeholder="Email Id" required="">
                        <div class="wthree-text">
                            <div class="clear"></div>
                        </div>
                        <input type="submit" id="submitButton" value="SIGN UP">
                    </form>
                </div>
            </div>
        </div>
        <!-- //main -->
    </body>
</html>