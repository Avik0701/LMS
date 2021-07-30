
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
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server,$username,$password);
mysqli_select_db($con,"lms");
include "header.php";

?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Display Books</h3>
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
                            <form name = "form1" action = "" method = "post" >
                                <input type = "text" name = "text1" class = "form-control" placeholder = "Enter the name of the book"></input>
                                <input type="submit" name = "submit1" value = "Search Books" class = "form-control" style = "background-color:blue; color:white; padding:5px;" ></input>
                            </form>

                            <?php
                            if(isset($_POST["submit1"]))
                            {
                                $res = mysqli_query($con,"SELECT * FROM add_books WHERE book_name like ('%$_POST[text1]%')");
                                echo "<table class = 'table table-bordered'>";
                                echo"<th></th>";
                                echo"<th></th>";   
                                echo"<th></th>";                                 
                                echo "<th>Books Available</th>";
                                echo"<th></th>";
                                echo"<th></th>";
                                echo"<th></th>";
                                echo "<tr>";
                                echo "<th>Book Name</th>";
                                echo "<th>Book Image</th>";
                                echo "<th>Author Name</th>";
                                echo "<th>Total Quantity</th>";
                                echo "<th>Available Quantity</th>";                                
                                echo "<th>Price</th>";             
                                echo "<th>Delete Book</th>";       
                                    
                                echo "</tr>";
                                                                
                                    while($row = mysqli_fetch_array($res)){
                                    echo "<tr>";
                                    echo "<td>";echo $row["book_name"];echo "</td>";
                                    echo "<td>";?> <img src="<?php echo$row ["image"]; ?>" height="100" width = "80"> <?php ;echo "</td>";
                                    echo "<td>";echo $row["book_author"];echo "</td>";
                                    echo "<td>";echo $row["book_quantity"];echo "</td>";
                                    echo "<td>";echo $row["available_quantity"];echo "</td>";
                                    echo "<td>";echo $row["price"];echo "</td>";    
                                    echo "<td>";?> <a href = "delete_books.php?bookID=<?php echo $row["bookID"];?>">Delete Book</a><?php echo "</td>";                                                                      
                                    echo "</tr>";
                                    }          
                                    
                                echo "</table>";
                                    
                            }
                            
                            else
                            {
                                $res = mysqli_query($con,"SELECT * FROM add_books");
                                echo "<table class = 'table table-bordered'>";
                                echo"<th></th>";
                                echo"<th></th>";  
                                echo"<th></th>";                                  
                                echo "<th>Books Available</th>";
                                echo"<th></th>";
                                echo"<th></th>";
                                echo"<th></th>";
                                echo "<tr>";
                                echo "<th>Book Name</th>";
                                echo "<th>Book Image</th>";
                                echo "<th>Author Name</th>";
                                echo "<th>Total Quantity</th>";
                                echo "<th>Available Quantity</th>";                               
                                echo "<th>Price</th>";      
                                echo "<th>Delete Book</th>";              
                                    
                                echo "</tr>";
                                                                
                                while($row = mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>";echo $row["book_name"];echo "</td>";
                                    echo "<td>";?> <img src="<?php echo$row ["image"]; ?>" height="100" width = "80"> <?php ;echo "</td>";
                                    echo "<td>";echo $row["book_author"];echo "</td>";
                                    echo "<td>";echo $row["book_quantity"];echo "</td>";
                                    echo "<td>";echo $row["available_quantity"];echo "</td>";
                                    echo "<td>";echo $row["price"];echo "</td>"; 
                                    echo "<td>";?> <a href = "delete_books.php?bookID=<?php echo $row["bookID"];?>">Delete Book</a><?php echo "</td>";                                                                         
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
