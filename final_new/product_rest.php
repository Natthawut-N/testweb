<?php 
    session_start();
?>
<?php
    include_once("class.db.php");
    if($_SERVER["REQUEST_METHOD"]=='GET'){
        echo json_encode(product_list(),JSON_UNESCAPED_UNICODE);
    }else if($_SERVER["REQUEST_METHOD"]=='POST'){
        echo json_encode(open_bill());
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
        $step = 1;
        $bill_id=1;
        $bill_head="";
        $bill_detail="";
        $db = new database();
        $db->connect();
        $sql = "SELECT Bill_id,Bill_status FROM bill WHERE Cus_ID='{$_SESSION['cus_id']}' order by Bill_id desc limit 1";
        $bill_result = $db->query($sql);
        $p_id = $_POST['p_id'];
        $p_qty= $_POST['p_qty'];
        $p_price =$_POST['p_price'];
        if(sizeof($bill_result)==0){
            $step="2 insert new";
            $sql = "INSERT INTO bill(Bill_id, Cus_ID, Bill_Status) VALUES (1,'{$_SESSION['cus_id']}',0)";
            $result = $db->exec($sql);
            $sql = "INSERT INTO bill_detail(Bill_id, Product_ID, Quantity, Unit_Price) 
                    VALUES (1,'{$p_id}','{$p_qty}','{$p_price}')";
            $result = $db->exec($sql);
        }else{
            $step ="3 add new item";
            // check [0][0] bill_id        [0][1] bill status
            if($bill_result[0][1]==0){
                $sql = "INSERT INTO bill_detail(Bill_id, Product_ID, Quantity, Unit_Price) 
                        VALUES ({$bill_result[0][0]},{$p_id},{$p_qty},{$p_price})";
                $result = $db->exec($sql);
                if($result==0){
                    $step = "4 :update item";
                    $bill_id =$bill_result[0][0];
                    $sql2 = "UPDATE bill_detail SET Quantity={$p_qty},Unit_Price={$p_price} 
                            WHERE Bill_id={$bill_id} and Product_ID={$p_id}";
                    $result =$db->exec($sql2);
                    $step="5 update complete";
                }

            $sql = "SELECT * FROM bill WHERE Bill_Id={$bill_result[0][0]}";
            $bill_head =$db->query($sql,MYSQLI_ASSOC);
            $sql = "SELECT * FROM bill_detail WHERE Bill_Id={$bill_result[0][0]}";
            $bill_detail = $db->query($sql,MYSQLI_ASSOC);
        }
    }
        return ["step"=>$step,"bill"=>$bill_head,"bill_detail"=>$bill_detail];
    }
?>