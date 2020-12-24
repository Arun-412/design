<?php
require 'db_connection.php';
if(isset($_GET['Id']) && is_numeric($_GET['Id'])){
    
    $id = $_GET['Id'];
    $delete_user = mysqli_query($conn,"DELETE FROM `account` WHERE Id='$id'");
    
    if($delete_user){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
       echo "Opps something wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>