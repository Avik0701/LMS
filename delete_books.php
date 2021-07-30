<?php

$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server,$username,$password);
mysqli_select_db($con,"lms");
$id = $_GET["bookID"];
echo $id;
mysqli_query($con,"DELETE FROM add_books WHERE bookID=$id");
?>

<script type = "text/javascript">
    window.location = "display_books.php";
</script> 