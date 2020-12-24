<?php
require 'db_connection.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM `account`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>id</td>
                <th>username</th>
                <th>password</th> 
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['Id'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['password'].'</td>
            <td>
            <a href="update.php?Id='.$row['Id'].'">Edit</a>|
            <a href="delete.php?Id='.$row['Id'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No records found. Please insert some records</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert.php" method="post">
              
                <strong>username</strong><br>
                <input type="text" name="username" placeholder="Enter your username" required><br>
                <strong>password</strong><br>
                <input type="text" name="password" placeholder="Enter your password" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <h2>Show Data</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>
</body>

</html>