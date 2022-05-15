<?php
    session_start();
    require 'check_if_added.php';
    require 'connection.php';
    
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background-color: blue;
            }
            </style>
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
    <body >
        <div>
        <?php
            require 'header.php';
           ?>   
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to the Admin page!</h1>
                </div>
            </div>
                   
                    
            <center>
            <h1>User Details</h1>
        <?php
        
        # Prepare the SELECT Query
        $selectSQL = 'SELECT * FROM `users`';
        # Execute the SELECT Query
        if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
        }else{
        ?>
        <table border="2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>city</th>
        </tr>
        </thead>
    <tbody>
        <?php
        if( mysqli_num_rows( $selectRes )==0 ){
            echo '<tr><td colspan="4">No Rows Returned</td></tr>';
        }else{
            while( $row = mysqli_fetch_assoc( $selectRes ) ){
                echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['contact']}</td><td>{$row['address']}</td><td>{$row['city']}</td></tr>\n";
        }
        }
    ?>
    </tbody>
</table>
   <?php
}
?>

<h1>Producers Details</h1>
        <?php
        
        # Prepare the SELECT Query
        $selectSQL = 'SELECT * FROM `producer`';
        # Execute the SELECT Query
        if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
        }else{
        ?>
        <table border="2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>city</th>
        </tr>
        </thead>
    <tbody>
        <?php
        if( mysqli_num_rows( $selectRes )==0 ){
            echo '<tr><td colspan="4">No Rows Returned</td></tr>';
        }else{
            while( $row = mysqli_fetch_assoc( $selectRes ) ){
                echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['contact']}</td><td>{$row['address']}</td><td>{$row['city']}</td></tr>\n";
        }
        }
    ?>
    </tbody>
</table>
   <?php
}
?>
<h1>Product Details</h1>
        <?php
        
        # Prepare the SELECT Query
        $selectSQL = 'SELECT * FROM `product`';
        # Execute the SELECT Query
        if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
            echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
        }else{
        ?>
        <table border="2">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Producer ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Quantity</th>
            <th>Price</th>
            
        </tr>
        </thead>
    <tbody>
        <?php
        if( mysqli_num_rows( $selectRes )==0 ){
            echo '<tr><td colspan="4">No Rows Returned</td></tr>';
        }else{
            while( $row = mysqli_fetch_assoc( $selectRes ) ){
                echo "<tr><td>{$row['productID']}</td><td>{$row['producer_id']}</td><td>{$row['name']}</td><td>{$row['Details']}</td><td>{$row['Quantity']}</td><td>{$row['Price']}</td></tr>\n";
        }
        }
    ?>
    </tbody>
</table>
   <?php
}
?>
            </center>
            <br><br><br><br><br><br><br><br>
           
        </div>
    </body>
</html>
