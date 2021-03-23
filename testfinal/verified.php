<?php
    session_start();
define("hostname","localhost");
define("user","root");
define("password","");
define("dbname","shopshock");
?>
<?php
$conn = new mysqli(hostname,user,password,dbname);
$conn->query("SELECT * FROM 'shopshock' WHERE 1");
if($conn->connect_error)echo "fail";
else echo " ";
$conn->set_charset("utf8");
?>
<?php 
 if(isset($_POST['username'])){
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $sql="SELECT * FROM member 
                  WHERE  user='".$username."' 
                  AND  password='".$password."' ";
                  $result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["ID"] = $row["ID"];
                      $_SESSION["name"] = $row["name"];
                      $_SESSION["type"] = $row["type"];

                      if($_SESSION["type"]=="02"){ 

                        Header("Location: admin.php");
                      }
                  if ($_SESSION["type"]=="member"){ 

                        Header("Location: member.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>
