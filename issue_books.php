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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method ="post">
                                <table class = "table">
                                <tr>
                                    Enter the details to issue book                            
                                </tr>
                                <tr> 
                                <td><select name = "enr" class="form-control" selectpicker>
                                    <?php
                                    $res = mysqli_query($con,"SELECT enrollmentno FROM student_registration ");
                                    while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<option>";
                                        echo $row["enrollmentno"];
                                        echo "</option>";
                                    }
                                    ?>
                                   
                                </select></td>    
                                </tr>
                                <tr>                        
                                <td><input type = "submit"  name ="submit1" 
                                class="form-control btn btn-default submit" value="Search"
                                 style = "background-color:blue; color:white; padding:5px;"></td>
                                </tr>                            
                                </table> 
                                <?php
                                if(isset($_POST["submit1"]))
                                {
                                //echo $_POST["enr"];
                                $res5 = mysqli_query($con,"SELECT  * FROM student_registration WHERE enrollmentno = '$_POST[enr]'");

                                while($row = mysqli_fetch_array($res5)){
                                    $firstname = $row["firstname"];
                                    $lastname = $row["lastname"];
                                    $enrollmentno = $row["enrollmentno"];
                                    $SEM = $row["SEM"];
                                    $username = $row["username"];
                                    $email = $row["email"];
                                    $contact = $row["contact"];
                                    $status1 = $row["status1"];
                                }
                                ?> <table class = "table table-bordered">
                                <tr>                                    
                                <td><input type = "text" name ="enrollmentno" value="<?php echo $enrollmentno;?>" class="form-control" placeholder="Enrollment Number" required></td>
                                </tr>
                                <tr>                                    
                                <td><input type = "text" name ="studentusername" value="<?php echo $username;?>" class="form-control" placeholder="Student Username" required></td>
                                </tr> 
                                <tr>                                    
                                <td><input type = "text" name ="studentname" value="<?php echo $firstname; echo" "; echo $lastname;?>" class="form-control" placeholder="Student Name" required></td>
                                </tr>
                                <tr>                                    
                                <td><input type = "text" name ="studentsem" value="<?php echo $SEM?>" class="form-control" placeholder="Student Semester" required></td>
                                </tr>
                                <tr>                                    
                                <td><input type = "text" name ="studentcontact" value="<?php echo $contact?>" class="form-control" placeholder="Student Contact" required></td>
                                </tr>
                                <tr>                                    
                                <td><input type = "text" name ="studentemail" value="<?php echo $email?>" class="form-control" placeholder="Student Email" required></td>
                                </tr>
                                <tr> 
                                                               
                                <td><select name="booksname" class = "form-control">
                                <?php
                                $resi = mysqli_query($con,"SELECT book_name FROM add_books  WHERE available_quantity>0");

                                while($row = mysqli_fetch_array($resi)){
                                        echo "<option>"; echo $row["book_name"]; echo "</option>";
                                }
                                ?>
                               
                                </select></td>
                                </tr>
                                <tr>                                    
                                <td><input type = "text" name ="bookissuedate" value="<?php echo date("d/m/Y");?>" class="form-control" placeholder="Issue Date" required></td>
                                </tr>
                                
                                <tr>                                    
                                <td><input type = "submit" name ="submit2" class="form-control" value = "Issue Book" style = "background-color:blue; color:white; padding:5px" required></td>
                                </tr>
                                
                                
                                </table>                               
                                 <?php   
                                }?>
                        
                                </form>
                            <?php
                            if(isset($_POST["submit2"]))
                             {                                                                                  
                                 mysqli_query($con,"INSERT INTO `lms`.`issue_books` VALUES ('','$_POST[studentname]',
                                 '$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]',
                                 '$_POST[bookissuedate]','','$_POST[studentusername]','$_POST[enrollmentno]')");

                                mysqli_query($con,"UPDATE add_books SET available_quantity = available_quantity-1 WHERE book_name = '$_POST[booksname]'");
                            ?>
                            <script type = "text/javascript">alert(Book issued successfully!!);
                            window.location.href = window.location.href;
                            <?php
                             }
                            
                            ?>
                             
                            </script>
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

        