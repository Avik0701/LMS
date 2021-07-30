<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1>Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="pword" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="contact" name="contact" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="SEM" name="SEM" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollmentno" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit1" value="Register">
                    </div>

                </form>
            </section>

<div class="alert alert-success col-lg-6 col-lg-push-3">   
<?php


if(isset($_POST["submit1"])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server,$username,$password);
    mysqli_select_db($con,"lms");
    
    if(!$con){
        die("Connection to this server failed due to ".
        mysqli_connect_error());
    }
    //echo "<br> Successfully connected";
    

    $username = $_POST['username'];
    $pword = $_POST['pword'];
    $enrollmentno = $_POST['enrollmentno'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $SEM = $_POST['SEM'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    
    //echo "Hello";
    $res = mysqli_query($con,"SELECT * FROM student_registration WHERE username = '$username'");
    $count = mysqli_num_rows($res);
    
    
    if($count == 0)
    {$sql = "INSERT INTO `lms`.`student_registration` (`firstname`,`lastname`,`username`,`pword`,`email`,
    `contact`,`SEM`,`enrollmentno`,`status1`) VALUES ( '$firstname','$lastname','$username','$pword','$email',
    '$contact','$SEM','$enrollmentno','No')";}
    
   //echo $sql;
   if( $count == 0 )
   {       
        $con->query($sql);
       echo "Registration successfully, You will get email when your account is approved";
   }
   else
   {
       echo "Username already taken, try a different one";
   }
   $con->close(); 
}
?>
  
</div>
    </div>

    


</body>
</html>