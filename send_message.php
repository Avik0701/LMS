<?php
session_start();
 $server = "localhost";
 $username = "root";
 $password = "";
 $con = mysqli_connect($server,$username,$password);
 mysqli_select_db($con,"lms");
include "header.php";
if(!isset($_SESSION["librarian_registration"]))
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
                        <h3>Send Messages</h3>
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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name = "form1" method = "post" action="" class = "col-lg-10" enctype = "multipart/form-data"> 
                                <table class = "table table-bordered">
                                <tr>
                                    Select Student Name
                                <td><select class = "form-control" name = "student_username">
                                <?php
                                $res = mysqli_query($con, "SELECT * FROM student_registration");
                                while($row = mysqli_fetch_array($res))
                                {   
                                    echo "<option value ='$row[username]'>"; echo $row["username"]."(".$row["enrollmentno"].")"; echo "</option>";
                                }

                                ?>
                                </td>
                                </tr> 
                                <tr><td><input type="text" class = "form-control"name ="title" placeholder = "Enter Title"></input>  </td></tr>
                                <tr><td><textarea type="text" class = "form-control"name ="message" placeholder = "Enter Message"></textarea> </td></tr>
                                <tr>
                            <td><input type="submit" name ="submit" class = "form-control"
                                value = "Send Message" style = "background-color:blue; padding:5px; color:white"> </input></td>
                            </tr>
                                </table> </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST["submit"]))
        {
            $res = mysqli_query($con,"INSERT INTO messages VALUES ('','$_POST[student_username]',
            '$_SESSION[librarian_registration]','$_POST[title]','$_POST[message]','No')");
            ?>
            <script type = "text/javascript">alert(Message Sent Successfully!!)</script>
            <?php
        }
        ?>
        <!-- /page content -->

<?php
include "footer.php";
?>

       