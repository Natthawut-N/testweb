<?php 
    session_start();
?>
<?php
    include_once("class.db.php");
    if($_SERVER["REQUEST_METHOD"]=='GET'){
        echo json_encode(product_list(),JSON_UNESCAPED_UNICODE);
    }else if($_SERVER["REQUEST_METHOD"]=='POST'){
        echo json_encode(print_r($open_bill()));

    }
    function product_list(){
        $db = new database();
        $db->connect();
        $sql = "SELECT Product_id,Product_code,Product_Name,
                       brand.Brand_name, unit.Unit_name,
                       product.Cost, product.Stock_Quantity
                FROM  product,brand,unit 
                WHERE product.Brand_ID = brand.Brand_id
                and   product.Unit_ID  = unit.Unit_id";
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
    function open_bill(){
        $db = new database();
        $db->connect();
       $sql ="SELECT Bill_id,Bill_status FROM bill WHERE Cus_ID='{$_SESSION['cus_id']}' ORDER BY Bill_id DESC LIMIT 1";
         $bill_result = $db->query($sql);
          $p_id = $_POST['p_id'];
            $p_qty = $_POST['p_qty'];
            $p_price = $_POST['p_price'];
         if (sizeof($bill_result)==0) {
            $sql = "INSERT INTO bill(Bill_id,Cus_ID,Bill_status) VALUE(1,'{$_SESSION['cus_id']}'),0)";
            $db->exec($sql);
            $sql = "INSERT INTO bill_detail(Bill_id,Product_ID,Quantity,Unit_Price) 
                    VALUE(1,'{$p_id}','{$p_qty}','{$p_price}')";
            $result= $db->exec($sql);

        }else{
            if ($bill_result[0][1]==0) {
                     $sql ="SELECT Bill_id,Product_ID FROM bill_detail 
                    WHERE Bill_id='{$_SESSION['cus_id']}'
                    and Product_id='{$p_id}'";
                $result = $db->query($sql);
                if (sizeof($result)==0) {
                     $sql = "INSERT INTO bill_detail(Bill_id,Product_ID,Quantity,Unit_Price) 
                    VALUE({$bill_result[0][0]},{$p_id},{$p_qty},{$p_price})";
                    $result= $db->exec($sql);
                }else{

                    }
  
            }
         }

return $result;

    }
?>