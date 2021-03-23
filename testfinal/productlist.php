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
$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);
if ($result->num_rows>0){
    echo"<h1><center>ยินดีต้อนรับเข้าสู่เมนูลูกค้า</h1>";
    echo"<center><a href='#'>สั่งซื้อสินค้า</a>
            <a href='#'>ชำระเงิน</a>
            <a href='#'>ออกจากระบบ</a>";
    echo"<center><h1>SHOPSHOCK</h1>";
    echo"<center><h2>Select Product to Cart</h2>";
    echo "<table width='100%' border='1' align='center'>";
    echo "<tr>
           <td>ID</td>
           <td>Product_coed</td> 
           <td>Product_Name</td>
           <td>Brand</td> 
           <td>Unit</td>   
           <td>Cost</td>
           <td>SHOP</td>  
           </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>".$row["Product_id"].
                "</td><td>".$row["Product_code"].
                "</td><td>".$row["Product_Name"].
                "</td><td>".$row["Brand_ID"].
                "</td><td>".$row["Unit_ID"].
                "</td><td>".$row["Cost"].
                "</td><td>"."<a href='#'>ShopShock<a/>".
                "</td></tr>";
    }
    echo"</table>";
}else {
echo "0 results";
}
$conn->close();
?>