<?php
require 'db_connection.php';

if( isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password= $_POST['password'];

                $insert_query = mysqli_query($conn,"INSERT INTO `account`(username,password) VALUES('$username','$password')");
            }
               
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                   
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
?>