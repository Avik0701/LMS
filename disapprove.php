<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server,$username,$password);
mysqli_select_db($con,"lms");
mysqli_query($con,"UPDATE student_registration SET status1 = 'No'");
?>

<script type = "text/javascript">
    window.location = "page.php";
</script> 