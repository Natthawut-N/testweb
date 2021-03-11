<?php
    define("hostname","localhost");
    define("user","nat2024");
    define("password","password");
    define("dbname","bookstore");
    
?>
<?php 
    $conn = new mysqli(hostname,user,password,dbname);
    $conn->query("SELECT * FROM `bookstore` WHERE 1");
    if($conn->connect_error) echo "fail";
    else echo "pass";

?>