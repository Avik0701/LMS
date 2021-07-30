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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form action="" name = "form1" method = "post">
                            <table class = "table">
                            <tr><td><input type= "text"  class = "form-control" name = "t1" placeholder ="Enter Book's Name" required></input></td>
                            <td><input type= "Submit"  name = "submit1" Value ="Search" class = "form-control" 
                            style = "background-color:blue; padding:5px; color:white" required></input></td></tr>
                            
                            </table>                            
                            </form>

                            <?php                                                       
                           
                                if(isset($_POST["submit1"]))
                                {
                                    $res = mysqli_query($con,"SELECT * FROM add_books WHERE available_quantity>0 AND book_name like ('%$_POST[t1]%')");
                                echo "<table class = 'table table-bordered'>";
                                echo "<tr>";
                                echo "<th>Book Name</th>";
                                echo "<th>Book Author</th>";
                                echo "<th>Image</th>";
                                echo "<th>Quanitiy Available</th>";
                                echo "<th>Book ID</th>";                                                        
                                echo "</tr>";
                                                                
                                while($row = mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>";echo $row["book_name"];echo "</td>";
                                    echo "<td>";echo $row["book_author"];echo "</td>";
                                    echo "<td>";?> <img src ="../librarian/<?php echo $row["image"];?>" height ="100" width = "80"><?php echo "</td>";
                                    echo "<td>";echo $row["available_quantity"];echo "</td>"; 
                                    echo "<td>";echo $row["bookID"];echo "</td>";                       
                                    echo "</tr>";
                                }
                                }

                                else{
                                    $res = mysqli_query($con,"SELECT * FROM add_books WHERE available_quantity>0 ");
                                    echo "<table class = 'table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>Book Name</th>";
                                    echo "<th>Book Author</th>";
                                    echo "<th>Image</th>";
                                    echo "<th>Quanitiy Available</th>";
                                    echo "<th>Book ID</th>";                                                        
                                    echo "</tr>";
                                                                    
                                    while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>";echo $row["book_name"];echo "</td>";
                                        echo "<td>";echo $row["book_author"];echo "</td>";
                                        echo "<td>";?> <img src ="../librarian/<?php echo $row["image"];?>" height ="100" width = "80"><?php echo "</td>";
                                        echo "<td>";echo $row["available_quantity"];echo "</td>"; 
                                        echo "<td>";echo $row["bookID"];echo "</td>";                       
                                        echo "</tr>";
                                    }       
                                            
                                    echo "</table>";
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