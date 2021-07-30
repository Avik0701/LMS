<?php

$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server,$username,$password);
mysqli_select_db($con,"lms");
$id = $_GET["studentID"];
echo $id;
mysqli_query($con,"UPDATE student_registration SET status1 = 'Yes' WHERE studentID=$id");
?>

<script type = "text/javascript">
    window.location = "page.php";
</script> 