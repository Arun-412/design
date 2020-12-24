<?php
require 'db_connection.php';
if(isset($_GET['Id']) && is_numeric($_GET['Id'])){
    
    $id = $_GET['Id'];
    $get_user = mysqli_query($conn,"SELECT * FROM `account` WHERE Id='$id'");
    
    if(mysqli_num_rows($get_user) === 1){
        
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
     <div class="container">
      
       <!-- UPDATE DATA -->
        <div class="form">
            <h2>Update Data</h2>
            <form action="" method="post">
            <strong>Username</strong><br>
                <input type="text" autocomplete="off" name="Id" placeholder="Enter your Id" value="<?php echo $row['Id'];?>" required><br>
                <strong>Username</strong><br>
                <input type="text" autocomplete="off" name="username" placeholder="Enter your full username" value="<?php echo $row['username'];?>" required><br>
                <strong>Email</strong><br>
                <input type="text" autocomplete="off" name="password" placeholder="Enter your password" value="<?php echo $row['password'];?>" required><br>
                <input type="submit" value="Update">
                <input type="submit" value="back">
            </form>
        </div>
        <!-- END OF UPDATE DATA SECTION -->
    </div>
</body>
</html>
<?php

    }else{
        // set header response code
        http_response_code(404);
        echo "<h1>404 Page Not Found!</h1>";
    }
    
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}


/* ---------------------------------------------------------------------------
------------------------------------------------------------------------------ */


// UPDATING DATA

if(isset($_POST['Id']) && isset($_POST['username']) && isset($_POST['password'])){
    
    // check username and email empty or not
    if(!empty($_POST['Id']) &&  !empty($_POST['username']) && !empty($_POST['password'])){
        
        // Escape special characters.
        $id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Id']));
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
        
        //CHECK EMAIL IS VALID OR NOT
        if ($password) {
            $id = $_GET['Id'];
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_password = mysqli_query($conn, "SELECT `password` FROM `account` WHERE password = '$password' AND Id != '$id'");
            
            if(mysqli_num_rows($check_password) > 0){    
                
                echo "<h3>This password is already registered. Please Try another.</h3>";
                
                
            }else{
                
                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE `account` SET Id='$id', username='$username',password='$password' WHERE Id=$id");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
           
                
                
            }
            
            
        }else{
            echo "Invalid password. Please enter a valid password";
        }
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
    
}

// END OF UPDATING DATA

?>

