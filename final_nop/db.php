<?php 
define("hostname","localhost");
define("user","root");
define("password","");
define("dbname","shopshock");
?>
<?php
    class db{
        private $mysqli;
        function connect(){
            $this->mysqli = new mysqli(hostname,user,password,dbname);
            $this->mysqli->set_charset("utf8");
            if($this->mysqli->connect_errno){
                echo "Fail";
                exit();
            }else{
                echo "Connect success";
            }
        }
        function query($sql){
            $result = $this->mysqli->query($sql);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
         function query2($sql){
            $result = $this->mysqli->query($sql);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        function closedb(){
            //print("db close");
            $this->mysqli->close();
        }
    }

?>