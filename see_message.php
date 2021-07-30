<?php

$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server,$username,$password);
mysqli_select_db($con,"lms");

include "header.php";
if(!isset($_SESSION["username"]))
    {
        ?>
        <script type = "text/javascript">
        window.location = "login.php"
        </script>
        <?php
    }

?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Messages from Librarian</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <table class = "table table-bordered">
                            <th>Sender</th>
                            <th>Title</th>
                            <th>Message</th>
                            <?php
                            $res = mysqli_query($con,"SELECT * FROM messages WHERE student_username ='$_SESSION[username]' and read1='No'");
                            mysqli_query($con,"UPDATE messages SET read1 = 'Yes' WHERE student_username ='$_SESSION[username]' and read1='No'");
                            while($row = mysqli_fetch_array($res))
                            {echo"<tr>";
                                $res1 = mysqli_query($con,"SELECT * FROM librarian_registration WHERE username = '$row[lib_username]'");
                                while($row1= mysqli_fetch_array($res1))
                                {
                                    echo "<td>"; echo $row1["firstname"]." ".$row1["lastname"]; echo "</td>";
                                }                                
                                 
                                echo "<td>"; echo $row["title"]; echo "</td>"; 
                                
                                echo "<td>"; echo $row["message"]; echo "</td>"; 
                                echo"</tr>";
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>