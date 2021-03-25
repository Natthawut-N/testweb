<?php 
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
  $user = $_POST['username'];
  $pass = $_POST['password'];

$sql = "SELECT * FROM member WHERE user = '$user' and password = '$pass'";
  $query = mysqli_query($conn,$sql);
  $row = mysqli_num_rows($query);
  $result = mysqli_fetch_array($query);

  if ($row) {
    $_SESSION['member_id'] = $result[0];
    $_SESSION['name'] = $result[1];
    $_SESSION['type'] = $result[4];
      if ($result[4] == 2) {
        echo "ยินดีต้อนรับ  ".$result[1];
        header("Refresh:1 url=productlist.php");
      }else{
        echo "ยินดีต้อนรับ  ".$result[1];
        header("Refresh:1 url=productlist.php");
      }
  }else{
    echo "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง ลองใหม่อีกครั้ง";
    header("Refresh:1; url=login.php");
  }
?>
