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
    else echo " ";

?>
<?php
$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  echo "<html><head><title>Test database</title></head>";
echo "<body><CENTER><H3>รายชื่อหนังสือ</H3></CENTER>";
echo "<table width='100%' border='1' align='center'>";
echo "<tr><td>รหัสหนังสือ</td><td>ชื่อหนังสือ</td>";
echo "<td>ประเภทหนังสือ </td> <td>สถานะหนังสือ</td><td>สำนักพิมพ์</td>";
echo "<td>ราคาหนังสือ </td> <td>จำนวนเช่าหนังสือ</td><td>จำนวนวัน</td>";
echo "<td>รูปภาพ </td> <td>วันที่ซื้อ</td></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row["book_id"].
    "</td><td>".$row["book_name"].
    "</td><td>".$row["type_id"].
    "</td><td>".$row["status_id"].
    "</td><td>".$row["publish"].
    "</td><td>".$row["unit_price"].
    "</td><td>".$row["unit_rent"].
    "</td><td>".$row["day_amount"].
    "</td><td>".$row["picture"].
    "</td><td>".$row["book_date"].
    "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>