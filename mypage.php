<?php
    session_start();
    require 'check_if_added.php';
    require 'connection.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
                
            ?>
            <div class="container">
                <div class="jumbotron" style="margin-left: 20px;">
                    <center><h1>Welcome to Producer page!</h1></center>
                </div>
            </div>
            <center><h1><button onClick="location.href='add.php'">Add new Item</button></h1></center>
            <?php
        $email=$_SESSION['email'];
        # Prepare the SELECT Query
        $selectSQL = 'SELECT * FROM `PRODUCT`';
        # Execute the SELECT Query
        if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
            //echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
        }else{
            if( mysqli_num_rows( $selectRes )==0 ){
                echo '<tr><td colspan="4">No Rows Returned</td></tr>';
            }else{
                while( $row = mysqli_fetch_assoc( $selectRes ) ){
        ?>
            
            <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/pink.jpg" alt="PINK">
                            </a>
                            <center>
                                <div class="caption">
                                <h3><?php echo $row['name']; ?></h3>
                                    <p>Price: <?php echo $row['Price']; ?></p>
                                    <p><?php echo $row['Details']; ?></p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(12)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=12" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
           <?php
                }}}
           ?>
        </div>
    </body>
</html>
