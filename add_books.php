<?php
session_start();
include "header.php";
 $server = "localhost";
 $username = "root";
 $password = "";
 $con = mysqli_connect($server,$username,$password);
 mysqli_select_db($con,"lms");
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
                        <h3>Add Books</h3>
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
                                    Enter Book Info
                                <td><input type = "text" name ="book_name" class="form-control" placeholder="Add book name" required=""></td>
                                </tr>
                                <tr>                       
                                <td><input type = "text"  name ="author_name" class="form-control" placeholder="Add Author name" ></td>
                                </tr>
                                <tr>
                                <td><input type = "text" name ="price" class="form-control" placeholder="Add book price" ></td>
                                </tr>
                                <tr>
                                <td><input type = "text"  name ="book_quantity" class="form-control" placeholder="Add book quanitiy" ></td>
                                </tr>
                                <tr>
                                <td><input type = "text"  name ="available_quantity" class="form-control" placeholder="Add available quanitiy" ></td>
                                </tr>
                                <tr>                                                
                                <td>Add Book Image<input type = "file"  name ="book_image" class="form-control" placeholder="Add book image" ></td>
                                </tr>
                                <tr>                                                
                                <td><input type = "submit"  name ="submit1" class="btn btn-default submit" placeholder="Submit" style = "background-color:blue; color:white; padding:5px;"></td>
                                </tr>                            
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php
        if(isset($_POST["submit1"]))
        {
            $tm = md5(time());
            $fnm = $_FILES["book_image"]["name"];
            $dst = "./books_image/".$tm.$fnm;
            $dst1 = "books_image/".$tm.$fnm;
            move_uploaded_file($_FILES["book_image"]["tmp_name"],$dst);

            mysqli_query($con,"INSERT INTO `add_books`(`book_name`,`book_author`,`price`,`book_quantity`,`available_quantity`,`librarian_username`,`image`) 
            values ('$_POST[book_name]','$_POST[author_name]','$_POST[price]','$_POST[book_quantity]','$_POST[available_quantity]','$_SESSION[librarian_registration]','$dst1')");
        ?>
        <script type = "text/javascript">
            alert("Book Information Added!!");
        </script>
        <?php
        }
        ?>

<?php
include "footer.php";
?>