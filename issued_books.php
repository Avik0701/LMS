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
                        <h3>Welcome to LMS</h3>
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
                                <h2>Issued Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <table class = "table table-bordered">
                            <th>Student Enrollment Number</th>
                            <th>Books Issued</th>
                            <th>Date of Issue</th>
                            <?php
                            $res = mysqli_query($con,"SELECT * FROM issue_books WHERE student_username ='$_SESSION[username]' and book_retd=''");
                            while($row = mysqli_fetch_array($res))
                            {
                                echo"<tr>";
                                echo "<td>"; echo $row["student_enrollment"]; echo "</td>"; 
                                echo "<td>"; echo $row["book_name"]; echo "</td>"; 
                                echo "<td>"; echo $row["book_issd"]; echo "</td>"; 
                                echo"</tr>";
                            }
                            ?>
                            </table>                            
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