<?php
session_start();
if(!isset($_SESSION["librarian_registration"]))
{
    ?>
    <script type = "text/javascript">
    window.location = "login.php"
    </script>
    <?php
}
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Return Books</h3>
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
                           <form action="" method="post">
                           <table class = "table table-bordered ">
                            <tr>
                            <td> <select name="enr" class = "form-control">
                            <?php
                            $res = mysqli_query($con,"SELECT DISTINCT student_enrollment FROM issue_books WHERE book_retd =''");
                            while($row = mysqli_fetch_array($res))
                            {   echo "<option>";echo"$row[student_enrollment]"; echo "</option>";
                            }                            ?>
                            </select> </td></tr>
                            <td><input type="submit" name ="submit2" class = "form-control"
                             value = "search" style = "background-color:blue; padding:5px; color:white"> </input>
                            </td>
                            <tr>
                            <td><input type="submit" name ="submit" class = "form-control"
                                value = "Return Books" style = "background-color:blue; padding:5px; color:white"> </input></td>
                            </tr>
                           </table>
                           </form>
                           <?php
                            if(isset($_POST["submit2"]))
                            { 
                                $res = mysqli_query($con,"SELECT * FROM issue_books WHERE student_enrollment='$_POST[enr]' AND book_retd = ''");
                            echo "<table class = 'table table-bordered'>";
                            echo"<tr>";
                            echo"<th>"; echo"Student Name"; echo"</th>";
                            echo"<th>"; echo"Enrollment Number"; echo"</th>";
                            echo"<th>"; echo"Student Sem"; echo"</th>";
                            echo"<th>"; echo"Student Contact"; echo"</th>";
                            echo"<th>"; echo"Book Name"; echo"</th>";
                            echo"<th>"; echo"Book Issue Date"; echo"</th>";
                            
                            echo"</tr>";
                            while($row = mysqli_fetch_array($res)){ echo"<tr>";
                                echo "<td>"; echo $row["student_name"];  echo"</td>";
                                echo "<td>"; echo $row["student_enrollment"];  echo"</td>";
                                echo "<td>"; echo $row["student_sem"];  echo"</td>";
                                echo "<td>"; echo $row["student_contact"];  echo"</td>";
                                echo "<td>"; echo $row["book_name"];  echo"</td>";
                                echo "<td>"; echo $row["book_issd"];  echo"</td>";                                
                                echo "</tr>";                            
                            }
                            ?>
                            
                            <?php
                            
                        }                      
                            echo"</table>";
                            
                            if(isset($_POST["submit"]))
                            {                                 
                                $date = date("d/m/Y");
                                mysqli_query($con,"UPDATE issue_books SET book_retd ='$date'  WHERE student_enrollment='$_POST[enr]'");  
                                mysqli_query($con,"UPDATE add_books SET available_quantity = available_quantity+1 WHERE book_name IN
                                (SELECT book_name FROM issue_books WHERE student_enrollment='$_POST[enr]')");
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
